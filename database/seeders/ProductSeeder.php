<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $product1 = new Product();
            $product1->name = "Televisor";
            $product1->description = "Esta es la descripcion del televisor";
            $product1->price = 500.00;
            $product1->category_id = 1;
    
            $product1->save();
    
            $product2 = new Product();
            $product2->name = "Laptop";
            $product2->description = "Esta es la descripcion de la laptop";
            $product2->price = 1000.00;
            $product2->category_id = 2;
    
            $product2->save();  


            $product3 = new Product();
            $product3->name = "Mause";
            $product3->description = "Esta es la descripcion del mause";
            $product3->price = 500.00;
            $product3->category_id = 1;
    
            $product3->save();


    }
}
