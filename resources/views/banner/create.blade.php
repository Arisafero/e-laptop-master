@extends('app')

@section('title', 'elaptop - tambah banner')

@section('content')
    <div class="page-heading">
        <h3>Tambah Banner {{ $angka }}</h3>
    </div>
    <div class="page-content">
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ url('/banner/' . $angka) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Gambar</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" id="gambar" class="form-control" name="gambar">
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="status" type="checkbox"
                                                    id="status" value="show" />
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Pilih untuk
                                                    menampilkan</label>
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