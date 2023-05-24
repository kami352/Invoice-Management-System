@extends('layouts.master')
@section('content')

<div class="card">
<div class="card-header">Edit {{$invoices->invoice_number}}</div>
<div class="card-body">

<form action="{{ url('invoice/'.$invoices->id) }}" method="POST">

@csrf
@method('PUT')


<label>Total</label> </br>
<input type="text" name="total" id="total" value="{{$invoices->total}}" class="form-control"></br>

<label>Due Date</label> </br>
<input type="text" name="due_date" id="due_date" value="{{$invoices->due_date}}" class="form-control"></br>


<label>Status</label> </br>
<input type="text" name="status" id="status" value="{{$invoices->status}}" class="form-control"></br>
<input type="submit" value="Update" class="btn btn-success"></br>



</form>
</div>
</div>

 @endsection