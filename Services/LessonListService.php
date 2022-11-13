<?php

namespace app\Services;

use ErrorException;
use app\Repository\LessonListRepository;
use app\DTO\LessonListDTO;

class LessonListService
{

    public function byOrganizationId($param)
    {
        $repository = new LessonListRepository();
        return $repository->lessonByOrganizationId(new LessonListDTO(
            $param->get('organization_id'),
            null,   // filial_id
            null    // teacher_id
        ));
    }

    public function byFilialId($param)
    {
        $repository = new LessonListRepository();
        return $repository->lessonByOrganizationId(new LessonListDTO(
            null,   // organization_id
            $param->get('filial_id'),
            null    // teacher_id
        ));
    }

    public function byTeacherId($param)
    {
        $repository = new LessonListRepository();
        return $repository->lessonByOrganizationId(new LessonListDTO(
            null,   // organization_id
            null,   // filial_id
            $param->get('teacher_id'),
        ));
    }

    public function list($request)
    {
        if ($request->get('organization_id'))
        {
            return $this->byOrganizationId($request);
        }

        else if ($request->get('filial_id'))
        {
            return $this->byFilialId($request);
        }
        else if ($request->get('teacher_id'))
        {
            return $this->byTeacherId($request);
        } else {
            throw new ErrorException('Укажите идентификатор организации или филиала или преподавателя!');
        }
    }
}