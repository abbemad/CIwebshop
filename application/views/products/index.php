<h2><?= $title ?></h2>

<?php foreach($products as $product) : ?>
    
    <h3>
    <?php 
    // need to edit category: name to category_name echo $product['name'];
    // currently product echos slug instead of name because name is used in category so it displays category instead of name product
    echo $product['slug']; ?>
    
    </h3>
    <div class="row">
    <div class="col-md-3">
    <img class="product-thumb thumbnail" src="<?php echo site_url(); ?>assets/images/products/<?php echo $product['image']; ?>">
    </div>

    <div class="col-md-9">
    <small class="product-date">Product added: <?php echo $product['created_at']; ?> in <strong> <?php echo $product['name']; ?>  </strong> </small> 
        <br>
            <h3> $ <?php echo $product['price']; ?> </h3>
        <br>
            <?php echo word_limiter($product['body'], 50); ?>
            <br>
                <p><a class="btn btn-default" href="<?php echo site_url('/products/'.$product['slug']); ?>">
                        Details
                    </a>
                </p>
    </div>
    </div>
<?php endforeach; ?>
<div class="pagination-links">
    <?php echo $this->pagination->create_links(); ?>
</div>