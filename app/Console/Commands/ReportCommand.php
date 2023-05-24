<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\invoice;
use App\Models\Service;
use App\Models\Report;
use Carbon\Carbon;
class ReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generating Report';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         $start_date = date(Carbon::now()->subWeek()->startOfweek());
        $end_date = date(Carbon::now());
        $service_collections = [];
        $unique_services = Service::select('name')->distinct()->get();
        $invoices = invoice::where('status','PAID')->whereBetween('created_at',[$start_date,$end_date])->get();
        foreach($invoices as $invoice){
            $services =  explode('|',$invoice->service_ids);
            foreach($services as $id){
                $exists = Service::where('id',$id)->first();
                if($exists)
                    array_push($service_collections,$exists);
            }
        }

        $report = Report::create([
            'data' => $service_collections,
        ]);
    }
}
