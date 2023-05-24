@includes('layouts.master')
@section('conent')
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">      

 <div class="card card-primary mr-4">
        <div class="card-header">
          <h3 class="card-title">Invoice</h3>
        </div>
         <!-- Main content -->

       <div class="container_show1" style="">
                  <div class="image">
                   <img class="prime_image" src="/images/prime1.jpg" style="">
                   </div>

                   <div class="address_show" style="margin-left: 550px">
                   	PRIME SOFTWARE Plc <br>
                   	Mexico,K/KARE Bldgs <br>
                   	4 <sup>th</sup> Floor Suite 48/2 <br>
                   	Addis Ababa <br>
                   	Ethiopia <br> <br>

                   	 Tel:0115 575897 <br>
                   	 Fax:0115575873 <br>
                   	 Tel:0913798523 <br>

                   	 Tin#: 12234567
                   </div>  
              </div>  
                  	<div class="container_show2" style="">

                  	  <b>Invoice {{$invoice->invoice_number}}</b> <br>
                  	  
                  	   <small class="">Invoice Date: {{$invoice->created_at}}</small>
                  	   <br>
                  	<small class="">Due Date: {{$invoice->due_date}}</small>
                  	</div>





              
              <!-- info row -->
              <div class="row invoice-info" style="margin-left: 50px">
                <div class="col-sm-4 invoice-col">
                	<b> Invoiced To</b>
                  
                  <address>
                    {{$invoice->client->company_name}}<br>
                    {{$invoice->client->tin_number}}<br>
                      Phone: {{$invoice->client->phone_number}}<br>
                    Email: {{$invoice->client->email}} <br>
                    ATTN: {{$user->name}}<br>
                    {{$invoice->client->address}}<br>
                    
                  
                  </address>
                </div>
              
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col12 table-responsive" style="margin-left: 50px">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Description</th>
                      <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0; $i < count($services); $i++)
                    @for($j = 0; $j < count($services[$i]); $j++)

                    <tr>
                      <td>{{$services[$i][$j]->name}}</td>
                      <td>{{$services[$i][$j]->description}}</td>
                      <td>{{$services[$i][$j]->price}}</td>
                    </tr>
                    @endfor
                    @endfor
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row" style="margin-left: 600px">
                <!-- accepted payments column -->
                <!-- /.col -->
                <div class="col-6 ">
                  <p class="lead">Amount Due {{$invoice->due_date}}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{$invoice->sub_total}} ETB</td>
                      </tr>
                      <tr>
                        <th>VAT (15%)</th>
                        <td>{{$invoice->vat}} ETB</td>
                      </tr>
                      <tr>
                        <th>Inc Vat:</th>
                        <td>{{$invoice->inc_vat}} ETB</td>
                      </tr>
                      <tr>
                        <th>Credit:</th>
                        <td>{{$invoice->credit}} ETB</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>{{$invoice->total}} ETB</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
               <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print1.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
@endsection

























  <!-- Navbar -->
