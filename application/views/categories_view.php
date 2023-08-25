    <form id="logout" action="/login/logout" method="post">
        <button type="submit" class="btn btn-light">Выйти</button>
    </form>
    
    
    <!-- Кнопка-триггер модального окна создания категории -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-categories-modal" id="add-categories-button">Создать категорию</button>

    <!-- Модальное окно создания категории -->
    <div class="modal fade" id="add-categories-modal" tabindex="-1" aria-labelledby="add-categories-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="add-categories-modal-label">Создание категории</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>

                <form id="add-categories-form" action="categories/add" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categories-name" class="col-form-label">Наименование категории</label>
                            <input type="text" class="form-control" id="categories-name" name="categories-name">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="row">
        <?php
            foreach ($data as $value) { ?>
                    <div class="col-md-3" >
                        <div class="card bg-light mb-3" style="max-width: 18rem;" >
                            <div class="dropdown">
                                <button class="btn" style="float: right;" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown_button">
                                    <i class="bi bi-gear"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#edit-categories-modal" id="edit-categories-button" data-bs-whatever='<?= json_encode($value) ?>'>
                                            Изменить
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#delete-categories-modal" id="delete-categories-button" data-bs-whatever='<?= json_encode($value) ?>'>
                                            Удалить
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <form id="redirect-to-products" action="/products" method="post">
                                <input type="hidden" class="form-control" id="redirect-categories-id" name="categories-id" value="<?= $value[0] ?>">
                                <button type="submit" class="card-body" style="cursor: pointer;" id="btn-to-product">
                                    <h5 class="card-title"><?= $value[1] ?></h5>
                                </button>
                            </form>
                        </div>
                    </div>
        <?php } ?>
    </div>

    <!-- Модальное окно изменения категории -->
    <div class="modal fade" id="edit-categories-modal" tabindex="-1" aria-labelledby="edit-categories-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit-categories-modal-label">Изменение категории</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>

                <form id="edit-categories-form" action="categories/edit" method="post">
                    <input type="hidden" class="form-control" id="edit-categories-id" name="categories-id">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categories-name" class="col-form-label">Наименование категории</label>
                            <input type="text" class="form-control" id="edit-categories-name" name="categories-name">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <!-- Модальное окно удаления категории -->
    <div class="modal fade" id="delete-categories-modal" tabindex="-1" aria-labelledby="delete-categories-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-categories-modal-label">Удаление продукта</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>

                <form id="delete-categories-form" action="categories/delete" method="post">
                    <input type="hidden" class="form-control" id="delete-categories-id" name="categories-id">
                    
                    <div class="modal-body">
                        <span id='delete-categories-warning'></span>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>