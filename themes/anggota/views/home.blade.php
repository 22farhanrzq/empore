@extends('layouts.app')
@extends('layouts.navigation')

@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <table class="display" id="booksDatatable" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Judul Buku</th>
                            <th>Tahun Terbit</th>
                            <th>Penulis</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
        {{-- orderModal --}}
        <div class="modal fade" id="modal-order">
            <div class="modal-dialog">
                <div class="modal-content rounded-5 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <!-- <h5 class="modal-title">Modal title</h5> -->
                        <h2 class="fw-bold mb-0">Order Buku</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeOrderModal"></button>
                    </div>
        
                    <div class="modal-body p-5 pt-0">
                        <form class="">
                            @csrf
                            <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
                            <input name="id" type="hidden" id="book_id" readonly>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="kode_buku" placeholder="B001" readonly>
                                <label for="kode_buku">Kode Buku</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="judul_buku" placeholder="Judul Buku" readonly>
                                <label for="judul_buku">Judul Buku</label>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="tahun_terbit" placeholder="1999" readonly>
                                <label for="tahun_terbit">Tahun Terbit</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="penulis" placeholder="Nama Penulis" readonly>
                                <label for="penulis">Penulis</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="date" class="form-control rounded-4" id="tanggal_peminjaman" required>
                                <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="date" class="form-control rounded-4" id="tanggal_pengembalian" required>
                                <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                            </div>

                            <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit" id="storeOrder">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end orderModal --}}
    </div>
@endsection
