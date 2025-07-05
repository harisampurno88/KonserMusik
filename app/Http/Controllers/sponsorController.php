<?php

namespace App\Http\Controllers;

use App\Models\sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class sponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = sponsor::where('id_sponsor', 'like', "%$katakunci%")
                ->orWhere('nama_sponsor', 'like', "%$katakunci%")
                ->orWhere('id_konser', 'like', "%$katakunci%")
                ->orWhere('deskripsi', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = sponsor::orderBy('id_sponsor', 'desc')->paginate(3);
        }
        return view('sponsor.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sponsor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_sponsor', $request->id_sponsor);
        Session::flash('nama_sponsor', $request->nama_sponsor);
        Session::flash('id_konser', $request->id_konser);
        Session::flash('deskripsi', $request->deskripsi);

        $request->validate(
            [
                'id_sponsor' => 'required|integer|unique:sponsor,id_sponsor',
                'nama_sponsor' => 'required|string|max:100',
                'id_konser' => 'required|string|max:255',
                'deskripsi' => 'nullable|string|max:255',
            ],
            [
                'id_sponsor.required' => 'ID sponsor harus diisi',
                'id_sponsor.integer' => 'ID sponsor harus berupa angka',
                'id_sponsor.unique' => 'ID sponsor sudah ada',
                'nama_sponsor.required' => 'Nama sponsor harus diisi',
                'nama_sponsor.string' => 'Nama sponsor harus berupa teks',
                'nama_sponsor.max' => 'Nama sponsor maksimal 100 karakter',
                'id_konser.required' => 'ID konser harus diisi',
                'id_konser.string' => 'ID konser harus berupa teks',
                'id_konser.max' => 'ID konser maksimal 255 karakter',
                'deskripsi.string' => 'Deskripsi harus berupa teks',
                'deskripsi.max' => 'Deskripsi maksimal 255 karakter',
            ]
        );
        $data = [
            'id_sponsor' => $request->id_sponsor,
            'nama_sponsor' => $request->nama_sponsor,
            'id_konser' => $request->id_konser,
            'deskripsi' => $request->deskripsi,
        ];
        sponsor::create($data);
        return redirect()->to('sponsor')->with('success', 'Data sponsor berhasil disimpan');
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
        $data = sponsor::where('id_sponsor', $id)->first();
        return view('sponsor.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_sponsor' => 'required|string|max:100',
                'id_konser' => 'required|string|max:255',
                'deskripsi' => 'nullable|string|max:255',
            ],
            [
                'nama_sponsor.required' => 'Nama sponsor harus diisi',
                'nama_sponsor.string' => 'Nama sponsor harus berupa teks',
                'nama_sponsor.max' => 'Nama sponsor maksimal 100 karakter',
                'id_konser.required' => 'id_konser harus diisi',
                'id_konser.string' => 'id_konser harus berupa teks',
                'id_konser.max' => 'id_konser maksimal 255 karakter',
                'deskripsi.string' => 'Deskripsi harus berupa teks',
                'deskripsi.max' => 'Deskripsi maksimal 255 karakter',
            ]
        );
        $data = [
            'nama_sponsor' => $request->nama_sponsor,
            'id_konser' => $request->id_konser,
            'deskripsi' => $request->deskripsi,
        ];
        sponsor::where('id_sponsor', $id)->update($data);
        return redirect()->to('sponsor')->with('success', 'Data sponsor berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        sponsor::where('id_sponsor', $id)->delete();
        return redirect()->to('sponsor')->with('success', 'Data sponsor berhasil dihapus');
    }
}
