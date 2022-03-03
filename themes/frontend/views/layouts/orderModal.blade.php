<div class="modal fade" id="modal-order">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Buku</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode_buku">Kode Buku</label>
                            <input name="kode_buku" type="text" class="form-control" id="kode_buku" placeholder="cth: B001">
                        </div>
                        <div class="form-group">
                            <label for="judul_buku">Judul Buku</label>
                            <input name="judul_buku" type="text" class="form-control" id="judul_buku" placeholder="Judul Buku">
                        </div>
                        <div class="form-group">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input name="tahun_terbit" type="text" class="form-control" id="tahun_terbit" placeholder="cth: 1999">
                        </div>
                        <div class="form-group">
                            <label for="penulis">Penulis</label>
                            <input name="penulis" type="text" class="form-control" id="penulis" placeholder="Penulis">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                            <input name="tangal_peminjaman" type="date" class="form-control" id="tanggal_peminjaman">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                            <input name="tanggal_pengembalian" type="date" class="form-control" id="tanggal_pengembalian">
                        </div>
                    </div>
                    <!-- /.card-body -->
    
                    {{-- <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div> --}}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="storeOrder">Pinjam</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->