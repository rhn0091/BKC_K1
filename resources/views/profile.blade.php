@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    @if (auth()->user()->role == 'user')
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-2">{{ __('Kembali ke laman Dashboard') }}</a>
                    @elseif (auth()->user()->role == 'konselor')
                        <a href="{{ route('konselor.dashboard') }}" class="btn btn-secondary mb-2">{{ __('Kembali ke laman Dashboard') }}</a>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            @if ($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" class="img-thumbnail rounded mx-auto d-block" alt="{{ __('Profile Photo') }}">
                            @else
                                <img src="{{ asset('img/profile.png') }}" class="img-thumbnail rounded mx-auto d-block" alt="{{ __('Profile Photo') }}">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Email Address') }}</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                @if (auth()->user()->role != 'user')
                                    <tr>
                                        <th>{{ __('Spesialisasi') }}</th>
                                        <td>{{ $user->spesialisasi }}</td>
                                    </tr>
                                @endif
                            </table>
                            <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">{{ __('Edit Profile') }}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
