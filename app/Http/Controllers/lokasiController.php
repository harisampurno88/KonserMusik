<?php

namespace App\Http\Controllers;

use App\Models\lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class lokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = lokasi::where('id_lokasi', 'like', "%$katakunci%")
                ->orWhere('nama_lokasi', 'like', "%$katakunci%")
                ->orWhere('alamat', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = lokasi::orderBy('id_lokasi', 'desc')->paginate(3);
        }
        return view('lokasi.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_lokasi', $request->id_lokasi);
        Session::flash('nama_lokasi', $request->nama_lokasi);
        Session::flash('alamat', $request->alamat);

        $request->validate(
            [
                'id_lokasi' => 'required|integer|unique:lokasi,id_lokasi',
                'nama_lokasi' => 'required|string|max:100',
                'alamat' => 'required|string|max:255',
            ],
            [
                'id_lokasi.required' => 'ID Lokasi harus diisi',
                'id_lokasi.integer' => 'ID Lokasi harus berupa angka',
                'id_lokasi.unique' => 'ID Lokasi sudah ada',
                'nama_lokasi.required' => 'Nama Lokasi harus diisi',
                'nama_lokasi.string' => 'Nama Lokasi harus berupa teks',
                'nama_lokasi.max' => 'Nama Lokasi maksimal 100 karakter',
                'alamat.required' => 'Alamat harus diisi',
                'alamat.string' => 'Alamat harus berupa teks',
                'alamat.max' => 'Alamat maksimal 255 karakter',
            ]
        );
        $data = [
            'id_lokasi' => $request->id_lokasi,
            'nama_lokasi' => $request->nama_lokasi,
            'alamat' => $request->alamat,
        ];
        lokasi::create($data);
        return redirect()->to('lokasi')->with('success', 'Data Lokasi berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = lokasi::where('id_lokasi', $id)->first();
        return view('lokasi.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_lokasi' => 'required|string|max:100',
                'alamat' => 'required|string|max:255',
            ],
            [
               'nama_lokasi.required' => 'Nama Lokasi harus diisi',
               'nama_lokasi.string' => 'Nama Lokasi harus berupa teks',
               'nama_lokasi.max' => 'Nama Lokasi maksimal 100 karakter',
               'alamat.required' => 'Alamat harus diisi',
               'alamat.string' => 'Alamat harus berupa teks',
               'alamat.max' => 'Alamat maksimal 255 karakter',
            ]
        );
        $data = [
            'nama_lokasi' => $request->nama_lokasi,
            'alamat' => $request->alamat,
        ];
        lokasi::where('id_lokasi', $id)->update($data);
        return redirect()->to('lokasi')->with('success', 'Data Lokasi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        lokasi::where('id_lokasi', $id)->delete();
        return redirect()->to('lokasi')->with('success', 'Data Lokasi berhasil dihapus');
    }
}
