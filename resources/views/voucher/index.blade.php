@extends('layouts.main')
@section('title','List Voucher')

@section('content')
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Voucher Code</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php($no = 1)
            @forelse($data as $o)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $o->code }}</td>
                <td>{{ $o->name }}</td>
                <td>{{ $o->phone }}</td>
                <td>{{ $o->status }}</td>
                <td>
                    <form action="{{ route('voucher.update', $o->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="update" value="{{ $o->status == 'available' ? 'redeemed' : 'available' }}">
                        <button type="submit">Change</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">no data available</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Voucher Code</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
@endsection