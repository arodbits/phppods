<?php

namespace Axonbits;

class Filesystem
{
    protected $filesystem;

    public function __construct()
    {
        $this->filesystem = new \Illuminate\Filesytem\Filesytem;
    }

    public static function newFile($path, $filename = null)
    {
        return (new \Axonbits\Filesystem\FileFactory($path, $filename));
    }
}
