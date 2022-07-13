@extends('layouts.main')
@section('title','Enter Pin')

@section('content')
<div class="d-flex justify-content-center" style="padding: 20px;">
    <div class="generate" style="padding: 20px; background-color:#FFFFFF; -webkit-box-shadow: 2px 2px 7px 3px rgba(240,240,240,1);
-moz-box-shadow: 2px 2px 7px 3px rgba(240,240,240,1);
box-shadow: 2px 2px 7px 3px rgba(240,240,240,1); border-radius: 20px; margin-top: 50px; width: 500px;">

        <img src="{{ asset('img/logo-bisma.png') }}" alt="Bisma"
            style="width: 100px; display: block; margin-left: auto; margin-right: auto; margin-bottom: 20px; color: #FFFFFF;">
        <h3 style="text-align: center; margin-bottom: 20px;">Enter PIN</h3><form action="{{ url('prosespin/'.$code) }}" method="post" enctype="multipart/form-data">
        <p style="color: red; font-size: 12px; text-align: center;">Tunjukan ke staff dealer untuk scan barcode</p>
            @csrf
            <div class="mb-3">
                <input type="number" name="pin" class="form-control" placeholder="PIN : XXXX"
                    style="text-align: center;" required>
            </div>

            <div class="container-btn" style="margin-bottom: 20px;">
                <center>
                    <button type="submit" class="btn btn-primary"
                    style="background: #125D98; border: 1px solid #125D98">Confirm</button>
                </center>
            </div>
        </form>

        <center>
            <a style="text-decoration: none; color: #125D98; font-weight:bold;" href="https://yamahabismagroup.com"
            target="_blank">&copy;Yamaha Bisma</a>
        </center>
    </div>
</div>
@endsection
