<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::all();
        return view('orders.index',['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();
        $customers=Product::all();
        return view('orders.create',['products'=>$products,'customers'=>$customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order=new Order();
        $order->name=$request->name;
        $order->customer_id=$request->customer;
        $order->number=random_int(1,9999);


        if ($order->save()) {
            $order->products()->sync($request->products);
            return redirect()->back()->with("success", "Add success");

        } else {


            return redirect()->back()->with("error", 'Error');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $products=Product::all();
        $customers=Customer::all();
        return view('orders.edit',['order'=>$order,'products'=>$products,'customers'=>$customers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {

        $order->name=$request->name;
        $order->customer_id=$request->customer;


        if ($order->save()) {
            $order->products()->sync($request->products);
            return redirect()->route('order.index')->with("success", "updated success");

        } else {


            return redirect()->back()->with("error", 'Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {


        if($order->delete()){
            return redirect()->route('order.index')->with("success", "delete success")
               ;
        }

        return redirect()->back()->with("error", 'Error');
    }

}
