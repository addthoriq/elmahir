<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin', 'Operator1', 'Operator2', 'Guru'];

        for ($i=0; $i < count($roles); $i++) {
            $data[$i] = [
                'name'    => $roles[$i],
                'slug'    => Str::slug($roles[$i]),
            ];
        }
        DB::table('roles')->truncate();
        DB::table('roles')->insert($data);
    }
}
