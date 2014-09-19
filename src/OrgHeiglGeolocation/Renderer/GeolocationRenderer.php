<?php
/**
 * Copyright (c)2013-2013 heiglandreas
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIBILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category 
 * @author    Andreas Heigl<andreas@heigl.org>
 * @copyright ©2013-2013 Andreas Heigl
 * @license   http://www.opesource.org/licenses/mit-license.php MIT-License
 * @version   0.0
 * @since     29.07.13
 * @link      https://github.com/heiglandreas/
 */

namespace OrgHeiglGeolocation\Renderer\Geolocation;

use Zend\View\Renderer\PhpRenderer as View;
use Zend\Mvc\Router\RouteInterface;
use Zend\Stdlib\AbstractOptions;
use Zend\EventManager\StaticEventManager;
use Zend\View\ViewEvent;


class GeolocationRenderer
{
    public function __construct()
    {
        $events = StaticEventManager::getInstance ();

        // Add event of authentication before dispatch
        $events->attach('Zend\View\View', ViewEvent::EVENT_RENDERER_POST, array(
            $this,
            'preRenderForm'
        ), 110 );
    }
    /**
     * @var \Zend\Mvc\Router\RouteInterface $httpRouter
     */
    protected $httpRouter = null;

    /**
     * @var \Zend\StdLib\AbstractOptions $options
     */
    protected $options = null;

    /**
     * Executed before the ZF2 view helper renders the element
     *
     * @param \Zend\View\ViewEvent $view
     */
    public function preRenderForm(ViewEvent $view)
    {
        $view = $view->getRenderer();
        $inlineScript = $view->plugin('inlineScript');

        $assetBaseUri = $this->getHttpRouter()->assemble(array(), array('name' => 'home'));
//        if ($this->getOptions()->isIncludeJquery()) {
//            $inlineScript->appendFile($assetBaseUri . '/lib/jquery/jquery.min.js');
//        }
//        if ($this->getOptions()->isIncludeLeaflet()) {
//            $inlineScript->appendFile($assetBaseUri . '/lib/leaflet/leaflet.min.js');
//        }
        $inlineScript->appendFile($assetBaseUri . '/js/geolocation.js');
        return $this;
    }


    /**
     * @return \Zend\Mvc\Router\RouteInterface
     */
    public function getHttpRouter()
    {
        return $this->httpRouter;
    }

    /**
     * @param \Zend\Mvc\Router\RouteInterface $httpRoute
     *
     * @return Renderer
     */
    public function setHttpRouter(RouteInterface $httpRouter)
    {
        $this->httpRouter = $httpRouter;

        return $this;
    }

    /**
     * @return \Zend\StdLib\AbstractOptions
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param \Zend\StdLib\AbstractOptions $options
     *
     * @return Renderer
     */
    public function setOptions(AbstractOptions $options = null)
    {
        $this->options = $options;

        return $this;
    }

}