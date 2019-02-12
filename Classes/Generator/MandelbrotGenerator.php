<?php
namespace ChristianEssl\Mandelbrot\Generator;

use ChristianEssl\Mandelbrot\Model\Color;
use ChristianEssl\Mandelbrot\Model\Image;

/**
 * Mandelbrot
 */
class MandelbrotGenerator
{
    /**
     * @param int $width
     * @param int $height
     * @param MandelbrotSettings $settings
     *
     * @return Image
     */
    public function generate(int $width, int $height, MandelbrotSettings $settings) : Image
    {
        $image = new Image($width, $height);
        $maxIterations = $settings->getMaxIterations();
        $zoom = $settings->getZoom();
        $moveX = $settings->getMoveX();
        $moveY = $settings->getMoveY();

        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $pixelReal = 1.5 * ($x - $width / 2) / (0.5 * $zoom * $width) + $moveX;
                $pixelImaginary = ($y - $height / 2) / (0.5 * $zoom * $height) + $moveY;
                $newReal = 0;
                $newImaginary = 0;

                for ($i = 0; $i < $maxIterations; $i++) {
                    $oldReal = $newReal;
                    $oldImaginary = $newImaginary;

                    $newReal = ($oldReal ** 2) - ($oldImaginary ** 2) + $pixelReal;
                    $newImaginary = 2 * $oldReal * $oldImaginary + $pixelImaginary;

                    if ($newReal ** 2 + $newImaginary ** 2 > 4) {
                        break;
                    }
                }

                $key = $image->getKey($x, $y);
                $color = $i * (1.0 / 256);
                $image[$key] = new Color($color, $color, $color);
            }
        }

        return $image;
    }

}