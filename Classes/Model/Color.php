<?php
namespace ChristianEssl\Mandelbrot\Model;

/**
 * Color
 */
class Color
{
    /**
     * @var float
     */
    protected $r;

    /**
     * @var float
     */
    protected $g;

    /**
     * @var float
     */
    protected $b;

    /**
     * Color constructor.
     *
     * @param float $r
     * @param float $g
     * @param float $b
     */
    public function __construct(float $r, float $g, float $b)
    {
        $this->r = $r;
        $this->g = $g;
        $this->b = $b;
    }

    /**
     * @return float
     */
    public function getR(): float
    {
        return $this->r;
    }

    /**
     * @return float
     */
    public function getG(): float
    {
        return $this->g;
    }

    /**
     * @return float
     */
    public function getB(): float
    {
        return $this->b;
    }

}