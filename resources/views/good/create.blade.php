@extends('layout.index')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Barang
            {{-- <small>Control panel</small> --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class=""><a href=" {{ route('goods.index') }}">Barang</a></li>
            <li class="active">Tambah</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Barang</h3>
                    </div>
                    <form action="{{ route('goods.store') }}" method="POST">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">Nama Barang</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name') }}" placeholder="Masukkan Nama" required>
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                    </div>
                                    <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                        <label for="price">Harga</label>
                                        <input type="text" class="form-control" name="price" id="price"
                                            value="{{ old('price') }}" placeholder="Masukkan Harga" required>
                                        <small class="text-danger">{{ $errors->first('price') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('supplier_name') ? 'has-error' : '' }}">
                                        <label for="supplier_name">Nama Supplier</label>
                                        <input type="text" class="form-control" name="supplier_name" id="supplier_name"
                                            value="{{ old('supplier_name') }}" placeholder="Masukkan Supplier" required>
                                        <small class="text-danger">{{ $errors->first('supplier_name') }}</small>
                                    </div>
                                    <div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
                                        <label for="stock">Stok</label>
                                        <input type="number" class="form-control" name="stock" id="stock"
                                            value="{{ old('stock') }}" placeholder="Masukkan Stok Dalam Pcs" required
                                            min="1">
                                        <small class="text-danger">{{ $errors->first('stock') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <a class="btn btn-default" href="{{ route('goods.index') }}">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->


@endsection
