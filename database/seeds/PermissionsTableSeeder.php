<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actions = ['index', 'create', 'update', 'delete'];

        $objects =
        [
            'user',
            'nonUser',
            'student',
            'alumni',
            'teacher',
            'nonTeacher',
            'schoolYear',
            'classroom',
            'listCourse',
            'course',
            'nonCourse',
            'section',
            'task',
            'role',
            'permission'
        ];

        for ($i=0; $i < count($objects) ; $i++) {
            for ($x=0; $x < count($actions) ; $x++) {
                $permissions = $actions[$x]." ".$objects[$i];
                $data[] = [
                    'name'    => $permissions,
                    'slug'    => Str::slug($permissions, '-'),
                ];
            }
        }

        DB::table('permissions')->truncate();
        DB::table('permissions')->insert($data);
    }
}
