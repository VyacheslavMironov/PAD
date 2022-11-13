<?php

namespace app\Services;

use ErrorException;
use app\Repository\LessonCreateRepository;
use app\DTO\LessonCreateDTO;

class LessonCreateService
{

    public function create($request)
    {
        if (is_null($request->post('organization_id')))
        {
            throw new ErrorException('Укажите идентификатор организации!');
        } else {
            if (strlen($request->post('name')) != 2)
            {
                $repository = new LessonCreateRepository();
                return $repository->create(new LessonCreateDTO(
                    $request->post('organization_id'),
                    null,   // filial_id
                    null,   // teacher_id
                    $request->post('name')
                ));  
            } else {
                throw new ErrorException('Название предмета не должно быть меньше 3х символов!');
            }
        }
    }
}