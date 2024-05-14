<li class="dropdown user-dropdown">
    <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
        <div class="user-toggle">
            <div class="user-avatar sm">
                <em class="icon ni ni-user-alt"></em>
            </div>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
            <div class="user-card">
                <div class="user-avatar">
                    <span>{{ mb_substr(Auth::user()->profile->surname, 0, 1) }}{{ mb_substr(Auth::user()->profile->name, 0, 1) }}</span>
                </div>
                <div class="user-info">
                    <span class="lead-text">{{ Auth::user()->profile->surname }} {{ Auth::user()->profile->name }}</span>
                    <span class="sub-text">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>
        <div class="dropdown-inner">
            <ul class="link-list">
                <li>
                    <a href="#">
                        <em class="icon ni ni-user-alt"></em>
                        <span>Профиль</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <em class="icon ni ni-setting-alt"></em>
                        <span>Настройки</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="dropdown-inner">
            <ul class="link-list">
                <li>
                    <form id="logout" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="javascript:{}" onclick="document.getElementById('logout').submit(); return false;">
                            <em class="icon ni ni-signout"></em>
                            <span>Выйти</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</li>
