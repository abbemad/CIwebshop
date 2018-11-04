<h2> <?php echo $product['title']; ?></h2>
    <small class="product-date">product created: <?php echo $product['created_at']; ?> </small> <br>

    <img src="<?php echo site_url(); ?>assets/images/products/<?php echo $product['product_image']; ?> ">

        <div class="product-body">
            <?php echo $product['body']; ?>
        </div>   
<?php if($this->session->userdata('user_id') == $product['user_id']): ?>     
    <hr>
    <a class="btn btn-default pull-left" href="<?php echo base_url(); ?>products/edit/<?php echo $product['slug']; ?>">Edit</a>

    <?php echo form_open('/products/delete/'.$product['id']); ?>
        <input type="submit" value="delete" class="btn btn-danger">
    </form>
    <?php endif; ?>
    <hr>
