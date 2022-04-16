<?php

namespace App\Data\DTO\Empoyees;

use Spatie\DataTransferObject\DataTransferObject;

class RootEmployeeDTO extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $role;
}
