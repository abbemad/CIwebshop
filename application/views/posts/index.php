<h2><?= $title ?></h2>

<?php foreach($posts as $post) : ?>

    <h3><?php echo $post['title']; ?></h3>
        <small class="post-date">Posted: <?php echo $post['created_at']; ?> </small> 
        <br>
            <?php echo $post['body']; ?> 
            <br>
                <p><a class="btn btn-primary" href="<?php echo site_url('/posts/'.$post['slug']); ?>">
                        Read more 
                    </a>
                </p>
<?php endforeach; ?>