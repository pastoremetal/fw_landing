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

	if(isset($_POST['user'])!='' && $_POST['user']!='' && $_POST['forget_pass']==true){
		if($login->requestNewPass($_POST['user']))
			echo "<script>alert('{$this->textFile['login']['req_pass']}');window.location.href = \"/{$this->language['ab']}/login\";</script>";
		else
			echo "<script>alert('{$this->textFile['login']['req_pass_error']}');window.location.href = \"/{$this->language['ab']}/login\";</script>";
	}

	if(isset($_GET['logout']) && $_GET['logout']==true){
		$login->doLogout();
		echo "<script>window.location.href = \"/{$this->language['ab']}/login\";</script>";
	}
?>

<div class="col-10" style="padding-right: 0"></div>
<div class="col-12 col-md-6 offset-md-3" style="padding: 30px">
	<div id="login_error" class="alert alert-danger w-100" style="display: none" role="alert"><?=$this->textFile['login']['login_error']?></div>
	<div id="mail_error" class="alert alert-danger w-100" style="display: none" role="alert"><?=$this->textFile['login']['mail_error']?></div>
	<form action="" method="post" autocomplete="off" id="loginForm">
		<input type="hidden" name="forget_pass" id="forget_pass" value="" />
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
		<!--</div>
		<div class="row">-->
			<div class="col-12 col-md-4 offset-md-4 text-right" style="line-height: 2">
				<a class="text-info" href="#" onclick="forgetPass()"><?=$this->textFile['login']['forgot_password']?></a>
			</div>
		</div>
	</form>
</div>
<script>
	function forgetPass(){
		let usrInput = $("input#user");
		if(usrInput.val()!=undefined && usrInput.val()!=''){
			$("input#forget_pass").val("true");
			$("#loginForm").submit();
		}else{
			$("#mail_error").show();
		}
	}

	if('<?=$err?>'=='wrong')
		$('#login_error').show();
	else if(<?php echo (isset($_SESSION['USER']['LOGED']) && $_SESSION['USER']['LOGED']===true)?'true':'false' ?>)
		window.location.href = "/<?=$this->language['ab']?>/dashboard";
</script>
