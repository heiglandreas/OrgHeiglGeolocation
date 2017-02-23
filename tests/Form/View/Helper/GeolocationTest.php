<?php
/**
 * Copyright Andreas Heigl<andreas@heigl.org>
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

namespace Org_Heigl\GeolocationTest\Form\View\Helper;

use PHPUnit\Framework\TestCase;
use Org_Heigl\Geolocation\Form\View\Helper\Geolocation;
use Org_Heigl\Geolocation\Form\Element\Geolocation as GeoElement;
use Mockery as M;
use Zend\View\Helper\HeadLink;
use Zend\View\Helper\HeadScript;
use Zend\View\Renderer\PhpRenderer;

class GeolocationTest extends TestCase
{
    public function testRendering()
    {
        $this->markTestIncomplete('Has to be implemented fully');

        $element = M::mock(GeoElement::class);

        $headScript = M::mock(HeadScript::class);
        $headLink   = M::mock(HeadLink::class);
        $view       = M::mock(PhpRenderer::class);
        $headScript->setView($view);
        $headLink->setView($view);

        $renderer = new Geolocation();
        $renderer->setView($view);

        $this->assertEquals('foo', $renderer->render($element));

    }
}