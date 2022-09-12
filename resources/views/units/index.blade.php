@extends('layouts.main')

@section('container')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
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
<a href="/units/create" class="btn btn-primary mb-4">Add new unit</a>
<table class="table table-bordered">
    <thead style="background-color: #c0c5c8">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Operator</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($units as $unit)
          <tr>
            <th scope="row"><?= $unit->unit_kode ?></th>
            <td><?= $unit->name ?></td>
            <td><?= $unit->operator ?></td>
            <td style="width: 20%">
              <a href="units/{{ $unit->unit_kode }}/edit" class="btn btn-warning">Edit</a>
              <form action="units/{{ $unit->unit_kode }}" method="POST" style="display: inline-block">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure about that?')">Delete</button>
              </form>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
  {{ $units->links() }}
@endsection