@extends('layout.main')
@section('container')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h3><i class="fa fa-user mb-3"> </i></h3>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td>:</td>
                        <td>{{ $user->nohp }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $user->alamat }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4><i class="fa fa-pencil-alt"> </i></h4><br>
            <form method="POST" action="{{ url('profil') }}">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email}}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nohp" class="col-md-2 col-form-label text-md-end">No HP</label>

                    <div class="col-md-6" id="staticParent">
                        <input id="nohp" type="text" maxlength="13" onkeypress="return hanyaAngka(event)" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ $user->nohp}}" required autocomplete="nohp" autofocus/>
                        
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

                        @error('nohp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="Alamat" class="col-md-2 col-form-label text-md-end">{{ __('Alamat') }}</label>

                    <div class="col-md-6">
                        {{-- <input id="Alamat" type="text" class="form-control @error('Alamat') is-invalid @enderror" name="Alamat" value="{{ $user->Alamat}}" required autocomplete="Alamat" autofocus> --}}
                        <textarea name="alamat" for="alamat" class="form-control @error('alamat')
                            is-invalid
                        @enderror" required="">{{ $user->alamat }}</textarea>

                        @error('Alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-2 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-2 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                           Save
                        </button>
                    </div>
                </div>
        </div>
    </div>

@endsection