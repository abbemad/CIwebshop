<h2><?= $title;?> </h2>

<?php echo validation_errors();?>

<?php echo form_open_multipart('prices/create'); ?>
    <div class="form-group">
        <label>Price</label>
        <input type="text" class="form-control" name="name" placeholder="Enter price">
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>