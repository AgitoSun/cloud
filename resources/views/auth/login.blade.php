@extends('layouts.guest')

@section('title', 'Авторизация')

@section('content')
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Авторизация</h4>
            <div class="nk-block-des">
                <p>Получите доступ, используя свой адрес электронной почты и пароль.</p>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <div class="form-label-group">
                <label class="form-label" for="email">Email</label>
            </div>
            <div class="form-control-wrap">
                <input value="{{ old('email') }}" name="email" type="email" class="form-control form-control-lg" id="email" placeholder="Введите адрес электронной почты">
            </div>
        </div>
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
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Войти</button>
        </div>
    </form>
@endsection
