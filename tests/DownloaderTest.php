<?php

declare(strict_types=1);

namespace HugeFileStreamingDownloader\Test;

use HugeFileStreamingDownloader\Downloader;
use PHPUnit\Framework\TestCase;

class DownloaderTest extends TestCase
{
    public function testDownload()
    {
        $fileUrl  = 'https://github.com/php/php-src/archive/php-7.3.5.tar.gz';
        $savePath = './php-src.zip';

        $loader = new Downloader($fileUrl);
        $fileSize = $loader->start($savePath);

        $this->assertTrue($fileSize !== 0);
        $this->assertTrue(memory_get_peak_usage() < $fileSize);
    }
}
