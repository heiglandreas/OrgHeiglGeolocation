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
 * @since     08.07.13
 * @link      https://github.com/heiglandreas/
 */

namespace OrgHeiglGeolocationTest\Form\View\Helper;

use OrgHeiglGeolocationTest\Form\View\Helper\CommonTestCase;
use OrgHeiglGeolocation\Form\Element;
use OrgHeiglGeolocation\Form\View\Helper\FormGeolocation as GeolocationHelper;

class FormGeolocationTest extends CommonTestCase
{

    public function setup()
    {
        $this->helper = new GeolocationHelper();
        parent::setup();
    }

    public function getElement()
    {
        $element = new Element\Geolocation('foo');
        $options = array();
        $element->setOptions($options);

        return $element;
    }

    public function testRaisesExceptionWhenNoNameIsPresent()
    {
        $element = new Element\Geolocation();
        $this->setExpectedException('Zend\Form\Exception\DomainException', 'name');
        $this->helper->render($element);
    }

    public function testRendering()
    {
        $element = $this->getElement();

        $result = $this->helper->render($element);

        $this->assertContains('<input type="text"', $result);
        $this->assertContains('name="foo"', $result);
        $this->assertContains('class=" orgheiglgeolocation"', $result);
    }


}
