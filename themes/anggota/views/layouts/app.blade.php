<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon.ico">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.css"/> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css"> --}}

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Bootstrap</title>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
        </symbol>
    </svg>
</head>
<body>

    @yield('content')
    
    {{-- jquery scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- bootstrap script --}}
        {{-- bundle --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        {{-- separate --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}} 
    
    {{-- datatables scripts --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script> --}}

    <script>
        $(document).ready(function ()
        {
            $('#booksDatatable').DataTable({
                    processing: true,
                    serverside: true,
                    // responsive: true,
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
        });

        // --------------- script modal order
        $(document).on('click', '.order', function()
        {
            let id = $(this).attr('id')

            $.ajax({
                url: "{{ route('anggota.orderBook') }}",
                type: "post",
                data: {
                    id : id,
                    _token : "{{ csrf_token() }}"
                },
                success: function(res)
                {
                    $('#modal-order').modal('show')
                    $('#book_id').val(res.book.id)
                    $('#kode_buku').val(res.book.kode_buku)
                    $('#judul_buku').val(res.book.judul_buku)
                    $('#tahun_terbit').val(res.book.tahun_terbit)
                    $('#penulis').val(res.book.penulis)
                }
            })
        })
        // --------------- end script order modal 

        // function orderModal()
        // {
        //     $.get("{{ route('anggota.orderBook') }}", {}, function(data, status)
        //     {
        //         $("#orderPage").html(data);
        //         $("#modal-order").modal('show');
        //     });
        // }

        $('#storeOrder').on('click', function()
        {
            $.ajax({
                url: "{{ route('anggota.storeOrder') }}",
                type: "post",
                data: {
                    // id: $('#id').val(),
                    user_id: $('#user_id').val(),
                    book_id: $('#book_id').val(),
                    tanggal_peminjaman: $('#tanggal_peminjaman').val(),
                    tanggal_pengembalian: $('#tanggal_pengembalian').val(),
                    _token: "{{ csrf_token() }}",
                },
                success: function(res)
                {
                    console.log(res);
                    alert(res.text)
                    $('#closeOrderModal').click()
                    // $('#booksDatatable').DataTable().ajax.reload()
                    $('#tanggal_peminjaman').val(null)
                    $('#tanggal_pengembalian').val(null)
                },
                error: function (xhr)
                {
                    alert(xhr.responseJson.text)
                }
            })
        })
    </script>
</body>
</html>
