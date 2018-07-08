<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::get();

        if($users->count() == 0) {
            User::create(array(
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'name'  => 'admin',
                'type'  => 'admin'
            ));
            User::create(array(
                'email' => 'oper@oper.com',
                'password' => Hash::make('oper'),
                'name'  => 'Operador',
                'type'  => 'oper'
            ));
        }

    }
}
