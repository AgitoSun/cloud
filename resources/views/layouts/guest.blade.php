
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts/head')
<body class="nk-body npc-default pg-auth no-touch nk-nio-theme">
<div class="nk-app-root">
    <div class="nk-main ">
        <div class="nk-wrap nk-wrap-nosidebar">
            <div class="nk-content ">
                <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                    <div class="card card-bordered">
                        <div class="card-inner card-inner-lg">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts/scripts')
</body>
</html>
