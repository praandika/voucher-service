@extends('layouts.main')
@section('title','Your Voucher')

@section('content')
    @forelse($data as $o)
    <p>{!! QrCode::size(300)->generate('localhost/voucher/'.$o->code) !!}</p>
    @empty
    <p>no data available</p>
    @endforelse
@endsection