<?php
require 'vendor/autoload.php';

$files = [
    'public/assets/image/student-showcase.jpeg',
    'public/assets/image/logo/partner_jagoan.png',
    'public/assets/image/logo/partner_itbrain.png',
    'public/assets/image/logo/partner_amigroup.png',
    'public/assets/image/logo/partner_oracle.png',
    'public/assets/image/logo/partner_maspion.png',
];

foreach ($files as $file) {
    if (!file_exists($file)) {
        echo "File not found: {$file}\n";
        continue;
    }
    
    $info = pathinfo($file);
    $output = $info['dirname'] . '/' . $info['filename'] . '.webp';
    
    $ext = strtolower($info['extension']);
    if ($ext === 'png') {
        $img = imagecreatefrompng($file);
        imagepalettetotruecolor($img);
        imagealphablending($img, true);
        imagesavealpha($img, true);
    } elseif ($ext === 'jpg' || $ext === 'jpeg') {
        $img = imagecreatefromjpeg($file);
    } else {
        continue;
    }
    
    imagewebp($img, $output, 85);
    imagedestroy($img);
    unlink($file);
    echo "Converted: {$file} -> {$output}\n";
}
