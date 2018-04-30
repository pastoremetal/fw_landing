<?php
	//require 'database.php';
	//echo getcwd();exit;
	require 'application/loginManager.php';
	$login = new loginManager($this->database);

	if(isset($_POST['user'])!='' && isset($_POST['password'])!='' && $_POST['user']!='' && $_POST['password']!=''){
		$login->doLogin($_POST['user'], $_POST['password']);
	}
?>

<div class="col-10" style="padding-right: 0"></div>
<div class="col-6 offset-3">
	<form action="" method="post">
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
