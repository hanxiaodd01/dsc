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
use SimpleXMLElement;

/**
 * SVG backend.
 */
class Svg extends AbstractRenderer
{
    /**
     * SVG resource.
     *
     * @var SimpleXMLElement
     */
    protected $svg;

    /**
     * Colors used for drawing.
     *
     * @var array
     */
    protected $colors = array();

    /**
     * Prototype IDs.
     *
     * @var array
     */
    protected $prototypeIds = array();

    /**
     * init(): defined by RendererInterface.
     *
     * @return void
     * @see    ImageRendererInterface::init()
     */
    public function init()
    {
        $this->svg = new SimpleXMLElement(
            '<?xml version="1.0" encoding="UTF-8"?>'
            . '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"/>'
        );
        $this->svg->addAttribute('version', '1.1');
        $this->svg->addAttribute('width', $this->finalWidth . 'px');
        $this->svg->addAttribute('height', $this->finalHeight . 'px');
        $this->svg->addAttribute('viewBox', '0 0 ' . $this->finalWidth . ' ' . $this->finalHeight);
        $this->svg->addChild('defs');
    }

    /**
     * addColor(): defined by RendererInterface.
     *
     * @param string         $id
     * @param ColorInterface $color
     * @return void
     * @throws Exception\InvalidArgumentException
     * @see    ImageRendererInterface::addColor()
     */
    public function addColor($id, ColorInterface $color)
    {
        $this->colors[$id] = (string)$color->toRgb();
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
        $rect = $this->svg->addChild('rect');
        $rect->addAttribute('x', 0);
        $rect->addAttribute('y', 0);
        $rect->addAttribute('width', $this->finalWidth);
        $rect->addAttribute('height', $this->finalHeight);
        $rect->addAttribute('fill', '#' . $this->colors[$colorId]);
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
        $use = $this->svg->addChild('use');
        $use->addAttribute('x', $x);
        $use->addAttribute('y', $y);
        $use->addAttribute(
            'xlink:href',
            $this->getRectPrototypeId($colorId),
            'http://www.w3.org/1999/xlink'
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
        return $this->svg->asXML();
    }

    /**
     * Get the prototype ID for a color.
     *
     * @param integer $colorId
     * @return string
     */
    protected function getRectPrototypeId($colorId)
    {
        if (!isset($this->prototypeIds[$colorId])) {
            $id = 'r' . dechex(count($this->prototypeIds));

            $rect = $this->svg->defs->addChild('rect');
            $rect->addAttribute('id', $id);
            $rect->addAttribute('width', $this->blockSize);
            $rect->addAttribute('height', $this->blockSize);
            $rect->addAttribute('fill', '#' . $this->colors[$colorId]);

            $this->prototypeIds[$colorId] = '#' . $id;
        }

        return $this->prototypeIds[$colorId];
    }
}
