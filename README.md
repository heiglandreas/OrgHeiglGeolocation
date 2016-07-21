# Geolocation-FormElement

[![Build Status](https://travis-ci.org/heiglandreas/OrgHeiglGeolocation.svg)](https://travis-ci.org/heiglandreas/OrgHeiglGeolocation)

This module provides a form-element for Latitude/Longitude-values.

This element adds a map into your form where you can select any location on earth
by simply clicking onto it on a map. The form-element is hidden but without JS
it is still displayed so that you still can insert Latitude-Longitude values like so:

    50.1234,8.1234

Later on this element will provides a search form
so you can search for adresses.

## Installation

Use ```composer``` for installation by running this shellscript:

    $ composer require org_heigl/geolocation

After that you will have to add ```Geolocation``` to the list of your enabled modules.

You will also have to copy the modules ```public``` folder into your applications
```public``` folder renaming the modules one to ```orgheiglgeolocation```.

Or you simply use the [AssetManager-Module][#]. Then you can skip this step!

This module also needs a working jQuery available. You will have to take care 
about that yourself!

## Usage

After installation you should be able to add a form-element ```Geolocation``` to your forms right away
like the following example:

```php
$form = new Zend\Form();
$form->addElement('geolocation');
```

  [1]: http://wiki.openstreetmap.org/wiki/Nominatim
  [2]: https://github.com/RWOverdijk/AssetManager
