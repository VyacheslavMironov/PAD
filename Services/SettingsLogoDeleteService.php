<?php

namespace app\Services;

use Yii;
use Psy\Readline\Hoa\FileException;
use app\DTO\SettingsLogoDeleteDTO;
use app\DTO\SettingsInfoDTO;
use app\Repository\SettingsLogoDeleteRepository;
use app\Repository\SettingsInfoRepository;

class SettingsLogoDeleteService
{
    public function delete_file($id)
    {
        $repository = new SettingsInfoRepository();
        $info = $repository->show(
            new SettingsInfoDTO($id)
        );
        try{
            unlink(
                '@app/web/img/' + $info['logo']  //'@app/web/img/' + $info['logo']
            );
            return true;
        } catch (FileException){
            return false;
        }
        
    }

    public function delete($request)
    {
        // $this->delete_file((int)$request->get('organization_id'));
        $repository = new SettingsLogoDeleteRepository();
        return $repository->delete(
            new SettingsLogoDeleteDTO(
                (int)$request->get('organization_id'),
                'default'
            )
        );
    }
}