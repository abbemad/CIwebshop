<h2> <?php echo $title ?></h2>
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- search bar -->
   <form method='post' action="<?= base_url() ?>index.php/User/loadRecord" >
     <input type='text' name='search' value='<?= $search ?>'><input type='submit' name='submit' value='Submit'>
   </form>

<!-- foreach through posts -->
<?php foreach($result as $data) : ?>

    <?php $content = substr($data['body'],0,180)."..."; ?>
    <div class="row">
    <div class="col-md-3">
    <img class="post-thumb thumbnail" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $data['post_image']; ?>">
    </div>

    <div class="col-md-9">
    <small class="post-date">Posted: <?php echo $data['created_at']; ?> </small> 
        <br>
            <?php echo word_limiter($data['body'], 50); ?> 
            <br>
                <p><a class="btn btn-default" href="<?php echo site_url('/posts/'.$data['slug']); ?>">
                        Read more 
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