<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =['Admin', 'Editor'];

        foreach($roles as $role)
        {
          Role::create(['role_name' => $role]);
        }

    }
}
