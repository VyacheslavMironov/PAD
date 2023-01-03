<?php

namespace app\Services;

use Yii;
use ErrorException;
use yii\base\Model;
use app\DTO\UploadFileDTO;

class UploadService extends Model
{
    public function saved($request) {
        if (is_null($request['image']['name']))
        {
            throw new ErrorException('Файл не указан!');
        } else {
            $fileDTO = new UploadFileDTO($request['image']['name']);
            $file_name = date('Y-m-d h:i:s', time()) . ' - ' . $fileDTO->fileName;
            if (move_uploaded_file(
                $request['image']['tmp_name'],
                    Yii::getAlias('@app/web/img/').basename($file_name)
                )) {
                return $file_name;
            } else {
                return false;
            }
        }

    }
}