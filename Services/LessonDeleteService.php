<?php

namespace app\Services;

use ErrorException;
use app\Repository\LessonDeleteRepository;
use app\DTO\LessonDeleteDTO;

class LessonDeleteService
{

    public function delete($request)
    {
        if ($request->get('id'))
        {
            $repository = new LessonDeleteRepository();
            return $repository->delete(new LessonDeleteDTO($request->get('id')));  
        } else {
            throw new ErrorException('Ошибка удаления.\nТакого предмета не существует или идентификатор указан не правильный!');
        }
    }
}