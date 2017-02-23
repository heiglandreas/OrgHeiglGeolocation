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
 * @since     26.05.15
 * @link      https://github.com/heiglandreas/OrgHeiglGeolocation
 */

namespace Org_Heigl\GeolocationTest\Filter\Geolocation;

use Org_Heigl\Geolocation\Filter\Geolocation;
use PHPUnit\Framework\TestCase;

class GeolocationTest extends TestCase
{

    /**
     * @dataProvider filterProvider
     * @param $input
     * @param $expected
     * @covers \Org_Heigl\Geolocation\Filter\Geolocation::filter()
     */
    public function testThatFilteringWorksAsExpected($input, $expected)
    {
        $filter = new Geolocation();

        $this->assertEquals($expected, $filter->filter($input));
    }

    public function filterProvider()
    {
        return array(
            array('0 0', '0 0'),
            array('90.0 90.0', '90 90'),
            array('90.0 180.0', '90 180'),
            array('90.0 -180.0', '90 -180'),
            array('90.0 190.0', '90 -170'),
            array('50.0 -190.0', '50 170'),
            array('50.0 360.0', '50 0'),
            array('50.0 -360.0', '50 -0'),
            array('50.0 400.0', '50 40'),
            array('50.0 360.5', '50 0.5'),
            array('50.0 -360.5', '50 -0.5'),
            array('50.0 400.5', '50 40.5'),
            array('50.0 -400.5', '50 -40.5'),
        );
    }
}
