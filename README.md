# Geolocation-FormElement

This module provides a form-element for Latitude/Longitude-values.

This element adds a map into your form where you can select any location on earth
by simply clicking onto it on a map. The form-element is hidden but without JS
it is still displayed so that you still can insert Latitude-Longitude values.

Currently you can type a latitude/Longitude-pair like the following into the field:

    50.1234,8.1234

Later on this element will provides a map to search the location as well as a search form 
so you can search for adresses. The adress-lookup uses the [nominatim][#]-API

## Installation

Use ```composer``` for installation by adding the following to your ```composer.json``` file:

    "org_heigl/Geolocation" : "dev-master"

After that you will have to add ```Geolocation``` to the list of your enabled modules.

You will also have to copy the modules ```public``` folder into your applications
```public``` folder renaming the modules one to ```orgheiglgeolocation```.

Or you simply use the [AssetManager-Module][#]. Then you can skip this step!

## Usage

After installation you should be able to add a form-element ```Geolocation``` to your forms right away
like the following example:

```php
$form = new Zend\Form();
$form->addElement('geolocation');
```

  [1]: http://wiki.openstreetmap.org/wiki/Nominatim
  [2]: https://github.com/RWOverdijk/AssetManager
