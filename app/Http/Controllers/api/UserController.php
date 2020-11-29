<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;

use App\Models\Product;

use Validator;

class UserController extends BaseController
{
    public function show(Request $request)
    {
        $user = new UserResource($request->user());
        return $this->sendResponse($user, 'Data found');
    }

    /**
     * Get users's cart
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cart(Request $request)
    {
        $user = $request->user();
        return $this->sendResponse($user->carts()->join('products', 'products.id', '=', 'carts.product_id')->get(), 'Success', 200);
    }

    /**
     * Update users's cart
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|min:0',
        ]);
        
        if($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors(), 422);
        }

        $user = $request->user();
        $product = Product::find($id);
        if($product->quantity < $request->quantity) {
            return $this->sendError('Validation Error', ['quantity' => 'Quantity exceeded'], 422);
        } else if($product->seller_id === $user->id) {
            // return $this->sendError('Validation Error', ['product' => 'You cannot add your own product to cart'], 422);            
        }

        if($request->quantity > 0) {
            $user->carts()->where('product_id', $id)->updateOrCreate([
                'buyer_id' => $user->id,
                'product_id' => $id,
                'qty_in_cart' => $request->quantity
            ]);
        } else {
            $user->carts()->where('product_id', $id)->delete();
        }

        return $this->sendResponse($user->carts()->join('products', 'products.id', '=', 'carts.product_id')->get(), 'Success', 200);
    }
}
