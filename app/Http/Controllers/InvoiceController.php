<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function admin()
    {
        $invoices = collect();
        // collect($invoices);

        if (auth()->user()->stripe_id) {
            $invoices  = auth()->user()->invoices();
        }

        return view('invoices.admin',compact('invoices'));
    }

    public function download($id)
    {
        return request()->user()->downloadInvoice($id,[
            "vendor" => "Mi Empresa",
            "product" => __("Subscription")
        ]);
        
    }
}
