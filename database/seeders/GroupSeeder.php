<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\GroupModel;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $model  = new GroupModel();
        $groups = [
            [
                'nama_group' => 'Admin'
            ],
            [
                'nama_group' => 'Member'
            ]
        ];

        foreach ($groups as $group) {
            $model->insertOrUpdate($group);
        }
    }
}
