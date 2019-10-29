<?php
/**
 * BaconQrCode
 *
 * @link      http://github.com/Bacon/BaconQrCode For the canonical source repository
 * @copyright 2013 Ben 'DASPRiD' Scholzen
 * @license   http://opensource.org/licenses/BSD-2-Clause Simplified BSD License
 */

namespace BaconQrCode\Renderer\Image;

use BaconQrCode\Exception;
use BaconQrCode\Renderer\Color\ColorInterface;

/**
 * PNG backend.
 */
class Png extends AbstractRenderer
{
    /**
     * Image resource used when drawing.
     *
     * @var resource
     */
    protected $image;

    /**
     * Colors used for drawing.
     *
     * @var array
     */
    protected $colors = array();

    /**
     * init(): defined by RendererInterface.
     *
     * @return void
     * @see    ImageRendererInterface::init()
     */
    public function init()
    {
        $this->image = imagecreatetruecolor($this->finalWidth, $this->finalHeight);
    }

    /**
     * addColor(): defined by RendererInterface.
     *
     * @param string         $id
     * @param ColorInterface $color
     * @return void
     * @throws Exception\RuntimeException
     * @see    ImageRendererInterface::addColor()
     */
    public function addColor($id, ColorInterface $color)
    {
        if ($this->image === null) {
            throw new Exception\RuntimeException('Colors can only be added after init');
        }

        $color = $color->toRgb();

        $this->colors[$id] = imagecolorallocate(
            $this->image,
            $color->getRed(),
            $color->getGreen(),
            $color->getBlue()
        );
    }

    /**
     * drawBackground(): defined by RendererInterface.
     *
     * @param string $colorId
     * @return void
     * @see    ImageRendererInterface::drawBackground()
     */
    public function drawBackground($colorId)
    {
        imagefill($this->image, 0, 0, $this->colors[$colorId]);
    }

    /**
     * drawBlock(): defined by RendererInterface.
     *
     * @param integer $x
     * @param integer $y
     * @param string  $colorId
     * @return void
     * @see    ImageRendererInterface::drawBlock()
     */
    public function drawBlock($x, $y, $colorId)
    {
        imagefilledrectangle(
            $this->image,
            $x,
            $y,
            $x + $this->blockSize - 1,
            $y + $this->blockSize - 1,
            $this->colors[$colorId]
        );
    }

    /**
     * getByteStream(): defined by RendererInterface.
     *
     * @return string
     * @see    ImageRendererInterface::getByteStream()
     */
    public function getByteStream()
    {
        ob_start();
        imagepng($this->image);
        return ob_get_clean();
    }
}