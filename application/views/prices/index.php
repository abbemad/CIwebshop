<h2><?= $title;?></h2>
<ul class="list-group">
    <?php foreach($prices as $price):  ?>
        <li class="list-group-item"><a href="<?php echo site_url('/products/prices/'.$price['id']); ?>"><?php echo $price['price'];?></a>
            <?php if($this->session->userdata('user_id') == $price['user_id']): ?>  
                <form class="cat-delete" action="prices/delete/<?php echo $price['id']; ?>" method="POST">
                    <input type="submit" class="btn-link text-danger" value="[DELETE]">
                </form>
            <?php endif; ?>
        </li>
    <?php endforeach;  ?>

</ul>
