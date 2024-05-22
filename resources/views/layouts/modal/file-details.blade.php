<h5 class="modal-title" id="modalTitle"></h5>

<div class="modal fade" tabindex="-1" role="dialog" id="file-details">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header align-center">
                <div class="nk-file-title">
                    {{ \App\Helpers\FilesConvert::fileIcon($file->path) }}
                    <div class="nk-file-name">
                        <div class="nk-file-name-text">
                            <span class="title">{{ $file->name }}</span>
                        </div>
                    </div>
                </div>
                <a href="#" class="close" data-bs-dismiss="modal">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
            </div>
            <div class="modal-body">
                <div class="nk-file-details">
                    <div class="nk-file-details-row">
                        <div class="nk-file-details-col">Тип</div>
                        <div class="nk-file-details-col">Папка</div>
                    </div>
                    <div class="nk-file-details-row">
                        <div class="nk-file-details-col">Размер</div>
                        <div class="nk-file-details-col">35.48 MB</div>
                    </div>
                    <div class="nk-file-details-row">
                        <div class="nk-file-details-col">Расположение</div>
                        <div class="nk-file-details-col">
                            <ul class="breadcrumb breadcrumb-sm breadcrumb-alt breadcrumb-arrow">
                                <li class="breadcrumb-item">ThemeForest</li>
                                <li class="breadcrumb-item">Project</li>
                            </ul>
                        </div>
                    </div>
                    <div class="nk-file-details-row">
                        <div class="nk-file-details-col">Владелец</div>
                        <div class="nk-file-details-col">Me</div>
                    </div>
                    <div class="nk-file-details-row">
                        <div class="nk-file-details-col">Доступ</div>
                        <div class="nk-file-details-col">
                            <div class="user-avatar-group">
                                <div class="user-avatar xs">
                                    <img src="../../dashlite.net/demo3/images/avatar/b-sm.jpg" alt=""></div>
                                <div class="user-avatar xs bg-purple">
                                    <span>IH</span>
                                </div>
                                <div class="user-avatar xs bg-pink">
                                    <span>AB</span>
                                </div>
                                <div class="user-avatar xs bg-light">
                                    <span>+2</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-file-details-row">
                        <div class="nk-file-details-col">Создан</div>
                        <div class="nk-file-details-col">Feb 19, 2020</div>
                    </div>
                    <div class="nk-file-details-row">
                        <div class="nk-file-details-col">Открыт доступ</div>
                        <div class="nk-file-details-col">Apr 23, 2020</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <ul class="btn-toolbar g-3">
                    <li>
                        <a href="#" data-bs-dismiss="modal" class="btn btn-outline-light btn-white">Закрыть</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
