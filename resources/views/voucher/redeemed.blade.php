@extends('layouts.main')
@section('title','Your Voucher')

@section('content')
<div class="d-flex justify-content-center">
    <div class="redeemed" style="position: relative;">
        <img src="{{ asset('img/redeemed.png') }}" alt="Voucher Redeemed" style="border-radius: 20px; margin: 0 auto; margin-top: 100px;" width="300px">

        <div class="data" style="position: relative; text-align: center; bottom: 150px; color: #D9D9D9; font-size: 20px;">
            @forelse($data as $o)
                <p>
                    <span style="color: #CCCACA; font-weight: bold;">{{ $o->plate_no }}</span> <br>
                    <span style="color: #CCCACA;">{{ $o->name }}</span> <br>
                    <p>{{ $o->phone }}</p> <br>
                    <p>{{ $o->status }}</p>
                </p>
            @empty
                <p>voucher's code doesn't exist</p>
            @endforelse
        </div>
    </div>
</div>
@endsection