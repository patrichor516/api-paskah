<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = "http://localhost:8000/api/barang";
        $response = $client->request( 'GET',$url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        $data =$contentArray['data'];
        return view('barang.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama_barang = $request->nama_barang;
        $jenis_barang = $request->jenis_barang;
        $stok_barang = $request->stok_barang;
        
        $parameter = [
            'nama_barang' => $nama_barang,
            'jenis_barang' => $jenis_barang,
            'stok_barang' => $stok_barang,
        ];
        $client = new Client();
        $url = "http://localhost:8000/api/barang";
        $response = $client->request( 'POST',$url,[
            'headers' =>['Content-type'=>'application/json'],
            'body' =>json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if ($contentArray['status'] !=true) {
            $error = $contentArray['data'];
            return redirect()->to('barang')->withErrors($error)->withInput();
        }else{
            return redirect()->to('barang')->with('success','berhasil masuk');
        }
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
        $client = new Client();
        $url = "http://localhost:8000/api/barang/$id";
        $response = $client->request( 'GET',$url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if ($contentArray['status'] != true) {
            $error = $contentArray['message'];
            return redirect()->to('barang')->withErrors($error);
        }else{
            $data = $contentArray['data'];
            return view('barang.index', ['data'=>$data]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nama_barang = $request->nama_barang;
        $jenis_barang = $request->jenis_barang;
        $stok_barang = $request->stok_barang;
        
        $parameter = [
            'nama_barang' => $nama_barang,
            'jenis_barang' => $jenis_barang,
            'stok_barang' => $stok_barang,
        ];
        $client = new Client();
        $url = "http://localhost:8000/api/barang/$id";
        $response = $client->request( 'PUT',$url,[
            'headers' =>['Content-type'=>'application/json'],
            'body' =>json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if ($contentArray['status'] !=true) {
            $error = $contentArray['data'];
            return redirect()->to('barang')->withErrors($error)->withInput();
        }else{
            return redirect()->to('barang')->with('success','berhasil update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $url = "http://localhost:8000/api/barang/$id";
        $response = $client->request('DELETE',$url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if ($contentArray['status'] !=true) {
            $error = $contentArray['data'];
            return redirect()->to('barang')->withErrors($error)->withInput();
        }else{
            return redirect()->to('barang')->with('success','berhasil hapus');
        }
    }
}
