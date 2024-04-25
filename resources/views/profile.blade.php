@extends('index')

@section('MainContent')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HTML Table dengan CSS Menarik</title>
 
<body>

<!-- Button Tambah Data -->
<a href="/tambahuser" class="btn btn-success">Tambah Data</a>

</body>
    <h1>Profile</h1>

  <table class="custom-table">
    <thead>
      <tr>
        <th>No</th>
        <th>Id</th>
        <th>Nama</th>
        <th>Kontak</th>
        <th>Foto</th>
      </tr>
    </thead>
    <tbody>
     @foreach($db as $asep)

     <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$asep->id}}</td>
        <td>{{$asep->nama}}</td>
        <td>{{$asep->kontak}}</td>
        <td><img src="{{asset('asset/img/' .$asep->foto)}}" alt="" width='100px'></td>
        <td style="text-align: center;">
        <a href="" class='btn btn-succes'>Edit</a>
        <a href="" class='btn btn-warning'>Detail</a>
        <a href="" class='btn btn-danger'>Remove</a>
</td>
</tr>
@endforeach

     
    </tbody>
  </table>
</body>
</html>
@endsection