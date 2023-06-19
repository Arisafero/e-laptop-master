@extends('app')

@section('title', 'elaptop - Edit pengiriman')

@section('content')
    <div class="page-heading">
        <h3>Edit Pengiriman</h3>
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
                                <form class="form form-horizontal" action="{{ url('/pengiriman/'. $pengiriman->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <input type="hidden" value="{{ $pengiriman->id }}">
                                            <div class="col-md-4">
                                                <label>Nama Pengiriman</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="nama" class="form-control" name="nama"
                                                    value="{{ $pengiriman->nama }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Biaya</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="biaya" class="form-control" name="biaya"
                                                    value="{{ $pengiriman->biaya }}">
                                            </div>
                                            
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
