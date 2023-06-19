@extends('app')

@section('title', 'elaptop - tambah bank')

@section('content')
    <div class="page-heading">
        <h3>Tambah Bank</h3>
    </div>
    <div class="page-content">
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Horizontal Form</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ url('/bank') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>nama bank</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="nama_bank" class="form-control" name="nama_bank"
                                                    placeholder="Masukkan nama bank">
                                            </div>
                                            <div class="col-md-4">
                                                <label>nama pemilik</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="nama_pemilik" class="form-control" name="nama_pemilik"
                                                    placeholder="Masukkan pemilik">
                                            </div>
                                            <div class="col-md-4">
                                                <label>no rekening</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="no_rekening" class="form-control" name="no_rekening"
                                                    placeholder="Masukkan norek">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Logo</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" id="logo" class="form-control" name="logo">
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
