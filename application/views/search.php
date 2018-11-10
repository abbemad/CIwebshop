<h2> <?php echo $title ?></h2>

<?php echo validation_errors();?>

<form class="form-inline my-2 my-lg-0" method='post' action="<?= base_url() ?>search/loadSearch" >
    <input class="form-control mr-sm-2" type='text' name='search' value='<?= $search ?>'>
    <input class="btn btn-secondary my-2 my-sm-0" type='submit' name='submit' value='Search'>
</form>

<!-- foreach through products -->
<?php foreach($result as $data) : ?>

    <?php $content = substr($data['body'],0,180)."..."; ?>
    <h3> <?php echo $data['name']; ?> </h3>
    <div class="row">
    <div class="col-md-3">
    <img class="product-thumb thumbnail" src="<?php echo site_url(); ?>assets/images/products/<?php echo $data['image']; ?>">
    </div>

    <div class="col-md-9">
    <small class="product-date">Product added: <?php echo $data['created_at']; ?> </small> 
        <br>
        <h3> $ <?php echo $data['price']; ?> </h3>
        <br>
            <?php echo word_limiter($data['body'], 50); ?> 
        <br>
            <p><a class="btn btn-default" href="<?php echo site_url('/products/'.$data['slug']); ?>">
                 Details
                </a>
            </p>
    </div>
    </div>
<?php endforeach; ?>

<?php if(count($result) == 0){
        echo "No results found";
    } ?>

<!-- pagination -->
<div class="pagination-links">
    <?php echo $this->pagination->create_links(); ?>
</div>