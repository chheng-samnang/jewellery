<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<form method="post" id="upload_form">
	<input type="text"  name="user" id="user">
	<br />
	<br />

	<input type="submit" name="upload" id="upload" value="Add">
</form>
<script>
	$(document).ready(function()
		{
			$('#upload_form').on('submit', function(e)
			{
				e.preventDefault();
				if($('#user').val()== '')
				{
					alert("Hello");
				}
				else
				{

					$.ajax({
						url:"<?php echo base_url();?>comment",
						method: "post",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData:false,
						success:function(data){
							// alert("Hello1");
						}
						alert("Hello1");
					});
				}
			});
		});
</script>