@extends('layouts.app')
@extends('layouts.navigation')
@extends('layouts.sidebar')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">ANGGOTA</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Anggota</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    
    {{-- Content Starts HERE --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- Card Header --}}
                    <div class="card-body">
                        <button class="btn btn-block btn-primary mb-3 col-2" id="addUserModal">Tambah User</button>
                        <table class="display" id="usersDatatable" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

{{-- createUserModal --}}
<div class="modal fade" id="modal-create-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="user-modal-title">Tambah User</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- <form method="POST"> --}}
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <input name="id" id="id" type="hidden">
                        <div class="form-group">
                            <label for="name">Nama User</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Andi Mackarel">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="user@empore.com">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password">
                        </div>
                    </div>
                    <!-- /.card-body -->
    
                    {{-- <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div> --}}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal" id="closeUserModal">Close</button>
                    <button type="submit" class="btn btn-primary" id="storeUser">Tambah</button>
                </div>
            {{-- </form> --}}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
{{-- end createUserModal --}}

{{-- editUserModal --}}
<div class="modal fade" id="modal-edit-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="user-modal-title">Edit User</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- <form method="POST"> --}}
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <input name="id" id="editId" type="hidden">
                        <div class="form-group">
                            <label for="name">Nama User</label>
                            <input name="name" type="text" class="form-control" id="editName" placeholder="Andi Mackarel">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="editEmail" placeholder="user@empore.com" readonly>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="editPassword">
                        </div>
                    </div>
                    <!-- /.card-body -->
    
                    {{-- <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div> --}}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal" id="closeEditUserModal">Close</button>
                    <button type="submit" class="btn btn-primary" id="updateUser">Ubah</button>
                </div>
            {{-- </form> --}}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
{{-- end editUserModal --}}
@endsection