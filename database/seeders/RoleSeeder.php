<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo"[-] Add Role process . . . \n";    

        Role::create(['name' => 'ADMIN']);
        Role::create(['name' => 'CUSTOMER']);

        echo "[+] Add Role Successfully \n";
    }
}
