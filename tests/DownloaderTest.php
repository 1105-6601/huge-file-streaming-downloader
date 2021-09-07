<?php

declare(strict_types=1);

namespace HugeFileStreamingDownloader\Test;

use HugeFileStreamingDownloader\Downloader;
use PHPUnit\Framework\TestCase;

class DownloaderTest extends TestCase
{
    /**
     * @large
     */
    public function testDownload()
    {
        $baseMemoryUsage = memory_get_peak_usage();

        $fileUrl  = 'https://github.com/php/php-src/archive/php-7.3.5.tar.gz';
        $savePath = './php-src.zip';

        $loader   = new Downloader($fileUrl);
        $fileSize = $loader->start($savePath);

        $this->assertTrue($fileSize !== 0, 'File size => ' . $fileSize);
        $this->assertTrue(memory_get_peak_usage() - $baseMemoryUsage < $fileSize, 'Memory usage => ' . (memory_get_peak_usage() - $baseMemoryUsage));

        unlink($savePath);
    }
}
