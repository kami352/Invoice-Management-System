

@extends('layouts.master')

@section('content')

<div class ="container">
<div class="row">
<div class="col-md-9">
<div class="card">
<div class="card-header">
<h2></h2>
</div>
<div class="card-body">
@if(auth()->user()->role != "dataencoder")
<a href="{{ url('/service/create') }}" class="btn btn-success btn-sm" title="Add New service">
<i class="fa fa-plus" aria-hidden="true"></i> Add New Service
</a>
<br/>
<br/>
@endif
<div class="table-responsive">
<table class="table">
  <thead>

       <tr>
             <th>#</th>
            <th>Service Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
              </tr>
              </thead>  
               <tbody>
           @foreach($services as $service)  
           <tr>

         <td>{{$loop->iteration}}</td>   

          <td>{{$service->name}}</td>
          <td>{{$service->description}}</td>
           <td>{{$service->price}}</td>
          <td>  
       
<div class="btn-group">
<button type="submit" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"> 
Actions
</button> 
<div class="dropdown-menu" role="menu">
  @if(auth()->user()->role != "dataencoder")
  <a href="services/edit/{{$service->id}}" class="dropdown-item btn btn-success">Edit</a>
  @endif
  <a href="services/{{$service->id}}" class="dropdown-item  btn btn-success">Show</a>
  @if(auth()->user()->role != "dataencoder")
  <form action="{{url('services',$service->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button class="dropdown-item btn btn-danger">Delete</button>
  </form>
  @endif
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
