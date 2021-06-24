<?php

namespace App\Http\Controllers;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\storage;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan=Laporan::all();
        $title="DATA LAPORAN";
        return view('admin.berandalaporan',compact('title','laporan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="INPUT LAPORAN";
        return view('admin.inputlaporan',compact('title'));
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
            'required'=> 'Kolom :attribute Harus Lengkap',
            'date'=>'Kolom :attribute Harus Tanggal',
            'numeric'=>'Kolom :attribute Harus Angka',
            ];
            $validasi=$request->validate([
                'nama'=>'required',
                'harga_barang'=>'required',
                'gambar'=>'required|mimes:jpg,bmp,png|max:512'
            ],$message);
            $path = $request->file('gambar')->store('gambars');
            $validasi['user_id']=Auth::id();
            $validasi['gambar']=$path;
            Laporan::create($validasi);
            return redirect('laporan')->with('success','Data Berhasil Tersimpan');
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
        $laporan=Laporan::find($id);
        $title="Edit Kegiatan";
        return view('admin.inputlaporan',compact('title','laporan'));
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
            'required'=> 'Kolom :attribute Harus Lengkap',
            'date'=>'Kolom :attribute Harus Tanggal',
            'numeric'=>'Kolom :attribute Harus Angka',
            ];
            $validasi=$request->validate([
                'nama'=>'required',
                'harga_barang'=>'required',
                'gambar'=>'required|mimes:jpg,bmp,png|max:512'
            ],$message);
            if($request->hasFile('gambar')){
            $fileName=time().$request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('gambars',$fileName);
                $validasi['gambar']=$path;
                $laporan=Laporan::find($id);
                Storage::delete($laporan->gambar);
            }
            $validasi['user_id']=Auth::id();
            Laporan::where('id',$id)->update($validasi);
            return redirect('laporan')->with('success','Data Berhasil Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporan=Laporan::find($id);
        if($laporan != null){
            Storage::delete($laporan->gambar);
            $laporan=Laporan::find($laporan->id);
            Laporan::where('id',$id)->delete();
        }
        return redirect('kegiatan')->with('sucess','Data berhasil terhapus');
    }
}
