<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       /*    return [
            'name' => 'Leonel',
            'email' => 'a@a.com',
            'email_verified_at' => now(),
            'password' => bcrypt('a'),
            'id_rol' => 'Administrador',
            'est_id' => null,
            'pro_id' => 1,
            'remember_token' => Str::random(10),
        ]; */

       /*  return [
            'name' => 'Cinthia',
            'email' => 'c@c.com',
            'email_verified_at' => now(),
            'password' => bcrypt('c'),
            'id_rol' => 'Administrador2',
            'est_id' => null,
            'pro_id' => 2,
            'remember_token' => Str::random(10),
        ]; */

          return [
            'name' => 'Alberto',
            'email' => 'al@al.com',
            'email_verified_at' => now(),
            'password' => bcrypt('al'),
            'id_rol' => 'Profesor',
            'est_id' => null,
            'pro_id' => 3,
            'remember_token' => Str::random(10),
        ];

      /*    return [
            'name' => 'LUIS',
            'email' => 'l@l.com',
            'email_verified_at' => now(),
            'password' => bcrypt('l'),
            'id_rol' => 'Estudiante',
            'est_id' => 1,
            'pro_id' => null,
            'remember_token' => Str::random(10),
        ]; */
    }

 /*    return [
        'name' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ]; */

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
