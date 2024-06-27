@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #007bff; color: white;">
                    {{ __('Profile') }}
                </div>

                <div class="card-body">
                    @if (auth()->user()->role == 'user')
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">{{ __('Kembali ke Dashboard') }}</a>
                    @elseif (auth()->user()->role == 'konselor')
                        <a href="{{ route('konselor.dashboard') }}" class="btn btn-secondary mb-3">{{ __('Kembali ke Dashboard Konselor') }}</a>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4 text-center mb-3">
                            @if ($user->photo)
                                <img src="{{ asset('storage/photos/' . $user->photo) }}" class="img-thumbnail rounded-circle" alt="{{ __('Profile Photo') }}">
                            @else
                                <img src="{{ asset('img/profile.png') }}" class="img-thumbnail rounded-circle" alt="{{ __('Profile Photo') }}">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <th style="width: 30%;">{{ __('Name') }}</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Email Address') }}</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                @if (auth()->user()->role != 'user')
                                    <tr>
                                        <th>{{ __('Spesialis') }}</th>
                                        <td>{{ $user->spesialis }}</td>
                                    </tr>
                                @endif
                            </table>
                            <div class="text-end">
                                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">{{ __('Edit Profile') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
