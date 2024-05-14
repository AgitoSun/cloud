<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="btn btn-trigger btn-icon toggle" data-target="files-aside">
                    <em class="icon ni ni-menu-alt-r"></em>
                </a>
            </div>
            @include('layouts/header/app-name')
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    @include('layouts/header/notification')
                    @include('layouts/header/account-setting')
                </ul>
            </div>
        </div>
    </div>
</div>
