
 <!-- Masthead-->
 <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-center mb-4 page-title">
                    	<h1 class="text-white"> Sipariş </h1>
                        <hr class="divider my-4 bg-dark" />
                    </div>
                    
                </div>
            </div>
        </header>
	<section class="page-section" id="menu">
        <div class="container">
        	<div class="row">
        	<div class="col-lg-8">
        		<div class="sticky">
	        		<div class="card">
	        			<div class="card-body">
	        				<div class="row">
		        				<div class="col-md-8"><b></b></div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
        		<?php 
        		if(isset($_SESSION['login_user_id'])){
					$data = "where c.user_id = '".$_SESSION['login_user_id']."' ";	
				}else{
					$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
					$data = "where c.client_ip = '".$ip."' ";	
				}
				$total = 0;
				$get = $conn->query("SELECT *,c.id as cid FROM cart c inner join product_list p on p.id = c.product_id ".$data);
                
				$isCartEmpty = true;
				if($get->num_rows > 0)
				{
					$isCartEmpty = false;

				}

                echo '<script>';
echo 'var isCartEmpty = ' . ($isCartEmpty ? 'true' : 'false') . ';';
echo '</script>';

				while($row= $get->fetch_assoc()):
					
                 

					
				
					
        		?>

        		<div class="card">
	        		<div class="card-body">
		        		<div class="row">
			        		<div class="col-md-4 d-flex align-items-center" style="text-align: -webkit-center">
								<div class="col-auto">	
			        				<a href="admin/ajax.php?action=delete_cart&id=<?php echo $row['cid'] ?>" class="rem_cart btn btn-sm btn-outline-danger" data-id="<?php echo $row['cid'] ?>"><i class="fa fa-trash"></i></a>
								</div>	
								<div class="col-auto flex-shrink-1 flex-grow-1 text-center">	
			        				<img src="assets/img/<?php echo $row['img_path'] ?>" alt="">
								</div>	
			        		</div>
			        		<div class="col-md-4">
			        			<p><b><large><?php echo $row['name'] ?></large></b></p>
			        			
			        		
			        			<div class="input-group mb-3">
								  <div class="input-group-prepend">
								    <button class="btn btn-outline-secondary qty-minus" type="button"   data-id="<?php echo $row['cid'] ?>"><span class="fa fa-minus"></button>
								  </div>
								  <input type="number" readonly value="<?php echo $row['qty'] ?>" min = 1 class="form-control text-center" name="qty" >
								  <div class="input-group-prepend">
								    <button class="btn btn-outline-secondary qty-plus" type="button" id=""  data-id="<?php echo $row['cid'] ?>"><span class="fa fa-plus"></span></button>
								  </div>
								</div>
			        		</div>
			        	
		        		</div>
	        		</div>
	        	</div>

	        <?php endwhile; ?>
        	</div>
        	<div class="col-md-4">
        		<div class="sticky">
        			<div class="card">
        				<div class="card-body">
        			
        					<div class="text-center">
        						<button class="btn btn-block btn-outline-dark" type="button" id="checkout">onaylamak</button>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	</div>
        </div>
    </section>
    <style>
    	.card p {
    		margin: unset
    	}
    	.card img{
		    max-width: calc(100%);
		    max-height: calc(59%);
    	}
    	div.sticky {
		  position: -webkit-sticky; /* Safari */
		  position: sticky;
		  top: 4.7em;
		  z-index: 10;
		  background: white
		}
		.rem_cart{
		   position: absolute;
    	   left: 0;
		}
    </style>
    <script>
        
        $('.view_prod').click(function(){
            uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
        })
        $('.qty-minus').click(function(){
		var qty = $(this).parent().siblings('input[name="qty"]').val();
		update_qty(parseInt(qty) -1,$(this).attr('data-id'))
		if(qty == 1){
			return false;
		}else{
			 $(this).parent().siblings('input[name="qty"]').val(parseInt(qty) -1);
		}
		})
		$('.qty-plus').click(function(){
			var qty =  $(this).parent().siblings('input[name="qty"]').val();
				 $(this).parent().siblings('input[name="qty"]').val(parseInt(qty) +1);
		update_qty(parseInt(qty) +1,$(this).attr('data-id'))
		})
		function update_qty(qty,id){
			start_load()
			$.ajax({
				url:'admin/ajax.php?action=update_cart_qty',
				method:"POST",
				data:{id:id,qty},
				success:function(resp){
					if(resp == 1){
						load_cart()
						end_load()
					}
				}
			})

		}



		$('#checkout').click(function(e){
			
              
			if (isCartEmpty) {
                     alert_toast("Your cart is empty. Add items before placing an order.");
                     return;





                                                       }

                else{

                      
          if('<?php echo isset($_SESSION['login_user_id']) ?>' == 1)
		  {


		   

                        
			  e.preventDefault() ;
			  var email = '<?php echo isset($_SESSION['login_email']) ? json_encode($_SESSION['login_email']) : ''; ?>';
              var userId = <?php echo isset($_SESSION['login_user_id']) ? json_encode($_SESSION['login_user_id']) : 'null'; ?>;
              var first_name = <?php echo isset($_SESSION['login_first_name']) ? json_encode($_SESSION['login_first_name']) : 'null'; ?>;
              var last_name = <?php echo isset($_SESSION['login_last_name']) ? json_encode($_SESSION['login_last_name']) : 'null'; ?>;
              var address = <?php echo isset($_SESSION['login_address']) ? json_encode($_SESSION['login_address']) : 'null'; ?>;
               var mobile = <?php echo isset($_SESSION['login_mobile']) ? json_encode($_SESSION['login_mobile']) : 'null'; ?>;
            


			   var dataToSend = 
			  {
             first_name: first_name,
             last_name: last_name,
             address: address,
             mobile: mobile,
             email: email 			 
              };

						  
             $.ajax({
					   url:"./admin/ajax.php?action=save_order",
	                   method:'POST',
	                   data:dataToSend ,
	                   success:function(resp){
		               if(resp==1){
			           alert_toast("Order successfully Placed.") ;

					    setTimeout(function(){
				       location.replace('index.php?page=home')
			                             },1500);
		                         }
		
								}
	                 })

					}



                 else
                    {
 


	                   uni_modal("Checkout","login.php?page=checkout")



	
                    }




				}
			 
          














		}) //end of the function
    </script>
	
