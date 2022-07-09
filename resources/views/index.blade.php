@extends('layouts.main')
@section('title','Voucher Service Bisma')

@section('content')
    <form action="{{ route('voucher.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="enter your name">
        <input type="text" name="phone" placeholder="enter your phone number">
        <button type="submit">Generate</button>
    </form>
@endsection