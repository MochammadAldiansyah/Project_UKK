<?php

/**
 * Recompress raster images embedded in SVG files (base64 data URIs) into WebP.
 *
 * Figma exports that embed photos produce multi-megabyte SVGs where 90%+ of the
 * bytes are base64 PNG/JPEG payloads. Pure-vector SVGs are left untouched, since
 * only their markup can shrink and it is negligible.
 *
 *   php optimize-svg.php                       Report only, writes nothing
 *   php optimize-svg.php --write               Rewrite files, back up originals
 *   php optimize-svg.php --write --max=1440    Cap raster dimensions (default 2560)
 *
 * Requires the GD extension with WebP support. No external dependencies.
 */

const WEBP_QUALITY = 85;
const BACKUP_DIR = 'storage/app/svg-backup';
const DATA_URI = '#(data:image/([a-z0-9.+-]+);base64,)([A-Za-z0-9+/=]+)#i';

$write = in_array('--write', $argv, true);
$max = 2560;
$target = 'public/assets/image';

foreach (array_slice($argv, 1) as $arg) {
    if (preg_match('/^--max=(\d+)$/', $arg, $m)) {
        $max = (int) $m[1];
    } elseif ($arg[0] !== '-') {
        $target = rtrim($arg, '/');
    }
}

if (!extension_loaded('gd') || !function_exists('imagewebp')) {
    exit("GD with WebP support is required.\n");
}

$files = [];
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($target, FilesystemIterator::SKIP_DOTS)) as $file) {
    if (strtolower($file->getExtension()) === 'svg') {
        $files[] = $file->getPathname();
    }
}
sort($files);

$totalBefore = 0;
$totalAfter = 0;
$rewritten = 0;

foreach ($files as $path) {
    $svg = file_get_contents($path);
    $totalBefore += strlen($svg);
    $stats = ['count' => 0, 'skipped' => 0];

    $result = preg_replace_callback(DATA_URI, function ($m) use ($max, &$stats) {
        $stats['count']++;
        $bytes = shrink(base64_decode($m[3], true), $max);
        $new = $bytes === null ? null : 'data:image/webp;base64,' . base64_encode($bytes);

        if ($new === null || strlen($new) >= strlen($m[0])) {
            $stats['skipped']++;
            return $m[0];
        }

        return $new;
    }, $svg);

    if ($result === null) {
        echo "FAILED   {$path}\n";
        $totalAfter += strlen($svg);
        continue;
    }

    $totalAfter += strlen($result);
    $name = substr($path, strlen($target) + 1);

    if (!$stats['count']) {
        printf("vector   %-44s %8s  no embedded raster\n", $name, kb(strlen($svg)));
        continue;
    }

    if (strlen($result) === strlen($svg)) {
        printf("ok       %-44s %8s  %d raster already optimal\n", $name, kb(strlen($svg)), $stats['count']);
        continue;
    }

    printf(
        "shrink   %-44s %8s -> %8s  %d raster%s\n",
        $name,
        kb(strlen($svg)),
        kb(strlen($result)),
        $stats['count'],
        $stats['skipped'] ? ", {$stats['skipped']} kept" : ''
    );

    if ($write) {
        $backup = BACKUP_DIR . '/' . $name;
        @mkdir(dirname($backup), 0777, true);
        copy($path, $backup);
        file_put_contents($path, $result);
        $rewritten++;
    }
}

printf(
    "\n%s  %s -> %s  (%.0f%% smaller)%s\n",
    $write ? "WRITTEN" : "DRY RUN",
    kb($totalBefore),
    kb($totalAfter),
    100 * (1 - $totalAfter / max($totalBefore, 1)),
    $write ? "  {$rewritten} file(s), originals in " . BACKUP_DIR : '  (pass --write to apply)'
);

/**
 * Decode, optionally downscale, and re-encode a raster as WebP.
 * Returns the smaller of the lossy and lossless encodings, or null if undecodable.
 * Lossless is a candidate because flat-colour art (logos, icons) often compresses
 * better that way, and it costs a few bytes of memory to find out.
 */
function shrink(string $raw, int $max): ?string
{
    $img = @imagecreatefromstring($raw);
    if ($img === false) {
        return null;
    }

    if (!imageistruecolor($img)) {
        imagepalettetotruecolor($img);
    }
    imagealphablending($img, true);
    imagesavealpha($img, true);

    $w = imagesx($img);
    $h = imagesy($img);

    if ($max > 0 && max($w, $h) > $max) {
        $scale = $max / max($w, $h);
        $img = downscale($img, max(1, (int) round($w * $scale)), max(1, (int) round($h * $scale)));
    }

    $best = null;
    foreach ([WEBP_QUALITY, IMG_WEBP_LOSSLESS] as $quality) {
        $tmp = tempnam(sys_get_temp_dir(), 'svg');
        imagewebp($img, $tmp, $quality);
        $bytes = file_get_contents($tmp);
        unlink($tmp);
        if ($best === null || strlen($bytes) < strlen($best)) {
            $best = $bytes;
        }
    }

    imagedestroy($img);

    return $best;
}

function downscale($src, int $w, int $h)
{
    $dst = imagecreatetruecolor($w, $h);
    imagealphablending($dst, false);
    imagesavealpha($dst, true);
    imagefill($dst, 0, 0, imagecolorallocatealpha($dst, 0, 0, 0, 127));
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, imagesx($src), imagesy($src));
    imagedestroy($src);

    return $dst;
}

function kb(int $bytes): string
{
    return $bytes < 10240 ? $bytes . ' B' : round($bytes / 1024) . ' KB';
}
