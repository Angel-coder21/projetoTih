<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class StartAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         

        // Criando o papel (role)
        $role = Role::firstOrCreate(
            ['name' => 'super-admin'],
            ['guard_name' => 'web']
        );

        // Criando ou recuperando o usuário
        $user = User::firstOrCreate(
            ['email' => 'rhylton.figueiredo@gmail.com'],
            [
                'name' => 'Rhylton de Figueiredo',
                'password' => bcrypt('rhy123456'),
            ]
        );

        // Atribuindo o papel ao usuário
        $user->assignRole('super-admin');

    }
}
