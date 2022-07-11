@extends('layouts.main')
@section('title','Voucher Service Bisma')

@section('content')
<div class="d-flex justify-content-center">
    <div class="generate" style="padding: 20px; background-color:#FFFFFF; -webkit-box-shadow: 2px 2px 7px 3px rgba(240,240,240,1);
-moz-box-shadow: 2px 2px 7px 3px rgba(240,240,240,1);
box-shadow: 2px 2px 7px 3px rgba(240,240,240,1); border-radius: 20px; margin-top: 50px; width: 500px;">

        <img src="{{ asset('img/logo-bisma.png') }}" alt="Bisma" style="width: 100px; display: block; margin-left: auto; margin-right: auto; margin-bottom: 20px; color: #FFFFFF;">
        <h3 style="text-align: center; margin-bottom: 20px;">Anda mendapatkan promo <br><span style="color: red; font-weight: bold;">Diskon Service</span>, Klaim voucher nya sekarang juga!</h3>
        <div class="garis" style="width: 100%; border: 1px dashed #BEBEBE; margin-bottom: 20px;"></div>
        <form action="{{ route('voucher.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="Name"
                    placeholder="Masukkan nama Anda">
            </div>
            <div class="mb-3">
                <label for="Phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" id="Phone"
                    placeholder="Masukkan nomor HP/WA Anda">
            </div>
            <div class="container-btn">
                <button type="submit" class="btn btn-primary" style="float: right; background: #125D98; border: 1px solid #125D98">Ambil Voucher</button>
            </div>
        </form>

        <a style="text-decoration: none; color: #125D98; font-weight:bold;" href="https://yamahabismagroup.com" target="_blank">&copy;Yamaha Bisma</a>
    </div>
</div>
@endsection
