<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace OrgHeiglGeolocation\Form\View\Helper;

use Zend\Form\ElementInterface;
use OrgHeiglGeolocation\Form\Element\Geolocation as GeolocationElement;
use Zend\Form\Exception;
use Zend\Form\View\Helper\FormText;

class FormGeolocation extends FormText
{
    /**
     * Render a date element that is composed of six selects
     *
     * @param  ElementInterface $element
     * @throws \Zend\Form\Exception\InvalidArgumentException
     * @throws \Zend\Form\Exception\DomainException
     * @return string
     */
    public function render(ElementInterface $element)
    {
        if (!$element instanceof GeolocationElement) {
            throw new Exception\InvalidArgumentException(sprintf(
                '%s requires that the element is of type OrgHeiglGeolocation\Form\Element\Geolocation',
                __METHOD__
            ));
        }

        $name = $element->getName();
        if ($name === null || $name === '') {
            throw new Exception\DomainException(sprintf(
                '%s requires that the element has an assigned name; none discovered',
                __METHOD__
            ));
        }


        $attributes = $element->getAttributes();
        $attributes['name'] = $name;

        if (! isset($attributes['class'])) {
            $attributes['class'] = '';
        }
        $attributes['class'] .= " orgheiglgeolocation";
        $element->setAttributes($attributes);

        $view = $this->getView();

        $formelement = parent::render($element);

        $formelement .= '<div id    ="' . $element->getAttribute('id') . '_wrapper">'
            . '  <div class="searchbox"></div>'
            . '  <div class="resultbox"></div>'
            . '  <div class="map"></div>'
            . '</div>'
            . '<script type="text/javascript">'
            . '  $("#' . $element->getAttribute('id') . '").orgHeiglGeolocation();'
            . '</script>'
        ;

        return $formelement;

    }

    /**
     * Invoke helper as function
     *
     * Proxies to {@link render()}.
     *
     * @param \Zend\Form\ElementInterface $element
     * @param float                       $latitude
     * @param float                       $longitude
     * @param int                         $zoomLevel
     *
     * @return string
     */
    public function __invoke(
        ElementInterface $element = null,
        $latitude = 0,
        $longitude = 0,
        $zoomLevel = 11
    ) {
        if (!$element) {
            return $this;
        }

        $this->setCenter($latitude, $longitude);
        $this->setZoomLevel($zoomLevel);

        return $this->render($element);
    }

}
