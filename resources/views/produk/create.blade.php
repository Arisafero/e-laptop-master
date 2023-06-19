@extends('app')

@section('title', 'elaptop - tambah produk')
se
@section('content')
    <div class="page-heading">
        <h3>Tambah produk</h3>
    </div>
    <div class="page-content">
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        {{-- @if ($errors->any())
                            @foreach ($errors->all() as $item)
                                <div class="alert alert-danger" role="alert">
                                    {{ $item }}
                                </div>
                            @endforeach
                        @endif --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ url('/produk') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Merek</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="form-select @error('merek_id') is-invalid @enderror"
                                                    name="merek_id" id="merek_id">
                                                    <option value="">--Pilih Salah Satu--</option>
                                                    @foreach ($merek as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    @error('merek_id') {{$message}} @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="nama"
                                                    class="form-control @error('nama') is-invalid @enderror @if(old('nama')) is-valid @endif" name="nama"
                                                    placeholder="Masukkan Nama" value="{{ old('nama') }}">
                                                <div class="invalid-feedback">
                                                    @error('nama')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Harga</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" min="0" max="999999999" id="harga"
                                                    class="form-control @error('harga') is-invalid @enderror" name="harga"
                                                    placeholder="Masukkan Harga" value="{{ old('harga') }}">
                                                <div class="invalid-feedback">
                                                    @error('harga')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Spesifikasi</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea type="text" id="spesifikasi" class="form-control @error('spesifikasi') is-invalid @enderror"
                                                    name="spesifikasi" rows="8">{{ old('spesifikasi') }}</textarea>
                                                <div class="invalid-feedback">
                                                    @error('spesifikasi')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Stok</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" min="0" max="999999999" id="stok"
                                                    class="form-control @error('stok') is-invalid @enderror" name="stok"
                                                    placeholder="Masukkan Stok" value="{{ old('stok') }}">
                                                    <div class="invalid-feedback">
                                                        @error('stok') {{$message}} @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Foto</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" id="foto"
                                                    class="form-control @error('foto') is-invalid @enderror" name="foto">
                                                    <div class="invalid-feedback">
                                                        @error('foto') {{$message}} @enderror
                                                    </div>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="rekomendasi" type="checkbox"
                                                    id="flexSwitchCheckChecked" value="ya" />
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Pilih
                                                    Rekomendasi</label>
                                            </div>

                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
