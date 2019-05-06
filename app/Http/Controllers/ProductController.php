<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::with('vendor')
            ->orderBy('name')
            ->paginate(PAGE_SIZE_REGULAR);
        return view('products.index', [
            'items' => $data,
            'active_page' => 'products'
        ]);
    }
}
