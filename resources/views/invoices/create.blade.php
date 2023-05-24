
@extends('layouts.master')
@section('content')
<div class="card">
<div class="card-header">Invoice Page</div>
<div class="card-body">
<div class="row">
	<a href="{{ url('/client/create') }}" class="btn btn-primary" title="Add New client">
	<i class="fa fa-plus" aria-hidden="true"></i>New Client
	</a>
</div>

<form action="/invoice" method="POST">
  @csrf
   <div>
    <label>Select a Client</label>
    <select class="select2bs4" id="clients" name="client_id" data-placeholder="Select a Client" style="width: 100%;">
        @foreach($clients as $client)
        <option value="{{$client->id}}">{{$client->name}}</option>
        @endforeach
    </select>
    @if($errors->get('client_id'))
      <span class="text-red sm-4">You have to choose a client</span>
      @endif
    </div>
    <br>

  <div>
  <label>Select a Service</label>
  <select class="select2bs4" multiple="multiple" id="services" data-placeholder="Select a Service"
                        style="width: 100%;">
      @foreach($services as $service)
      <option value="{{$service->id}}">{{$service->name}}</option>
      @endforeach
  </select>
  @if($errors->get('service_id'))
  @foreach($errors->get('service_id') as $e_message)
  <span class="text-red sm-4">{{$e_message}}</span>
  @endforeach
  @endif

  </div>
  <br>

  <label>Due Date</label> </br>
  <input type="date" name="due_date" id="due_date" class="form-control"></br>
  @if($errors->get('due_date'))
  @foreach($errors->get('due_date') as $e_message)
  <span class="text-red sm-4">{{$e_message}}</span>
  @endforeach
  @endif
  <input type="text" name="service_id" id="service_id" value="" hidden>
  <div>
    <label>Status</label>
    <select class="form-control select2 " name="status"
                          style="width: 100%;">
        <option value="PAID">PAID</option>
        <option value="UNPAID">UNPAID</option>
    </select>
    @if($errors->get('status'))
    @foreach($errors->get('status') as $e_message)
    <span class="text-red sm-4">{{$e_message}}</span>
    @endforeach
    @endif
  </div>
<br>
  <button onclick="getClientId(this)" class="btn btn-success">
    Save
  </button>
  </br>

    </form>
    </div>
  </div>
<script type="text/javascript">
	function getClientId(element){
    let options = document.querySelectorAll('#services option');
    document.querySelector('#service_id').value = '';
      for (var i = 0; i < options.length; i++) {
        if(options[i].selected)
          document.querySelector('#service_id').value +=  options[i].value + "|";
      }

	}
</script>
@endsection
