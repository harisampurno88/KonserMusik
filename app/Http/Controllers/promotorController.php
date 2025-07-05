<?php

namespace App\Http\Controllers;

use App\Models\promotor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class promotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = promotor::where('id_promotor', 'like', "%$katakunci%")
                ->orWhere('nama_promotor', 'like', "%$katakunci%")
                ->orWhere('email', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = promotor::orderBy('id_promotor', 'desc')->paginate(3);
        }
        return view('promotor.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promotor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_promotor', $request->id_promotor);
        Session::flash('nama_promotor', $request->nama_promotor);
        Session::flash('email', $request->email);

        $request->validate(
            [
                'id_promotor' => 'required|integer|unique:promotor,id_promotor',
                'nama_promotor' => 'required|string|max:100',
                'email' => 'required|string|max:255',
            ],
            [
                'id_promotor.required' => 'ID promotor harus diisi',
                'id_promotor.integer' => 'ID promotor harus berupa angka',
                'id_promotor.unique' => 'ID promotor sudah ada',
                'nama_promotor.required' => 'Nama promotor harus diisi',
                'nama_promotor.string' => 'Nama promotor harus berupa teks',
                'nama_promotor.max' => 'Nama promotor maksimal 100 karakter',
                'email.required' => 'Email harus diisi',
                'email.string' => 'Email harus berupa teks',
                'email.max' => 'Email maksimal 255 karakter',
            ]
        );
        $data = [
            'id_promotor' => $request->id_promotor,
            'nama_promotor' => $request->nama_promotor,
            'email' => $request->email,
        ];
        promotor::create($data);
        return redirect()->to('promotor')->with('success', 'Data promotor berhasil disimpan');
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
        $data = promotor::where('id_promotor', $id)->first();
        return view('promotor.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_promotor' => 'required|string|max:100',
                'email' => 'required|string|max:255',
            ],
            [
               'nama_promotor.required' => 'Nama promotor harus diisi',
               'nama_promotor.string' => 'Nama promotor harus berupa teks',
               'nama_promotor.max' => 'Nama promotor maksimal 100 karakter',
               'email.required' => 'Email harus diisi',
               'email.string' => 'Email harus berupa teks',
               'email.max' => 'Email maksimal 255 karakter',
            ]
        );
        $data = [
            'nama_promotor' => $request->nama_promotor,
            'email' => $request->email,
        ];
        promotor::where('id_promotor', $id)->update($data);
        return redirect()->to('promotor')->with('success', 'Data promotor berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        promotor::where('id_promotor', $id)->delete();
        return redirect()->to('promotor')->with('success', 'Data promotor berhasil dihapus');
    }
}
