  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prime</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->

  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="/bootstrap1.css" >
  

   
  <!-- Font Awesome -->

  <!-- Theme style -->
  


</head>
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
                <div class="table-responsive" style="margin-left: 50px">
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
                      <td>{{$services[$i][$j]->name}} ({{$invoice->created_at}} - {{$invoice->due_date}})</td>
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

              <div class="row" style="margin-left: 700px">
                <!-- accepted payments column -->
                <!-- /.col -->
                <div class="col-12 ">

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
</body>
</html>

























  <!-- Navbar -->
