<?php 
    $categoriesId = $data['categoriesId'];
    $categories = $data['categories'];
    $products = $data['products'];
?>
    

    <div class="product-header">
        <span>
            <?php 
                foreach ($categories as $value) {
                    if ($value['Id'] == $categoriesId) {
                        echo $value['Name'];
                    }
                }
            ?>
        </span>
    </div>
    <div class="to-categories"><a class="link-dark link-underline link-underline-opacity-0" href="/categories" id="categories-link">К категориям</a></div>



    <!-- Кнопка-триггер модального окна создания продукта -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-product-modal" id="add-product-button">Создать продукт</button>

    <!-- Модальное окно создания продукта -->
    <div class="modal fade" id="add-product-modal" tabindex="-1" aria-labelledby="add-product-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="add-product-modal-label">Создать продукт</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>

                <form id="add-product-form" action="products/add" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="product-name" class="col-form-label">Наименование продукта</label>
                            <input type="text" class="form-control" id="product-name" name="product-name">
                        </div>
                        <div class="mb-3">
                            <label for="product-description" class="col-form-label">Описание</label>
                            <textarea class="form-control" id="edit-product-description" name="product-description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="product-price" class="col-form-label">Цена</label>
                            <input type="number" class="form-control" id="product-price" name="product-price">
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

    <!-- Таблица продуктов -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Наименование продукта</th>
                <th scope="col">Описание</th>
                <th scope="col">Цена</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($products as $value) { ?>
                <tr>
                    <td><?= $value['Id'] ?></td>
                    <td><?= $value['Name'] ?></td>
                    <td><?= $value['Description'] ?></td>
                    <td><?= $value['Price'] ?></td>
                    <td>
                        <!-- Кнопка-триггер модального окна изменения продукта -->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#edit-product-modal" id="edit-product-button" data-bs-whatever='<?= json_encode($value) ?>'>
                            <i class="bi bi-pencil"></i>
                        </button>
                    </td>
                    <td>
                        <!-- Кнопка-триггер модального окна удаления продукта-->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#delete-product-modal" id="delete-product-button" data-bs-whatever='<?= json_encode($value) ?>'> 
                            <i class="bi bi-trash3"></i>
                        </button> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>



    <!-- Модальное окно изменения продукта -->
    <div class="modal fade" id="edit-product-modal" tabindex="-1" aria-labelledby="edit-product-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit-product-modal-label">Изменение продукта</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>

                <form id="edit-product-form" action="products/edit" method="post">
                    <input type="hidden" class="form-control" id="edit-product-id" name="product-id">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="product-name" class="col-form-label">Наименование продукта</label>
                            <input type="text" class="form-control" id="edit-product-name" name="product-name">
                        </div>
                        <div class="mb-3">
                            <label for="product-description" class="col-form-label">Описание</label>
                            <textarea class="form-control" id="edit-product-description" name="product-description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="product-price" class="col-form-label">Цена</label>
                            <input type="number" class="form-control" id="edit-product-price" name="product-price">
                        </div>
                        <div class="mb-3">
                            <label for="product-categories" class="col-form-label">Категория</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="product-categories">
                                <?php 
                                    foreach ($categories as $value) {
                                        if ($value['Id'] == $categoriesId) {
                                            echo "<option selected value=" . $value['Id'] . ">" . $value['Name'] . "</option>";
                                        } else {
                                            echo "<option value=" . $value['Id'] . ">" . $value['Name'] . "</option>";
                                        }
                                    };
                                ?>
                            </select>
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



    <!-- Модальное окно удаления продукта -->
    <div class="modal fade" id="delete-product-modal" tabindex="-1" aria-labelledby="delete-product-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-product-modal-label">Удаление продукта</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>

                <form id="delete-product-form" action="products/delete" method="post">
                    <input type="hidden" class="form-control" id="delete-product-id" name="product-id">
                    <input type="hidden" class="form-control" id="categories-id" name="categories-id" value="<?= $categoriesId ?>">
                    
                    <div class="modal-body">
                        <span id='delete-product-warning'></span>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>