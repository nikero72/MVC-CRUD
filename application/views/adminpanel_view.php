<div class="product-header" style="margin-bottom: 25px;">Панель администратора</div>

<!-- Таблица пользователей -->
<table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">LOGIN</th>
                <th scope="col">PASSWORD</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($data as $value) { ?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['login'] ?></td>
                    <td><?= $value['password'] ?></td>
                    <td>
                        <!-- Кнопка-триггер модального окна изменения пользователя -->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#edit-user-modal" id="edit-user-button" data-bs-whatever='<?= json_encode($value) ?>'>
                            <i class="bi bi-pencil"></i>
                        </button>
                    </td>
                    <td>
                        <!-- Кнопка-триггер модального окна удаления пользователя-->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#delete-user-modal" id="delete-user-button" data-bs-whatever='<?= json_encode($value) ?>'> 
                            <i class="bi bi-trash3"></i>
                        </button> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Модальное окно изменения пользователя -->
    <div class="modal fade" id="edit-user-modal" tabindex="-1" aria-labelledby="edit-user-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit-user-modal-label">USER EDIT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>

                <form id="edit-user-form" action="/admin/edit" method="post">
                    <input type="hidden" class="form-control" id="edit-user-id" name="user-id">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="user-login" class="col-form-label">LOGIN</label>
                            <input type="text" class="form-control" id="edit-user-login" name="user-login">
                        </div>
                        <div class="mb-3">
                            <label for="user-password" class="col-form-label">PASSWORD</label>
                            <input type="text" class="form-control" id="edit-user-password" name="user-password">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <!-- Модальное окно удаления пользователя -->
    <div class="modal fade" id="delete-user-modal" tabindex="-1" aria-labelledby="delete-user-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-user-modal-label">DELETE USER</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>

                <form id="delete-user-form" action="/admin/delete" method="post">
                    <input type="hidden" class="form-control" id="delete-user-id" name="user-id">
                    
                    <div class="modal-body">
                        <span id='delete-user-warning'></span>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>