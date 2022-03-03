<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <ul>
        <ul><a href="{{ route('admin.home') }}">peminjaman</a></ul>
        <ul><a href="{{ route('admin.apiGetBooks') }}">buku</a></ul>
        <ul><a href="{{ route('admin.users') }}">user</a></ul>
    </ul>

    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <button class="btn btn-block btn-primary mb-3 col-2" id="addUserModal">Tambah User</button>
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
    </div>
</x-app-layout>