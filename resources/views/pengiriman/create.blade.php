@extends('app')

@section('title', 'elaptop - tambah pengiriman')

@section('content')
    <div class="page-heading">
        <h3>Tambah Pengiriman</h3>
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
                                <form class="form form-horizontal" action="{{ url('/pengiriman') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>nama pengiriman</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="nama" class="form-control" name="nama"
                                                    placeholder="Masukkan nama pengiriman">
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label>biaya</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="numbar" id="biaya" class="form-control" name="biaya"
                                                    placeholder="Masukkan norek">
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
