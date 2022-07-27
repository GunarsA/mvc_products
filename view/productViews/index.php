<nav class="navbar bg-primary">
    <div class="container-fluid px-4">
        <h2 class="navbar-brand my-auto">Products List</h2>
        <span>
            <a href="/add-product" type="button" class="btn btn-outline-dark" type="submit">ADD</a>
            <form action="/delete-product" method="post" id="delete-form" class="d-inline-block">
                <button for="delete-form" id="delete-product-btn" class="btn btn-outline-dark" type="submit">MASS DELETE</button>
            </form>
        </span>
    </div>
</nav>

<div class="container my-5">
    <div class="row g-4">
        <?php foreach ($products as $i => $product) : ?>
            <div class="col-6 col-md-3">
                <div class="card border-primary">
                    <div class="card-body">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input form="delete-form" type="checkbox" class="delete-checkbox form-check-input" name="<?= $product['sku'] ?>">
                            </label>
                        </div>
                        <p class="card-title text-center"><?= $product['sku'] ?></p>
                        <p class="card-text text-center"><?= $product['name'] ?></p>
                        <p class="card-text text-center"><?= $product['price'] ?> $</p>
                        <p class="card-text text-center"><?= $product['value'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>