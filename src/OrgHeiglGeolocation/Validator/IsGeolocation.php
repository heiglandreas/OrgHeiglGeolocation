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

namespace OrgHeiglGeolocation\Validator;

use Zend\Validator\AbstractValidator;
/**
 * Validates a string whether it's a valid Geolocation or not
 *
 * Validation checks whether the format is ok and whether the resulting latitude
 * and longitude are within the range of -90 to 90 degrees.
 *
 * @author    Andreas Heigl<andreas@heigl.org>
 * @copyright ©2013-2013 Andreas Heigl
 * @license   http://www.opesource.org/licenses/mit-license.php MIT-License
 * @version   0.0
 * @since     03.07.13
 * @link      https://github.com/heiglandreas/OrgHeiglGeolocation
 */
class IsGeolocation extends AbstractValidator
{
    const INVALID_FORMAT         = 'invalidFormat';
    const LATITUDE_OUT_OF_RANGE  = 'latitudeOutOfRange';
    const LONGITUDE_OUT_OF_RANGE = 'longitudeOutOfRange';

    /**
     * The message templates
     *
     * @var $messageTemplates
     */
    protected $messageTemplates = array(
        self::INVALID_FORMAT => 'The given value is of an unrecognised format',
        self::LATITUDE_OUT_OF_RANGE => 'The given latitude exceeds the range of -90 through 90 degrees',
        self::LONGITUDE_OUT_OF_RANGE => 'The given longitude exceeds the range of  -180 through 180 degrees',
    );

    /**
     * Check the given value
     *
     * The value has to be a string of the form '[LAT],[LON]' where [LAT] and
     * [LON] are floating point values with a dot (.) as decimal separator.
     * Both values are separated by a colon (,).
     * [LAT] has to be in the rage of -90 through 90, whereas [LON] has to be in the
     * range of -180 through 180
     *
     * @param string $value The value-string
     *
     * @return boolean
     */
    public function isValid($value)
    {
        if (! preg_match('/(?P<lat>[-]?\d{1,2}(\.\d+)?)\D+(?P<lon>[-]?\d{1,3}(\.\d+)?)/', $value, $result)) {
            $this->error(self::INVALID_FORMAT);
            return false;
        }

        $latitude  = (float) $result['lat'];
        $longitude = (float) $result['lon'];

        if (-90 > $latitude || 90 < $latitude) {
            $this->error(self::LATITUDE_OUT_OF_RANGE);
            return false;
        }

        if (-180 > $longitude || 180 < $longitude) {
            $this->error(self::LONGITUDE_OUT_OF_RANGE);
            return false;
        }

        return true;
    }

}