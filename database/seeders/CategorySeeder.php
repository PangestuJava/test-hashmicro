<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {
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
