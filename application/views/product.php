<div class="row">

<?php
$i = 0;
$cart_session = @$this->session->userdata('cart_session');
foreach($row as $row){

?>
<div class="col-sm-6 col-md-3">
<div class="thumbnail">

<img src="<?php echo base_url();?>assets/images/products/<?php if($row->image != ''){  echo $row->image; } else { echo 'no_image.png'; } ?>" alt="<?php echo $row->name;?>" class="img-responsive" style="height:200px">
</div>

<h3><?php echo $row->name;?></h3>
<p>$ <?php echo $row->price;?> </p>
<p>

<div class="input-group" style="width:120px">
    <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-number less_qty" position="<?php echo $i;?>">
        <span class="glyphicon glyphicon-minus"></span>
        </button>
    </span>
    
        <input type="text" id="qty[<?php echo $i;?>]" class="form-control input-number qty<?php echo $row->id;?>" style="text-align:right;width:45px" value="<?php echo @$cart_session[$row->id];?>" onkeypress="return numberOnly(event)">
    
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-number add_qty" position="<?php echo $i;?>">
        <span class="glyphicon glyphicon-plus"></span>
        </button>
    </span>
    
    <div class="col-md-1" style="float:right;margin-left:-5px">
            <button class="btn btn-primary add_to_cart" type="button" id="<?php echo $row->id;?>">Buy</button>
        </div>
        
</div>

</p>

</div>
<?php
$i++;
}
?>
</div>