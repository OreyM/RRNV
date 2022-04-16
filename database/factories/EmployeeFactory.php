<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $name = $this->faker->name();
        $email = $this->emailFaker($name);

        return [
            'name'      => $name,
            'email'     => $email,
            'password'  => '$2y$10$grzk6QLvyVpUyF8vAvuZkeh794Wrsq5zuGkAgNtPAWcHVpryDMDAy', // secret
            'is_active' => $this->faker->boolean() ? Employee::STATUS_ACTIVE : Employee::STATUS_INACTIVE,
        ];
    }

    /**
     * I know that faker has native method to generate email addresses
     * but i want mail login to match employee name.
     * This makes it easier to navigate through the test data.
     * @param string $name
     * @return string
     */
    private function emailFaker(string $name): string
    {
        $clearLoginData = mb_strtolower(
            str_replace(' ', '_', str_replace(
                ['.', '\''], '', $name
            ))
        );
        return $clearLoginData . '@mail.com';
    }
}
