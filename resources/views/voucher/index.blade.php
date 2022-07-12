@extends('layouts.main')
@section('title','List Voucher')

@section('content')
<div class="container">
    <a class="dropdown-item" href="{{ route('logout') }}" style="color: red; margin-bottom: 20px;"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <div class="table-responsive-md">
        <table id="myTable" class="table table-sm table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Voucher Code</th>
                    <th>Plate Number</th>
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
                    <td>{{ $o->plate_no }}</td>
                    <td>{{ $o->name }}</td>
                    <td>{{ $o->phone }}</td>
                    <td>{{ $o->status }}</td>
                    <td>
                        <form action="{{ route('voucher.update', $o->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="update"
                                value="{{ $o->status == 'available' ? 'redeemed' : 'available' }}">
                            <button type="submit" class="btn btn-success" data-bs-toggle="tooltip"
                                title="Change Status"><i class="bi bi-arrow-repeat"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">no data available</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Voucher Code</th>
                    <th>Plate Number</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection
