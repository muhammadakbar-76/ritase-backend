@extends('layouts.main')

@section('container')
<div class="flex mt-5" style="width: 80%; margin:auto">
    <h3 class="mb-4">Edit Unit</h3>
    @if(count($errors) > 0 )
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul class="p-0 m-0" style="list-style: none;">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    </div>
    @endif
    <form action="/units/{{$unit->unit_kode}}" method="POST">
        @method('put')
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $unit->name }}" name="name">
          @error('name')
            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Operator</label>
          <input type="text" class="form-control @error('operator') is-invalid @enderror" id="exampleInputPassword1" value="{{ $unit->operator }}" name="operator" aria-describedby="operatorHelp">
          @error('operator')
            <small id="operatorHelp" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection