
@extends('layouts.master')

@section('content')
                <!-- /.form group -->
                <!-- Date range -->
                <div class="form-group">
                  <label>Date range:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <form >
                      @csrf
                    <input type="text" onchange="getDate(this)" class="form-control float-right" id="reservation">
                    </form>
                  </div>
                  <!-- /.input group -->
                </div>
                @php
                $invoices = [];
                @endphp

                <input type="text[]" id="data" hidden value="">
                <!-- /.form group -->
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                        <tr>
                         <th>Invoice Number</th>
                          <th>Client Name</th>
                          <th>Invoice Date</th>
                          <th>Price</th>
                          <th>Due Date</th>
                          <th>Status</th>
                        </tr>
                    </thead>  
                     <tbody id="table_body">
                 
                    </tbody>
                  </table>
                </div>

                <!-- Date and time range -->
           
                <!-- /.form group -->
              </div>              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <script>
              function getDate(element){
                document.querySelector('table').setAttribute('style','display:none');
                var fd = new FormData();
                var CSRF_TOKEN = document.querySelector('input[name="_token"]').value;

                                 // Append data 
                fd.append('_token',CSRF_TOKEN);
                fd.append('date',element.value);
                 $.ajax({
                        url: "report/generate",
                        method: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response){
                          console.log(response);
                          if(response.length > 0){
                            var tBody = document.querySelector('#table_body');
                           
                            tBody.removeChild(tBody.firstChild);
                            for(let i = 0; i < response.length; i++){
                              var row = document.createElement('tr');
                              for(let j = 0; j < Object.keys(response).length; j++){
                                let column = document.createElement('td');
                                if(j == 0)
                                  column.appendChild(document.createTextNode(response[i].invoice_number))
                                else if(j == 1)
                                  column.appendChild(document.createTextNode(response[i].client_id))
                               else if(j == 2)
                                  column.appendChild(document.createTextNode(response[i].generated_at))
                                else if(j == 3)
                                 column.appendChild(document.createTextNode(response[i].total))

                               else if(j == 4)
                                 column.appendChild(document.createTextNode(response[i].due_date))
                               else if(j == 5)
                                 column.appendChild(document.createTextNode(response[i].status))
                                row.appendChild(column);
                              }
                              tBody.appendChild(row);
                            }
                             document.querySelector('table').removeAttribute('style');
                          }
                        },
                        error: function(response){
                            console.log("error : " + JSON.stringify(response) );
                        }
                });

              }
            </script>
@endsection
