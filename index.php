<?php

require __DIR__ . '/vendor/autoload.php';

use \ChristianEssl\Mandelbrot\Generator\MandelbrotGenerator;
use \ChristianEssl\Mandelbrot\Generator\MandelbrotSettings;
use \ChristianEssl\Mandelbrot\Utility\ImageUtility;

$mandelbrotGenerator = new MandelbrotGenerator();
$settings = new MandelbrotSettings(
    256,
    180,
    -0.74,
    -0.139
);

$image = $mandelbrotGenerator->generate(500, 500, $settings);
$imageResource = ImageUtility::createImage($image);
ImageUtility::outputImage($imageResource);
