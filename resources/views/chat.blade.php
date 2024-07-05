@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Chat dengan Konselor: ') . $konselor->name }}</div>

                <div class="card-body">
                    <div id="chat-box" style="height: 300px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px;">
                        @foreach($messages as $message)
                            <div class="message">
                                <strong>{{ $message->user->name }}:</strong> {{ $message->message }}
                            </div>
                        @endforeach
                    </div>
                    <form id="chat-form" method="POST" action="{{ route('chat.store', $konselor->id) }}">
                        @csrf
                        <div class="input-group mt-3">
                            <input type="text" name="message" class="form-control" placeholder="Ketik pesan...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">{{ __('Kirim') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
