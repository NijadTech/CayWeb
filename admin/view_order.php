<div class="container-fluid">
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Qty</th>
				<th>Sipariş</th>
			
			</tr>
		</thead>
		<tbody>
			<?php 
			$total = 0;
			include 'db_connect.php';
			$qry = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =".$_GET['id']);
			while($row=$qry->fetch_assoc()):
				$total += $row['qty'] ;
			?>
			<tr>
				<td><?php echo $row['qty'] ?></td>
				<td><?php echo $row['name'] ?></td>
				
			</tr>
		<?php endwhile; ?>
		</tbody>
		<tfoot>
			

		</tfoot>
	</table>
	<div class="text-center">
		<button class="btn btn-primary" id="confirm" type="button" onclick="confirm_order()">Onay</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>

	</div>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
</style>
<script>
	function confirm_order(){
		start_load()
		$.ajax({
			url:'ajax.php?action=confirm_order',
			method:'POST',
			data:{id:'<?php echo $_GET['id'] ?>'},
			success:function(resp){
				if(resp == 1){
					alert_toast("Order confirmed.")
                        setTimeout(function(){
                            location.reload()
                        },1500)
				}
			}
		})
	}
</script>