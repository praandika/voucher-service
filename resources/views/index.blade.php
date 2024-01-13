@extends('layouts.main')
@section('title','Voucher Service Bisma')

@section('content')
<div class="d-flex justify-content-center" style="padding: 20px;">
    <div class="generate" style="padding: 20px; background-color:#FFFFFF; -webkit-box-shadow: 2px 2px 7px 3px rgba(240,240,240,1);
-moz-box-shadow: 2px 2px 7px 3px rgba(240,240,240,1);
box-shadow: 2px 2px 7px 3px rgba(240,240,240,1); border-radius: 20px; margin-top: 50px; width: 500px;">

        <img src="{{ asset('img/logo-bisma.png') }}" alt="Bisma"
            style="width: 100px; display: block; margin-left: auto; margin-right: auto; margin-bottom: 20px; color: #FFFFFF;">
        <h3 style="text-align: center; margin-bottom: 20px;">Anda mendapatkan promo <br><span
                style="color: red; font-weight: bold;">Diskon Service 20%</span>, Klaim voucher nya sekarang juga!</h3>
        <div class="garis" style="width: 100%; border: 1px dashed #BEBEBE; margin-bottom: 20px;"></div>
        <form action="{{ route('voucher.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="Phone" class="form-label">Kode Plat</label>
                    <input type="text" name="dk" class="form-control" id="Phone" placeholder="DK"
                        style="text-transform:uppercase" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="Phone" class="form-label">Nomor</label>
                    <input type="number" name="no" class="form-control" id="Phone" placeholder="xxxx" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="Phone" class="form-label">Huruf</label>
                    <input type="text" name="kode" class="form-control" id="Phone" placeholder="ABC"
                        style="text-transform:uppercase" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="Name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" id="Name" placeholder="Masukkan nama Anda"
                    style="text-transform:capitalize" required>
            </div>

            <div class="mb-3">
                <label for="Phone" class="form-label">Kontak</label>
                <input type="number" name="phone" class="form-control" id="Phone"
                    placeholder="Masukkan nomor HP/WA Anda" required>
            </div>

            <p style="color: red; font-size: 12px;">*Voucher hanya berlaku dengan no. Plat motor yang di daftarkan</p>

            <div class="container-btn">
                <button type="submit" class="btn btn-primary"
                    style="float: right; background: #125D98; border: 1px solid #125D98">Ambil Voucher</button>
            </div>
        </form>

        <a style="text-decoration: none; color: #125D98; font-weight:bold;" href="https://yamahabismagroup.com"
            target="_blank">&copy;Yamaha Bisma | Andika</a>
    </div>
</div>
@endsection
