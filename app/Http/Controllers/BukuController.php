<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bukucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data = buku::all();
        return view('buku',['data' => $data, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku/tambahbuku');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        $request->validate([
            'nama_buku' => 'required|string',
            'pengarang' => 'required|string',
            'jumlah_buku' => 'required|integer',
        ]);

        buku::create([
            'nama_buku' => $request->nama_buku,
            'pengarang' => $request->pengarang,
            'jumlah_buku' => $request->jumlah_buku,
        ]);

        return redirect()->route('dashboardbuku')->with('succes',"Data Berhasil Ditambahkan");
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Gagal menyimpan data: '. $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = buku::find($id);
        return view('buku.editbuku',["buku" => $buku]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
        $request->validate([
            'nama_buku' => 'required|string',
            'pengarang' => 'required|string',
            'jumlah_buku' => 'required|integer',
        ]);

        $buku = buku::findOrFail($id);
        $buku->nama_buku = $request->nama_buku;
        $buku->pengarang = $request->pengarang;
        $buku->jumlah_buku = $request->jumlah_buku;
        $buku->update();

        return redirect()->route('dashboardbuku')->with('succes',"Data Berhasil Diedit");
    }catch(Exception $e){
        return redirect()->back()->with('error', 'Gagal mengedit data');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = buku::find($id);
        $buku->delete();
        return redirect()->route('dashboardbuku')->with('succes',"Data Berhasil Dihapus");
    }

    public function search(Request $request){
        try{
            $search = $request->input('search');

            if($search){
                $data = buku::where("nama_buku" ,"like","%{$search}%")
                ->orWhere("pengarang","LIKE","%{$search}%")
                ->get();
            }else{
                $data = buku::all();
            }

            return view("buku",["data" => $data,"search" => $search]);
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
