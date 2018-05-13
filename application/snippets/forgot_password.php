<?php
	require 'application/loginManager.php';
	$login = new loginManager($this->database);
	$err = null;

	$hs = (isset($_POST['hs']))
					?$_POST['hs']
					:isset($_GET['hs'])
						?$_GET['hs']
						:null;
	if($hs!='')
		$usr = $login->getUserByForgetpassHash($_GET['hs']);
	if($hs=='' || $usr===false){
		echo "<script>window.location.href = \"/\"</script>";
		exit;
	}

	if(isset($_POST['hs']) && isset($_POST['new_pass']) && isset($_POST['confirm_new_pass']) && $_POST['new_pass']==$_POST['confirm_new_pass']){
		$login->resetPassword($usr->id, $_POST['hs'], $_POST['new_pass']);
		echo "<script>alert('{$this->textFile['forget_pass']['conclude']}');window.location.href = \"/{$this->language['ab']}/login\";</script>";
	}

?>

<div class="col-10" style="padding-right: 0"></div>
<div class="col-12 col-md-6 offset-md-3" style="padding: 30px">
	<div id="err_void" class="alert alert-danger w-100" style="display: none" role="alert"><?=$this->textFile['forget_pass']['err_void']?></div>
	<div id="err_unlike" class="alert alert-danger w-100" style="display: none" role="alert"><?=$this->textFile['forget_pass']['err_unlike']?></div>
	<form action="" method="post" autocomplete="off" id="loginForm" onsubmit="javascript: return validateFields()">
		<input type="hidden" name="hs" id="hs" value="<?=$_GET['hs']?>" />
		<div class="row">
			<div class="col-12">
				<h2><?=$this->textFile['forget_pass']['hello']?> <?=$usr->nome?></h2>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-12">
				<label for="new_pass"><?=$this->textFile['forget_pass']['fill_new_pass']?></label>
				<input type="password" class="form-control required" name="new_pass" id="new_pass" placeholder="<?=$this->textFile['forget_pass']['fill_new_pass']?>">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-12">
				<label for="confirm_new_pass"><?=$this->textFile['forget_pass']['confirm_new_pass']?></label>
				<input type="password" class="form-control required" name="confirm_new_pass" id="confirm_new_pass" placeholder="<?=$this->textFile['forget_pass']['confirm_new_pass']?>">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-12 col-md-4">
				<input class='btn btn-success w-100' style='font-weight: bold' type='submit' name='send' value='<?=$this->textFile['forget_pass']['redefine_pass']?>'>
			</div>
		</div>
	</form>
</div>
<script>
	function validateFields(){
		let pval = $("input#new_pass").val();
		let nval = $("input#confirm_new_pass").val();
		$('div#err_void, div#err_unlike').hide();
		if(pval==undefined || pval=='' || nval==undefined || nval==''){
			$('div#err_void').show();
			return false;
		}else if(pval!=nval){
			$('div#err_unlike').show();
			return false;
		}
		return true;
	}
</script>
