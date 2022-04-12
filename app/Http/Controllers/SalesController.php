<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Product;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $orders = $request->user()->sales;

        return response()->json($orders, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // try {
        //code...

        $fields = $request->validate([
            'quantity' => 'required',
            'product_id' => 'required',
            'status' => 'required',
        ]);
        $product = Product::find($fields['product_id']);
        $sales = new Sales;
        $sales->quantity = $fields['quantity'];
        $sales->user_id = $request->user()->id;
        $sales->product_id = $product->id;
        $sales->status = $fields['status'];
        $sales->save();

        return response()->json($sales, 201);
        // } catch (\Throwable $th) {
        //     throw $th;

        //     return response()->json(['message' => $th], 404);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetchUserOrders(Request $request)
    {
        $orders = $request->user()->sales;

        return response()->json($orders, 201);
    }
}
