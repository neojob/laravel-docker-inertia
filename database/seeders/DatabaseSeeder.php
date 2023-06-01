<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Lang::factory(1)->create([
            'primary' => 1,
            'name'=> 'Russian',
            'iso'=> 'ru'
        ]);
        \App\Models\Lang::factory(1)->create([
            'primary' => 0,
            'name'=> 'English',
            'iso'=> 'en'
        ]);

        $users = \App\Models\User::factory(9)->create();

        \App\Models\User::factory(3)->create();

        $role = \App\Models\Role::factory()->create([
            'title' => 'Client',
            'alias' => 'client'
        ]);

        \App\Models\Category::factory(3)->create();
        \App\Models\Product::factory(10)->create();

        $admin_role = \App\Models\Role::factory()->create([
            'title' => 'Admin',
            'alias' => 'super_admin'
        ]);

        foreach ($users as $user){
            $user->roles()->attach($role->id);
        }

        $admin_user = \App\Models\User::factory(1)->create([
            'email' => 'kerob.job@gmail.com',
            'password' => Hash::make('123123123')
        ]);

        foreach ($admin_user as $user){
            $user->roles()->attach($admin_role->id);
        }
    }
}
