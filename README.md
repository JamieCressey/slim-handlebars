# Slim Handlebars

This repository contains a custom View class for Handlebars (https://github.com/mardix/Handlebars). 
You can use the custom View class by either requiring the appropriate class in your 
Slim Framework bootstrap file and initialize your Slim application using an instance of 
the selected View class or using Composer (the recommended way).


## How to Install

#### using [Composer](http://getcomposer.org/)

Create a composer.json file in your project root:
    
```json
{
    "require": {
        "jayc89/slim-handlebars": "dev-master"
    }
}
```

Then run the following composer command:

```bash
$ php composer.phar install
```

## How to use
    
```php
<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
    'view' => new \Slim\Handlebars\Handlebars()
));
```

To use Handlebars options do the following:
    
```php
$view = $app->view();
$view->parserOptions = array(
    'charset' => 'ISO-8859-1'
);
```

Templates (suffixed with .handlebars) are assumed to be located within Slim's template directory (&lt;doc root&gt;/templates, by default). Partials are picked up from &lt;template directory&gt;/partials.

Constructor takes an array as a parameter. The following properties are supported:

* partialsDirectory
* templateExtensions

To render the templates within your routes:
    
```php
$app->get('/', function () use ($app) {
    $array = array();
    $app->render("home", $array);
});
```

## Authors

[Jamie Cressey](https://github.com/jayc89)

## License

MIT Public License
