# Geolocation-FormElement

This module provides a form-element for Latitude/Longitude-values.

Currently you can type a latitude/Longitude-pair like the following into the field:

    50.1234,8.1234

Later on this element will provides a map to search the location as well as a search form 
so you can search for adresses. The adress-lookup uses the [nominatim][#]-API

## Installation

Use ```composer``` for installation by adding the following to your ```composer.json``` file:

    "org_heigl/Geolocation" : "dev-master"

## Usage

After installation you should be able to add a form-element ```Geolocation``` to your forms right away
like the following example:

```php
$form = new Zend\Form();
$form->addElement('geolocation');
```

  [1]: http://wiki.openstreetmap.org/wiki/Nominatim 
