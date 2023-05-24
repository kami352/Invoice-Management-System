<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoice;
use App\Models\Service;
use App\Models\Report;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        // $invoices = [];
        return view('reports.index');
    }

    public function generate(Request $request)
    {
        $requested_dates = explode('-',$request->date);
        $from = Carbon::parse($requested_dates[0]);
        $up_to = Carbon::parse($requested_dates[1]);
        $invoices = invoice::whereBetween('created_at',[$from,$up_to])->get();
        foreach($invoices as $invoice){
            $invoice->client_id = $invoice->client->name;
            $invoice['generated_at'] = date($invoice->created_at);    
            $invoice->due_date = date($invoice->due_date);
        }

        return $invoices;
        // return redirect()->back()->with('invoices',$invoices);
    }
}
