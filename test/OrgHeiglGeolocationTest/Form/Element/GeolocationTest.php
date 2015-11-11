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

namespace OrgHeiglGeolocationTest\Form\Element;

use OrgHeiglGeolocation\Validator\IsGeolocation;
use \PHPUnit_Framework_TestCase as TestCase;
use \OrgHeiglGeolocation\Form\Element\Geolocation;

class GeolocationTest extends TestCase
{
    public function testProvidesDefaultValidators()
    {
        $element = new Geolocation('foo');

        $inputSpec = $element->getInputSpecification();

        $this->assertArrayHasKey('validators', $inputSpec);
        $this->assertInternalType('array', $inputSpec['validators']);

        $expectedClasses = array(
            'OrgHeiglGeolocation\Validator\IsGeolocation',
        );

        foreach ($inputSpec['validators'] as $validator) {
            $class = get_class($validator);
            $this->assertTrue(in_array($class, $expectedClasses), $class);
        }
    }

    public function testProvidesDefaultFilters()
    {
        $element = new Geolocation('foo');

        $inputSpec = $element->getInputSpecification();

        $this->assertArrayHasKey('filters', $inputSpec);
        $this->assertInternalType('array', $inputSpec['filters']);

        $expectedClasses = array(
            'Zend\Filter\StringTrim',
            'OrgHeiglGeolocation\Filter\Geolocation',
        );

        foreach ($inputSpec['filters'] as $filter) {
            $class = get_class($filter);
            $this->assertTrue(in_array($class, $expectedClasses), $class);
        }
    }

    public function testSetName()
    {
        $element = new Geolocation('foo');

        $inputSpec = $element->getInputSpecification();

        $this->assertArrayHasKey('name', $inputSpec);
        $this->assertInternalType('string', $inputSpec['name']);
        $this->assertEquals('foo', $inputSpec['name']);
    }
}
