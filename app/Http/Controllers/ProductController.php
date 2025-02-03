<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index()
   {
        // defines the categories
       $categories = [
           ['id' => 1, 'name' => 'Gruntis'],
           ['id' => 2, 'name' => 'Krāsas'],
           ['id' => 3, 'name' => 'Špakteles'],
           ['id' => 4, 'name' => 'Dekoratīvie klājumi'],
           ['id' => 5, 'name' => 'Lakas'],
           ['id' => 6, 'name' => 'Betons']
       ];

       // defines products
        $products = [
            ['id' => 1, 'name' => 'gruntis iekšdarbiem', 'category_id' => 1],
            ['id' => 2, 'name' => 'gruntis ārdarbiem', 'category_id' => 1],
            ['id' => 3, 'name' => 'iekšdarbu krāsas', 'category_id' => 2],
            ['id' => 4, 'name' => 'fasādes krāsas', 'category_id' => 2],
            ['id' => 5, 'name' => 'krāsas kokam', 'category_id' => 2],
            ['id' => 6, 'name' => 'iekšdarbu špakteles', 'category_id' => 3],
            ['id' => 7, 'name' => 'fasādes špakteles', 'category_id' => 3],
            ['id' => 8, 'name' => 'daudzkrāsu klājumi', 'category_id' => 4],
            ['id' => 9, 'name' => 'šķīdinātāju saturošas', 'category_id' => 5],
            ['id' => 10, 'name' => 'uz ūdens bāzes', 'category_id' => 5],
            ['id' => 11, 'name' => 'betona aizsardzība', 'category_id' => 6]
        ];

        return view('filter-products', compact('categories', 'products'));
   }
}
