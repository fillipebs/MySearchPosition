MySearchPosition
=========

A simple php library to search for your url position on google, bing and yahoo, given a key expression.


Install
-------

You just need to download MySearchPosition to your libs folder


Usage
-----

### mySearchPosition()

A factory is used to get generators of varying strength:

```php
include 'libs/MySearchPosition/MySearchPosition.php';

$search = new MySearchPosition();

/**
* Main function to discover position of an url on a 
* Search Engine given a key expression. 
* 
* @param {String} myUrl - Url to search for
* @param {String} myKeyExpression - A word or expression to search for
* @param {String} searchEngine - A search engine to use (Optional) (default = "google")
* @param {Integer} limitPages - Maximum pagination (Optional) (default = 10)
*/
$search->mySearchPosition($myUrl, $myKeyExpression, $searchEngine, $limitPages);

print_r($search->result);
```


License
-------

MIT, see LICENSE.


Security Vulnerabilities
========================

If you have found a security issue, please contact the author directly at [fillipe.bs@gmail.com](mailto:fillipe.bs@gmail.com).
