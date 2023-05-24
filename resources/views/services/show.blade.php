@extends('layouts.master')
@section('content')

 <div class="card card-primary mr-4">
        <div class="card-header">
          <h3 class="card-title"> Service</h3>
        </div>
        <div class="card-body">
<h5 class="form-control form-control-lg">Name : {{$service->name}}</h5>
<p class="form-control form-control-lg">Description : {{$service->description}}</p>
<p class="form-control form-control-lg"> Price : {{$service->price}}</p>

</div>
</div>

 @endsection


   