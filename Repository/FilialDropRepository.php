<?php

namespace app\Repository;

use app\models\Filial;

class FilialDropRepository
{
    public function drop(\app\DTO\FilialDropDTO $context)
    {
        $db = Filial::findOne(['id' => $context->id]);
        $db->delete();
        return $db;
    }
}