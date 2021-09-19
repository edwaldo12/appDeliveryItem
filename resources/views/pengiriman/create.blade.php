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
            <li class=""><a href=" {{ route('sendingItems.index') }}">Pengiriman Barang</a></li>
            <li class="active">Tambah</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Pengiriman Barang</h3>
                    </div>
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('container_id') ? 'has-error' : '' }}">
                                    <label for="container_id">Nama Kontainer</label>
                                    <select class="form-control" required="container_id" id="container_id">
                                        @foreach ($containers as $container)
                                            <option value="{{ $container->id }}">{{ $container->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group {{ $errors->has('receiver') ? 'has-error' : '' }}">
                                    <label for="receiver">Penerima Barang</label>
                                    <input type="text" class="form-control" name="qty" id="receiver"
                                        value="{{ old('receiver') }}" placeholder="Masukkan Penerima Barang" required>
                                    <small class="text-danger">{{ $errors->first('receiver') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
                                    <label for="number">Foto</label>
                                    <input type="file" name="filefield" multiple="multiple" class="form-control"
                                        name="foto" id="foto" value="{{ old('foto') }}"
                                        placeholder="Masukkan Jumlah Pesanan Barang" required>
                                    <small class="text-danger">{{ $errors->first('foto') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Detail Pengiriman Barang</h3>
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
                                    id="btnAddDetailSendingItems">Tambah
                                    Detail</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table" id="detail_sending_items">
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
                        <a class="btn btn-default" href="{{ route('sendingItems.index') }}">Kembali</a>
                        <button class="btn btn-primary" id="storeDetailItems">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->


    @push('scripts')
        <script>
            $(function() {
                let detailSendingItems = [];

                refreshTable();

                function refreshTable() {
                    let listDetail = "";
                    for (let i = 0; i < detailSendingItems.length; i++) {
                        listDetail += "<tr>" +
                            "<td>" + detailSendingItems[i].good_name + "</td>" +
                            "<td>" + formatRupiah(String(detailSendingItems[i].price)) + "</td>" +
                            "<td>" + detailSendingItems[i].qty + "</td>" +
                            "<td>" + formatRupiah(String(detailSendingItems[i].qty * detailSendingItems[i].price)) +
                            "</td>" +
                            "<td>" +
                            "<button class='btn btn-xs btn-danger btn-remove-details' data-index='" + i +
                            "'><i class='fa fa-close'></i></button>" +
                            "</td>" +
                            "</tr>"
                    }
                    $('#detail_sending_items tbody').html(listDetail);
                }
                $('#detail_sending_items').on('click', '.btn-remove-details', function() {
                    detailSendingItems.splice($(this).data('index'), 1);
                    refreshTable();
                });

                $("#btnAddDetailSendingItems").on('click', function() {
                    let cari = detailSendingItems.find(function(order) {
                        return order.good_id == $("select#good_id option:selected").val();
                    });
                    if (cari != undefined) {
                        let index = detailSendingItems.indexOf(cari)
                        detailSendingItems[index].qty += parseInt($("input#qty").val())
                        detailSendingItems[index].subtotal = parseInt(detailSendingItems[index].qty) * parseInt(
                            $("select#good_id option:selected").data('price'))
                    } else {
                        detailSendingItems.push({
                            'good_id': $("select#good_id option:selected").val(),
                            'good_name': $("select#good_id option:selected").text(),
                            'price': parseInt($("select#good_id option:selected").data('price')),
                            'qty': parseInt($("input#qty").val()),
                        })
                    }

                    refreshTable();
                })

                $("#storeDetailItems").on('click', function() {
                    if (!validate()) return
                    $.ajax({
                        type: "POST",
                        url: "{{ route('sendingItems.store') }}",
                        data: {
                            container_id: $("select#container_id option:selected").val(),
                            receiver: $("input#receiver").val(),
                            detailSendingItems: detailSendingItems,
                            _token: $("meta[name=csrf-token]").attr('content')
                        },
                        success: function(result) {
                            if (result.success) {
                                alert('Pengiriman Barang Berhasil ditambah.')
                                window.location.href = "{{ route('sendingItems.index') }}"
                            }
                        }
                    })
                })

                function validate() {
                    if ($("input#date").val() == "") {
                        alert('Harap isi tanggal')
                        return false
                    }
                    return true
                }


            });
        </script>
    @endpush
@endsection
