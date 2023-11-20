<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Admin', 
                'email' => 'admin@mail.com', 
                'username' => 'admin', 
                'password' => bcrypt('admin'), 
                'is_admin' => true
            ],
            [
                'name' => 'Op',
                'email' => 'operator@mail.com', 
                'username' => 'op', 
                'password' => bcrypt('op'), 
                'is_operator' => true
            ],
        ];

        foreach ($data as $key => $value) {
            ModelsUser::create($value);
        }
    }
}
