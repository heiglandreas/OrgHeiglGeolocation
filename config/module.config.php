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
 * @copyright ©2013-2013 Andreas Heigl
 * @license   http://www.opesource.org/licenses/mit-license.php MIT-License
 * @version   0.0
 * @since     10.12.13
 * @link      https://github.com/heiglandreas/OrgHeiglGeolocation
 */

namespace Org_Heigl\Geolocation;

use Org_Heigl\Geolocation\Form\Element\Geolocation;
use Org_Heigl\Geolocation\Form\View\Helper\Geolocation as GeolocationHelper;
use Org_Heigl\Geolocation\Renderer\Geolocation\GeolocationRenderer;
use Org_Heigl\Geolocation\Service\GeolocationRendererFactory;
use Org_Heigl\Geolocation\Validator\IsGeolocation;
use Org_Heigl\Geolocation\Filter\Geolocation as GeolocationFilter;

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'orgheiglgeolocation' => __DIR__ . '/../view',
        ),
    ),
    'asset_manager' => array(
        'resolver_configs' => array(
            'aliases' => array(
                'orgheiglgeolocation/js' => __DIR__ . '/../public/js',
                'orgheiglgeolocation/css' => __DIR__ . '/../public/css',
                'orgheiglgeolocation/lib' => __DIR__ . '/../public/lib',
            ),
        ),
    ),

    'service_manager' => [
        'factories' => [
            GeolocationRenderer::class => GeolocationRendererFactory::class,
        ],
        'invokables' => [
            Geolocation::class => Geolocation::class,
            GeolocationFilter::class => GeolocationFilter::class,
            IsGeolocation::class => IsGeolocation::class,
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            GeolocationHelper::class => GeolocationHelper::class,
        ],
    ],
);