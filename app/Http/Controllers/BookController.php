<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Yajra\DataTables\DataTables;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::get();

        if(request()->ajax())
        {
            return datatables()->of($books)
            ->make(true);
        }

        return view('index');
    }

    public function apiGetBooks()
    {
        $books = Book::get();

        return response($books, 200);
        // return view('books');
    }

    // fungsi menampilkan data ke datatable pada auth anggota
    public function userIndex()
    {
        $books = Book::get();

        if(request()->ajax())
        {
            return datatables()->of($books)
            ->addColumn('aksi', function($books)
            {
                $button = "<button class='order btn btn-success' id='".$books->id."'>Order</button>";
                return $button;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }

        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_buku' => 'required',
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'penulis' => 'required',
            'stok' => 'required',
        ]);

        $book = Book::create($data);

        return response($book, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $book = Book::find($id);

        // return view('modalOrder', [
        //     '$book' => $book,
        // ]);
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
    public function update(Request $request, $kode)
    {
        $data = $request->validate([
            'kode_buku' => 'required',
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'penulis' => 'required',
            'stok' => 'required',
        ]);

        $book = Book::where('kode_buku', $kode)->update($data, $kode);

        return response($book, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode)
    {
        $book = Book::where('kode_buku', $kode)->delete();

        return response('book deleted', 200);
    }
}
