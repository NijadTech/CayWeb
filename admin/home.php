<?php require_once("./db_connect.php"); ?>
<style>
	.custom-menu {
        z-index: 1000;
	    position: absolute;
	    background-color: #ffffff;
	    border: 1px solid #0000001c;
	    border-radius: 5px;
	    padding: 8px;
	    min-width: 13vw;
}
a.custom-menu-list {
    width: 100%;
    display: flex;
    color: #4c4b4b;
    font-weight: 600;
    font-size: 1em;
    padding: 1px 11px;
}
	span.card-icon {
    position: absolute;
    font-size: 3em;
    bottom: .2em;
    color: #ffffff80;
}
.file-item{
	cursor: pointer;
}
a.custom-menu-list:hover,.file-item:hover,.file-item.active {
    background: #80808024;
}
table th,td{
	/*border-left:1px solid gray;*/
}
a.custom-menu-list span.icon{
		width:1em;
		margin-right: 5px
}
.candidate {
    margin: auto;
    width: 23vw;
    padding: 0 10px;
    border-radius: 20px;
    margin-bottom: 1em;
    display: flex;
    border: 3px solid #00000008;
    background: #8080801a;

}
.candidate_name {
    margin: 8px;
    margin-left: 3.4em;
    margin-right: 3em;
    width: 100%;
}
	.img-field {
	    display: flex;
	    height: 8vh;
	    width: 4.3vw;
	    padding: .3em;
	    background: #80808047;
	    border-radius: 50%;
	    position: absolute;
	    left: -.7em;
	    top: -.7em;
	}
	
	.candidate img {
    height: 100%;
    width: 100%;
    margin: auto;
    border-radius: 50%;
}
.vote-field {
    position: absolute;
    right: 0;
    bottom: -.4em;
}
div#img-holder {
    width: 100%;
    height: 45vh;
}
div#img-holder>img {
    height: 100%;
    width: 100%;
	object-fit:cover;
	object-position:center center;

}

</style>

<div class="containe-fluid">

	<div class="row mt-3 ml-3 mr-3 mb-2">
		<div class="col-lg-12">
			<div class="card">
			
				
									
				</div>
			</div>
		</div>



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






      


	</div>
	<div class="row m-3">
		<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-3">
			<div class="card rounded-0 shadow">
				<div class="card-body">
					<div class="container-fluid">
						<h5 class="tex-muted"> Menu</h5>
						<?php 
						$menu_a = $conn->query("SELECT * FROM `product_list` ")->num_rows;
						?>
						<h2 class="text-right"><b><?= number_format($menu_a) ?></b></h2>
					</div>
				</div>
			</div>
		</div>

	
		<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-3">
			<div class="card rounded-0 shadow">
				<div class="card-body">
					<div class="container-fluid">
						<h5 class="tex-muted">Doğrulama Siparişleri</h5>
						<?php 
						$o_fv = $conn->query("SELECT * FROM `orders` where `status` = 0")->num_rows;
                        
					   
						if (!isset($_SESSION['Order_count']) || empty($_SESSION['Order_count'])) {
							$_SESSION['Order_count'] = number_format($o_fv);
						}
						

						



						
						?>
						<h2 class="text-right"><b><?= number_format($o_fv) ?></b></h2>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-3">
			<div class="card rounded-0 shadow">
				<div class="card-body">
					<div class="container-fluid">
						<h5 class="tex-muted">Teslim Edlimiş Siparişler</h5>
						<?php 
						$o_c = $conn->query("SELECT * FROM `orders` where `status` = 1")->num_rows;

						?>
						<h2 class="text-right"><b><?= number_format($o_c) ?></b></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	

</div>
<script>
	
</script>












<script src="notif.js"></script>










<?php $conn->close() ?>