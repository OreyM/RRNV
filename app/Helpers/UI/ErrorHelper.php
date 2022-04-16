<?php


namespace App\Helpers\UI;


class ErrorHelper
{
    public static function  exceptionToJson(\Exception $exceptionData): array
    {
        return [
            'code'      => $exceptionData->getCode(),
            'message'   => $exceptionData->getMessage(),
            'file'      => $exceptionData->getFile(),
            'line'      => $exceptionData->getLine(),
        ];
    }
}
