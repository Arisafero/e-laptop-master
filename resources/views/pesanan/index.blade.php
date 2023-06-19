@extends('app')

@section('title', 'elaptop - pesanan')

@section('content')
    <div class="page-heading">
        <h3>pesanan</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="row" id="table-bordered">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel pesanan</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('/pesanan/create') }}" class="btn btn-primary rounded-pill"><i
                                                class="fa-solid fa-file-circle-plus"></i>Tambah</a>
                                    </div>
                                    <div class="col">
                                        <form action="">
                                            <input type="text" name="q" value="">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="fa-solid fa-magnifying-glass"></i>cari</button>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Bank Id</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Nomor telepon</th>
                                        <th>Metode pengiriman</th>
                                        <th>Metode bayar</th>
                                        <th>total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration + 5 * ($pesanan->currentpage() - 1) }}</td>
                                            <td>{{ $item->pesanan->nama }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->nomor_telepon }}</td>
                                            <td>{{ number_format ($item->metode_bayar) }}</td>
                                            <td>{{ $item->total }}</td>
                                            <td>{{ $item->Status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $pesanan->links() }}
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
    {{-- modal hapus --}}
    <div class="modal fade" id="modalHapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus pesanan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id='formHapus' action="" method="POST">
                        @csrf
                        @method('DELETE')
                        data::id
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                    <button type="submit" class="btn btn-danger">hapus</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
