@if(isset($file))
    <div class="modal fade" tabindex="-1" role="dialog" id="file-move">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header align-center border-bottom-0">
                    <h5 class="modal-title" id="modalTitle">{{$file->name}}</h5>
                    <a href="#" class="close" data-bs-dismiss="modal">
                        <em class="icon ni ni-cross-sm"></em>
                    </a>
                </div>
                <form>
                    <div class="modal-body pt-0 mt-n2">
                        <ul class="breadcrumb breadcrumb-alt breadcrumb-xs breadcrumb-arrow mb-1">
                            <li class="breadcrumb-item">Project</li>
                            <li class="breadcrumb-item">Apps</li>
                        </ul>
                        <div class="nk-fmg-listing is-scrollable">
                            <div class="nk-files nk-files-view-list is-compact">
                                <div class="nk-files-list">
                                    <ul class="custom-control-group custom-control-vertical w-100">
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input" name="directory" id="directory_0" value="0">
                                                <label class="custom-control-label" for="directory_0">
                                                    <div class="nk-file-title">
{{--                                                        {{ \App\Helpers\FilesConvert::fileIcon($main_directory->path) }}--}}
                                                        <div class="nk-file-name">
                                                            <div class="nk-file-name-text">
                                                                <span class="title">/</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>
                                        @foreach(\App\Models\Directory::all()->where('user_id', Auth::id()) as $main_directory)
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="directory" id="directory_{{ $main_directory->id }}" value="{{ $main_directory->id }}">
                                                    <label class="custom-control-label" for="directory_{{ $main_directory->id }}">
                                                        <div class="nk-file-title">
                                                            {{ \App\Helpers\FilesConvert::fileIcon($main_directory->path) }}
                                                            <div class="nk-file-name">
                                                                <div class="nk-file-name-text">
                                                                    <span class="title">{{ $main_directory->name }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <ul class="btn-toolbar g-3">
                            <li>
                                <a href="#" data-bs-dismiss="modal" class="btn btn-outline-light btn-white">Отмена</a>
                            </li>
                            <li>
                                <button type="submit" class="btn btn-primary">Переместить</button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

