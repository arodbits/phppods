<?php

namespace Axonbits\Filesystem;

class FileFactory
{
    protected $filesystem;
    protected $stubPath;
    protected $path;
    protected $filename;
    protected $copy;

    public function __construct($path, $filename = null)
    {
        $this->path       = $path;
        $this->filename   = $filename;
        $this->filesystem = new \Illuminate\Filesystem\Filesystem;
    }
    /**
     * Use a mock or stub file for creating a new one
     * @param  String     $stubPath path and filename of the stub file
     * @param  array|null $copy
     * Array to indicate the mapping for replacing the
     * dummy placeholder (key) with the indicated value
     * e.g: ["DummyClass"=>'SessionClass']
     * @return Object $this
     */
    public function withStub($stubPath, array $copy = null)
    {
        $this->stubPath = $stubPath;
        $this->copy     = $copy;
        return $this;
    }

    public function write()
    {
        if (isset($this->stubPath)) {
            $content    = $this->getStubContent();
            $newContent = $this->replaceDummyData($content, $this->copy);
            $this->filesystem->put($this->path, $newContent);
        }
        return $this;
    }

    private function replaceDummyData($content, array $copy)
    {
        foreach ($copy as $placeHolder => $value) {
            $content = str_replace($placeHolder, $value, $content);
        }

        return $content;
    }

    private function getStubContent()
    {
        return $this->filesystem->get($this->stubPath);
    }
}
