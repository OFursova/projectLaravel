<?php
namespace App\Services;

use App\Models\Product;

class CartService {
    public function add(Product $product, $qty)
    {
        dd($product);
    }

    public function clear()
    {
        # code...
    }

    public function remove($id)
    {
        # code...
    }

    public function changeQuantity($id, $qty)
    {
        # code...
    }

    public function totalSum()
    {
        # code...
    }
}
