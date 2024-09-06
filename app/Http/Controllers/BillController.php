<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Bill_Detail;
use App\Models\payment_type;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;

class BillController extends Controller
{
    //index
    public function index(Request $request)
    {
        if($request){
            $bill = Bill::whereAny(['bill_date'],'LIKE','%'.$request->get('search').'%')->paginate(8);
        }
        else{
            $bill = Bill::paginate(8);
        }
        $bill_details = Bill_Detail::all();
        $shipment = Shipping::all();
        $user = User::all();
        $products = Product::all();
        $payment_type = payment_type::all();
        return view('bill.index', compact('bill','bill_details','payment_type', 'user','shipment','products'));
    }
    //get one

    //
}
