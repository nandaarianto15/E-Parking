@extends('layout.main')
@section('container')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            @foreach($prices as $p)
            <form action="{{ url('/pegawai/edit/') }}" method="POST">
                {{ csrf_field() }}
                {{-- <input type="text" name="id" value="{{ $p->id }}"> <br/> --}}
                Tipe Kendaraan <input type="text" required="required" name="tipe_kendaraan" value="{{ $p->tipe_kendaraan }}"> <br/>
                Harga <input type="text" required="required" name="harga" value="{{ $p->harga }}"> <br/>
                 <br/>
                <input type="submit" value="Simpan Data">
            </form>
            @endforeach
        </div>
    </div>
</div>

@endsection