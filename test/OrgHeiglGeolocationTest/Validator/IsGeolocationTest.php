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
 * @since     04.07.13
 * @link      https://github.com/heiglandreas/
 */

namespace OrgHeiglGeolocationTest\Validator;

use OrgHeiglGeolocation\Validator\IsGeolocation;
use \PHPUnit_Framework_TestCase;

class IsGeolocationTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider geolocationProvider
     */
    public function testGeolocation($value, $expected)
    {
        $validator = new IsGeolocation();
        $this->assertEquals($expected, $validator->isValid($value));
    }

    public function geolocationProvider()
    {
        return array(
            array('0,0', true),
            array('90,180', true),
            array('-90,1800', true),
            array('90,-180', true),
            array('90,-180', true),
            array('-90, 90', true),
            array('90.0,90.0', true),
            array('-90.000001,0', false),
            array('0, -180.00000001', false),
            array('90.00°, 180.00°', true),
            array('N50.443 E22.445', true),
        );
    }

    /**
     * @param $teststring
     * @param $expectedError
     * @dataProvider errorMessagesProvider
     */
    public function testErrorMessages($teststring, $expectedError)
    {
        $validator = new IsGeolocation();
        $validator->isValid($teststring);

        $this->assertAttributeEquals($expectedError, 'error', $validator);
    }

    public function errorMessagesProvider()
    {
        return array(
            array('teststring', IsGeolocation::INVALID_FORMAT),
            array('91,180', IsGeolocation::LATITUDE_OUT_OF_RANGE),
            array('90,180.0000001', IsGeolocation::LONGITUDE_OUT_OF_RANGE),
        );
    }
}
