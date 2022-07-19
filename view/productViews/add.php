<nav class="navbar bg-primary mb-5">
    <div class="container-fluid px-4 ">
        <h2 class="navbar-brand">Product Add</h2>
        <span>
            <button for="product-form" class="btn btn-outline-dark" type="submit">Save</button>
            <a href="/" type="button" class="btn btn-outline-dark" type="submit">Cancel</a>
        </span>
    </div>
</nav>

<div class="container">
    <form method="post">
        <fieldset>
            <div class="row mb-3 g-3 align-items-center">
                <div class="col-sm-1">
                    <label for="sku" class="col-form-label">SKU</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="sku" name="sku" value="<?= $product['sku'] ?? '' ?>" class="form-control" aria-describedby="skuHelpInline">
                </div>
                <div class="col-auto">
                    <span id="skuHelpInline" class="form-text">
                        Must be 8-20 characters long.
                    </span>
                </div>
            </div>
            <div class="row mb-3 g-3 align-items-center">
                <div class="col-sm-1">
                    <label for="name" class="col-form-label">Name</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="name" name="name" value="<?= $product['name'] ?? '' ?>" class="form-control" aria-describedby="nameHelpInline">
                </div>
                <div class="col-auto">
                    <span id="nameHelpInline" class="form-text">
                        Must be 8-20 characters long.
                    </span>
                </div>
            </div>
            <div class="row mb-3 g-3 align-items-center">
                <div class="col-sm-1">
                    <label for="price" class="col-form-label">Price ($)</label>
                </div>
                <div class="col-auto">
                    <input type="number" step=".01" id="price" name="price" value="<?= $product['sku'] ?? '' ?>" class="form-control" aria-describedby="priceHelpInline">
                </div>
                <div class="col-auto">
                    <span id="priceHelpInline" class="form-text">
                        Must be 8-20 characters long.
                    </span>
                </div>
            </div>
        </fieldset>
        
        <div class="row mb-3 g-3 align-items-center">
            <div class="col-auto">
                <label for="productType">Type Switcher</label>
            </div>
            <div class="col-auto">
                <select id="productType" name="type" class="form-select">
                    <option selected>Type Switcher</option>
                    <option value="DVD">DVD</option>
                    <option value="Book">Book</option>
                    <option value="Furniture">Furniture</option>
                </select>
            </div>
            <div class="col-auto">
                <span id="priceHelpInline" class="form-text">
                    Must be 8-20 characters long.
                </span>
            </div>
        </div>

        <fieldset id="discDescription" class="d-none">
            <div class="row mb-3 g-3 align-items-center">
                <div class="col-sm-1">
                    <label for="size" class="col-form-label">Size (MB)</label>
                </div>
                <div class="col-auto">
                    <input type="number" step=".01" id="size" name="size" class="form-control">
                </div>
                <div class="col-auto">
                    <span class="form-text">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore, consequatur.
                    </span>
                </div>
            </div>
        </fieldset>

        <fieldset id="bookDescription" class="d-none">
            <div class="row mb-3 g-3 align-items-center">
                <div class="col-sm-1">
                    <label for="size" class="col-form-label">Weight (MB)</label>
                </div>
                <div class="col-auto">
                    <input type="number" step=".01" id="weight" name="weight" class="form-control">
                </div>
                <div class="col-auto">
                    <span class="form-text">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore, consequatur.
                    </span>
                </div>
            </div>
        </fieldset>

        <fieldset id="furnitureDescription" class="d-none">
            <div class="row mb-3 g-3 align-items-center">
                <div class="col-sm-1">
                    <label for="size" class="col-form-label">Height (CM)</label>
                </div>
                <div class="col-auto">
                    <input type="number" step=".01" id="height" name="height" class="form-control">
                </div>
                <div class="col-auto">
                    <span class="form-text">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore, consequatur.
                    </span>
                </div>
            </div>
            <div class="row mb-3 g-3 align-items-center">
                <div class="col-sm-1">
                    <label for="size" class="col-form-label">Width (CM)</label>
                </div>
                <div class="col-auto">
                    <input type="number" step=".01" id="width" name="width" class="form-control">
                </div>
                <div class="col-auto">
                    <span class="form-text">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore, consequatur.
                    </span>
                </div>
            </div>
            <div class="row mb-3 g-3 align-items-center">
                <div class="col-sm-1">
                    <label for="size" class="col-form-label">Length (CM)</label>
                </div>
                <div class="col-auto">
                    <input type="number" step=".01" id="length" name="length" class="form-control">
                </div>
                <div class="col-auto">
                    <span class="form-text">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore, consequatur.
                    </span>
                </div>
            </div>
        </fieldset>
    </form>
</div>