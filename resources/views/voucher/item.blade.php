@extends('layouts.main')
@section('title','Your Voucher')

@section('content')
<div class="d-flex justify-content-center">
    <!-- QR Code -->
    @forelse($data as $o)
    <p style="text-align: center;">{!! QrCode::size(200)->generate('localhost/scanned/'.$o->code) !!}</p>
    @empty
    <p style="text-align: center;">voucher's code doesn't exist</p>
    @endforelse
    <!-- END QR Code -->

    
</div>
@endsection