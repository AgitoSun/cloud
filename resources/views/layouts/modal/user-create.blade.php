<div class="modal fade" tabindex="-1" role="dialog" id="user-create">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal">
                <em class="icon ni ni-cross-sm"></em>
            </a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Добавление пользователя</h5>
                <div class="tab-content">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">Имя</label>
                                    <input name="name" type="text" class="form-control form-control-lg" id="name" placeholder="Имя пользователя">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="surname">Фамилия</label>
                                    <input name="surname" type="text" class="form-control form-control-lg" id="surname" placeholder="Фамилия пользователя">
                                    <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input name="email" type="email" class="form-control form-control-lg" id="email" placeholder="Email пользователя">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="password">Пароль</label>
                                    <input name="password" type="text" class="form-control form-control-lg" id="password" value="{{ Str::password(16, true, true, false, false) }}">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="custom-control custom-switch">
                                    <input name="is_admin" type="checkbox" class="custom-control-input" id="is_admin" value="1">
                                    <label class="custom-control-label" for="is_admin">Роль администратора</label>
                                    <x-input-error :messages="$errors->get('is_admin')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <button type="submit" class="btn btn-lg btn-primary">Добавить</button>
                                    </li>
                                    <li>
                                        <a data-bs-dismiss="modal" class="link link-light">Отмена</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
