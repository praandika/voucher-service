@extends('layouts.main')
@section('title','Your Voucher')

@section('content')
<div class="d-flex justify-content-center">
    <div class="redeemed" style="position: relative;">
        <img src="{{ asset('img/redeemed.png') }}" alt="Voucher Redeemed" style="border-radius: 20px; margin: 0 auto; margin-top: 100px;" width="300px">

        <div class="data" style="position: relative; text-align: center; bottom: 180px; color: #D9D9D9; font-size: 20px;">
            @forelse($data as $o)
                <p style="color: #CCCACA; font-weight: bold;">
                    {{ $o->plate_no }} <br>
                    {{ $o->name }}
                </p>
                <p>{{ $o->phone }}</p>
                <p>{{ $o->status }}</p>
            @empty
                <p>voucher's code doesn't exist</p>
            @endforelse
        </div>
    </div>
</div>
@endsection