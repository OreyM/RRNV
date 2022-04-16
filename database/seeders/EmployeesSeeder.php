<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{

    private array $roles;

    public function __construct(Role $roleModel)
    {
        $this->roles = $roleModel->whereNotIn('name', ['super-admin'])
            ->pluck('name')
            ->toArray();
    }

    public function run(): void
    {
        Employee::factory(30)->create()->each(function (Employee $employee) {
            $key = array_rand($this->roles, 1);
            $employee->attachRole($this->roles[$key]);
        });
    }
}
