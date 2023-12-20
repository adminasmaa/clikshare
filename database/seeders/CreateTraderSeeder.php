<?php

namespace Database\Seeders;

use App\Models\UserDetail;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateTraderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Asmaa Abozied',
            'email' => 'asmaa@gmail.com',

            'user_type' => 3,
            'password' => bcrypt('12345678')
        ]);

        $detail = UserDetail::create([
            'user_id' => $user->id,
            'company_name' => 'company.',
            'full_name' => 'AsmaaAboziued.',
            'phone_number' => '051231526446.',
            'cr_document' => 'default.jpeg',
            'vat_document' => 'default.jpeg',
            'passport_document' => 'default.jpeg',

        ]);


    }
}
