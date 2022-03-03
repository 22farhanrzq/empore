<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin Home</title>

        <!-- Scripts -->
        {{-- <script src="{{ mix('js/app.js', 'themes/admin') }}" defer></script> --}}

        <!-- Fonts -->
        {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

        <!-- Styles -->
        {{-- <link href="{{ mix('css/app.css', 'themes/admin') }}" rel="stylesheet"> --}}
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

        {{-- DataTables --}}
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.css"/> --}}
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css"> --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            @yield('navbar')

            @yield('sidebar')

            <div class="content-wrapper">

                @yield('content')

            </div>
        </div>
        
        {{-- script jquery --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

        {{-- javascript --}}
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        
        {{-- script css datatables --}}
        {{-- <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script> --}}

        {{-- script jquery datatables --}}
        {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> --}}
        {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script> --}}
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function ()
        {
            $('#ordersDatatable').DataTable({
                processing: true,
                serverside: true,
                responsive: true,
                ajax: "{{ route('admin.home') }}",
                columns: [
                    {data: 'user_id', name: 'user_id'},
                    {data: 'book_id', name: 'book_id'},
                    {data: 'tanggal_peminjaman', name: 'tanggal_peminjaman'},
                    {data: 'tanggal_pengembalian', name: 'tanggal_pengembalian'},
                ]
            });

            $('#booksDatatable').DataTable({
                    processing: true,
                    serverside: true,
                    responsive: true,
                    ajax: "{{ route('anggota.userIndex') }}",
                    columns: [
                        {data: 'kode_buku', name: 'kode_buku'},
                        {data: 'judul_buku', name: 'judul_buku'},
                        {data: 'tahun_terbit', name: 'tahun_terbit'},
                        {data: 'penulis', name: 'penulis'},
                        {data: 'stok', name: 'stok'},
                        {data: 'aksi', name: 'aksi'},
                    ]
            });

            $('#usersDatatable').DataTable({
                processing: true,
                serverside: true,
                responsive: true,
                ajax: "{{ route('admin.users') }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'aksi', name: 'aksi'},
                ]
            }); 
        });

        $('#addUserModal').on('click', function()
        {
            $("#modal-create-user").modal('show');
        })

        $('#storeUser').on('click', function()
        {
            $.ajax({
                url: "{{ route('admin.storeUser') }}",
                type: "post",
                data: {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                    _token: "{{ csrf_token() }}",
                },
                success: function(res)
                {
                    console.log(res);
                    alert(res.text)
                    $('#closeUserModal').click()
                    $('#usersDatatable').DataTable().ajax.reload()
                    $('#name').val(null)
                    $('#email').val(null)
                    $('#password').val(null)
                },
                error: function (xhr)
                {
                    alert(xhr.responseJson.text)
                }
            })
        })

        // --------------- script modal editUser
        $(document).on('click', '.edit', function()
        {
            let id = $(this).attr('id')

            $.ajax({
                url: "{{ route('admin.editUser') }}",
                type: "post",
                data: {
                    id : id,
                    _token : "{{ csrf_token() }}"
                },
                success: function(res)
                {
                    $("#modal-edit-user").modal('show');
                    $('#editId').val(res.user.id)
                    $('#editName').val(res.user.name)
                    $('#editEmail').val(res.user.email)
                    $('#editPassword').val(res.user.password)
                }
            })
        })
        // --------------- end script editUser modal 

        $('#updateUser').on('click', function()
        {
            $.ajax({
                url: "{{ route('admin.updateUser') }}",
                type: "post",
                data: {
                    id: $('#editId').val(),
                    name: $('#editName').val(),
                    email: $('#editEmail').val(),
                    password: $('#editPassword').val(),
                    _token: "{{ csrf_token() }}",
                },
                success: function(res)
                {
                    console.log(res);
                    alert(res.text)
                    $('#closeEditUserModal').click()
                    $('#usersDatatable').DataTable().ajax.reload()
                    $('#editName').val(null)
                    $('#editEmail').val(null)
                    $('#editPassword').val(null)
                },
                error: function (xhr)
                {
                    alert(xhr.responseJson.text)
                }
            })
        })

        $(document).on('click', '.delete', function()
        {
            let id = $(this).attr('id')

            $.ajax({
                url: "{{ route('admin.destroyUser') }}",
                type: "post",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(params){
                    alert(params.text)
                    $('#usersDatatable').DataTable().ajax.reload()
                }
            })
        })
    </script>
    </body>
</html>
