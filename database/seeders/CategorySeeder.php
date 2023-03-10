<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultUser = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
        DB::beginTransaction();
        try {
            User::create(array_merge([
                'email' => 'admin@gmail.com',
                'name'  => 'admin'
            ], $defaultUser));

            Category::create(array_merge([
                'name'  => 'sepatu'
            ]));

            Category::create(array_merge([
                'name'  => 'celana'
            ]));

            Category::create(array_merge([
                'name'  => 'baju'
            ]));

            Category::create(array_merge([
                'name'  => 'aksesoris'
            ]));

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
