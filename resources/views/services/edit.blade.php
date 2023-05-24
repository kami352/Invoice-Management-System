@extends('layouts.master')
@section('content')

<div class="card">
<div class="card-header">Contactus Page</div>
<div class="card-body">

<form action="{{ url('services/'.$services->id) }}" method="POST">

@csrf
@method('PUT')
{{-- <input type="hidden" name="id" id="id" value="{{$services->id}}" id="id" /> --}}
<label>Name</label></br>

<input type="text" name="name" id="name" value="{{$services->name}}" class="form-control"> </br>
<label>Description</label></br>
<input type="text" name="description" id="desctiption" value="{{$services->description}}" class="form-control"></br>
<label>Price</label> </br>
<input type="text" name="price" id="price" value="{{$services->price}}" class="form-control"></br>
<input type="submit" value="Update" class="btn btn-success"></br>

</form>
</div>
</div>

 @endsection
