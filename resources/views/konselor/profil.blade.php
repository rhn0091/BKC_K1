@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profil Konselor') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($konselor->photo)
                                <img src="{{ asset('storage/photos/'.$konselor->photo) }}" class="img-thumbnail rounded mx-auto d-block" alt="Foto Profil Konselor">
                            @else
                                <img src="{{ asset('img/profile.png') }}" class="img-thumbnail rounded mx-auto d-block" alt="Default Profile Photo">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <th style="width: 30%;">{{ __('Nama') }}</th>
                                    <td>{{ $konselor->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Email') }}</th>
                                    <td>{{ $konselor->email }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Spesialis') }}</th>
                                    <td>{{ $konselor->spesialis }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">{{ __('Kembali ke Dashboard') }}</a>
                            <a href="{{ route('chat', $konselor->id) }}" class="btn btn-primary">{{ __('Chat dengan Konselor') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
