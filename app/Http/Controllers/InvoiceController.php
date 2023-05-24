<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse; 
use Illuminate\Http\Request; 
use Illuminate\Http\Response;
use App\Models\invoice;
use App\Models\Service;
use App\Models\Client;
use App\Models\User;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():view
    {
        $invoices = invoice::all();
        return view('invoices.index')->with('invoices',$invoices);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create():view
    {
        $clients = Client::latest()->get();
        // dd($clients);
        $services  = Service::all();
        return view('invoices.create',['clients'=>$clients,'services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {    

  // dd($request);
      $validatedData  = $request->validate([
        'client_id' => 'required',
        'service_id' => 'required',
        'due_date' => 'required',
      ]);

        $services =[];
        $totalPrice = 0.0;
        $service_ids = explode('|',$request->service_id);
        for ($i=0; $i <  count($service_ids) - 1; $i++) { 
          array_push($services,$service_ids[$i]);
        }

        foreach($services as $id)
          $totalPrice += (float)service::where('id',$id)->value('price');


        // $services = collect($services)->implode(',');
      $lastInvoice = invoice::orderBy('id','DESC')->first(); 
        $invoiceNumber = "";
        if (!$lastInvoice) {
            $invoiceNumber = 'INV-0001'; 
        } else {
            $nextNumber = intval(substr($lastInvoice->invoice_number, -4)) + 1; 
            $invoiceNumber = 'INV-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT); 
        }

        $VAT = 0.15;
        $vatAmount = $totalPrice * $VAT;
        $subTotal = $totalPrice - $vatAmount;
        $incVat = $subTotal + $vatAmount;
        $credit = 0.0;
        $invoice = new invoice;
        $invoice->invoice_number = $invoiceNumber;
        $invoice->invoiced_by = auth()->user()->id;
        $invoice->client_id = $request->client_id;
        $invoice->sub_total = $subTotal;
        $invoice->vat = $vatAmount;
        $invoice->inc_vat = $incVat;
        $invoice->total = $incVat;
        $invoice->credit = $credit;
        $invoice->due_date = $request->due_date;
        $invoice->status = $request->status;
        $invoice->service_ids = implode('|',$services);   
        $invoice->save();

        return redirect('/invoices');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id):view

    {
      $services = [];
        $invoice = invoice::where('id',$id)->with('user')->first();
        foreach (explode('|',$invoice->service_ids) as $value) {
          array_push($services , Service::where('id',$value)->get());
        }
        $user = User::FindorFail($invoice->invoiced_by);
        // dd($user);
        
        return view('invoices.show',['invoice'=>$invoice,'services'=>$services,'user'=>$user]);
    }

    public function print(string $id):view

    {
      $services = [];
        $invoice = invoice::where('id',$id)->with('user')->first();
        foreach (explode('|',$invoice->service_ids) as $value) {
          array_push($services , Service::where('id',$value)->get());
        }
        $user = User::FindorFail($invoice->invoiced_by);
        // dd($user);
        
        return view('invoices.invoice-print1',['invoice'=>$invoice,'services'=>$services,'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):view
    {
        $invoice = invoice::find($id);
        return view('invoices.edit')->with('invoices', $invoice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
           $invoice= invoice::find($id) ;
      $input = $request->all();
      $invoice->update($input);
      return redirect('invoices')->with('flash_message', 'invoices Updated!');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
     invoice::destroy($id);
        return redirect('invoices')->with('flash_message', 'deleted!');

    }
}
