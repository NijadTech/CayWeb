<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Caykapısı_Admin</title>
 	

<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}
?>

</head>
<style>
	body {
		width: 100%;
		height: 100vh;
		background: url('./../assets/img/<?php echo $_SESSION['setting_cover_img'] ?>');
		background-repeat: no-repeat;
		background-size: cover;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.card {
		width: 350px; /* Decreased width */
		background-color: rgba(255, 255, 255, 0.9); /* Adjusted opacity */
		padding: 30px; /* Increased padding */
		border-radius: 20px; /* Increased border radius */
		box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2); /* Increased box shadow */
	}
	.card form {
		margin-top: 20px; /* Added margin to separate form from card edges */
	}
	.card form .form-group {
		margin-bottom: 20px; /* Increased margin between form groups */
	}
	.card form .btn {
		border-radius: 25px; /* Adjusted button border radius */
	}
</style>

<body>

  <main id="main">
    <div class="card">
      <form id="login-form">
        <div class="form-group">
          <label for="username" class="control-label">Kullanıcı Adı</label>
          <input type="text" id="username" name="username" autofocus class="form-control">
        </div>
        <div class="form-group">
          <label for="password" class="control-label">Şifre</label>
          <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="form-group">
          <a href="./../" class="btn btn-secondary">Geri Dön</a>
        </div>
        <center><button class="btn btn-block btn-wave btn-dark">Giriş</button></center>
      </form>
    </div>
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
           



		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){

                   
                    



					location.href ='index.php?page=home';
					

				 





				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>
