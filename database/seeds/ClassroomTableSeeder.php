<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data     = [
            [
                'user_id'       => 4,
                'name'          => 'X-IPA-1',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 5,
                'name'          => 'X-IPA-2',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 6,
                'name'          => 'X-IPS-1',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 7,
                'name'          => 'X-IPS-2',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 8,
                'name'          => 'XI-IPA-1',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 9,
                'name'          => 'XI-IPA-2',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 10,
                'name'          => 'XI-IPS-1',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 11,
                'name'          => 'XI-IPS-2',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 12,
                'name'          => 'XII-IPA-1',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 13,
                'name'          => 'XII-IPA-2',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 14,
                'name'          => 'XII-IPS-1',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 15,
                'name'          => 'XII-IPS-2',
                'max_student'   => 2,
            ],
        ];
        DB::table('classrooms')->truncate();
        DB::table('classrooms')->insert($data);
    }
}
