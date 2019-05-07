<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use HugeFileStreamingDownloader\Downloader;

// This file is 205,500,163 bytes.
$fileUrl  = 'https://github.com/torvalds/linux/archive/v5.1.zip';
$savePath = './file.zip';

$loader = new Downloader($fileUrl);
$loader->start($savePath);

// It can be confirmed that the peak memory usage is far smaller than the file size.
echo sprintf("Finish. Peak memory usage: %s bytes.\n", number_format(memory_get_peak_usage()));
exit;
