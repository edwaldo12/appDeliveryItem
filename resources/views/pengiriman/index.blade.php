@extends('layout.index')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pengiriman Barang
            {{-- <small>Control panel</small> --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pengiriman Barang</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-bottom: 15px">
            <div class="col-md-12">
                <a href="{{ route('sendingItems.create') }}" class="btn btn-primary">Tambah Barang Pengiriman</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Pengiriman</h3>
                    </div>
                    <div class="box-body">
                        <table class="table" id="sendingItems_table">
                            <thead>
                                <tr>
                                    <th>Nama Kontainer</th>
                                    <th>Barang Dikirim</th>
                                    <th>Jumlah Dikirim</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sendingItems as $sendingItem)
                                    <tr>
                                        <td>{{ $sendingItem->name }}</td>
                                        <td>{{ $sendingItem->address }}</td>
                                        <td>{{ $sendingItem->phone }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('sendingItems.edit', ['sendingItem' => $sendingItem->id]) }}"><i
                                                    class="fa fa-pencil"></i></a>
                                            <form onsubmit=" return confirm('Yakin ingin menghapus?')"
                                                action="{{ route('sendingItems.destroy', ['sendingItem' => $sendingItem->id]) }}"
                                                method="POST" style="display: inline">
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
            $("#sendingItems_table").DataTable()
        })
    </script>
@endpush
