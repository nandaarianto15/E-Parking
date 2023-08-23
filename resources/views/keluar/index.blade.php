@extends('layout.main')
@section('container')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div>
                <form action="/transaksi-keluar" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label for="kode" class="col-md-1 col-form-label text-md-end">Kode :</label>
                        
                        <div class="col-5 ml-1">
                            <div class="input-group">
                                <input type="text" name="kode" id="kode" class="col-md-12 form-controller @error('kode') is-invalid @enderror" autocomplete="" autofocus required>
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-flat btn-info" style="float: right"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                </span> 
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mt-5">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-1">No</th>
                        <th class="col-2">Kode</th>
                        {{-- <th class="col-3">Gambar</th> --}}
                        {{-- <th class="col">No Plat</th> --}}
                        <th class="col-4">Waktu Masuk</th>
                        <th class="col">Plat</th>
                        {{-- <th class="col">Tipe Kendaraan</th> --}}
                        <th class="col">Durasi</th>
                        <th class="col">Tarif</th>
                        <th class="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                    ?>
                    @foreach ($masuk as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            {{-- <td>
                                <div class="col-md-1">{!! DNS1D::getBarcodeHTML("$data->kode", 'C39') !!}</div>
                            </td> --}}
                            <td>{{ $data->kode }}</td>
                            {{-- <td>{{ $data->gambar }}</td> --}}
                            {{-- <td>{{ $data->plat }}</td> --}}
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->plat }}</td>
                            <td>{{ $data->durasi }}</td>
                            <td>{{ $data->harga }}</td>
                            <td>{{ $data->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 

@endsection
                         {{-- <div class="row mb-3">
                            <label for="plat" class="col-md-1 col-form-label text-md-end">Plat :</label>
                            
                            <div class="col-md-5">
                                <input type="text" name="plat" id="plat" class="col-md-12 form-controller @error('plat') is-invalid @enderror" required autocomplete="" autofocus>                
                            </div>
                        </div> --}}