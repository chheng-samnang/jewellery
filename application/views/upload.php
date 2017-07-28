<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $("#remove").remove();
    });
});
</script>
<div class="container">
    <div class="row">
        <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
        <form enctype="multipart/form-data" action="" method="post">
            <div class="form-group">
            <!-- <input type="text" name="p_id" value="<?php echo $pro->p_id?>">  -->
                <label>Titile</label>
                <input type="text" name="txt_product">
            	<label>Titile</label>
            	<input type="text" name="txt_titile">
                <label>Choose Files</label>

                <input type="file" class="form-control" name="userFiles[]" multiple/>
            </div>
            <div class="form-group">
                <input class="form-control" type="submit" name="fileSubmit" value="UPLOAD"/>
            </div>
        </form>
    </div>
  
</div>
<input type="file" name="file">
<input type="file" name="file">
<?php foreach ($pro as $value):?>
     <a href="<?php echo base_url('Upload_Files/delete/'.$value->id);?>">Delete</a>
        <img src="<?php echo base_url('assets/uploads/'.$value->file_name);?>" style="width: 100px;">
<?php endforeach ?>