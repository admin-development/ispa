<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UserModel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $model = new UserModel();
        $users = [
            [
                'nama' => 'Admin',
                'username'  => 'admin',
                'password'  => '123123',
                'no_hp'     => '085712341234',
                'id_group'  => 1
            ],
            [
                'nama' => 'Adhe',
                'username'  => 'adhe',
                'password'  => '123123',
                'no_hp'     => '089512341234',
                'id_group'  => 2
            ],
            [
                'nama' => 'User Demo',
                'username'  => 'demo',
                'password'  => '123123',
                'no_hp'     => '087786548983',
                'id_group'  => 2
            ],
            [
                'nama' => 'User 1',
                'username'  => 'user1',
                'password'  => '123123',
                'no_hp'     => '0819555831',
                'id_group'  => 2
            ],
            [
                'nama' => 'User 2',
                'username'  => 'user2',
                'password'  => '123123',
                'no_hp'     => '0853555291',
                'id_group'  => 2
            ],
            [
                'nama' => 'User 3',
                'username'  => 'user3',
                'password'  => '123123',
                'no_hp'     => '0857555754',
                'id_group'  => 2
            ],
        ];

        foreach ($users as $user) {
            $model->insertOrUpdate($user);
        }
    }
}
