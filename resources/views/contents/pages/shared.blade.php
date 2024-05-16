@extends('layouts.app')

@section('title', 'Общие')

@section('content')
@include('layouts/search')
<div class="nk-fmg-body-content">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between position-relative">
            <div class="nk-block-head-content">
                <div class="nk-block-head-content d-none d-lg-block">
                    <ul class="nk-block-tools g-3">
                        <li>
                            <a href="javascript:{}" onclick="history.back(); return false;" class="btn btn-trigger btn-icon btn-tooltip" aria-label="Назад" data-bs-original-title="Prev Page">
                                <em class="icon ni ni-arrow-left"></em>
                            </a>
                        </li>
                        <li class="d-flex flex-column">
                            <h3 class="nk-block-title page-title">Общие файлы</h3>
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
    <div class="nk-fmg-listing nk-block">
        <div class="nk-files nk-files-view-list">
            <div class="nk-files-head">
                <div class="nk-file-item">
                    <div class="nk-file-info">
                        <div class="tb-head">Название</div>
                    </div>
                    <div class="nk-file-members">
                        <div class="tb-head">Ссылка</div>
                    </div>
                    <div>
                        <div class="tb-head">Доступ открыт</div>
                    </div>
                </div>
            </div>
            <div class="nk-files-list">
                @if($files)
                    @foreach($files as $file)
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
                            <div>
                                {{ url('/public?shared='.$file->shared->key) }}
                            </div>
                            <div>
                                {{ \Jenssegers\Date\Date::create($file->shared->created_at)->format('j F Y H:i:s') }}
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
                                                <a href="@if($file->shared_id){{ route('share.close', $file->id) }}@else{{ route('share.open', $file->id) }}@endif">
                                                    <em class="icon ni ni-share"></em>
                                                    <span>@if($file->shared_id)Закрыть@elseОткрыть@endif доступ</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('download', 'path='.$file->path) }}" class="file-dl-toast">
                                                    <em class="icon ni ni-download"></em>
                                                    <span>Скачать</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="js-btn" data-name="{{ $file->name }}" data-path="{{ route('file.rename', $file->id) }}" data-modal="#file-rename">
                                                    <em class="icon ni ni-pen"></em>
                                                    <span>Переименовать</span>
                                                </a>
                                            </li>
                                            <li>
                                                <form id="file-destroy" action="{{ route('file.destroy', $file->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="javascript:{}" onclick="document.getElementById('file-destroy').submit(); confirm('Вы уверены?');">
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
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts/modal/file-rename')
@endsection
@section('script')
    <script src="{{ asset('js/file-modal.js') }}"></script>
@endsection
