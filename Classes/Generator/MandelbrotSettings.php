<?php
namespace ChristianEssl\Mandelbrot\Generator;

/**
 * MandelbrotSettings
 */
class MandelbrotSettings
{
    /**
     * @var int
     */
    protected $maxIterations;

    /**
     * @var float
     */
    protected $zoom;

    /**
     * @var float
     */
    protected $moveX;

    /**
     * @var float
     */
    protected $moveY;

    public function __construct($maxIterations, $zoom, $moveX, $moveY)
    {
        $this->maxIterations = $maxIterations;
        $this->zoom = $zoom;
        $this->moveX = $moveX;
        $this->moveY = $moveY;
    }

    /**
     * @return int
     */
    public function getMaxIterations() : int
    {
        return $this->maxIterations;
    }

    /**
     * @return float
     */
    public function getZoom() : float
    {
        return $this->zoom;
    }

    /**
     * @return float
     */
    public function getMoveX() : float
    {
        return $this->moveX;
    }

    /**
     * @return float
     */
    public function getMoveY() : float
    {
        return $this->moveY;
    }
}