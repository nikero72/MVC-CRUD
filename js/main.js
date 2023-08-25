// Валидация при регистрации
$(document).ready(function() {
    $('#reg-form').validate({
        rules: {
          login: {
            required: true,
            email: true,
            minlength: 6
          },
          password: {
            required: true,
            minlength: 4,
          },
        },
        messages: {
            login:{
                required: "Это поле обязательно для заполнения",
                minlength: "Логин должен быть минимум 6 символа",
                email: "Это поле должно содержать символ '@'"
            },
            password:{
                required: "Это поле обязательно для заполнения",
                minlength: "Пароль должен быть минимум 4 символа"
            },
        },
        submitHandler: function(form) {
          form.submit();
        }
    })
});

// Обработка события кнопки изменения продукта
$(document).ready(function() {
  var editProductModal = document.getElementById('edit-product-modal');
  editProductModal.addEventListener('show.bs.modal', function (event) {
    // Кнопка, запускающая модальное окно
    var button = event.relatedTarget;
    // Извлечь информацию из атрибутa data-bs-whatever
    var product = $.parseJSON(button.getAttribute('data-bs-whatever'));
    // Обновление содержимого модального окна.
    var editProductId = editProductModal.querySelector('#edit-product-id');
    var editProductName = editProductModal.querySelector('#edit-product-name');
    var editProductPrice = editProductModal.querySelector('#edit-product-price');
    var editProductDescription = editProductModal.querySelector('#edit-product-description');

    editProductId.value = product.Id;
    editProductName.value = product.Name;
    editProductPrice.value = product.Price;
    editProductDescription.innerHTML = product.Description;

  });
});

// Обработка события кнопки удаления продукта
$(document).ready(function() {
  var deleteProductModal = document.getElementById('delete-product-modal');
  deleteProductModal.addEventListener('show.bs.modal', function (event) {
    // Кнопка, запускающая модальное окно
    var button = event.relatedTarget;
    // Извлечь информацию из атрибутa data-bs-whatever
    var product = $.parseJSON(button.getAttribute('data-bs-whatever'));
    // Обновление содержимого модального окна
    var deleteProductId = deleteProductModal.querySelector('#delete-product-id');
    var deleteWarningSpan = deleteProductModal.querySelector('#delete-product-warning');

    deleteProductId.value = product.Id;
    deleteWarningSpan.innerHTML = "Вы действительно хотите удалить продукт '" + product.Name + "'?";
  });
});

// Обработка события кнопки изменения категории
$(document).ready(function() {
  var editCategoriesModal = document.getElementById('edit-categories-modal');
  editCategoriesModal.addEventListener('show.bs.modal', function (event) {
    // Кнопка, запускающая модальное окно
    var button = event.relatedTarget;
    // Извлечь информацию из атрибутa data-bs-whatever
    var category = $.parseJSON(button.getAttribute('data-bs-whatever'));
    // Обновление содержимого модального окна.
    var editCategoriesId = editCategoriesModal.querySelector('#edit-categories-id');
    var editCategoriesName = editCategoriesModal.querySelector('#edit-categories-name');

    editCategoriesId.value = category.Id;
    editCategoriesName.value = category.Name;
  });
});

// Обработка события кнопки удаления категории
$(document).ready(function() {
  var deleteCategoriesModal = document.getElementById('delete-categories-modal');
  deleteCategoriesModal.addEventListener('show.bs.modal', function (event) {
    // Кнопка, запускающая модальное окно
    var button = event.relatedTarget;
    // Извлечь информацию из атрибутa data-bs-whatever
    var category = $.parseJSON(button.getAttribute('data-bs-whatever'));
    // Обновление содержимого модального окна
    var deleteCategoriesId = deleteCategoriesModal.querySelector('#delete-categories-id');
    var deleteWarningSpan = deleteCategoriesModal.querySelector('#delete-categories-warning');

    deleteCategoriesId.value = category.Id;
    deleteWarningSpan.innerHTML = "Вы действительно хотите удалить категорию '" + category.Name + "'" +"?";
  });
});

// Ошибка при некорректном логине или пароле
function loginError() {
  var error = document.getElementById('login-error');
  error.style.display = 'block';
}

// Обработка события кнопки изменения пользователя
$(document).ready(function() {
  var editUserModal = document.getElementById('edit-user-modal');
  editUserModal.addEventListener('show.bs.modal', function (event) {
    // Кнопка, запускающая модальное окно
    var button = event.relatedTarget;
    // Извлечь информацию из атрибутa data-bs-whatever
    var user = $.parseJSON(button.getAttribute('data-bs-whatever'));
    // Обновление содержимого модального окна.
    var editUserId = editUserModal.querySelector('#edit-user-id');
    var editUserLogin = editUserModal.querySelector('#edit-user-login');

    editUserId.value = user.id;
    editUserLogin.value = user.login;
  });
});

// Обработка события кнопки удаления пользователя
$(document).ready(function() {
  var deleteUserModal = document.getElementById('delete-user-modal');
  deleteUserModal.addEventListener('show.bs.modal', function (event) {
    // Кнопка, запускающая модальное окно
    var button = event.relatedTarget;
    // Извлечь информацию из атрибутa data-bs-whatever
    var user = $.parseJSON(button.getAttribute('data-bs-whatever'));
    // Обновление содержимого модального окна
    var deleteUserId = deleteUserModal.querySelector('#delete-user-id');
    var deleteWarningSpan = deleteUserModal.querySelector('#delete-user-warning');

    deleteUserId.value = user.id;
    deleteWarningSpan.innerHTML = "Вы действительно хотите удалить пользователя '" + user.login + "'" +"?";
  });
});