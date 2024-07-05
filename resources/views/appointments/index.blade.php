@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Janji</h2>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">Buat Janji Baru</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Nama Konselor</th>
                <th>Waktu Janji</th>
                <th>Status</th>
                @if(Auth::user()->role == 'konselor')
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->user ? $appointment->user->name : 'N/A' }}</td>
                <td>{{ $appointment->konselor ? $appointment->konselor->name : 'N/A' }}</td>
                <td>{{ $appointment->appointment_time }}</td>
                <td>{{ $appointment->status }}</td>
                @if(Auth::user()->role == 'konselor')
                <td>
                    <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" onchange="this.form.submit()">
                            <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
