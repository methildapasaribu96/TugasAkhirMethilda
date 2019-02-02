@extends('layouts.dashboard')

@section('breadcrumbs')
<li class="breadcrumb-item">
  Hasil Perankingan
</li>
@endsection

@section('content')
<div class="card mb3">
  <div class="card-header">
    Hasil Perankingan
  </div>

  <div class="card-body">
    <div class="panel-body"> 
      <p> 
        <a class="btn btn-primary" href="{{ url('/dashboard/exportranking') }}">Export</a> 
      </p> 
    </div>
    <table class="table table-bordered display">
      <tr>
        <th>Peringkat</th>
        <th>NIP</th>
        <th>Nama Guru</th>
        <th>Vektor</th>
      </tr>
      @foreach($V as $index => $value)
      <tr>
        <td>{{ $index+1 }}</td>
        <td>{{ $value[1] }}</td>
        <td>{{ $value[2] }}</td>
        <td>{{ number_format($value[3], 9, ',', '') }}</td>
      </tr> 
      </div>
      @endforeach
    </table>
  </div>
</div>
@endsection
