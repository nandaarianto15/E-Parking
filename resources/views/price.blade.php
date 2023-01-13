@extends('layout.main')
@section('container')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h3><i class='bx bxs-badge-dollar' ></i></h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tipe Kendaraan</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                    ?>
                    @foreach ($price as $price)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $price->tipe_kendaraan }}</td>
                            <td>{{ $price->harga }}</td>
                            <td>
                                <form method="POST" action="{{ url('price', $price->id ) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus barang ini ?');"><i class="fa fa-trash"></i></button>
                                </form> 
                            </td>
                            {{-- <td>
                                <form action="{{ url('/price/edit/', $price->id) }}" method="">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt"> </i></button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                TAMBAH DATA
            </button>      
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Kendaraan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('price') }}" method="POST">
                            @csrf
                            <label for="tipe_kendaraan" class="col-md-2 col-form-label text-md-end">Tipe:</label>
                            <input type="text" name="tipe_kendaraan" required="required"><br><br>
                            <label for="harga" class="col-md-2 col-form-label text-md-end">Harga</label>
                            <input type="text" maxlength="999999999999" onkeypress="return hanyaAngka(event)" name="harga" required="required"><br><br>
                            <script>
                                function hanyaAngka(event) {
                                var angka = (event.which) ? event.which : event.keyCode
                                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                                return false;
                                return true;
                            }
                            </script>
    
                            <style>
                                input::-webkit-outer-spin-button,
                                input::-webkit-inner-spin-button {
                                -webkit-appearance: none;
                                margin: 0;
                                }
                            </style>
                                <button type="submit" class="btn btn-primary" style="margin-left: 70%">Tambah</button>
                            </form>
                            <div class="modal-footer">
                        </div>
                    </div>  
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection