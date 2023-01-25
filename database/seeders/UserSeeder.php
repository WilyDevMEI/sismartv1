<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_user = User::create(['name' => 'Willy Harefa', 'address' => 'Jl. Riau', 'city' => 'Pekanbaru', 'phone' => '082294679819', 'email' => 'willi@mitoindonesia', 'profession' => 'Staff IT', 'username' => 'willyharefa', 'password' => Hash::make('willyharefa')]);
        User::create(['name' => 'Gea Nurbila', 'address' => 'Jl. Riau', 'city' => 'Pekanbaru', 'phone' => '082384816321', 'email' => 'gea@mitoindonesia', 'profession' => 'Admin Sales', 'username' => 'geanurbila', 'password' => Hash::make('gea321')]);

        User::create(['name' => 'Taufan', 'address' => 'Jl. Riau', 'city' => 'Pekanbaru', 'phone' => '081284642854', 'email' => 'taufan@mitoindonesia', 'profession' => 'Direktur Utama', 'username' => 'taufan', 'password' => Hash::make('taufan854')]);
        User::create(['name' => 'Abraham Napitupulu', 'address' => 'Jl. Riau', 'city' => 'Pekanbaru', 'phone' => '0811751916', 'email' => 'abraham@mitoindonesia', 'profession' => 'General Manager', 'username' => 'abraham', 'password' => Hash::make('abraham916')]);
        User::create(['name' => 'Erton Tito', 'address' => 'Jl. Riau', 'city' => 'Pekanbaru', 'phone' => '085363172525', 'email' => 'erton@mitoindonesia', 'profession' => 'Head Sales & Marketing', 'username' => 'erton', 'password' => Hash::make('erton525')]);
        User::create(['name' => 'Abas Susilo', 'address' => 'Jl. Riau', 'city' => 'Pekanbaru', 'phone' => '085278086345', 'email' => 'abas@mitoindonesia', 'profession' => 'Head IT & GA', 'username' => 'abas', 'password' => Hash::make('abas345')]);
        User::create(['name' => 'Tania Loara Madani', 'address' => 'Jl. Riau', 'city' => 'Pekanbaru', 'phone' => '081372049605', 'email' => 'tania@mitoindonesia', 'profession' => 'Sales & Marketing', 'username' => 'tania', 'password' => Hash::make('tania605')]);
        User::create(['name' => 'Dwi Purwanti', 'address' => 'Jl. Riau', 'city' => 'Pekanbaru', 'phone' => '085214064705', 'email' => 'dwi@mitoindonesia', 'profession' => 'Sales & Marketing', 'username' => 'dwi.purwanti', 'password' => Hash::make('dwi705')]);

        $super_admin = Role::where('name', 'Super Admin')->get();
        $super_user->assignRole($super_admin);
    }
}
