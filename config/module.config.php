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
 * @since     10.12.13
 * @link      https://github.com/heiglandreas/
 */
return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'orgheiglgeolocation' => __DIR__ . '/../view',
        ),
    ),
    'asset_manager' => array(
        'resolver_configs' => array(
//            'collections' => array(
//                'js/d.js' => array(
//                    'js/a.js',
//                    'js/b.js',
//                    'js/c.js',
//                ),
//            ),
            'paths' => array(
                __DIR__ . '/../public',
                __DIR__ . '/../../../components/'
            ),
//            'map' => array(
//                'orgheiglgeolocation/css' => __DIR__ . '/../public/css',
//                'orgheiglgeolocation/js' => __DIR__ . '/../public/js',
//                'orgheiglgeolocation/lib' => __DIR__ . '/../public/lib',
//            ),
        ),
//        'filters' => array(
//            'js/d.js' => array(
//                array(
//                    // Note: You will need to require the classes used for the filters yourself.
//                    'filter' => 'JSMin',
//                ),
//            ),
//        ),
//        'caching' => array(
//            'js/d.js' => array(
//                'cache'     => 'Apc',
//            ),
//        ),
    ),
);