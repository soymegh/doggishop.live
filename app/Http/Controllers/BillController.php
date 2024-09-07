<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Bill_Detail;
use App\Models\payment_type;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
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
    //report
    public function report(){
        $billid = Bill::whereMonth('bill_date','=', '9')->get(['id']);
        $billdetails = Bill_Detail::whereIn('bill_id', $billid)->get();

        $pdf = Pdf::setOptions(
            ['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])

            ->loadView('bill.report', compact('billdetails','billid') );
        
        $pdf->getDomPDF()->setProtocol($_SERVER['DOCUMENT_ROOT']);
        $pdf->setBasePath(public_path());
        
        return $pdf->stream();
    }
    //
}
