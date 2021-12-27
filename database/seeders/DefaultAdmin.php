<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DefaultAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => env('AdMIN_DEFAULT_LOGIN'),
            'email' => env('AdMIN_DEFAULT_MAIL'),
            'password' => Hash::make(env('ADMIN_DEFAULT_PASSWORD')),
        ]);

        DB::table('role')->insert([
            'name' => 'admin',
        ]);

        DB::table('user_role')->insert([
            'user_id' => User::where('name', 'admin')->first()->id,
            'role_id' => Role::where('name', 'admin')->first()->id,
        ]);

    }
}
