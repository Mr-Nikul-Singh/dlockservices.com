<?php
defined('BASEPATH') or exit('No direct script access allowed');
function resize_image($sourceFile, $destFile) {
    // Get the file extension
    $extension = pathinfo($sourceFile, PATHINFO_EXTENSION);

    // Create an image resource based on the file type
    if ($extension === 'jpg' || $extension === 'jpeg') {
        $sourceImage = imagecreatefromjpeg($sourceFile);
    } elseif ($extension === 'png') {
        $sourceImage = imagecreatefrompng($sourceFile);

        // Enable alpha blending and save alpha
        imagesavealpha($sourceImage, true);
        imagealphablending($sourceImage, false);
    } elseif ($extension === 'gif') {
        $sourceImage = imagecreatefromgif($sourceFile);
    } else {
        // Unsupported file type
        return false;
    }

    // Get the original dimensions
    $sourceWidth = imagesx($sourceImage);
    $sourceHeight = imagesy($sourceImage);

    // Define the new dimensions
    $newWidth = 120;
    $newHeight = 33;

    // Create a blank image with the new dimensions and transparency
    $destImage = imagecreatetruecolor($newWidth, $newHeight);

    // Preserve transparency for PNG images
    if ($extension === 'png') {
        $transparent = imagecolorallocatealpha($destImage, 0, 0, 0, 127);
        imagefill($destImage, 0, 0, $transparent);
        imagesavealpha($destImage, true);
    }

    // Resize the image
    imagecopyresampled($destImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $sourceWidth, $sourceHeight);

    // Save the resized image to a file (or you can output it to the browser)
    if ($extension === 'jpg' || $extension === 'jpeg') {
        imagejpeg($destImage, $destFile);
    } elseif ($extension === 'png') {
        imagepng($destImage, $destFile);
    } elseif ($extension === 'gif') {
        imagegif($destImage, $destFile);
    }

    // Clean up
    imagedestroy($sourceImage);
    imagedestroy($destImage);

    return true;
}