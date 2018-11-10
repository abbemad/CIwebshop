<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('products/update'); ?>
	<input type="hidden" name="id" value="<?php echo $product['id']; ?>">
  <div class="form-group">
    <label>Name product</label>
    <input type="text" class="form-control" name="title" placeholder="Change product" value="<?php echo $product['title']; ?>">
  </div>

  
  <div class="form-group">
    <label>Product price</label>
    <input type="decimal" class="form-control" name="price" placeholder="Change price"  value="<?php echo $product['price']; ?>">
  </div>

  <div class="form-group">
    <label>Description</label>
    <textarea id="editor" class="form-control" name="body" placeholder="Add Body"><?php echo $product['body']; ?></textarea>
  </div>
  <div class="form-group">
  <label>Category</label>
  <select name="category_id" class="form-control">
    <?php foreach($categories as $category): ?>
      <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
    <?php endforeach; ?>
  </select>
  </div>


  <button type="submit" class="btn btn-default">Submit</button>
</form>