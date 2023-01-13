@extends('layout.main')
@section('container')
  
  {{-- <h2 class="mb-4">Hai {{ $user->name }}!</h2> --}}
  <h3>Para pegawai</h3>
  
  <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">No Hp</th>
            <th scope="col">Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
        ?>
        @foreach ($user as $user)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->nohp }}</td>
                <td>{{ $user->alamat }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
            
@endsection