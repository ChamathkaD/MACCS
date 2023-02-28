<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();

        // create super admin
        $admin = Admin::where('email', 'superadmin@maccs.com')->first();

        if ($admin === null) {

            Admin::create([
                'name' => "Super Administrator",
                'email' => "superadmin@maccs.com",
                'password' => Hash::make('password'),
                'is_super' => true
            ]);

        }

    }
}
