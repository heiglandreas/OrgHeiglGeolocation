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
 * @since     03.07.13
 * @link      https://github.com/heiglandreas/OrgHeiglGeolocation
 */

namespace Org_Heigl\Geolocation\Form\Element;

use Org_Heigl\Geolocation\Validator\IsGeolocation;
use Org_Heigl\Geolocation\Filter\Geolocation as GeolocationFilter;
use Zend\Filter\StringTrim;
use Zend\Form\Element;
use Zend\InputFilter\InputProviderInterface;

/**
 * Provides a Geolocation-Element
 *
 * @author    Andreas Heigl<andreas@heigl.org>
 * @copyright ©2013-2013 Andreas Heigl
 * @license   http://www.opesource.org/licenses/mit-license.php MIT-License
 * @version   0.0
 * @since     03.07.13
 * @link      https://github.com/heiglandreas/OrgHeiglGeolocation
 **/
class Geolocation extends Element implements InputProviderInterface
{
    /**
     * Seed the attributes
     *
     * @var array
     */
    protected $attributes = array(
        'type'  => 'text',
        'class' => 'orgHeiglGeolocation',
    );

    /**
     * Get the input specifications
     *
     * @return array
     */
    public function getInputSpecification()
    {
        return array(
            'name'     => $this->getName(),
            'filters'  => array(
                new StringTrim(),
                new GeolocationFilter()
            ),
            'validators' => array(
                new IsGeolocation()
            ),
        );
    }
}