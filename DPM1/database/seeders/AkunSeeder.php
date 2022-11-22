<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = 
        [
            [
            'name' => 'admin',
            'password' => bcrypt('12345')
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
