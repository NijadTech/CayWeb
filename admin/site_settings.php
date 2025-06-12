<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * from system_settings limit 1");
if($qry->num_rows > 0){
	foreach($qry->fetch_array() as $k => $val){
		$meta[$k] = $val;
	}
}
 ?>
<div class="container-fluid">
	
	<div class="card col-lg-12">
	<div  class="col-lg-6"  > 
          
		  <div  class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
	  <div class="toast-header">
		  <strong class="mr-auto">Notification</strong>
		  <small>siparişiniz var</small>
		  <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
		  </button>
	  </div>
	  <div class="toast-body">
			
	  </div>
  </div>
  
  
		  </div>
		<div class="card-body">
			<form action="" id="manage-settings">
				<div class="form-group">
					<label for="name" class="control-label">System Adı</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo isset($meta['name']) ? $meta['name'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="email" class="control-label">Email</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo isset($meta['email']) ? $meta['email'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="contact" class="control-label">İletişim</label>
					<input type="text" class="form-control" id="contact" name="contact" value="<?php echo isset($meta['contact']) ? $meta['contact'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="address" class="control-label">Address</label>
					<input type="text" class="form-control" id="address" name="address" value="<?php echo isset($meta['address']) ? $meta['address'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="" class="control-label">Image</label>
					<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
				</div>
				<div class="form-group">
					<img src="<?php echo isset($meta['cover_img']) ? '../assets/img/'.$meta['cover_img'] :'' ?>" alt="" id="cimg">
				</div>
				<center>
					<button class="btn btn-info btn-primary btn-block col-md-2">Save</button>
				</center>
			</form>
		</div>
	</div>
	<style>
	img#cimg{
		max-height: 10vh;
		max-width: 6vw;
	}
</style>

<script>
    function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#manage-settings').submit(function(e){
        e.preventDefault();
        start_load();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url:'ajax.php?action=save_settings',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            error: function(err){
                console.log(err);
            },
            success: function(resp){
                if(resp == 1){
                    alert_toast('Data successfully saved.', 'success');
                    setTimeout(function(){
                        location.reload();
                    }, 1000);
                } else {
                    alert_toast('Error occurred while saving data.', 'error');
                }
            }
        });
    });
</script>

<style>
	
</style>
</div>


<script src="notif.js"></script>
