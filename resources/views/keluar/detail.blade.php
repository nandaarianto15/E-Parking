@extends('layout.main')

@section('container')
<h1 > Bayar : <span style="color: red"> Rp {{ number_format($harga, '0', '.', '.')  }}</span> </h1>
<div class="container-fluid">
    <div class="card mx-3">
          
        <div class="card-body">
            <form action="/transaksi-keluar/{{ $kode }}" method="post">
                @csrf
                <input type="hidden" name="harga" value="{{ $harga }}">
                <input type="hidden" name="id_tarif" value="{{ $tarif }}">
                <input type="hidden" name="id_user" value="{{ $id }}">
                
                <div class="row">            
                  <div class="form-group col-6">
                        <h6>Kode Parkir</h6>
                        <input type="text" class="form-control form-control-sm @error('kode_parkir') is-invalid @enderror" placeholder="Kode Parkir" name="kode" value="{{ old('kode', $kode) }}" readonly>
                        @error('kode_parkir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <h6>Plat Kendaraan</h6>
                        <input type="text" maxlength="11" class="form-control form-control-sm @error('plat') is-invalid @enderror" placeholder="Plat Kendaraan" name="plat" value="{{ old('nomor_plat') }}" autofocus required>
                        @error('plat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                   {{-- <div class="form-group col-md-4">
                        <h6>Tipe Kendaraan </h6>
                        <select class="form-control" id="position-option" name="position_id">
                            <option value="tipe_kendaraan">Choose</option>
                        @foreach ($price as $price)
                            <option value="{{ $price->id }}">{{ $price->tipe_kendaraan }}</option>
                        @endforeach
                        </select>
                    </div> --}}
                    {{-- <div class="form-group col-md-4">
                        <h6>Tipe Kendaraan </h6>
                        {{ $masuk->price->id }}
                    </div>   --}}

                    <div class="form-group col-md-4">
                        <h6>Gambar</h6>
                        <img src="{{ asset('img/parkir/1.jpeg') }}" alt="" style="width: 50%">
                    </div>
                    
                    {{-- <div class="col-3">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                          </div>
                          <input type="text" class="form-control @error('tarif') is-invalid @enderror" placeholder="Total Biaya" value="{{ number_format( old('tarif', $tarif) , 0, '.', '.') }}" name="tarif" readonly>
                        </div>
                        @error('jenis_kendaraan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div> --}}

                  </div>
                  <div class="row">
                    <div class="form-group col-4">
                        <h6>Jam Masuk</h6>
                        <input type="text" class="form-control form-control-sm @error('start') is-invalid @enderror" placeholder="Jam Masuk" name="start" value="{{ old('start', $start->format('d-M-Y | H:i:s')) }}" readonly>
                        @error('start')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <h6>Jam Keluar</h6>
                        <input type="text" class="form-control form-control-sm @error('end') is-invalid @enderror" placeholder="Jam Keluar" value="{{ old('end', $end->format('d-M-Y | H:i:s')) }}" name="end" readonly>
                        @error('end')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <h6>Durasi Parkir</h6>
                        <input type="text" class="form-control form-control-sm @error('durasi') is-invalid @enderror" placeholder="Durasi Parkir" name="durasi" value="{{ old('durasi', $duration) }}" readonly>
                        @error('durasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                      
                    {{-- <div class="form-group col-6">
                        <h6>Jumlah Uang</h6>
                        <input type="text" class="form-control form-control-sm" placeholder="Jumlah Uang" id="total" onchange="kembalian()">
                    </div>
                    <div class="form-group col-6">
                        <h6>Kembalian</h6>
                        <input type="text" class="form-control form-control-sm" placeholder="Kembalian" id="kembalian" value="0" readonly>
                    </div> --}}
                    
                    <div class="col-1 mt-2">
                        <button type="submit" class="btn btn-primary mr-1">Simpan</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
