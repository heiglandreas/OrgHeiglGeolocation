[![Build Status](https://travis-ci.org/heiglandreas/OrgHeiglGeolocation.svg)](https://travis-ci.org/heiglandreas/OrgHeiglGeolocation)

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


