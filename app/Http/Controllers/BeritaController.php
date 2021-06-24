<?php

namespace App\Http\Controllers;

use App\Models\stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita=stok::all();
        $title="Daftar Barang"; 
        return view('admin.beranda',compact('title','berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Input Berita";
        return view('admin.inputberita',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required' => 'Kolom :attribute Harus lengkap',
            'date'     => 'Kolom :attribute Harus Tanggal',
            'numeric'  => 'Kolom :attribute Harus Angka',
        ];
        $validasi=$request->validate([
            'nama_barang'=>'required|unique:stoks|max:255',
            'harga_barang'=>'required',
            'jumlah_barang'=>'required'
        ]);
        $validasi['id_barang']=Auth::id();
        stok::create($validasi);
        return redirect('berita')->with('success','Data Berhasil tersimpan');
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
        $berita=stok::find($id);
        $title="Edit data barang";
        return view('admin.inputberita', compact( 'title','berita'));
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
        $message=[
            'required' => 'Kolom :attribute Harus lengkap',
            'date'     => 'Kolom :attribute Harus Tanggal',
            'numeric'  => 'Kolom :attribute Harus Angka',
        ];
        $validasi=$request->validate([
            'nama_barang'=>'required',
            'harga_barang'=>'required',
            'jumlah_barang'=>'required',
        ],$message);
        $validasi['id_barang']=Auth::id();
        stok::where('id', $id)->update($validasi);
        return redirect('berita')->with('success','Data Berhasil tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $berita=stok::find($id);
         if ($berita != null){
             
             stok::where('id', $id)->delete();
         }
         return redirect('berita')->with('success','Data Berhasil terhapus');
    }
}
