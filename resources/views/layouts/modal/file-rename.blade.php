@if(isset($file))
    <div class="modal fade" tabindex="-1" role="dialog" id="file-rename">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <form>
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <label class="form-label" for="input-name">Имя файла</label>
                                <input name="name" type="text" class="form-control" id="input-name">
                            </div>
                        </div>
                        <div class="nk-modal-action justify-end">
                            <ul class="btn-toolbar g-4 align-center">
                                <li>
                                    <a href="#" class="link link-primary" data-bs-dismiss="modal">Отмена</a>
                                </li>
                                <li>
                                    <button type="submit" class="btn btn-primary">Переименовать</button>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

