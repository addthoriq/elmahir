<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolYearTableSeeder extends Seeder
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
                'start_year'       => '2019',
                'end_year'          => '2020',
                'status'            => 0,
            ],
            [
                'start_year'       => '2020',
                'end_year'          => '2021',
                'status'            => 0,
            ],
            [
                'start_year'       => '2021',
                'end_year'          => '2022',
                'status'            => 1
            ],
        ];
        DB::table('school_years')->truncate();
        DB::table('school_years')->insert($data);
    }
}
