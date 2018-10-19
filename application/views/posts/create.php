<h2><?= $title; ?> </h2>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('posts/create'); ?>

  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor" type="password" class="form-control" name="body" placeholder="Add body"></textarea>
  </div>
  <div class="form-group">
  <label>Category</label>
    <select name="category_id" class="form-control">
      <?php foreach($categories as $category):?>
        <option value="<?php echo $category['id'];  ?>"><?php echo $category['name']; ?> </option>
      <?php endforeach;?>
    </select>
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>