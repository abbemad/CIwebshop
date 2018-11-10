<h2><?= $title;?></h2>
<ul class="list-group">
    <?php foreach($categories as $category):  ?>
        <li class="list-group-item"><a href="<?php echo site_url('/categories/products/'.$category['id']); ?>"><?php echo $category['category_name'];?></a>
            <?php if($this->session->userdata('user_id') == $category['user_id']): ?>  
                <form class="cat-delete" action="categories/delete/<?php echo $category['id']; ?>" method="POST">
                    <input type="submit" class="btn-link text-danger" value="[DELETE]">
                </form>
            <?php endif; ?>
        </li>
    <?php endforeach;  ?>

</ul>
