<?php
/**
 * Copyright (c)2015-2015 heiglandreas
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
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
 * @copyright ©2015-2015 Andreas Heigl
 * @license   http://www.opesource.org/licenses/mit-license.php MIT-License
 * @version   0.0
 * @since     26.05.15
 * @link      https://github.com/heiglandreas/
 */

namespace OrgHeiglGeolocationTest\Filter\Geolocation;

use OrgHeiglGeolocation\Filter\Geolocation;

class GeolocationErrorTest extends \PHPUnit_Framework_TestCase
{
    protected $errors;

    public function setup()
    {
        $this->errors = [];
        set_error_handler([$this, 'errorHandler']);
    }

    public function errorHandler($errno, $errstr, $errfile, $errline, $errcontext)
    {
        $this->errors[] = compact("errno", "errstr", "errfile",
            "errline", "errcontext");
    }

    public function assertError($errstr, $errno)
    {
        foreach ($this->errors as $error) {
            if ($error["errstr"] === $errstr
                && $error["errno"] === $errno) {
                return;
            }
        }
        $this->fail("Error with level " . $errno .
                    " and message '" . $errstr . "' not found in ",
            var_export($this->errors, TRUE));
    }

    /**
     * @dataProvider filterProvider
     * @param $input
     * @param $expected
     */
    public function testFilter($input, $expected, $expectedError, $expectedErrorCode)
    {
        $filter = new Geolocation();

        $this->assertEquals($expected, $filter->filter($input));
        $this->assertError($expectedError, $expectedErrorCode);
    }

    public function filterProvider()
    {
        return array(
            ['', '0 0', 'The give value "" can not be resolved to a geolocation', E_USER_WARNING],
        );
    }
}
