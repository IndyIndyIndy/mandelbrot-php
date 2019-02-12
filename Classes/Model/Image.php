<?php
namespace ChristianEssl\Mandelbrot\Model;

/**
 * Image
 */
class Image implements \ArrayAccess
{
    /**
     * @var Color[]
     */
    protected $colors;

    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * Image constructor.
     *
     * @param int $width
     * @param int $height
     */
    public function __construct(int $width, int $height)
    {
        $this->colors = [];
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @param int $offset
     * @param Color $value
     */
    public function offsetSet($offset, $value) : void
    {
        if (is_null($offset)) {
            $this->colors[] = $value;
        } else {
            $this->colors[$offset] = $value;
        }
    }

    /**
     * @param int $offset
     *
     * @return bool
     */
    public function offsetExists($offset) : bool
    {
        return isset($this->colors[$offset]);
    }

    /**
     * @param int $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->colors[$offset]);
    }

    /**
     * @param int $offset
     *
     * @return Color|null
     */
    public function offsetGet($offset)  : ?Color
    {
        return isset($this->colors[$offset]) ? $this->colors[$offset] : null;
    }

    /**
     * @param int $x
     * @param int $y
     *
     * @return int
     */
    public function getKey(int $x, int $y) : int
    {
        return $y * $this->width + $x;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

}