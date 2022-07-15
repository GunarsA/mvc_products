<nav class="navbar bg-light">
    <div class="container-fluid">
        <p class="navbar-brand">Products List</p>
        <form class="d-flex">
            <button class="btn btn-outline-dark" type="submit">Add</button>
            <button id="delete-product-btn" class="btn btn-outline-dark" type="submit">Search</button>
        </form>
    </div>
</nav>


<div class="container overflow-hidden">
    <div class="row row-cols-4 g-5">
        <?php foreach ($products as $i => $product) : ?>
            <div class="col">
                <div class="border border-dark border-3 p-3 text-center">
                    <p><?= $product['sku'] ?></p>
                    <p><?= $product['name'] ?></p>
                    <p><?= $product['price'] ?> $</p>
                    <p><?= $product['value'] ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>