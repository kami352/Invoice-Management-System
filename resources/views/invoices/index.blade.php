

@extends('layouts.master')

@section('content')

<div class ="container">
<div >
<div>
<div class="card">
<div class="card-header">
<h2></h2>
</div>
<div class="card-body">
<a href="{{ url('/invoice/create') }}" class="btn btn-primary btn-sm" title="Add New invoice">
<i class="fa fa-plus" aria-hidden="true"></i> Add New Invoice
</a>
<br/>
<br/>
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
                <th>Actions</th>
            </tr>
              </thead>  
               <tbody>
           
           @foreach($invoices as $invoice)  
           <tr>

          <td>{{$invoice->invoice_number}}</td>
          <td>{{$invoice->client->name}}</td>
          <td>{{$invoice->created_at->diffForHumans()}}</td>
          <td>{{$invoice->total}}</td>
          <td>{{$invoice->due_date}}</td>
          <td>{{$invoice->status}}</td>
                   <td>  
       
<div class="btn-group">
<button type="submit" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"> 
Actions
</button> 
<div class="dropdown-menu" role="menu">
  <a href="invoices/edit/{{$invoice->id}}" class="dropdown-item btn btn-success">Edit</a>
  <a href="invoices/{{$invoice->id}}" class="dropdown-item  btn btn-success">Show</a>
  <form action="{{url('invoice',$invoice->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button class="dropdown-item btn btn-danger">Delete</button>
  </form>
</div>
</div>
</td>
</tr>
 @endforeach
 </tbody>
      </table>
    </div>
</div>
</div>
</div>
 </div> 
</div>

     @endsection