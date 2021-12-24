<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo"[-] Add User process . . . \n";

        // Admin
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('admin'); // password = 'admin'
        $admin->phone = "08331112121";
        $admin->save();

        $admin->assignRole('ADMIN');

        // Customer
        $customer = new User();
        $customer->name = 'customer';
        $customer->email = 'customer@gmail.com';
        $customer->password = Hash::make('customer'); // password = 'customer'
        $customer->phone = "083131555533";
        $customer->save();

        $customer->assignRole('CUSTOMER');

        echo"[+] Add User Success . . . \n";

    }
}
