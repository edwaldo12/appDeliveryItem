@extends('layout.index')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kontainer
            {{-- <small>Control panel</small> --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Kontainer</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-bottom: 15px">
            <div class="col-md-12">
                @if (Auth::user()->status == 'Admin')
                    <a href="{{ route('containers.create') }}" class="btn btn-primary">Tambah Kontainer</a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Admin</h3>
                    </div>
                    <div class="box-body">
                        <table class="table" id="containers_table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat Kontainer</th>
                                    <th>Nomor Telepn Kantor Kontainer</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($containers as $container)
                                    <tr>
                                        <td>{{ $container->name }}</td>
                                        <td>{{ $container->address }}</td>
                                        <td>{{ $container->phone }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('containers.edit', ['container' => $container->id]) }}"><i
                                                    class="fa fa-pencil"></i></a>
                                            <form onsubmit=" return confirm('Yakin ingin menghapus?')"
                                                action="{{ route('containers.destroy', ['container' => $container->id]) }}"
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
            $("#containers_table").DataTable()
        })
    </script>
@endpush
