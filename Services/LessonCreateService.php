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
            throw new ErrorException('Укажите ID организации!');
        } else {
            if (is_null($request->post('name')))
            {
                throw new ErrorException('Укажите название предмета!');
            } else {
                $repository = new LessonCreateRepository();
                return $repository->create(new LessonCreateDTO(
                    $request->post('organization_id'),
                    null,   // filial_id
                    null,   // teacher_id
                    $request->post('name')
                ));  
            }
        }
    }
}