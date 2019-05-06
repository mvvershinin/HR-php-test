<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Requests\updateProduct;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

define('CHANGE_PRICE_FORM', 'include.forms.price');

class ProductController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $product = Product::where('id', $request->get('id'))->first();

        $html = view(CHANGE_PRICE_FORM,
            ['product' => $product]
        )->render();

        return response()->json([ 'html' => $html ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(updateProduct $request)
    {
        $request->validated();

        $product = Product::find($request->get('id'));
        $product->update([
            'price' => $request->get('price')
        ]);

        return response()->json( $product, 200);
    }
}
