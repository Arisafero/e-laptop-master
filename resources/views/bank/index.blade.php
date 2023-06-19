@extends('app')

@section('title', 'elaptop - Bank')

@section('content')
    <div class="page-heading">
        <h3>Bank</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="row" id="table-bordered">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Bank</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('/bank/create') }}" class="btn btn-primary rounded-pill"><i
                                                class="fa-solid fa-file-circle-plus"></i>Tambah</a>
                                    </div>
                                    <div class="col">
                                        <form action="">
                                            <input type="text" name="q" value="{{ $q }}">
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
                                        <th>Nama Bank</th>
                                        <th>Nama User</th>
                                        <th>No. Rekening</th>
                                        <th>Logo</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bank as $item)
                                        <tr>
                                            <td>{{ $loop->iteration + 5 * ($bank->currentpage() - 1) }}</td>
                                            <td>{{ $item->nama_bank }}</td>
                                            <td>{{ $item->nama_pemilik }}</td>
                                            <td>{{ $item->no_rekening }}</td>
                                            <td><img src="{{ asset('assets/images/bank/' . $item->logo) }}" width="150vh"
                                                    alt="{{ $item->logo }}"></td>
                                            <td>
                                                <a href="{{ url('/bank/' . $item->id . '/edit') }}" type="submit"
                                                    class="btn btn-success"><i class="fa-solid fa-pencil"></i></a>

                                                <button id='buttonhapus' type="button" class="btn btn-danger"
                                                    data-id="{{ $item->id }}"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $bank->links() }}
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Merek</h1>
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
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script>
        $('body').on('click', '#buttonhapus', function(event) {
            var id = $(this).data('id');
            var url = "{{ url('/merek') }}/" + id;
            $('#modalHapus').modal('show');
            var form = document.getElementById('formHapus');
            form.action = url;
        })
    </script>
@endsection
