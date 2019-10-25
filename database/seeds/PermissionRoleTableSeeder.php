<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Model\Role;
use App\Model\Permission;
use Illuminate\Support\Str;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->truncate();
        $actions = ['index', 'create', 'update', 'delete'];

        $exceptions = [
            [],
            ['beranda', 'student', 'teacher'], //Waka Kurikulum
            ['beranda', 'class', 'course'] //Waka Kesiswaan
        ];

        $excp = [[]];

        foreach ($exceptions as $i => $exception) {
            foreach ($exception as $x => $menu) {
                foreach ($actions as $y => $act) {
                    $excp[$i][] = Str::slug($act." ".$menu);
                }
            }
            $permissions = Permission::orderBy('id')->whereNotIn('slug', $excp[$i])->pluck('id');
            Role::find(($i+1))->permissions()->sync($permissions);
        }
    }
}
