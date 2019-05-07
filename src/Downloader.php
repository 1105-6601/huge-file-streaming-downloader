<?php

declare(strict_types=1);

namespace HugeFileStreamingDownloader;

class Downloader
{
    /**
     * @var bool|resource
     */
    private $remoteFileHandle;

    /**
     * @var int
     */
    private $chunkSize;

    public function __construct(string $url, int $chunkSize = 1024 * 1024)
    {
        $this->remoteFileHandle = fopen($url, 'rb');
        $this->chunkSize        = $chunkSize;
    }

    public function start(string $savePath, bool $makeDir = true): int
    {
        $saveDir = dirname($savePath);
        if ($makeDir && !is_dir($saveDir)) {
            @mkdir($saveDir, 0777, true);
        }

        $cnt    = 0;
        $handle = fopen($savePath, 'wb');

        if ($this->remoteFileHandle === false || $handle === false) {
            return $cnt;
        }

        while (!feof($this->remoteFileHandle)) {
            $buffer = fread($this->remoteFileHandle, $this->chunkSize);
            fwrite($handle, $buffer);
            $cnt += strlen($buffer);
        }

        fclose($this->remoteFileHandle);
        fclose($handle);

        return $cnt;
    }
}
