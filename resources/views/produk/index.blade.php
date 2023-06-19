@extends('app')

@section('title', 'elaptop - Produk')

@section('content')
    <div class="page-heading">
        <h3>Produk</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="row" id="table-bordered">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <a href="{{ url('/produk/create') }}" class="btn btn-primary rounded-pill">+ Tambah</a>
                            </div>
                            <!-- table bordered -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Merek</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produk as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->merek->nama }}</td>
                                                <td><img src="{{ asset('assets/images/produk/' . $item->foto) }}"
                                                        width="150vh" alt="{{ $item->foto }}"></td>
                                                <td>
                                                    <a href="{{ url('/produk/' . $item->id . '/edit') }}"
                                                        class="btn btn-success">edit</a>
                                                    <form action="{{ url('/produk/' . $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
