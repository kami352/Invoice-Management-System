
@extends('layouts.master')
@section('content')
<div class="card">
<div class="card-header">Service Page</div>
<div class="card-body">

<form action="{{ url('service') }}" method="post">

@csrf

<label>Name</label></br>
<input type="text" name="name" id="name" class="form-control"></br>

<label>description</label></br>
<input type="text" name="description" id="description" class="form-control"></br>

<label>price</label> </br>
<input type="number" name="price" id="price" class="form-control"></br>

<input type="submit" value="Save" class="btn btn-success"></br>

</form>
</div>
</div>
@endsection