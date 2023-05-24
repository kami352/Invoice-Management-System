

@extends('layouts.master')

@section('content')

<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Latest Generated</h3>
                
                </div>
              </div>
              <div class="card-body">
                {{-- <div class="d-flex"> --}}
                   <div class="card-body table-responsive p-0">
                     <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Client</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($latest_generated as $invoice)
                    <tr>
                      <td>
                        {{$invoice->invoice_number}}
                      </td>
                      <td>
                        {{$invoice->client->name}}
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
              {{-- </div> --}}

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>
              </div>
            </div>
          </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Services</h3>
          
              </div>
              @php
                $price = 0.0;
                $count = 0;
              @endphp
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Service</th>
                    <th>Sales</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($unique_services as $service)
                    @foreach($services as $sales)
                      @if($service->name == $sales->name)
                      @php
                      $count++;
                        $price = $price + (float)$sales->price
                      @endphp
                      @endif
                    @endforeach
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32">
                      {{$service->name}}
                    </td>
                    <td>
                      <small class="text-success">
                        <i class="fas fa-arrow-up"></i>

                      {{ ($count / count($services)) * 100}} % 

                      </small>
                     {{$price}} Sold
                    </td>
            
                  </tr>
                  @php
                   $price = 0.0;
                   $count= 0;
                  @endphp
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
           
          </div>
        
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">PAID INVOICES</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                        <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Client</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($latest_paid as $invoice)
                    <tr>
                      <td>
                        {{$invoice->invoice_number}}
                      </td>
                      <td>
                        {{$invoice->client->name}}
                      </td>
                      <td>
                        {{$invoice->status}}
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
             

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

            
              </div>
            </div>
          

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">PAID And UNPAID INVOICES</h3>
           
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                    <i class="ion ion-ios-refresh-empty"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-success"></i> {{($paid / $all)*100}} %
                    </span>
                    <span class="text-muted">PAID INVOICES</span>
                  </p>
                </div>
              
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-warning text-xl">
                    <i class="ion ion-ios-cart-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-warning"></i> {{($unpaid / $all)*100}} %
                    </span>
                    <span class="text-muted">UNPAID INVOICES</span>
                  </p>
                </div>
               
                <div class="d-flex justify-content-between align-items-center mb-0">
                  <p class="text-danger text-xl">
                    <i class="ion ion-ios-people-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-down text-danger"></i> {{$all}}
                    </span>
                    <span class="text-muted">ALL</span>
                  </p>
                </div>
              
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      </div>
    
    </div>
   
  
  
        
      @endsection


<!-- jQuery -->
