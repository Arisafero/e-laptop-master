@extends('app')

@section('title', 'elaptop - Edit Merek')

@section('content')
    <div class="page-heading">
        <h3>Edit Merek</h3>
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
                                <form class="form form-horizontal" action="{{ url('/bank/'. $bank->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <input type="hidden" value="{{ $bank->id }}">
                                            <div class="col-md-4">
                                                <label>Nama Bank</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="nama_bank" class="form-control" name="nama_bank"
                                                    value="{{ $bank->nama_bank }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nama pemilik</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="nama_pemilik" class="form-control" name="nama_pemilik"
                                                    value="{{ $bank->nama_pemilik }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Logo</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" id="logo" class="form-control" name="logo">
                                            </div>
                                            <img src="{{ asset('assets/images/bank/'. $bank->logo) }}" alt="" width="150vh">
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
