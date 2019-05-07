Huge file streaming downloader for PHP
=============================

[![Build Status](https://travis-ci.org/1105-6601/huge-file-streaming-downloader.png?branch=master)](https://travis-ci.org/1105-6601/huge-file-streaming-downloader)
[![GitHub tag](https://img.shields.io/github/tag/1105-6601/huge-file-streaming-downloader.svg?label=latest)](https://packagist.org/packages/suemitsu/huge-file-streaming-downloader) 
[![Packagist](https://img.shields.io/packagist/dt/1105-6601/huge-file-streaming-downloader.svg)](https://packagist.org/packages/suemitsu/huge-file-streaming-downloader)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%207.0-8892BF.svg)](https://php.net/)
[![License](https://img.shields.io/packagist/l/1105-6601/huge-file-streaming-downloader.svg)](https://packagist.org/packages/suemitsu/huge-file-streaming-downloader)

This package is streaming downloader for loading huge file from remote.
It is possible to save a huge file locally without loading the entire file into memory.

This package is compliant with [PSR-4](http://www.php-fig.org/psr/4/), [PSR-1](http://www.php-fig.org/psr/1/), and
[PSR-2](http://www.php-fig.org/psr/2/).
If you notice compliance oversights, please send a patch via pull request.


Installation
-----

To install `HugeFileStreamingDownloader` you can either clone this repository or you can use composer.

```
composer require suemitsu/huge-file-streaming-downloader
```


Usage
-----

```php
$fileUrl  = 'https://example.com/archive.tar.gz';
$savePath = 'path/to/dest/file.tar.gz';

$loader = new \HugeFileStreamingDownloader\Downloader($fileUrl);
$loader->start($savePath);
```

There is a complete example of this in `example/example.php`.


License
-------

[MIT License](http://mit-license.org/)
