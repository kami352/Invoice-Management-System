<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse; 
use Illuminate\Http\Request; 
use Illuminate\Http\Response; 
use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():view
    {
        $services = Service::all();
        return view('services.index')->with('services',$services);


    }


    /**
     * Show the form for creating a new resource
     */
    public function create():view
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
        ]);
        Service::create($validateData);
        return redirect('services')->with('flash_message','student Addedd!');
         
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id):view
    {
       $service = Service::find($id);
        return view('services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):view
    {
        $service = Service::find($id);
        return view('services.edit')->with('services', $service);

    }

    /**

      Update the specified resource in storage.
     **/
    public function update(Request $request, string $id):RedirectResponse
    {
      $service= Service::find($id) ;
      $input = $request->all();
      $service->update($input);
      return redirect('services')->with('flash_message', 'service Updated!');
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        Service::destroy($id);
        return redirect('services')->with('flash_message', 'deleted!');

    }
}
