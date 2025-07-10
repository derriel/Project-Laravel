<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = DB::table('t_galeri')->get();
        return view('galeri', compact('galeri'));
    }

    public function create(Request $request)
    {
        $galeri = [
            'id' => '',
            'nama_photo' => '',
            'photo' => '',
        ];

        if ($request->input('id')) {
            $cek = DB::table('t_galeri')->where('id', $request->input('id'))->first();
            $galeri = [
                'id' => $cek->id,
                'nama_photo' => $cek->nama_photo,
                'photo' => $cek->photo
            ];
        }

        return view('formAddGaleri', ['galeri' => $galeri]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $path = $request->file('gambar')->store('public/images');
        $url = str_replace('public/', 'storage/', $path); // hasil: storage/images/nama.jpg
    
        DB::table('t_galeri')->insert([
            'nama_photo' => $request->input('judul'),
            'photo' => $url,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect()->route('galeri.index')->with('success', 'Gambar berhasil disimpan.');
    }
    public function destroy($id)
    {
        DB::table('t_galeri')->where('id', $id)->delete();
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
    public function edit($id)
{
    $galeri = DB::table('t_galeri')->where('id', $id)->first();

    if (!$galeri) {
        return redirect()->route('galeri.index')->with('error', 'Data tidak ditemukan.');
    }

    return view('formAddGaleri', compact('galeri'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = [
        'nama_photo' => $request->input('judul'),
        'updated_at' => now(),
    ];

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('public/images');
        $url = str_replace('public/', 'storage/', $path);
        $data['photo'] = $url;
    }

    DB::table('t_galeri')->where('id', $id)->update($data);

    return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
}
}