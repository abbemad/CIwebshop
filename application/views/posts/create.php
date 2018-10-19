<h2><?= $title; ?> </h2>

<?php echo validation_errors(); ?>
<?php echo form_open('posts/create'); ?>

  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor" type="password" class="form-control" name="body" placeholder="Add body"></textarea>
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>