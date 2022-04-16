<?php


namespace App\Exceptions;


use Exception;

class PermissionSeedingException extends Exception
{

    protected $message = 'Check your config in \'app/Configs/roles.php\' && run `php artisan config:cache`';
}
