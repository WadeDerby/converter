# Wade Converter - Converts words to figures and figures to words.  

[![Latest Version](https://img.shields.io/github/release/thephpleague/skeleton.svg?style=flat-square)](https://github.com/WadeDerby/converter/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/league/skeleton.svg?style=flat-square)](https://packagist.org/packages/wade/converter)

This is a php library built to convert amounts in figures to words and vice versa. Currently supports php 5 and php 7. 
 

## Install

Via Composer

``` bash
$ composer require wade/converter
```

## Usage
use Wade\Converter;

``` $converter = new FiguresConverter();
	$converter->convertToWords($value);

```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](https://github.com/wadederby/converter/blob/master/CONTRIBUTING.md) for details.

## Credits

- Wade Derby (https://github.com/wadederby)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
