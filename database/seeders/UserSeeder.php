<?php
 
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
 
class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        User::insert([
            'name' => 'Shahzeb Akhtar',
            'email' => 'shahzebakhtar892@gmail.com',
            'password' => Hash::make('shahzeb@892'),
        ]);
    }
}