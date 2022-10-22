<?php

namespace app\Services;
use Yii;
use yii\base\Model;
use app\DTO\UploadFileDTO;

class UploadService extends Model
{
    public function saved($request) {
        $fileDTO = new UploadFileDTO($request['image']['name']);
        if (move_uploaded_file(
                $request['image']['tmp_name'],
                Yii::getAlias('@app/web/img/').basename(date('Y/m/d h:i:s', time()) . ' - ' . $fileDTO->fileName)
            )) {
            return date('Y/m/d h:i:s', time()) . ' - ' . $fileDTO->fileName;
        } else {
            return false;
        }
    }
}