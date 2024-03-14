@extends('layout.main')
@section('container')

<a href="{{ url('masuk') }}" type="submit" class="btn btn-primary mb-2"><i class='bx bx-left-arrow-alt'>Kembali</i></a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode</th>
            <th scope="col">Tanggal / Waktu masuk</th>
            <th scope="col">Status</th>
            <th scope="col">Gambar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
        ?>
        @foreach ($masuk as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->kode }}</td>
                <td>{{ $data->waktu_masuk }}</td>
                <td>{{ $data->status }}</td>
                <td><img src="{{ $data->gambar }}" alt="" value="">{{ $data->gambar }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>

@endsection
