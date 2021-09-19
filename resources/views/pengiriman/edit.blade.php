@extends('layout.index')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin
            {{-- <small>Control panel</small> --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class=""><a href=" {{ route('containers.index') }}">Admin</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Admin</h3>
                    </div>
                    @csrf
                    @method('put')
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name') ? old('name') : $container->name }}"
                                        placeholder="Masukkan Nama" required>
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label for="address">Alamat Kontainer</label>
                                    <input type="text" class="form-control" name="address" id="address"
                                        value="{{ old('address') ? old('address') : $container->address }}"
                                        placeholder="Masukkan Alamat Kontainer" required>
                                    <small class="text-danger">{{ $errors->first('address') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label for="phone">Nomor Telepon Kantor Kontainer</label>
                                    <input type="phone" class="form-control" name="phone" id="phone"
                                        value="{{ old('phone') ? old('phone') : $container->phone }}"
                                        placeholder="Masukkan Nomor Telepon Kontainer" required>
                                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Detail Purchase Order</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('good_id') ? 'has-error' : '' }}">
                                    <label for="good_id">Pilih Barang</label>
                                    <select class="form-control" required name="good_id" id="good_id">
                                        @foreach ($goods as $good)
                                            <option data-price="{{ $good->price }}" value="{{ $good->id }}">
                                                {{ $good->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">{{ $errors->first('good_id') }}</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('qty') ? 'has-error' : '' }}">
                                    <label for="qty">Jumlah</label>
                                    <input type="number" class="form-control" name="qty" id="qty"
                                        value="{{ old('qty') }}" placeholder="Masukkan jumlah" required>
                                    <small class="text-danger">{{ $errors->first('qty') }}</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button style="margin-top: 24px;" class="btn btn-primary" type="button"
                                    id="btnAddPreOrder">Tambah
                                    Detail Pengiriman Barang</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table" id="detail_pre_orders_table">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Sub Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                {{-- <p id="total" style="padding-left:8px"></p> --}}
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <a class="btn btn-default" href="{{ route('container.index') }}">Kembali</a>
                        <button class="btn btn-warning" type="submit">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->


@endsection
