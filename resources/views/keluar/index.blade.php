@extends('layout.main')
@section('container')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div>
                <form action="{{ url('keluar') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label for="kode" class="col-md-1 col-form-label text-md-end">Kode :</label>
                        
                        <div class="col-5 ml-1">
                            <div class="input-group">
                                <input type="text" name="kode" id="kode" class="col-md-12 form-controller @error('kode') is-invalid @enderror" autocomplete="" autofocus>
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-flat btn-info" style="float: right"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                </span>
                                {{-- <div class="col-md-4">
                                    <select class="form-control" id="position-option" name="position_id">
                                        @foreach ($price as $price)
                                           <option value="{{ $price->id }}">{{ $price->tipe_kendaraan }}</option>
                                        @endforeach
                                     </select>
                                </div> --}}
                            </div>
                        </div> 
                    </div>
                    
                </form>
            </div>
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