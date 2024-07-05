@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Buat Janji Baru</h2>
    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="konselor_id">Pilih Konselor</label>
            <select name="konselor_id" id="konselor_id" class="form-control">
                @foreach($konselors as $konselor)
                <option value="{{ $konselor->id }}">{{ $konselor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="appointment_time">Waktu Janji</label>
            <input type="datetime-local" name="appointment_time" id="appointment_time" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Buat Janji</button>
    </form>
</div>
@endsection
