<?php 

?>

<div class="container-fluid">
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
	<div class="row">
	
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			
			<div class="card-body">
				<div class="table-responsive">
					<table class="table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Adi</th>
								<th class="text-center">Soyadi</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include 'db_connect.php';
								$users = $conn->query("SELECT * FROM users order by name asc");
								$i = 1;
								while($row= $users->fetch_assoc()):
							?>
							<tr>
								<td>
									<?php echo $i++ ?>
								</td>
								<td>
									<?php echo $row['name'] ?> 
								</td>
								<td>
									<?php echo $row['username'] ?> 
								</td>
								<td>
									<center>
											<div class="btn-group">
											<button type="button" class="btn btn-primary">Action</button>
											<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="sr-only">Açılır Menüyü Değiştir</span>
											</button>
											<div class="dropdown-menu">
												<a class="dropdown-item edit_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item delete_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>sil</a>
											</div>
											</div>
											</center>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>
<script>
	
$('#new_user').click(function(){
	uni_modal('Yeni kullanci','manage_user.php')
})
$('.edit_user').click(function(){
	uni_modal('Edit User','manage_user.php?id='+$(this).attr('data-id'))
})
$('table').dataTable()
</script>



<script src="notif.js"></script>