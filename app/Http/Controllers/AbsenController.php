<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen; // Pastikan untuk menyesuaikan nama model absen jika Anda memiliki model dengan nama lain

class AbsenController extends Controller
{
    // Menampilkan daftar absen
    public function index()
    {
        $absenList = Absen::all();
        return view('absen.index', ['absenList' => $absenList]);
        // return view('absen.index');
    }

    // Menampilkan formulir untuk membuat absen baru
    public function create()
    {
        return view('absen.create');
    }

    public function dataTable(Request $request)
    {
    if ($request->ajax()) {
        $query = Absen::query();

        // Cek apakah parameter 'nama' ada dalam permintaan
        if ($request->has('nama')) {
            $nama = $request->input('nama');
            $query->where('nama', 'like', '%' . $nama . '%');
        }
    }}
    // Menyimpan absen baru ke database
    public function store(Request $request)
    {

        Absen::create($request->all());

        return redirect()->route('absen.index')->with('success', 'Absen berhasil disimpan');
    }

    // Menampilkan detail absen berdasarkan ID
    public function show($id)
    {
        $absen = Absen::findOrFail($id);
        return view('absen.show', ['absen' => $absen]);
    }

    // Menampilkan formulir untuk mengedit absen berdasarkan ID
    public function edit($id)
    {
        $absenList = Absen::findOrFail($id);
        return view('absen.edit', ['data' => $absenList]);
    }

    // Memperbarui absen berdasarkan ID
    public function update(Request $request, Absen $data)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',

        ]);

        $data->update($request->all());

        return redirect()->route('absen.index')
        ->with('success', 'Data Target berhasil diperbarui! ');
    }

    // Menghapus absen berdasarkan ID
    public function destroy($id)
    {
        Absen::findOrFail($id)->delete();
        return redirect()->route('absen.index')->with('success', 'Absen berhasil dihapus');
    }
}
