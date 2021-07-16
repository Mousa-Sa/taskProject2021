<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function index(){
        $orders=OrderResource::collection(Order::all());
        return response()->json(['status'=>200,'data'=>$orders,'message'=>'success']);
    }
}
