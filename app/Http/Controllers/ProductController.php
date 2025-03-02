<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // how to pass  data to view -> compact or with
        $productName = 'Laptop Macbook Pro';
        $price = 400000;
        // return view('products.product',compact('productName','price'));
        // return view('products.product')->with('productName', $productName)
        //                             -> with('price', $price);

        $myPhone = [
            'name' => 'Samsung Galaxy S10',
            'price' => 500000,
            'color' => 'Black',
            'isFavorite' => true
        ];
        print_r(route('product'));
        return view('products.product', [
            'myPhone' => $myPhone,
            'productName' => $productName,
            'price' => $price
        ]);
    }


    public function detail($id)
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Laptop Macbook Pro',
                'price' => 400000
            ],
            [
                'id' => 2,
                'name' => 'Laptop MSI Model 2021',
                'price' => 160
            ]
        ];
        return view('products.detail', [
            'product' => $products[$id] ?? 'unknown product',
        ]);
    }
    public function about()
    {
        return "This is About page";
    }
}
