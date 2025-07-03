<?php

namespace App\Http\Controllers;

use App\Models\artis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class artisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = artis::where('id_artis', 'like', "%$katakunci%")
                ->orWhere('nama_artis', 'like', "%$katakunci%")
                ->orWhere('genre', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = artis::orderBy('id_artis', 'desc')->paginate(3);
        }
        return view('artis.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_artis', $request->id_artis);
        Session::flash('nama_artis', $request->nama_artis);
        Session::flash('genre', $request->genre);

        $request->validate(
            [
                'id_artis' => 'required|integer|unique:artis,id_artis',
                'nama_artis' => 'required|string|max:100',
                'genre' => 'required|string|in:Pop,EDM,Dangdut,Rock',
            ],
            [
                'id_artis.required' => 'ID Artis harus diisi',
                'id_artis.integer' => 'ID Artis harus berupa angka',
                'id_artis.unique' => 'ID Artis sudah ada',
                'nama_artis.required' => 'Nama Artis harus diisi',
                'nama_artis.string' => 'Nama Artis harus berupa teks',
                'nama_artis.max' => 'Nama Artis maksimal 100 karakter',
                'genre.required' => 'Genre harus dipilih',
                'genre.in' => 'Genre harus salah satu dari Pop, EDM, Dangdut, atau Rock',
            ]
        );
        $data = [
            'id_artis' => $request->id_artis,
            'nama_artis' => $request->nama_artis,
            'genre' => $request->genre,
        ];
        artis::create($data);
        return redirect()->to('artis')->with('success', 'Data Artis berhasil disimpan');
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
        $data = artis::where('id_artis', $id)->first();
        return view('artis.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_artis' => 'required|string|max:100',
                'genre' => 'required|string|in:Pop,EDM,Dangdut,Rock',
            ],
            [
               'nama_artis.required' => 'Nama Artis harus diisi',
               'nama_artis.string' => 'Nama Artis harus berupa teks',
               'nama_artis.max' => 'Nama Artis maksimal 100 karakter',
               'genre.required' => 'Genre harus dipilih',
               'genre.in' => 'Genre harus salah satu dari Pop, EDM, Dangdut, atau Rock',
            ]
        );
        $data = [
            'nama_artis' => $request->nama_artis,
            'genre' => $request->genre,
        ];
        artis::where('id_artis', $id)->update($data);
        return redirect()->to('artis')->with('success', 'Data Artis berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        artis::where('id_artis', $id)->delete();
        return redirect()->to('artis')->with('success', 'Data Artis berhasil dihapus');
    }
}
