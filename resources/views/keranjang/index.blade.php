@extends('app')

@section('title', 'elaptop - Keranjang')

@section('content')
    <div class="page-heading">
        <h3>keranjang</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="row" id="table-bordered">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel keranjang</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('/keranjang/create') }}" class="btn btn-primary rounded-pill"><i
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
                                        <th>Nama Produk</th>
                                        <th>banyak</th>
                                        <th>total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keranjang as $item)
                                        <tr>
                                            <td>{{ $loop->iteration + 5 * ($keranjang->currentpage() - 1) }}</td>
                                            <td>{{ $item->produk->nama }}</td>
                                            <td>Rp.{{ number_format($item->produk->harga) }}</td>
                                            <td>{{ $item->banyak }}</td>
                                            <td>Rp.{{ number_format($item->total_harga) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $keranjang->links() }}
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus keranjang</h1>
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
