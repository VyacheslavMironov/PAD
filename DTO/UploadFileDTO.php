<?php

namespace app\DTO;

class UploadFileDTO
{
    public string $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }
}