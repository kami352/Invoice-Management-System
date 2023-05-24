<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\invoice;
use App\Models\Client;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $start_date = date(Carbon::now()->subWeek()->startOfweek());
        $end_date = date(Carbon::now());
        $service_collections = [];
        $unique_services = Service::select('name')->distinct()->get();
        $invoices = invoice::where('status','PAID')->whereBetween('created_at',[$start_date,$end_date])->get();
        $latest_paid = invoice::where('status','PAID')->orderBy('created_at','DESC')->get();
        $latest_generated = invoice::latest()->take(5)->get();
        $paid = count(invoice::where('status','PAID')->get());
        $unpaid = count(invoice::where('status','UNPAID')->get());
        $all = count(invoice::all());
        // dd($all,$paid,$unpaid);

        foreach($invoices as $invoice){
            $services =  explode('|',$invoice->service_ids);
            foreach($services as $id){
                $exists = Service::where('id',$id)->first();
                if($exists)
                    array_push($service_collections,$exists);
            }
        }

        return view('admin',['invoices' => $invoices,'services' => $service_collections,'unique_services' => $unique_services,'latest_paid'=>$latest_paid,'latest_generated'=>$latest_generated,'paid'=>$paid,'unpaid'=>$unpaid,'all'=>$all]);
    }
}
