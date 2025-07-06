<?php

namespace App\Http\Controllers;

use App\Models\artis;
use App\Models\konser;
use App\Models\lokasi;
use App\Models\promotor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class konserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = konser::where('id_konser', 'like', "%$katakunci%")
                ->orWhere('nama_konser', 'like', "%$katakunci%")
                ->orWhere('tanggal', 'like', "%$katakunci%")
                ->orWhere('id_artis', 'like', "%$katakunci%")
                ->orWhere('id_lokasi', 'like', "%$katakunci%")
                ->orWhere('id_promotor', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = konser::orderBy('id_konser', 'desc')->paginate(3);
        }
        return view('konser.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artisList = artis::all();
        $lokasiList = lokasi::all();
        $promotorList = promotor::all();
        return view('konser.create', compact('artisList', 'lokasiList', 'promotorList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_konser', $request->id_konser);
        Session::flash('nama_konser', $request->nama_konser);
        Session::flash('tanggal', $request->tanggal);
        Session::flash('id_artis', $request->id_artis);
        Session::flash('id_lokasi', $request->id_lokasi);
        Session::flash('id_promotor', $request->id_promotor);

        $request->validate(
            [
                'id_konser' => 'required|integer|unique:konser,id_konser',
                'nama_konser' => 'required|string|max:100',
                'tanggal' => 'required|date',
                'id_artis' => 'required|integer',
                'id_lokasi' => 'required|integer',
                'id_promotor' => 'required|integer',
            ],
            [
                'id_konser.required' => 'ID Konser harus diisi',
                'id_konser.integer' => 'ID Konser harus berupa angka',
                'id_konser.unique' => 'ID Konser sudah ada',
                'nama_konser.required' => 'Nama Konser harus diisi',
                'nama_konser.string' => 'Nama Konser harus berupa teks',
                'nama_konser.max' => 'Nama Konser maksimal 100 karakter',
                'tanggal.required' => 'Tanggal harus diisi',
                'id_artis.required' => 'ID Artis harus diisi',
                'id_lokasi.required' => 'ID Lokasi harus diisi',
                'id_promotor.required' => 'ID Promotor harus diisi',
            ]
        );
        $data = [
            'id_konser' => $request->id_konser,
            'nama_konser' => $request->nama_konser,
            'tanggal' => $request->tanggal,
            'id_artis' => $request->id_artis,
            'id_lokasi' => $request->id_lokasi,
            'id_promotor' => $request->id_promotor,
        ];
        konser::create($data);
        return redirect()->to('konser')->with('success', 'Data Konser berhasil disimpan');
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
        $artisList = artis::all();
        $lokasiList = lokasi::all();
        $promotorList = promotor::all();
        $data = konser::where('id_konser', $id)->first();

        return view('konser.edit', compact('artisList', 'lokasiList', 'promotorList', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_konser' => 'required|string|max:100',
                'tanggal' => 'required|date',
                'id_artis' => 'required|integer',
                'id_lokasi' => 'required|integer',
                'id_promotor' => 'required|integer',
            ],
            [
                'nama_konser.required' => 'Nama Konser harus diisi',
                'nama_konser.string' => 'Nama Konser harus berupa teks',
                'nama_konser.max' => 'Nama Konser maksimal 100 karakter',
                'tanggal.required' => 'Tanggal harus diisi',
                'id_artis.required' => 'ID Artis harus diisi',
                'id_lokasi.required' => 'ID Lokasi harus diisi',
                'id_promotor.required' => 'ID Promotor harus diisi',
            ]
        );
        $data = [
            'nama_konser' => $request->nama_konser,
            'tanggal' => $request->tanggal,
            'id_artis' => $request->id_artis,
            'id_lokasi' => $request->id_lokasi,
            'id_promotor' => $request->id_promotor,
        ];
        konser::where('id_konser', $id)->update($data);
        return redirect()->to('konser')->with('success', 'Data Konser berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $konser = konser::where('id_konser', $id)->firstOrFail();

        if ($konser->tiket()->exists()) {
            return redirect()->to('konser')->with('error', 'Tidak bisa menghapus konser karena masih memiliki Tiket');
        }

        if ($konser->sponsor()->exists()) {
            return redirect()->to('konser')->with('error', 'Tidak bisa menghapus konser karena masih memiliki Sponsor');
        }

        konser::where('id_konser', $id)->delete();
        return redirect()->to('konser')->with('success', 'Data konser berhasil dihapus');
    }
}
