@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-6">

        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <form method="POST" action="/orders/save">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">No. Pesanan</label>
                <input type="text" class="form-control @error('no_pesanan') is-invalid @enderror" name="no_pesanan" aria-describedby="emailHelp">
                @error('no_pesanan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror datepicker" id="datepicker" name="tanggal">
                @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control @error('nm_supllier') is-invalid @enderror" name="nm_supllier">
                @error('nm_supllier')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nama Produk</label>
                <input type="text" class="form-control @error('nm_produk') is-invalid @enderror" name="nm_produk">
                @error('nm_produk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Total</label>
                <input type="text" class="form-control @error('total') is-invalid @enderror" name="total">
                @error('total')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="productDetailModalLabel">Product Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
    </div>
    </div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
      $( function() {
        $("#datepicker").datepicker();
    } );
</script>

@endsection
