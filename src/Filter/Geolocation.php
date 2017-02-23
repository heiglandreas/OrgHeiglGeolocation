<?php

/**
 * Copyright (c) Andreas Heigl <andreas@heigl.org>
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
 * @author    Andreas Heigl <andreas@heigl.org>
 * @copyright Andreas Heigl <andreas@heigl.org>
 * @license   http://www.opesource.org/licenses/mit-license.php MIT-License
 * @version   0.0
 * @since     26.05.15
 * @link      https://github.com/heiglandreas/OrgHeiglGeolocation
 */

namespace Org_Heigl\Geolocation\Filter;

use Zend\Filter\AbstractFilter;
use Zend\Filter\Exception;

class Geolocation extends AbstractFilter
{

    /**
     * Returns the result of filtering $value
     *
     * @param  mixed $value
     *
     * @throws Exception\RuntimeException If filtering $value is impossible
     * @return mixed
     */
    public function filter($value)
    {
        if (! preg_match('/(?P<lat>[-]?\d{1,2}(\.\d+)?)\D+?(?P<lon>[-]?\d{1,3}(\.\d+)?)/', $value, $result)) {
            trigger_Error(
                sprintf(
                    'The give value "%1$s" can not be resolved to a geolocation',
                    $value
                ),
                E_USER_WARNING
            );

            return $value;
        }

        $latitude  = (float) $result['lat'];
        $longitude = (float) $result['lon'];

        $longitude = fmod($longitude, 360.0);
        if ($longitude > 180) {
            $longitude = ($longitude - 180)-180;
        }

        if ($longitude < -180) {
            $longitude = ($longitude + 180) + 180;
        }

        return $latitude . ' ' . $longitude;
    }
}