<head>

<div class="container">
    <div class="row">
        <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
       
    </div>
    <div class="row">
        <ul class="gallery">
            <?php 
                if(!empty($files)){ 
                    foreach($files as $file){
                        if($file['file_type']=="img"){


            ?>
            <li class="item"  style="float: left;">
               
              <!--   <button type="button" class="btn btn-danger delbtn" onclick="delenquiry(<?php echo $file['id'];?>)">Delete this Enquiry</button> -->
              <a href="<?php echo base_url('Upload_Files/edit/'.$file['p_id']);?>">Edite</a>
                <img src="<?php echo base_url('assets/uploads/'.$file['file_name']); ?>" style="width: 100px;">
               
                <!-- <p>Uploaded On <?php echo date("j M Y",strtotime($file['created'])); ?></p> -->
            </li>
            <?php }elseif($file['file_type']=="video"){ ?>

                    <video width="400" controls>
                            <source src="<?php echo base_url('assets/uploads/'.$file['file_name']); ?>" type="video/mp4">
                            <source src="mov_bbb.ogg" type="video/ogg">
            
                    </video>
            <?php

             } }?>
            
            <?php }?> 
        </ul>
    </div>
</div>
<script>
    function delenquiry(id) {
    if (confirm("Are you sure?")) {
        $.ajax({
            url: base_url + 'Upload_Files/delete',
            type: 'post',
            data: id,
            success: function () {
                alert('ajax success');
            },
            error: function () {
                alert('ajax failure');
            }
        });
    } else {
        alert(id + " not deleted");
    }
}
</script>