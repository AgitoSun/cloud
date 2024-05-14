@extends('layouts.app')

@section('title', 'Пользователи')

@section('content')
    @include('layouts/modal/user-create')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Список пользователей</h3>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="d-none d-lg-flex">
                                    <div class="nk-fmg-actions">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-light" data-bs-toggle="modal">
                                                        <em class="icon ni ni-download-cloud"></em>
                                                        <span>Export</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#user-create" class="btn btn-primary" data-bs-toggle="modal">
                                                    <em class="icon ni ni-plus"></em>
                                                    <span>Добавить</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <li class="d-lg-none">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="dropdown">
                                            <em class="icon ni ni-menu-alt-r"></em>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                    <a href="#" data-bs-toggle="modal">
                                                        <em class="icon ni ni-download-cloud"></em>
                                                        <span>Export</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#user-create" data-bs-toggle="modal">
                                                        <em class="icon ni ni-plus"></em>
                                                        <span>Добавить</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="card card-bordered card-stretch">
                            <div class="card-inner-group">
                                <div class="card-inner p-0">
                                    <div class="nk-tb-list nk-tb-ulist">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col">
                                                <span class="sub-text">Пользователь</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-mb">
                                                <span class="sub-text">Хранилище</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-lg">
                                                <span class="sub-text">Создан</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="sub-text">Статус</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools text-end"></div>
                                        </div>
                                        @if($users)
                                            @foreach($users as $user)
                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col">
                                                        <a href="/demo3/user-details-regular.html">
                                                            <div class="user-card">
                                                                <div class="user-avatar bg-primary">
                                                                    <span>{{ mb_substr($user->profile->surname, 0, 1) }}{{ mb_substr($user->profile->name, 0, 1) }}</span>
                                                                </div>
                                                                <div class="user-info">
                                                                    <span class="tb-lead">{{ $user->profile->surname }} {{ $user->profile->name }}
                                                                        <span class="dot dot-success d-md-none ms-1"></span>
                                                                    </span>
                                                                    <span>{{ $user->email }}</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-mb">
                                                            <span>{{ \App\Helpers\FilesConvert::fileSizeSum($user->id) }} из {{ $user->setting->storage_limit }} GB</span>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-lg">
                                                        <span>{{ \Jenssegers\Date\Date::create($user->created_at)->format('j F Y') }}</span>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-md">
                                                        <span class="tb-status text-success">Active</span>
                                                    </div>
                                                    <div class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-1">
                                                            <li class="nk-tb-action-hidden">
                                                                <a href="#" class="btn btn-trigger btn-icon"
                                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                                   aria-label="Wallet" data-bs-original-title="Wallet">
                                                                    <em class="icon ni ni-wallet-fill"></em>
                                                                </a>
                                                            </li>
                                                            <li class="nk-tb-action-hidden">
                                                                <a href="#" class="btn btn-trigger btn-icon"
                                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                                   aria-label="Send Email"
                                                                   data-bs-original-title="Send Email">
                                                                    <em class="icon ni ni-mail-fill"></em>
                                                                </a>
                                                            </li>
                                                            <li class="nk-tb-action-hidden">
                                                                <a href="#" class="btn btn-trigger btn-icon"
                                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                                   aria-label="Suspend"
                                                                   data-bs-original-title="Suspend">
                                                                    <em class="icon ni ni-user-cross-fill"></em>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="drodown">
                                                                    <a href="#"
                                                                       class="dropdown-toggle btn btn-icon btn-trigger"
                                                                       data-bs-toggle="dropdown">
                                                                        <em class="icon ni ni-more-h"></em>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li>
                                                                                <a href="#">
                                                                                    <em class="icon ni ni-focus"></em>
                                                                                    <span>Quick View</span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <em class="icon ni ni-eye"></em>
                                                                                    <span>View Details</span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <em class="icon ni ni-repeat"></em>
                                                                                    <span>Transaction</span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <em class="icon ni ni-activity-round"></em>
                                                                                    <span>Activities</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="divider"></li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <em class="icon ni ni-shield-star"></em>
                                                                                    <span>Reset Pass</span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <em class="icon ni ni-shield-off"></em>
                                                                                    <span>Reset 2FA</span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <em class="icon ni ni-na"></em>
                                                                                    <span>Suspend User</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="g-3">
                                        <div class="g">
                                            <ul class="pagination justify-content-center justify-content-md-end">
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Prev</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">1</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <span class="page-link">
                                                        <em class="icon ni ni-more-h"></em>
                                                    </span>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">6</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">7</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
