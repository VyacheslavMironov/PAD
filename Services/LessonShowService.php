<?php

namespace app\Services;

use ErrorException;
use app\Repository\LessonShowRepository;
use app\DTO\LessonShowDTO;

class LessonShowService
{
    public function show($request)
    {
        if ($request->get('id'))
        {
            $repository = new LessonShowRepository();
            return $repository->show(new LessonShowDTO($request->get('id')));
        } else {
            throw new ErrorException('Укажите идентификатор предмета!');
        }
    }
}