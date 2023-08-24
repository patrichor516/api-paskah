<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = barang::orderBy('nama_barang','asc')->get(); 
       return response()->json([
        'status'=> true,
        'message'=> 'data found',
        'data'=> $data
       ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataBarang = new barang;

        $rules = [
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'stok_barang'  => 'required|numeric',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ]);
        }
       
        $dataBarang -> nama_barang = $request -> nama_barang;
        $dataBarang -> jenis_barang = $request -> jenis_barang;
        $dataBarang -> stok_barang = $request -> stok_barang;

        $post = $dataBarang -> save();

        return response()->json([
            'status' => true,
            'message' => 'sukses memasukkan data',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = barang::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data Ditemukan',
                'data' => $data
            ], 200);
        }   else {
            return response()->json([
                'status' => false,
                'message' => 'Tidak Ditemukan',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataBarang = barang::find($id);
        if(empty($dataBarang)){
            return response()->json([
                'status' => false,
                 'message' => 'Data Tidak Ditemukan',
            ]);
        }

        $rules = [
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'stok_barang'  => 'required|numeric',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Gagal update data',
                'data' => $validator->errors()
            ]);
        }
       
        $dataBarang -> nama_barang = $request -> nama_barang;
        $dataBarang -> jenis_barang = $request -> jenis_barang;
        $dataBarang -> stok_barang = $request -> stok_barang;

        $post = $dataBarang -> save();

        return response()->json([
            'status' => true,
            'message' => 'sukses update data',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataBarang = barang::find($id);
        if(empty($dataBarang)){
            return response()->json([
                'status' => false,
                 'message' => 'Data Tidak Ditemukan',
            ]);
        }

        $post = $dataBarang -> delete();

        return response()->json([
            'status' => true,
            'message' => 'sukses delete data',
        ]);
    }
}
