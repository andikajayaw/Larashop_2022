<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admministrator = new User();
        $admministrator->username = "administrator";
        $admministrator->name = "Site Administrator";
        $admministrator->email = "administrator@larashop.test";
        $admministrator->roles = json_encode(["ADMIN"]);
        $admministrator->password = Hash::make("larashop");
        $admministrator->avatar = "saat-ini-tidak-ada-file.png";
        $admministrator->address = "Denpasar, Bali";
        $admministrator->save();
        $this->command->info("User Admin berhasil ditambahkan");
    }
}
