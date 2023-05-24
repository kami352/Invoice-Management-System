<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse; 
use Illuminate\Http\Request; 
use Illuminate\Http\Response; 
use App\Models\Client;
use App\Models\service;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource..
     */
    public function index():view
    {
          $clients = Client::all();
        return view('clients.index')->with('clients',$clients);


       
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create():view
    {
         return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $validatedResult  = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'tin_number' => 'required|string',
            'address' => 'required|string',
            'company_name' => 'required|string',
            'phone_number' => 'required|string',
        ]);
        
        Client::create($validatedResult);
        return redirect('clients')->with('flash_message','client Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):view
    {
       
       $client = Client::FindorFail($id);
        return view('clients.show')->with('client', $client);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):view
    {
         $client = Client::find($id);
        return view('clients.edit')->with('clients', $client);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
       $client = Client::FindorFail($id);
       $validatedResult  = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'tin_number' => 'required|string',
            'address' => 'required|string',
            'company_name' => 'required|string',
            'phone_number' => 'required|string',
        ]);
        
        $client->update($validatedResult);
      return redirect('clients')->with('flash_message', 'client Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        Client::destroy($id);
        return redirect('clients')->with('flash_message', 'deleted!');
    }

    public function search(Request $request){
        $request->validate([
            'search' => 'required|string'
        ]);
        $clients = [];
        $names = Client::where('name','like','%'.$request->search.'%')->get();
        array_push($clients, $names);
        $emails = Client::where('email','like','%'.$request->search.'%')->get();
        array_push($clients,$emails);
        $tin = Client::where('tin_number','like','%'.$request->search.'%')->get();
        array_push($clients,$tin);

        $services = service::all();
        return view('invoices.create',['clients'=>$clients,'services'=>$services]);
    }
}
