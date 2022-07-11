@extends('layouts.main')
@section('title','Your Voucher')

@section('content')
<div class="d-flex justify-content-center">
    <!-- QR Code -->
    <div class="voucher" style="margin-top: 15px; margin-bottom: 15px; background: linear-gradient(175deg, rgba(0,93,207,1) 0%, rgba(0,255,209,1) 100%); padding: 15px; border-radius: 20px; position: relative; height: 705px;">
        @forelse($data as $o)
        <p style="text-align: center;">{!! QrCode::size(300)->generate('localhost/scanned/'.$o->code) !!}</p>
        @empty
        <p style="text-align: center;">voucher's code doesn't exist</p>
        @endforelse
    <!-- END QR Code -->

        <img src="{{ asset('img/discount.png') }}" alt="Discount Service" srcset="" width="300" style="margin-top: -5px; border-radius: 20px;">

        <div class="value" style="position: relative; bottom: 150px;">
            <p style="font-size: 70px; text-align: center; font-weight: bold; color: #EFDAD7;">20%</p>
        </div>
    </div>

    
</div>
@endsection