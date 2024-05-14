
@extends('layouts.guest')

@section('title', 'Авторизация')

@section('content')
    <form method="POST" action="{{ route('get.shared') }}">
        @csrf
        <div class="form-group">
            <div class="form-label-group">
                <label class="form-label" for="password">Пароль</label>
            </div>
            <div class="form-control-wrap">
                <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                </a>
                <input name="password" type="password" class="form-control form-control-lg" id="password" placeholder="Введите пароль">
                <input name="shared" value="{{ $shared_key }}" type="hidden">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Скачать</button>
        </div>
    </form>
@endsection
