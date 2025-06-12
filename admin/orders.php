<div class="container-fluid">
	<div class="card">
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
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>

						<th>#</th>
						<th>Adı</th>
						<th>Address</th>
						<th>Email</th>
						<th>Mobil</th>
						<th>Durum</th>
						<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 1;
						include 'db_connect.php';
						$qry = $conn->query("SELECT * FROM orders ");
						while($row=$qry->fetch_assoc()):
						?>
						<tr>
								<td><?php echo $i++ ?></td>
								<td><?php echo $row['name'] ?></td>
								<td><?php echo $row['address'] ?></td>
								<td><?php echo $row['email'] ?></td>
								<td><?php echo $row['mobile'] ?></td>
								<?php if($row['status'] == 1): ?>
									<td class="text-center"><span class="badge badge-success">Teslim Edilmiş</span></td>
								<?php else: ?>
									<td class="text-center"><span class="badge badge-secondary">Teslim için</span></td>
								<?php endif; ?>
								<td>
									<button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>" >Sipariş Görüntü</button>
								</td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</div>
<script>
	$('.view_order').click(function(){
		uni_modal('Order','view_order.php?id='+$(this).attr('data-id'))
	})
	$('table').dataTable();
</script>


<script src="notif.js"></script>