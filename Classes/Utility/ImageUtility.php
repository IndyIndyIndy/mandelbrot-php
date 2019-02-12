<?php
namespace ChristianEssl\Mandelbrot\Utility;

use ChristianEssl\Mandelbrot\Model\Color;
use ChristianEssl\Mandelbrot\Model\Image;

/**
 * ImageUtility
 */
class ImageUtility
{
    /**
     * @param float $color
     *
     * @return int
     */
    public static function floatColorToInt(float $color) : int
    {
        return (int) floor($color >= 1.0 ? 255 : $color * 256.0);
    }

    /**
     * @param Image $image
     *
     * @return resource
     */
    public static function createImage(Image $image)
    {
        $width = $image->getWidth();
        $height = $image->getHeight();
        $imageResource = imagecreatetruecolor($width, $height);

        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $key = $image->getKey($x, $y);
                $color = $image[$key];
                $colorCode = self::getColorCode($imageResource, $color);
                imagesetpixel($imageResource, $x, $y, $colorCode);
            }
        }

        return $imageResource;
    }

    /**
     * @param resource $image
     * @param Color $color
     *
     * @return int
     */
    public static function getColorCode($image, Color $color) : int
    {
        $r = self::floatColorToInt($color->getR());
        $g = self::floatColorToInt($color->getG());
        $b = self::floatColorToInt($color->getB());
        return imagecolorallocate($image, $r, $g, $b);
    }

    /**
     * @param resource $imageResource
     */
    public static function outputImage($imageResource) : void
    {
        header('Content-Type: image/png');
        imagepng($imageResource);
    }
}