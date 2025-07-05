<?php

namespace App\Http\Controllers;

use App\Models\tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class tiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = tiket::where('id_tiket', 'like', "%$katakunci%")
                ->orWhere('id_konser', 'like', "%$katakunci%")
                ->orWhere('jenis_tiket', 'like', "%$katakunci%")
                ->orWhere('harga', 'like', "%$katakunci%")
                ->orWhere('stok', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = tiket::orderBy('id_tiket', 'desc')->paginate(3);
        }
        return view('tiket.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tiket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_tiket', $request->id_tiket);
        Session::flash('id_konser', $request->id_konser);
        Session::flash('jenis_tiket', $request->jenis_tiket);
        Session::flash('harga', $request->harga);
        Session::flash('stok', $request->stok);

        $request->validate(
            [
                'id_tiket' => 'required|string|max:20|unique:tiket,id_tiket',
                'id_konser' => 'required|integer',
                'jenis_tiket' => 'required|in:VVIP,VIP,Reguler',
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|integer|min:0',
            ],
            [
                'id_tiket.required' => 'ID Tiket harus diisi',
                'id_tiket.unique' => 'ID Tiket sudah ada',
                'id_konser.required' => 'ID Konser harus diisi',
                'jenis_tiket.required' => 'Jenis Tiket harus dipilih',
                'harga.required' => 'Harga harus diisi',
                'stok.required' => 'Stok harus diisi',
                'harga.numeric' => 'Harga harus berupa angka',
                'stok.integer' => 'Stok harus berupa angka',
            ]
        );
        $data = [
           'id_tiket' => $request->id_tiket,
           'id_konser' => $request->id_konser,
           'jenis_tiket' => $request->jenis_tiket,
           'harga' => $request->harga,
           'stok' => $request->stok,
        ];
        tiket::create($data);
        return redirect()->to('tiket')->with('success', 'Data Tiket berhasil disimpan');
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
        $data = tiket::where('id_tiket', $id)->first();
        return view('tiket.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate(
            [
                'id_konser' => 'required|integer',
                'jenis_tiket' => 'required|in:VVIP,VIP,Reguler',
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|integer|min:0',
            ],
            [
               'id_konser.required' => 'ID Konser harus diisi',
               'jenis_tiket.required' => 'Jenis Tiket harus dipilih',
               'harga.required' => 'Harga harus diisi',
               'stok.required' => 'Stok harus diisi',
               'harga.numeric' => 'Harga harus berupa angka',
               'stok.integer' => 'Stok harus berupa angka',
            ]
        );
        $data = [
            'id_konser' => $request->id_konser,
            'jenis_tiket' => $request->jenis_tiket,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];
        tiket::where('id_tiket', $id)->update($data);
        return redirect()->to('tiket')->with('success', 'Data Tiket berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        tiket::where('id_tiket', $id)->delete();
        return redirect()->to('tiket')->with('success', 'Data Tiket berhasil dihapus');
    }
}
