<?php

namespace app\Services;

use ErrorException;
use app\Repository\FilialDropRepository;
use app\DTO\FilialDropDTO;

class FilialDropService
{
    public function drop($request)
    {
        if (is_null($request->get('id')))
        {
            throw new ErrorException('Укажите ID филиала!');
        } else {
            $repository = new FilialDropRepository();
            return $repository->drop(new FilialDropDTO(
                $request->get('id')
            ));
        }
        
    }
}