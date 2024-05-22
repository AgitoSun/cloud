@extends('layouts.app')

@section('title', 'Файлы')

@section('content')
    @include('layouts/search')
    @include('layouts/modal/directory-create')
{{--    <div class="nk-fmg-body-content">--}}
{{--        <div class="nk-block-head nk-block-head-sm">--}}
{{--            <div class="nk-block-between position-relative">--}}
{{--                <div class="nk-block-head-content">--}}
{{--                    <div class="nk-block-head-content d-none d-lg-block">--}}
{{--                        <ul class="nk-block-tools g-3">--}}
{{--                            <li>--}}
{{--                                <a href="javascript:{}" onclick="history.back(); return false;" class="btn btn-trigger btn-icon btn-tooltip" aria-label="Назад" data-bs-original-title="Prev Page">--}}
{{--                                    <em class="icon ni ni-arrow-left"></em>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="d-flex flex-column">--}}
{{--                                <h3 class="nk-block-title page-title">{{ isset($directory) ? $directory->name : 'Файлы' }}</h3>--}}
{{--                                <nav>--}}
{{--                                    <ul class="breadcrumb breadcrumb-arrow">--}}
{{--                                        <li class="breadcrumb-item">--}}
{{--                                            <a href="#">Главная</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="breadcrumb-item active">Файлы</li>--}}
{{--                                    </ul>--}}
{{--                                </nav>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="nk-block-head-content">--}}
{{--                    <ul class="nk-block-tools g-1">--}}
{{--                        <li class="d-lg-none">--}}
{{--                            <a href="#" class="btn btn-trigger btn-icon search-toggle toggle-search" data-target="search">--}}
{{--                                <em class="icon ni ni-search"></em>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="d-lg-none">--}}
{{--                            <div class="dropdown">--}}
{{--                                <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="dropdown">--}}
{{--                                    <em class="icon ni ni-plus"></em>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <ul class="link-list-opt no-bdr">--}}
{{--                                        <li>--}}
{{--                                            <a href="#file-upload" data-bs-toggle="modal">--}}
{{--                                                <em class="icon ni ni-upload-cloud"></em>--}}
{{--                                                <span>Загрузить файл</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#directory-create" data-bs-toggle="modal">--}}
{{--                                                <em class="icon ni ni-folder-plus"></em>--}}
{{--                                                <span>Создать папку</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="search-wrap px-2 d-lg-none" data-search="search">--}}
{{--                    <div class="search-content">--}}
{{--                        <a href="#" class="search-back btn btn-icon toggle-search" data-target="search">--}}
{{--                            <em class="icon ni ni-arrow-left"></em>--}}
{{--                        </a>--}}
{{--                        <input type="text" class="form-control border-transparent form-focus-none" placeholder="Поиск файлов">--}}
{{--                        <button class="search-submit btn btn-icon">--}}
{{--                            <em class="icon ni ni-search"></em>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="nk-fmg-listing nk-block">--}}
{{--            <div class="nk-files nk-files-view-list">--}}
{{--                <div class="nk-files-head">--}}
{{--                    <div class="nk-file-item">--}}
{{--                        <div class="nk-file-info">--}}
{{--                            <div class="tb-head">Название</div>--}}
{{--                        </div>--}}
{{--                        <div class="nk-file-members">--}}
{{--                            <div class="tb-head">Общий доступ</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="nk-files-list">--}}
{{--                    @foreach($directories as $main_directory)--}}
{{--                        <div class="nk-file-item nk-file">--}}
{{--                            <div class="nk-file-info">--}}
{{--                                <div class="nk-file-title">--}}
{{--                                    {{ \App\Helpers\FilesConvert::fileIcon($main_directory->path) }}--}}
{{--                                    <div class="nk-file-name">--}}
{{--                                        <div class="nk-file-name-text">--}}
{{--                                            <a href="{{ route('directory.show', $main_directory) }}" class="title">{{ $main_directory->name }}</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="nk-file-members">--}}
{{--                                <span class="badge rounded-pill bg-secondary">Закрыт</span>--}}
{{--                            </div>--}}
{{--                            <div class="nk-file-actions">--}}
{{--                                <div class="dropdown">--}}
{{--                                    <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown">--}}
{{--                                        <em class="icon ni ni-more-h"></em>--}}
{{--                                    </a>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                        <ul class="link-list-plain no-bdr">--}}
{{--                                            <li>--}}
{{--                                                <a href="#file-details" data-bs-toggle="modal">--}}
{{--                                                    <em class="icon ni ni-eye"></em>--}}
{{--                                                    <span>Подробнее</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#file-share" data-bs-toggle="modal">--}}
{{--                                                    <em class="icon ni ni-share"></em>--}}
{{--                                                    <span>Открыть доступ</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" class="js-btn" data-name="{{ $main_directory->name }}" data-path="{{ route('directory.rename', $main_directory->id) }}" data-modal="#file-rename">--}}
{{--                                                <em class="icon ni ni-pen"></em>--}}
{{--                                                    <span>Переименовать</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <form id="directory-destroy" action="{{ route('directory.destroy', $main_directory->id) }}" method="post">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <a href="javascript:{}" onclick="document.getElementById('directory-destroy').submit(); confirm('Вы уверены?');">--}}
{{--                                                        <em class="icon ni ni-trash"></em>--}}
{{--                                                        <span>Удалить</span>--}}
{{--                                                    </a>--}}
{{--                                                </form>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                    @if($files)--}}
{{--                        @foreach($files as $file)--}}
{{--                            <div class="nk-file-item nk-file">--}}
{{--                                    <div class="nk-file-info">--}}
{{--                                        <div class="nk-file-title">--}}
{{--                                            {{ \App\Helpers\FilesConvert::fileIcon($file->path) }}--}}
{{--                                            <div class="nk-file-name">--}}
{{--                                                <div class="nk-file-name-text">--}}
{{--                                                    <a href="#" class="title">{{ $file->name }}</a>--}}
{{--                                                    <div class="nk-file-star asterisk">--}}
{{--                                                        <a href="#">--}}
{{--                                                            <em class="asterisk-off icon ni ni-star"></em>--}}
{{--                                                            <em class="asterisk-on icon ni ni-star-fill"></em>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <ul class="nk-file-desc">--}}
{{--                                                    <li class="date">{{ \Jenssegers\Date\Date::create($file->created_at)->format('j F Y') }}</li>--}}
{{--                                                    <li class="size">{{ \App\Helpers\FilesConvert::fileSizeConvert(Storage::size($file->path)) }}</li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="nk-file-members">--}}
{{--                                        @if($file->shared_id)--}}
{{--                                            <span class="badge rounded-pill bg-success">Открыт</span>--}}
{{--                                        @else--}}
{{--                                            <span class="badge rounded-pill bg-secondary">Закрыт</span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    <div class="nk-file-actions">--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown">--}}
{{--                                                <em class="icon ni ni-more-h"></em>--}}
{{--                                            </a>--}}
{{--                                            <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                                <ul class="link-list-plain no-bdr">--}}
{{--                                                    <li>--}}
{{--                                                        <a href="#" class="js-btn" data-name="{{ $file->id }}" data-modal="#file-details">--}}
{{--                                                            <em class="icon ni ni-eye"></em>--}}
{{--                                                            <span>Подробнее</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="@if($file->shared_id){{ route('share.close', $file->id) }}@else{{ route('share.open', $file->id) }}@endif">--}}
{{--                                                            <em class="icon ni ni-share"></em>--}}
{{--                                                            <span>@if($file->shared_id)Закрыть@elseОткрыть@endif доступ</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="#" class="js-btn" data-name="{{ $file->name }}" data-path="{{  route('file.move', $file->id) }}" data-modal="#file-move">--}}
{{--                                                            <em class="icon ni ni-forward-arrow"></em>--}}
{{--                                                            <span>Переместить</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="{{ route('download', 'path='.$file->path) }}" class="file-dl-toast">--}}
{{--                                                            <em class="icon ni ni-download"></em>--}}
{{--                                                            <span>Скачать</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="#" class="js-btn" data-name="{{ $file->name }}" data-path="{{ route('file.rename', $file->id) }}" data-modal="#file-rename">--}}
{{--                                                            <em class="icon ni ni-pen"></em>--}}
{{--                                                            <span>Переименовать</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <form id="file-destroy" action="{{ route('file.destroy', $file->id) }}" method="post">--}}
{{--                                                            @csrf--}}
{{--                                                            @method('DELETE')--}}
{{--                                                            <a href="javascript:{}" onclick="document.getElementById('file-destroy').submit(); confirm('Вы уверены?');">--}}
{{--                                                                <em class="icon ni ni-trash"></em>--}}
{{--                                                                <span>Удалить</span>--}}
{{--                                                            </a>--}}
{{--                                                        </form>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @include('layouts/modal/file-upload')--}}
{{--    @include('layouts/modal/file-details')--}}
{{--    @include('layouts/modal/file-move')--}}
{{--    @include('layouts/modal/file-rename')--}}
@endsection
@section('script')
    <script src="{{ asset('js/file-modal.js') }}"></script>
@endsection
