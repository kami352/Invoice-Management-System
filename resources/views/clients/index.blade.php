

@extends('layouts.master')

@section('content')

<div class ="container">
<div class="row">
<div >
<div class="card">
<div class="card-header">
<h2></h2>
</div>
<div class="card-body">
<a href="{{ url('/client/create') }}" class="btn btn-primary btn-sm" title="Add New client">
<i class="fa fa-plus" aria-hidden="true"></i> Add New Client
</a>
<br/>
<br/>
<div class="table-responsive">
<table class="table">
  <thead>

       <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Tin number</th>
                <th>Address</th>
                <th>Company name</th>
                <th>Phone number</th>
                <th>Actions</th>
              </tr>
              </thead>  
               <tbody>
           @foreach($clients as $client)  
           <tr>

         <td>{{$loop->iteration}}</td> 
          <td>{{$client->name}}</td>
          <td>{{$client->email}}</td>
          <td>{{$client->tin_number}}</td>
          <td>{{$client->address}}</td>
          <td>{{$client->company_name}}</td>
          <td>{{$client->phone_number}}</td> 
     
            <td>  


<div class="btn-group">
<button type="submit" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"> 
Actions
</button> 
<div class="dropdown-menu" role="menu">
  <a href="clients/edit/{{$client->id}}" class="dropdown-item btn btn-success">Edit</a>
  <a href="clients/{{$client->id}}" class="dropdown-item  btn btn-success">Show</a>
  <form action="{{url('clients',$client->id)}}" method="POST">
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


