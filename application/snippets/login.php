<?php
	require 'application/loginManager.php';
	$login = new loginManager($this->database);
	$err = null;
	if(isset($_POST['user'])!='' && isset($_POST['password'])!='' && $_POST['user']!='' && $_POST['password']!=''){
		if($login->doLogin($_POST['user'], $_POST['password'])===true)
			$err = null;
		else
			$err = "wrong";
	}

	if(isset($_GET['logout']) && $_GET['logout']==true){
		$login->doLogout();
		echo "<script>window.location.href = \"/{$this->language['ab']}/login\";</script>";
	}
?>

<div class="col-10" style="padding-right: 0"></div>
<div class="col-12 col-md-6 offset-md-3" style="padding: 30px">
	<div id="login_error" class="alert alert-danger w-100" style="display: none" role="alert"><?=$this->textFile['login']['login_error']?></div>
	<form action="" method="post" autocomplete="off">
		<div class="row">
			<div class="form-group col col-xs-12">
				<label for="user"><?=$this->textFile['login']['user']?></label>
				<input type="text" class="form-control required" name="user" id="user" placeholder="<?=$this->textFile['login']['user']?>">
			</div>
		</div>
		<div class="row">
			<div class="form-group col col-xs-12">
				<label for="password"><?=$this->textFile['login']['password']?></label>
				<input type="password" class="form-control required" name="password" id="password" placeholder="<?=$this->textFile['login']['password']?>">
			</div>
		</div>
		<div class="row">
			<div class="form-group col col-xs-12 col-md-4">
				<input class='btn btn-success w-100' style='font-weight: bold' type='submit' name='send' value='Entrar'>
			</div>
		</div>
	</form>
</div>
<script>
	if('<?=$err?>'=='wrong')
		$('#login_error').show();
	else if(<?php echo (isset($_SESSION['USER']['LOGED']) && $_SESSION['USER']['LOGED']===true)?'true':'false' ?>)
		window.location.href = "/<?=$this->language['ab']?>/dashboard";
</script>
