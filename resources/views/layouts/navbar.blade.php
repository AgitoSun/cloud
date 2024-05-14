<div class="nk-fmg-aside" data-content="files-aside" data-toggle-overlay="true" data-toggle-body="true" data-toggle-screen="lg" data-simplebar="">
    <div class="nk-fmg-aside-wrap">
        <div class="nk-fmg-aside-top">
            <ul class="nk-fmg-menu">
                @foreach ($menuData[0]->menu as $menu)
                    @if($menu->role !== 'admin')
                        @php
                            $activeClass = null;
                            $currentRouteName = \Illuminate\Support\Facades\Route::currentRouteName();
                            if ($currentRouteName === $menu->route) {
                                $activeClass = 'active';
                            }
                        @endphp
                        <li class="{{ $activeClass }}">
                            <a class="nk-fmg-menu-item" href="{{ route($menu->route) }}">
                                <em class="{{ $menu->icon }}"></em>
                                <span class="nk-fmg-menu-text">{{ $menu->name }}</span>
                            </a>
                        </li>
                    @else
                        @can('isAdmin', Auth::user())
                            @php
                                $activeClass = null;
                                $currentRouteName = \Illuminate\Support\Facades\Route::currentRouteName();
                                if ($currentRouteName === $menu->route) {
                                    $activeClass = 'active';
                                }
                            @endphp
                            <li class="{{ $activeClass }}">
                                <a class="nk-fmg-menu-item" href="{{ route($menu->route) }}">
                                    <em class="{{ $menu->icon }}"></em>
                                    <span class="nk-fmg-menu-text">{{ $menu->name }}</span>
                                </a>
                            </li>
                        @endcan
                    @endif

                @endforeach
            </ul>
        </div>
        <div class="nk-fmg-aside-bottom">
            <div class="nk-fmg-status">
                <h6 class="nk-fmg-status-title">
                    <em class="icon ni ni-hard-drive"></em>
                    <span>Хранилище</span>
                </h6>
                <div class="progress progress-md bg-light">
                    <div class="progress-bar" data-progress="{{ \App\Helpers\FilesConvert::limitProgressBar() }}"></div>
                </div>
                <div class="nk-fmg-status-info">{{ \App\Helpers\FilesConvert::fileSizeSum(Auth::id()) }} из {{ Auth::user()->setting['storage_limit'] }} GB занято</div>
            </div>
        </div>
    </div>
</div>
