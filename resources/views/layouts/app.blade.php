<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts/head')
<body class="nk-body npc-apps apps-only has-apps-sidebar npc-apps-files">
<div class="nk-app-root">
    <div class="nk-main ">
        <div class="nk-wrap ">
            @include('layouts/header/header')
            <div class="nk-content p-0">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <div class="nk-fmg">
                            @include('layouts/navbar')
                            <div class="nk-fmg-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts/scripts')
@yield('script')
@vite('resources/js/app.js')
</body>
</html>
