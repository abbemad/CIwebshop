<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('products/update'); ?>
	<input type="hidden" name="id" value="<?php echo $product['id']; ?>">
  <div class="form-group">
    <label>Name product</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $product['title']; ?>">
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

  <div class="form-group">
  <label>Price</label>
  <select name="price_id" class="form-control">
    <?php foreach($prices as $price): ?>
      <option value="<?php echo $price['id']; ?>"><?php echo $price['price']; ?></option>
    <?php endforeach; ?>
  </select>
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>