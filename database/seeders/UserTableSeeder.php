<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alonso',
            'email' => 'a@a.com',
            'email_verified_at' => now(),
            'password' => bcrypt('a'),
            'id_rol' => 'Administrador',
            'est_id' => null,
            'pro_id' => 8,
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => 'Margarita',
            'email' => 'm@m.com',
            'email_verified_at' => now(),
            'password' => bcrypt('m'),
            'id_rol' => 'Administrador2',
            'est_id' => null,
            'pro_id' => 23,
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'ANONYMOUSP',
            'email' => 'ap@ap.com',
            'email_verified_at' => now(),
            'password' => bcrypt('ap'),
            'id_rol' => 'Administrador',
            'est_id' => null,
            'pro_id' => 31,
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => 'ANONYMOUSE',
            'email' => 'ae@ae.com',
            'email_verified_at' => now(),
            'password' => bcrypt('ae'),
            'id_rol' => 'Estudiante',
            'est_id' => 1,
            'pro_id' => null,
            'remember_token' => Str::random(10),
        ]);

         DB::table('users')->insert([
            'name' => 'ALBERTO',
            'email' => 'al@al.com',
            'email_verified_at' => now(),
            'password' => bcrypt('al'),
            'id_rol' => 'Profesor',
            'est_id' => null,
            'pro_id' => 1,
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'HUMBERTO',
            'email' => 'h@h.com',
            'email_verified_at' => now(),
            'password' => bcrypt('h'),
            'id_rol' => 'Profesor',
            'est_id' => null,
            'pro_id' => 2,
            'remember_token' => Str::random(10),
        ]);
    }
}
