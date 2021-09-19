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
            <li class="active">Barang</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-bottom: 15px">
            <div class="col-md-12">
                <a href="{{ route('goods.create') }}" class="btn btn-primary">Tambah Barang</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Barang</h3>
                    </div>
                    <div class="box-body">
                        <table class="table" id="good_table">
                            <thead>
                                <tr>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Stock</th>
                                    <th>Nama Supplier</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($goods as $good)
                                    <tr>
                                        <td>ID-{{ sprintf('%04d', $good->id) }}</td>
                                        <td>{{ $good->name }}</td>
                                        <td>Rp.
                                            {{ number_format($good->price, 0, ',', '.') }}</td>
                                        <td>{{ $good->stock }} Pcs</td>
                                        <td>{{ $good->supplier_name }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('goods.edit', ['good' => $good->id]) }}"><i
                                                    class="fa fa-pencil"></i></a>
                                            <form action="{{ route('goods.destroy', ['good' => $good->id]) }}"
                                                onsubmit=" return confirm('Yakin ingin menghapus?')" method="POST"
                                                style="display: inline">
                                                @csrf
                                                @method("delete")
                                                <button class="btn btn-sm btn-danger" type="submit"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->


@endsection
@push('scripts')
    <script>
        $(function() {
            $("#good_table").DataTable()
        })
    </script>
@endpush
