<?php

namespace app\components;

class JwtValidationData extends \sizeg\jwt\JwtValidationData
{
 
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->validationData->setIssuer('http://127.0.0.1/');
        $this->validationData->setAudience('http://127.0.0.1/');
        $this->validationData->setId('4f1g23a12aa');
        parent::init();
    }
}    