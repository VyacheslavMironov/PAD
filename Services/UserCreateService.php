<?php

namespace app\Services;

use app\Services\Base;
use ErrorException;
use app\DTO\CreateUserDTO;
use app\DTO\LessonAddUserIdDTO;
use app\Services\SendEmailService;
use app\Repository\UserCreateRepository;
use app\Repository\LessonUpdateRepository;

class UserCreateService extends Base
{
    public function send($password, $email)
    {
        $mail = new SendEmailService(['password' => $password,'email' => $email]);
        return $mail->create_organization_by();
    }

    public function create($request) {
        // Сохранение юзера
        if (is_null($request->post('organization_id')))
        {
            throw new ErrorException('Укажите ID организации!');
        } else {
            if (is_null($request->post('first_name')) && is_null($request->post('last_name')))
            {
                throw new ErrorException('Укажите имя и фамилию!');
            } else {
                if (is_null($request->post('email')))
                {
                    throw new ErrorException('Укажите E-mail!');
                } else {
                    if (is_null($request->post('role')))
                    {
                        throw new ErrorException('Укажите роль пользователя в системе!');
                    } else {
                        $repository = new UserCreateRepository();
                        $create = $repository->create(new CreateUserDTO(
                            $request->post('organization_id'),
                            null,
                            null,
                            $request->post('first_name'),
                            $request->post('last_name'),
                            null,
                            $request->post('email'),
                            $request->post('role'),
                            false,
                            null,
                            null,
                            $this->generate_to_password(),
                        ));
                    }
                }
            }
        }

        // Добавление предметов преподавателю
        if ($request->post('role') == 'Преподаватель' && $request->post('lessons'))
        {
            $lesson_array = array();
            $repository_lessons_for_teacher_update = new LessonUpdateRepository();
            // Обрезание запятой
            if ($request->post('lessons')[-1] == ',')
            {
                $str = $request->post('lessons');
                $lessons = substr($str, 0, -1);
            } else {
                $lessons = $request->post('lessons');
            }

            foreach (explode(',', $lessons) as $lesson_id)
            {
                $update = $repository_lessons_for_teacher_update->add_lesson_by_user(
                    // ТУТ ВСЁ ПЕРЕПУТАЛ
                    new LessonAddUserIdDTO(
                        (int)$lesson_id,
                        $create->id.','
                    )
                );
                array_push($lesson_array, $update);
            }
        }

        // Отправка письма
        $this->send($create->password, $request->post('email'));

        return [$create, $lesson_array];
    }
}