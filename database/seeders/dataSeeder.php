<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
         
        [
        'nama'=>'Mahardika',
        'nim'=>'123456789',
        'program_studi'=>'Teknik Informatika',
        'created_at'=>now(),
        'updated_at'=>now(),
        ],
        [
        'nama'=>'anto',
        'nim'=>'987654321',
        'program_studi'=>'Teknik Informatika',
        'created_at'=>now(),
        'updated_at'=>now(),
        ],
        ];
        DB::table('data')->insert($data);
    }
}
