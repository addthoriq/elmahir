<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker 		= Factory::create('id_ID');
        $data     = [
            [
                'name'          => 'Bahasa Indonesia',
            ],
            [
                'name'          => 'Matematika',
            ],
            [
                'name'          => 'PPKn',
            ],
            [
                'name'          => 'Bahasa Inggris',
            ],
            [
                'name'          => 'IPS',
            ],
            [
                'name'          => 'IPA',
            ],
            [
                'name'          => 'Penjas',
            ],
            [
                'name'          => 'Seni Budaya',
            ],
            [
                'name'          => 'Kewirausahaan',
            ],
            [
                'name'          => 'Agama',
            ],
            [
                'name'          => 'TIK',
            ],
            [
                'name'          => 'Bahasa Jawa',
            ],
        ];
        DB::table('list_courses')->truncate();
        DB::table('list_courses')->insert($data);
    }
}
