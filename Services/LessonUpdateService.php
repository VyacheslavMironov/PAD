<?php

namespace app\Services;

use ErrorException;
use app\Repository\LessonShowRepository;
use app\Repository\LessonUpdateRepository;
use app\DTO\LessonShowDTO;
use app\DTO\LessonUpdateDTO;

class LessonUpdateService
{
    public function update($request)
    {
        if ($request->post('id') && $request->post('organization_id') && $request->post('name'))
        {
            $show = new LessonShowRepository();
            $lesson = $show->show(new LessonShowDTO($request->post('id')));

            if ($lesson->organization_id == $request->post('organization_id'))
            {
                $repository = new LessonUpdateRepository();
                return $repository->update(new LessonUpdateDTO(
                    $request->post('id'),
                    $request->post('name')
                ));
            } else {
                throw new ErrorException('Укажите правильный идентификатор организации!');
            }
        } else {
            throw new ErrorException('Укажите все поля!\nОбязательные поля:\n*id\n*organization_id\n*name');
        }
    }
}