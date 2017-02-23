<?php
/**
 * Copyright Andreas Heigl <andreas@heigl.org>
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
 * @author    Andreas Heigl<andreas@heigl.org>
 * @copyright Andreas Heigl
 * @license   http://www.opesource.org/licenses/mit-license.php MIT-License
 * @version   0.0
 * @since     29.07.13
 * @link      https://github.com/heiglandreas/OrgHeiglGeolocation
 */

namespace Org_Heigl\Geolocation\Renderer\Geolocation;

use Zend\Mvc\Router\RouteInterface;
use Zend\Stdlib\AbstractOptions;
use Zend\EventManager\StaticEventManager;
use Zend\View\ViewEvent;


class GeolocationRenderer
{
    /**
     * @var \Zend\Mvc\Router\RouteInterface $httpRouter
     */
    protected $httpRouter = null;

    /**
     * @var \Zend\StdLib\AbstractOptions $options
     */
    protected $options = null;

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
     * Executed before the ZF2 view helper renders the element
     *
     * @param \Zend\View\ViewEvent $view
     */
    public function preRenderForm(ViewEvent $view) : self
    {
        $view = $view->getRenderer();
        $inlineScript = $view->plugin('inlineScript');

        $assetBaseUri = $this->getHttpRouter()->assemble(array(), array('name' => 'home'));

        $inlineScript->appendFile($assetBaseUri . '/js/geolocation.js');

        return $this;
    }

    public function getHttpRouter() : RouteInterface
    {
        return $this->httpRouter;
    }

    public function setHttpRouter(RouteInterface $httpRouter) : self
    {
        $this->httpRouter = $httpRouter;

        return $this;
    }

    public function getOptions() : AbstractOptions
    {
        return $this->options;
    }

    public function setOptions(AbstractOptions $options = null) : self
    {
        $this->options = $options;

        return $this;
    }
}
