<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\Product as ProductResource;
use App\Models\Product;

use Validator;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = Product::query();
        // Cek searching nama
        if(!empty($request->name)) {
            $searchString = str_replace('%', '', $request->name);
            $product = $product->where('name', 'like', '%' . $searchString . '%');
        }

        // Cek filter tipe daging
        if(!empty($request->type)) {
            $product = $product->where('type', $request->type);
        }

        // Cek id seller
        if(!empty($request->seller_id)) {
            $product = $product->where('seller_id', $request->seller_id);
        }

        // Cek sorting
        if(!empty($request->sort_by)) {
            if(!empty($request->sort_type)) {
                switch ($request->sort_type) {
                    case 'asc':
                        $orderType = 'ASC';
                        break;
                    case 'desc':
                        $orderType = 'DESC';
                        break;
                    default:
                        $orderType = 'ASC';
                        break;
                }
            } else {
                $orderType = 'ASC';
            }
            switch ($request->sort_by) {
                case 'price':
                    $product = $product->orderBy('price', $orderType);
                    break;
                case 'name':
                    $product = $product->orderBy('name', $orderType);
                    break;
                default:
                    break;
            }
        }

        $product = new ProductResource($product->paginate(15));
        return $this->sendResponse($product, 'Data found');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'weight_type' => 'required|in:kg,ounce',
            'type' => 'required|in:ayam,kambing,sapi,domba',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'required',
            'picture' => 'required|file|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);
        
        if($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors(), 422);
        }

        $input = $request->all();
        $input['seller_id'] = $request->user()->id;
        // return $this->sendResponse($input,'a',201);

        $product = Product::create($input);

        $image = $request->file('picture');
        $image->storeAs('public/uploads/product/' . $product->id . '/', 'product.jpg');
        $product->picture = 'storage/uploads/product/' . $product->id . '/product.jpg';
        $product->save();
        $product->refresh();

        return $this->sendResponse($product, 'Product added successfully', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = $request->user();
        $product = Product::find($id);
        if($user) {
            $product->in_cart = $request->user()->carts()->where('product_id', $id)->count();
        } else {
            $product->in_cart = 0;
        }
        return $this->sendResponse($product, 'Data found');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'weight_type' => 'required|in:kg,ounce',
            'type' => 'required|in:ayam,kambing,sapi,domba',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'required',
            'picture' => 'nullable|file|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);
        
        if($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors(), 422);
        }

        $product = Product::find($id);
        if($request->user()->id !== $product->seller_id) {
            return $this->sendError('Unauthorized', [], 401);
        }

        $input = $request->all();
        // return $this->sendResponse($input,'a',201);

        $product->update($input);

        if(!empty($request->file('picture'))) {
            $image = $request->file('picture');
            $image->storeAs('public/uploads/product/' . $product->id . '/', 'product.jpg');
            $product->picture = 'storage/uploads/product/' . $product->id . '/product.jpg';
        }
        $product->save();
        $product->refresh();

        return $this->sendResponse($product, 'Product updated successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        if($request->user()->id !== $product->seller_id) {
            return $this->sendError('Unauthorized', [], 401);
        }
        $product->delete();
        return $this->sendResponse(null, 'Product deleted successfully', 200);
    }
}
