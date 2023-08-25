<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body class="bg-light">
    <main class="container">
        <!-- START FORM -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
        @if ($errors->any())
        </div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li> {{$item}} </li>
                @endforeach
            </ul>
            
        @endif

         @if (session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
                
        @endif

            <form action='' method='post'>
                @csrf
                @if (Route::current()->uri == 'barang/{id}')
                @method('put')
                @endif
                <div class="mb-3 row">
                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nama_barang' id="nama_barang" value="{{isset($data['nama_barang'])?$data['nama_barang']:old('nama_barang')}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jenis_barang" class="col-sm-2 col-form-label">Jenis Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='jenis_barang' id="jenis_barang" value="{{isset($data['jenis_barang'])?$data['jenis_barang']:old('jenis_barang')}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="stok_barang" class="col-sm-2 col-form-label">Stok Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name='stok_barang' id="stok_barang" value="{{isset($data['stok_barang'])?$data['stok_barang']:old('stok_barang')}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- AKHIR FORM -->
        @if (Route::current()->uri == 'barang')
            
        
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-4">Nama Barang</th>
                        <th class="col-md-3">Jenis barang</th>
                        <th class="col-md-2">Stok Barang</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>    
                    @foreach ($data as $item)
                    <tr> 
                        <td>{{ $i }}</td>
                        <td>{{$item['nama_barang']}}</td>
                        <td>{{$item['jenis_barang']}}</td>
                        <td>{{$item['stok_barang']}}</td>
                        <td>
                            <a href="{{ url('barang/'.$item['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{url('barang/'.$item['id'])}}"method="post" onsubmit="return confirm('yakin mau hapus?')" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                            
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                    
                </tbody>
            </table>

        </div>
        <!-- AKHIR DATA -->
        @endif
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>