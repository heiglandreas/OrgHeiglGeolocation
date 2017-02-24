[![Build Status](https://travis-ci.org/heiglandreas/OrgHeiglGeolocation.svg)](https://travis-ci.org/heiglandreas/OrgHeiglGeolocation)
[![Coverage Status](https://coveralls.io/repos/github/heiglandreas/OrgHeiglGeolocation/badge.svg?branch=master)](https://coveralls.io/github/heiglandreas/OrgHeiglGeolocation?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/58afe98a6200aa005085f34d/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/58afe98a6200aa005085f34d)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/heiglandreas/OrgHeiglGeolocation/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/heiglandreas/OrgHeiglGeolocation/?branch=master)
[![Code Climate](https://lima.codeclimate.com/github/heiglandreas/OrgHeiglGeolocation/badges/gpa.svg)](https://lima.codeclimate.com/github/heiglandreas/OrgHeiglGeolocation)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/e70f9516c7d848f6b475e8a03419485b)](https://www.codacy.com/app/github_70/OrgHeiglGeolocation?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=heiglandreas/OrgHeiglGeolocation&amp;utm_campaign=Badge_Grade)

[![Latest Stable Version](https://poser.pugx.org/org_heigl/geolocation/v/stable)](https://packagist.org/packages/org_heigl/geolocation)
[![Total Downloads](https://poser.pugx.org/org_heigl/geolocation/downloads)](https://packagist.org/packages/org_heigl/geolocation)
[![License](https://poser.pugx.org/org_heigl/geolocation/license)](https://packagist.org/packages/org_heigl/geolocation)
[![composer.lock](https://poser.pugx.org/org_heigl/geolocation/composerlock)](https://packagist.org/packages/org_heigl/geolocation)

# Geolocation-FormElement

This module provides a form-element for Latitude/Longitude-values.

This element adds a map into your form where you can select any location on earth
by simply clicking onto it on a map. The form-element is hidden but without JS
it is still displayed so that you still can insert Latitude-Longitude values like so:

    50.1234,8.1234

Later on this element will provides a search form
so you can search for adresses.

## Installation

The module is best installed using [composer](https://getcomposer.org)

```bash
    composer require org_heigl/geolocation
```

## Prerequisites

1. Add ```Org_Heigl\Geolocation``` to the list of your enabled modules.

    ```php
        return [
            'modules' => [
               …       
               'Org_Heigl\Contact',
               …
            ]
        ];
    ```

2. The content of the ```public```-folder needs to be available to the public.
   When you use the [AssetManager](https://github.com/RWOverdijk/AssetManager)-Module that is already taken care of.
   
3. This module also needs a working jQuery available. You will have to take care 
   about that yourself!
         
## Usage

After installation you should be able to add a form-element ```Geolocation``` to your forms right away
like the following example:

```php
$form = new Zend\Form();
$form->addElement('geolocation');
```


