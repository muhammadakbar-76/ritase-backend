@extends('layouts.main')

@section('container')
<table class="table table-bordered">
    <thead style="background-color: #c0c5c8">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Kode Unit</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Material</th>
        <th scope="col">Kategori</th>
        <th scope="col">Keterangan</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($ritases as $ritase)
          <tr>
            <th scope="row"><?= $ritase->ritase_id ?></th>
            <td><?= $ritase->kode_unit ?></td>
            <td><?= $ritase->ritase_date ?></td>
            <td><?= $ritase->ritase_time ?></td>
            <td><?= $ritase->ritase_material ?></td>
            <td><?= $ritase->ritase_kategori ?></td>
            <td><?= $ritase->ritase_keterangan ?></td>
          </tr>
      @endforeach
    </tbody>
  </table>
  {{ $ritases->links() }}
@endsection