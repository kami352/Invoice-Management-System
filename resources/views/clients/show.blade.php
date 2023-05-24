@extends('layouts.master')
@section('content')

<div class="card card-primary mr-4">
        <div class="card-header">
          <h3 class="card-title">Client</h3>
        </div>
        <div class="card-body">
<h5 class="form-control form-control-lg">Name : {{$client->name}}</h5>
<p class="form-control form-control-lg">Email : {{$client->email}}</p>
<p class="form-control form-control-lg">Tin number : {{$client->tin_number}}</p>
<p class="form-control form-control-lg">Address : {{$client->address}}</p>
<p class="form-control form-control-lg">Company name: {{$client->company_name}}</p>
<p class="form-control form-control-lg">Phone number : {{$client->phone_number}}</p>

</div>
</div>

 @endsection