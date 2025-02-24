<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\peminjam;
use App\Models\users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class peminjamcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = peminjam::with('buku')->get();
        $user = users::all();
        $usersname = Auth::user();
        return view('pinjam', ["data" => $data, "user" => $user, "usersname" => $usersname]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataBuku = buku::all();
        return view('pinjam.tambahpinjam', ["dataBuku" => $dataBuku]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        $request->validate([
            'nama_peminjam' => 'required',
            'kelas' => 'required',
            'nomor_hp' => 'required',
            'id_buku' => 'required',
            'jumlah_buku' => 'required'
        ]);

        $peminjam = new peminjam;
        $peminjam->nama_peminjam = $request->nama_peminjam;
        $peminjam->kelas = $request->kelas;
        $peminjam->nomor_hp = $request->nomor_hp;
        $peminjam->id_buku = $request->id_buku;
        $peminjam->jumlah_buku = $request->jumlah_buku;
        $peminjam->save();

        return redirect()->route('dashboardpeminjam')->with("succes","berhasil menambahkan data peminjam!!");
    }catch(Exception $e){
        return redirect()->back()->with('error', 'Gagal menyimpan data, silakan coba lagi!!');
    }
    }

    public function edit(string $id)
    {
        $peminjam = peminjam::findOrFail($id);
        $dataBuku = buku::all();
        return view('pinjam.editpinjam',['peminjam' => $peminjam, 'dataBuku' => $dataBuku]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'nama_peminjam' => 'required|min:6|string',
                'kelas' => 'required',
                'nomor_hp' => 'required|min:11|numeric',
                'id_buku' => 'required',
                'jumlah_buku' => 'required'
            ]);

            $peminjam = peminjam::findOrFail($id);
            $peminjam->nama_peminjam = $request->nama_peminjam;
            $peminjam->kelas = $request->kelas;
            $peminjam->nomor_hp = $request->nomor_hp;
            $peminjam->id_buku = $request->id_buku;
            $peminjam->jumlah_buku = $request->jumlah_buku;
            $peminjam->update();

            return redirect()->route('dashboardpeminjam')->with("succes","berhasil mengupdate data peminjam!!");
        }catch(Exception $e){
            return redirect()->back()->with("error","gagal mengupdate data peminjam!!". $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjam = peminjam::findOrFail($id);
        $peminjam->delete();
        return redirect()->route('dashboardpeminjam')->with('succes',"Data Berhasil Dihapus");
    }

    public function search(Request $request){
        try{
                $search = $request->input('search');

                if ($search){
                    $data = peminjam::where("nama_peminjam","LIKE","%$search%")
                    ->orWhere("kelas","LIKE","%$search%")
                    ->orWhere("nomor_hp","LIKE","%$search%")
                    ->orWhere("id_buku","LIKE","%$search%")
                    ->orWhereHas("buku",function($query) use ($search){
                        $query->where("nama_buku","LIKE","%$search%");
                    })->with("buku")
                    ->get();
                }else{
                    $data = peminjam::all();
                }

                return view("pinjam",["data" => $data,"search" => $search]);
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
