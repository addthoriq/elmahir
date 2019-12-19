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
                'slug'          => 'bahasa-indonesia'
            ],
            [
                'name'          => 'Matematika',
                'slug'          => 'matematika'
            ],
            [
                'name'          => 'PPKn',
                'slug'          => 'ppkn'
            ],
            [
                'name'          => 'Bahasa Inggris',
                'slug'          => 'bahasa-inggris'
            ],
            [
                'name'          => 'IPS',
                'slug'          => 'ips'
            ],
            [
                'name'          => 'IPA',
                'slug'          => 'ipa'
            ],
            [
                'name'          => 'Penjas',
                'slug'          => 'penjas'
            ],
            [
                'name'          => 'Seni Budaya',
                'slug'          => 'seni-budaya'
            ],
            [
                'name'          => 'Kewirausahaan',
                'slug'          => 'kewirausahaan'
            ],
            [
                'name'          => 'Agama',
                'slug'          => 'agama'
            ],
            [
                'name'          => 'TIK',
                'slug'          => 'tik'
            ],
            [
                'name'          => 'Bahasa Jawa',
                'slug'          => 'bahasa-jawa'
            ],
        ];
        DB::table('list_courses')->truncate();
        DB::table('list_courses')->insert($data);
    }
}
