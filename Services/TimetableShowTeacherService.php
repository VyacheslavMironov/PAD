<?php

namespace app\Services;

use ErrorException;
use app\DTO\TimetableShowTeacherDTO;
use app\Repository\TimetableShowTeacherRepository;

class TimetableShowTeacherService
{
    public $arr = ['ПН' => [], 'ВТ' => [], 'СР' => [], 'ЧТ' => [], 'ПТ' => [], 'СБ' => [], 'ВС' => []];

    public function filter($param)
    {
        for ($i=0; $i < count($param); $i++)
        { 
            switch (trim($param[$i]->day_in)) 
            {
                case 'ПН':
                    array_push($this->arr['ПН'], $param[$i]);
                    break;
                case 'ВТ':
                    array_push($this->arr['ВТ'], $param[$i]);
                    break;
                case 'СР':
                    array_push($this->arr['СР'], $param[$i]);
                    break;
                case 'ЧТ':
                    array_push($this->arr['ЧТ'], $param[$i]);
                    break;
                case 'ПТ':
                    array_push($this->arr['ПТ'], $param[$i]);
                    break;
                case 'СБ':
                    array_push($this->arr['СБ'], $param[$i]);
                    break;
                case 'ВС':
                    array_push($this->arr['ВС'], $param[$i]);
                    break;
            }
        }
        return $this->arr; 
    }

    public function show($request)
    {
        if (is_null($request->get('organization_id')))
        {
            throw new ErrorException('Укажите ID организации!');
        } 
        elseif (is_null($request->get('teacher_id')))
        {
            throw new ErrorException('Укажите ID преподавателя!');
        }
        else {
            $repository = new TimetableShowTeacherRepository();
            // Тут в принцепе ошибки быть не может
            $repository = $repository->show(
                new TimetableShowTeacherDTO(
                    $request->get('organization_id'),
                    $request->get('teacher_id')
                )
            );
            return $this->filter($repository);
        }
    }
}