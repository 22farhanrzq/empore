<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Loan;
use Yajra\DataTables\DataTables;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Loan::get();

        if(request()->ajax())
        {
            return datatables()->of($orders)
            // ->addColumn('aksi', function($orders)
            // {
            //     $button = "<button class='order btn btn-success' id='".$orders->id."'>Order</button>";
            //     return $button;
            // })
            // ->rawColumns(['aksi'])
            ->make(true);
        }

        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;
        $book = Book::find($id);

        return response()->json(['book' => $book]);

        // return view('layouts.orderModal', [
        //     // 'book' => $book,
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'tanggal_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required',
        ]);

        $store = Loan::create($data);

        if($store)
        {
            return response()->json([
                'store' => $store,
                'text' => 'Order buku berhasil',
            ], 200);
        }else
        {
            return response()->json([
                'store' => $store,
                'text' => 'Order buku berhasil'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
