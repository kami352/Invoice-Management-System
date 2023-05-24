@extends('layouts.master')
@section('content')
<div class="card">
<div class="card-header">client Page</div>
<div class="card-body">

<form action="{{ url('client') }}" method="post">

@csrf

<label>Name</label></br>
<input type="text" name="name" id="name" class="form-control">
@if($errors->get('name'))
@foreach($errors->get('name') as $e_message)
<span class="text-red sm-4">{{$e_message}}</span>
@endforeach
@endif
</br>

<label>Email</label></br>
<input type="text" name="email" id="email" class="form-control">
@if($errors->get('email'))
@foreach($errors->get('email') as $e_message)
<span class="text-red sm-4">{{$e_message}}</span>
@endforeach
@endif</br>
<label>tin_number</label> </br>
<input type="text" name="tin_number" id="tin_number" class="form-control">
@if($errors->get('tin_number'))
@foreach($errors->get('tin_number') as $e_message)
<span class="text-red sm-4">{{$e_message}}</span>
@endforeach
@endif</br>
<label>Address</label></br>
<input type="text" name="address" id="address" class="form-control">
@if($errors->get('address'))
@foreach($errors->get('address') as $e_message)
<span class="text-red sm-4">{{$e_message}}</span>
@endforeach
@endif
</br>
<label>Company name</label></br>
<input type="text" name="company_name" id="company_name" class="form-control">
@if($errors->get('company_name'))
@foreach($errors->get('company_name') as $e_message)
<span class="text-red sm-4">{{$e_message}}</span>
@endforeach
@endif
</br>
<label>Phone number</label></br>
<input type="text" name="phone_number" id="phone_number" class="form-control">
@if($errors->get('phone_number'))
@foreach($errors->get('phone_number') as $e_message)
<span class="text-red sm-4">{{$e_message}}</span>
@endforeach
@endif
</br>


<input type="submit" value="Save" class="btn btn-success"></br>

</form>
</div>
</div>

@endsection