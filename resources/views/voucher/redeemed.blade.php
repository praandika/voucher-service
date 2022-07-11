@extends('layouts.main')
@section('title','Your Voucher')

@section('content')
    @forelse($data as $o)
    <p>$o->name</p>
    <p>$o->phone</p>
    <p>$o->status</p>
    @empty
    <p>voucher's code doesn't exist</p>
    @endforelse
@endsection