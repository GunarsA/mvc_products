<nav class="navbar bg-primary mb-5">
    <div class="container-fluid px-4">
        <h2 class="navbar-brand my-auto">Product Add</h2>
        <span>
            <button form="product-form" class="btn btn-outline-dark" type="submit">Save</button>
            <a href="/" type="button" class="btn btn-outline-dark" type="submit">Cancel</a>
        </span>
    </div>
</nav>

<?php if (!empty($errors)) : ?>
    <div class="container alert alert-danger">
        <h4>Didn't pass the server validation!</h4>
        <?php foreach ($errors as $error) : ?>
            <div><?= $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="container">
    <form method="post" id="product-form" class="needs-validation" novalidate>
        <fieldset>
            <div class="row mb-3 g-3 align-items-center">
                <div class="col-sm-2 col-lg-1">
                    <label for="sku" class="col-form-label">SKU</label>
                </div>
                <div class="col-sm-auto position-relative">
                    <input required type="text" id="sku" name="sku" value="<?= $product['sku'] ?? '' ?>" class="form-control" aria-describedby="skuHelpInline">
                    <div id="spinner" class="spinner-border text-primary position-absolute d-none" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div id="skuFeedback" class="invalid-feedback">
                        Please choose a SKU.
                    </div>
                </div>
                <div class="col-sm-auto">
                    <span id="skuHelpInline" class="form-text">
                        Stock Keeping Unit needs to be unique.
                    </span>
                </div>
            </div>

            <div class="row mb-3 g-3 align-items-center">
                <div class="col-sm-2 col-lg-1">
                    <label for="name" class="col-form-label">Name</label>
                </div>
                <div class="col-sm-auto">
                    <input required type="text" id="name" name="name" value="<?= $product['name'] ?? '' ?>" class="form-control" aria-describedby="nameHelpInline">
                    <div class="invalid-feedback">
                        Please choose a name.
                    </div>
                </div>
                <div class="col-sm-auto">
                    <span id="nameHelpInline" class="form-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nostrum impedit.
                    </span>
                </div>
            </div>
            <div class="row mb-3 g-3 align-items-center">
                <div class="col-sm-2 col-lg-1">
                    <label for="price" class="col-form-label">Price ($)</label>
                </div>
                <div class="col-sm-auto">
                    <input required type="number" step=".01" min=".01" id="price" name="price" value="<?= $product['sku'] ?? '' ?>" class="form-control" aria-describedby="priceHelpInline">
                    <div class="invalid-feedback">
                        Please set a valid price.
                    </div>
                </div>
                <div class="col-sm-auto">
                    <span id="priceHelpInline" class="form-text">
                        Price needs to be a positive number with maximum precision of 0.01.
                    </span>
                </div>
            </div>
        </fieldset>

        <div class="row mb-5 g-3 align-items-center">
            <div class="col-sm-2 col-lg-1">
                <label for="productType">Product Type</label>
            </div>
            <div class="col-sm-auto">
                <select required id="productType" name="type" class="form-select">
                    <option selected value="">Type Switcher</option>
                    <option value="DVD">DVD</option>
                    <option value="Book">Book</option>
                    <option value="Furniture">Furniture</option>
                </select>
                <div class="invalid-feedback">
                    Please pick a product type.
                </div>
            </div>
            <div class="col-sm-auto">
                <span id="priceHelpInline" class="form-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing.
                </span>
            </div>
        </div>

        <div id="descriptions">
            <fieldset id="discDescription" class="d-none">
                <div class="row mb-1">
                    <legend>Provide size</legend>
                </div>
                <div class="row mb-3 g-3 align-items-center">
                    <div class="col-sm-2 col-lg-1">
                        <label for="size" class="col-form-label">Size (MB)</label>
                    </div>
                    <div class="col-sm-auto">
                        <input type="number" step="1" min="1" id="size" name="size" class="form-control">
                        <div class="invalid-feedback">
                            Please set a valid size.
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <span class="form-text">
                            Size needs to be a positive integer.
                        </span>
                    </div>
                </div>
            </fieldset>

            <fieldset id="bookDescription" class="d-none">
                <div class="row mb-1">
                    <legend>Provide weight</legend>
                </div>
                <div class="row mb-3 g-3 align-items-center">
                    <div class="col-sm-2 col-lg-1">
                        <label for="size" class="col-form-label">Weight (KG)</label>
                    </div>
                    <div class="col-sm-auto">
                        <input type="number" step="1" min="1" id="weight" name="weight" class="form-control">
                        <div class="invalid-feedback">
                            Please set a valid weight.
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <span class="form-text">
                            Weight needs to be a positive integer.
                        </span>
                    </div>
                </div>
            </fieldset>

            <fieldset id="furnitureDescription" class="d-none">
                <div class="row mb-1">
                    <legend>Provide dimensions</legend>
                </div>
                <div class="row mb-3 g-3 align-items-center">
                    <div class="col-sm-2 col-lg-1">
                        <label for="size" class="col-form-label">Height (CM)</label>
                    </div>
                    <div class="col-sm-auto">
                        <input type="number" step="1" min="1" id="height" name="height" class="form-control">
                        <div class="invalid-feedback">
                            Please set a valid height.
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <span class="form-text">
                            Height needs to be a positive integer.
                        </span>
                    </div>
                </div>
                <div class="row mb-3 g-3 align-items-center">
                    <div class="col-sm-2 col-lg-1">
                        <label for="size" class="col-form-label">Width (CM)</label>
                    </div>
                    <div class="col-sm-auto">
                        <input type="number" step="1" min="1" id="width" name="width" class="form-control">
                        <div class="invalid-feedback">
                            Please set a valid width.
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <span class="form-text">
                            Width needs to be a positive integer.
                        </span>
                    </div>
                </div>
                <div class="row mb-3 g-3 align-items-center">
                    <div class="col-sm-2 col-lg-1">
                        <label for="size" class="col-form-label">Length (CM)</label>
                    </div>
                    <div class="col-sm-auto">
                        <input type="number" step="1" min="1" id="length" name="length" class="form-control">
                        <div class="invalid-feedback">
                            Please set a valid length.
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <span class="form-text">
                            Length needs to be a positive integer.
                        </span>
                    </div>
                </div>
            </fieldset>
        </div>
    </form>
</div>