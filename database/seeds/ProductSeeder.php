<?php

use App\Product;
use App\ProductCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=ProductCategory::pluck('id');

        foreach($categories as $categoryId){
            factory(Product::class)->times(rand(15,25))->create([
                'category_id'=>$categoryId,
            ]);
        }
    }
}
