@extends('layouts.app')

@section('title', 'Корзина')

@section('content')
@include('layouts/search')
<div class="nk-fmg-body-content">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between position-relative">
            <div class="nk-block-head-content">
                <div class="nk-block-head-content d-none d-lg-block">
                    <ul class="nk-block-tools g-3">
                        <li>
                            <a onclick="javascript:history.back(); return false;" class="btn btn-trigger btn-icon btn-tooltip" aria-label="Назад" data-bs-original-title="Prev Page">
                                <em class="icon ni ni-arrow-left"></em>
                            </a>
                        </li>
                        <li class="d-flex flex-column">
                            <h3 class="nk-block-title page-title">{{ isset($directory) ? $directory->name : 'Корзина' }}</h3>
                            <nav>
                                <ul class="breadcrumb breadcrumb-arrow">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Library</li>
                                </ul>
                            </nav>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nk-block-head-content">
                <ul class="nk-block-tools g-1">
                    <li class="d-lg-none">
                        <a href="#" class="btn btn-trigger btn-icon search-toggle toggle-search" data-target="search">
                            <em class="icon ni ni-search"></em>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="search-wrap px-2 d-lg-none" data-search="search">
                <div class="search-content">
                    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search">
                        <em class="icon ni ni-arrow-left"></em>
                    </a>
                    <input type="text" class="form-control border-transparent form-focus-none" placeholder="Поиск файлов">
                    <button class="search-submit btn btn-icon">
                        <em class="icon ni ni-search"></em>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @if(!$files->isEmpty())
        <div id="accordion" class="accordion">
            @foreach($users as $user)
                @if(!\App\Models\File::onlyTrashed()->where('user_id', $user->id)->get()->isEmpty())
                    <div class="accordion-item">
                        <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-item-{{ $user->id }}">
                            <h6 class="title">{{ $user->profile->surname }} {{ $user->profile->name }}</h6>
                            <span class="accordion-icon"></span>
                        </a>
                        <div class="accordion-body collapse" id="accordion-item-{{ $user->id }}" data-bs-parent="#accordion" >
                            <div class="accordion-inner">
                                <div class="nk-block">
                                    <div class="nk-files nk-files-view-list">
                                        <div class="nk-files-head">
                                            <div class="nk-file-item">
                                                <div>
                                                    <div class="tb-head">Название</div>
                                                </div>
                                                <div>
                                                    <div class="tb-head">Путь</div>
                                                </div>
                                                <div>
                                                    <div class="tb-head">Дата удаления</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-files-list">
                                            @foreach($files as $file)
                                                @if($file->user_id == $user->id)
                                                    <div class="nk-file-item nk-file">
                                                        <div class="nk-file-info">
                                                            <div class="nk-file-title">
                                                                {{ \App\Helpers\FilesConvert::fileIcon($file->path) }}
                                                                <div class="nk-file-name">
                                                                    <div class="nk-file-name-text">
                                                                        <a href="#" class="title">{{ $file->name }}</a>
                                                                        <div class="nk-file-star asterisk">
                                                                            <a href="#">
                                                                                <em class="asterisk-off icon ni ni-star"></em>
                                                                                <em class="asterisk-on icon ni ni-star-fill"></em>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <ul class="nk-file-desc">
                                                                        <li class="date">{{ \Jenssegers\Date\Date::create($file->created_at)->format('j F Y') }}</li>
                                                                        <li class="size">{{ \App\Helpers\FilesConvert::fileSizeConvert(Storage::size($file->path)) }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-file-members">
                                                            {{ stristr($file->path, $file->name, true) }}
                                                        </div>
                                                        <div>
                                                            {{ \Jenssegers\Date\Date::create($file->deleted_at)->format('j F Y H:i:s') }}
                                                        </div>
                                                        <div class="nk-file-actions">
                                                            <div class="dropdown">
                                                                <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown">
                                                                    <em class="icon ni ni-more-h"></em>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-plain no-bdr">
                                                                        <li>
                                                                            <a href="#file-details" data-bs-toggle="modal">
                                                                                <em class="icon ni ni-eye"></em>
                                                                                <span>Подробнее</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="{{ route('recycle.restore', $file->id) }}">
                                                                                <em class="icon ni ni-share"></em>
                                                                                <span>Восстановить</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <form id="recycle-destroy" action="{{ route('recycle.destroy', $file->id) }}" method="post">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <a href="javascript:{}" onclick="document.getElementById('recycle-destroy').submit(); confirm('Вы уверены?');">
                                                                                    <em class="icon ni ni-trash"></em>
                                                                                    <span>Удалить</span>
                                                                                </a>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>
@endsection
