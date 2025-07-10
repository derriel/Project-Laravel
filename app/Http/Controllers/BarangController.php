<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        $data = "Derriel";
        $barang = DB::table('t_barang')->get();

        return view('dashboard', ['data' => $data, 'barang' => $barang]);
    }
    public function create(Request $request)
    {
        $barang = [
            'id' => '',
            'nama_barang' => '',
            'harga_barang' => '',
            'stock' => ''
        ];
        if ($request->input('id') != '') {
            $cek = \DB::table('t_barang')->where('id', $request->input('id'))->first();
            $barang = [
                'id' => $cek->id,
                'nama_barang' => $cek->nama_barang,
                'harga_barang' => $cek->harga_barang,
                'stock' => $cek->stock
            ];
        }
        return view('formAdd', ['barang' => $barang]);
    }
    public function destroy($id)
{
    DB::table('t_barang')->where('id', $id)->delete();
    return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
}
public function confirmDestroy($id)
{
    $barang = DB::table('t_barang')->where('id', $id)->first();

    if (!$barang) {
        return redirect()->route('barang.index')->with('error', 'Data tidak ditemukan');
    }

    return view('formDestroy', ['barang' => $barang]);
}
public function show($id)
{
    $cek = \DB::table('t_barang')->where('id', $id)->first();

    if (!$cek) {
        return redirect()->route('barang.index')->with('error', 'Data barang tidak ditemukan.');
    }

    $barang = [
        'id' => $cek->id,
        'nama_barang' => $cek->nama_barang,
        'harga_barang' => $cek->harga_barang,
        'stock' => $cek->stock
    ];

    return view('formView', ['barang' => $barang]);
}

    public function store(Request $request)
    {
        $task = $request->input("action_task");

        switch ($task) {
            case 'save_barang':
                $data = [
                    'nama_barang' => $request->input('nama_barang'),
                    'harga_barang' => $request->input('harga_barang'),
                    'stock' => $request->input('stock'),
                ];
                if ($request->input("id") != '') {
                    \DB::table('t_barang')->where('id', $request->input('id'))->update($data);
                    #\DB::table('t_barang')->update($data);
                } else {
                    \DB::table('t_barang')->insert($data);
                }
                return redirect('barang');
                break;
        }
    }
}