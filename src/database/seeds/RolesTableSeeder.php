<?php

namespace Adam\Superauth\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'        => 'Superadmin',
            'description'        => 'Moderator with access to everything',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name'        => 'Admin',
            'description'        => 'Moderator with access to everything but configurations',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name'        => 'Moderator',
            'description'        => 'Moderator with access to CMS add edit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name'        => 'User',
            'description'        => 'user access his own profile at website not CMS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name'        => 'Featured user',
            'description'        => 'featured user access his own profile at website not CMS with paid membership',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $this->command->info('Roles seeding successful.');
    }
}
