    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">User login</th>
                <th scope="col">Category name</th>
                <th scope="col">Product name</th>
                <th scope="col">Product description</th>
                <th scope="col">Product price</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($data as $value) { ?>
                <tr>
                    <td><?= $value['user_id'] ?></td>
                    <td><?= $value['user_login'] ?></td>
                    <td><?= $value['categories_name'] ?></td>
                    <td><?= $value['product_name'] ?></td>
                    <td><?= $value['product_description'] ?></td>
                    <td><?= $value['product_price'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>