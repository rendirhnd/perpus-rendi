<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\Peminjaman; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Redirect; 
 
class PeminjamanController extends Controller 
{ 
    /** 
     * Display a listing of the resource. 
     */ 
    public function index() 
    { 
        return view('pages.admin.peminjaman.index', [ 
            'title' => 'Peminjaman', 
            'peminjaman' => Peminjaman::all(), 
        ]); 
    } 
 
    /** 
     * Show the form for creating a new resource. 
     */ 
    public function create() 
    { 
        return view('pages.admin.peminjaman.create', [ 
            'title' => 'Tambah peminjaman', 
        ]); 
    } 
 
    /** 
     * Store a newly created resource in storage. 
     */ 
    public function store(Request $request) 
    { 
        $request->validate([ 
            'id_buku' => 'required', 
            'id_anggota' => 'required', 
            'tanggal_pinjam' => 'required', 
            'tanggal_kembali' => 'required', 
            'denda' => 'required', 
            'id_status_peminjaman' => 'required', 
             
        ]); 
 
        Peminjaman::create([ 
            'id_buku' => $request->id_buku, 
            'id_anggota' => $request->id_anggota, 
            'tanggal_pinjam' => $request->tanggal_pinjam, 
            'tanggal_kembali' => $request->tanggal_kembali, 
            'denda' => $request->denda, 
            'id_status_peminjaman' => $request->id_status_peminjaman 
 
 
        ]); 
 
        return Redirect::route('peminjaman_index')->with('toast_success', 'Data Berhasil Ditambahkan!'); 
    } 
 
    /** 
     * Display the specified resource. 
     */ 
    public function show($id) 
    { 
        
        $data = Peminjaman::findOrFail($id); 
 
        return view('pages.admin.peminjaman.show', [ 
            'data' => $data 
        ]); 
    } 
 
    /** 
     * Show the form for editing the specified resource. 
     */ 
    public function edit($id) 
    { 
        $item = Peminjaman::findOrFail($id); 
 
         return view('pages.admin.peminjaman.edit', [ 
            'item' => $item 
        ]); 
    } 
 
    /** 
     * Update the specified resource in storage. 
     */ 
    public function update(Request $request, Peminjaman $peminjaman ) 
    { 
        $request->validate([ 
            'id_buku' => 'required', 
            'id_anggota' => 'required', 
            'tanggal_pinjam' => 'required', 
            'tanggal_kembali' => 'required', 
            'denda' => 'required', 
            'id_status_peminjaman' => 'required', 
            
        ]); 
 
        $peminjaman->update([ 
            'id_buku' => $request->id_buku, 
            'id_anggota' => $request->id_anggota, 
            'tanggal_pinjam' => $request->tanggal_pinjam, 
            'tanggal_kembali' => $request->tanggal_kembali, 
            'denda' => $request->denda, 
            'id_status_peminjaman' => $request->id_status_peminjaman, 
 
             
        ]); 
 
        return redirect()->route('peminjaman_index')->with('toast_success', 'Data Berhasil Dirubah!'); 
    } 
 
    /** 
     * Remove the specified resource from storage. 
     */ 
    public function destroy(Peminjaman $peminjaman) 
    { 
        Peminjaman::destroy($peminjaman->id); 
 
        return redirect('/peminjaman')->with('toast_success', 'Data Berhasil Dihapus!'); 
    } 
}