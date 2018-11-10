<h2><?= $title; ?> </h2>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('products/create'); ?>

  <div class="form-group">
    <label>Name product</label>
    <input type="text" class="form-control" name="name" placeholder="Add product">
  </div>

  <div class="form-group">
    <label>Product price</label>
    <input type="decimal" class="form-control" name="price" placeholder="Add new price">
  </div>

  <div class="form-group">
    <label>Description</label>
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

  <div class="form-group">
    <label>Upload image</label>
      <input type="file" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>