<?php
session_start(array('name'=>'fw_landing', 'gc_maxlifetime'=>20));
include "application/config.php";
$config = new config();
?>

<!doctype html>
<html lang="<?=$config->getLanguage()['ab']?>">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="/libs/bootstrap-4.1.0-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="/fonts/1942-report/stylesheet.css">
		<link rel="stylesheet" href="/style.css">
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<script src="/libs/jquery/jquery-3.3.1.min.js"></script>
		<script src="/libs/bootstrap-4.1.0-dist/js/bootstrap.min.js"></script>
		<script src="/libs/janpaepke-ScrollMagic-ae215ee/scrollmagic/minified/ScrollMagic.min.js"></script>
		<title>Falling Worlds</title>
	</head>
	<body>

		<nav class="navbar fixed-top navbar-expand-lg navbar-light">
			<!--<a class="navbar-brand logoColor" style="font-family: '1942 report'; font-size: 30px; font-weight: bold" href="#">Falling Worlds</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link text-white" href="#beginning"><?=$texts['menu']['home']?> <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="#about"><?=$texts['menu']['about']?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="#contact"><?=$texts['menu']['contact']?></a>
					</li>
				</ul>
			</div>-->
			<div class="col-12 col-md-6 text-left">
				<a href="/pt/<?=$config->getController()?>">
					<button class="btn btn-sm btn-info col-4 col-md-2" style="font-weight: bold" type="button">PT</button>
				</a>
				<a href="/en/<?=$config->getController()?>">
					<button class="btn btn-sm btn-info col-4 col-md-2" style="font-weight: bold" type="button">EN</button>
				</a>
			</div>
			<div class="col-12 col-md-6 md-text-right xs-mg-top-10">
				<?php
					if(!isset($_SESSION['USER']['LOGED']) || $_SESSION['USER']['LOGED']===false){?>
						<a href="/<?=$config->getLanguage()['ab']?>/login">
							<button class="btn btn-sm btn-light col-4 col-md-2" style="font-weight: bold" type="button"><?=$config->snippeter->getTexts()['menu']['signin']?></button>
						</a>
						<a href="javascript: void(0);" onclick="goToRegister()">
							<button class="btn btn-sm btn-success col-4 col-md-2" style="font-weight: bold" type="button"><?=$config->snippeter->getTexts()['menu']['register']?></button>
						</a>
				<?php }else{?>
						<a href="/<?=$config->getLanguage()['ab']?>/login?logout=true">
							<button class="btn btn-sm btn-success col-4 col-md-2" style="font-weight: bold" type="button"><?=$config->snippeter->getTexts()['menu']['signout']?></button>
						</a>
				<?php }?>
			</div>
		</nav>

		<div class="fullscreen-bg">
			<video loop muted autoplay poster="application/contents/images/back.jpg" class="fullscreen-bg__video">
				<source src="/application/contents/videos/back.webm" type="video/webm">
				<source src="/application/contents/videos/back.mp4" type="video/mp4">
				<source src="/application/contents/videos/back.ogv" type="video/ogg">
			</video>
		</div>

		<div class="container" style="top: 95px; padding-bottom: 40px; position: relative;">
			<!--
			<div class="row content" id="beginning" style="margin-top: 60px; background: rgba(200, 200, 200, 0.8)">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist-beginning" aria-orientation="vertical">
					<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
					<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
					<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
					<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
				</div>
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel-beginning" aria-labelledby="v-pills-home-tab">...</div>
					<div class="tab-pane fade" id="v-pills-profile" role="tabpanel-beginning" aria-labelledby="v-pills-profile-tab">...</div>
					<div class="tab-pane fade" id="v-pills-messages" role="tabpanel-beginning" aria-labelledby="v-pills-messages-tab">...</div>
					<div class="tab-pane fade" id="v-pills-settings" role="tabpanel-beginning" aria-labelledby="v-pills-settings-tab">...</div>
				</div>
			</div>

			<div class="row content" style="margin-top: 60px" id="about">
				<div id="carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel" data-slide-to="0" class="active"></li>
						<li data-target="#carousel" data-slide-to="1"></li>
						<li data-target="#carousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="application/contents/images/videoframe.jpg" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="application/contents/images/videoframe.jpg" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="application/contents/images/videoframe.jpg" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			-->
			<div class="row content" style="" id="contact"><?=$config->snippeter->getSnippet();?></div>
		</div>
	</body>
</html>
<script>
	function goToRegister(){
		if('<?=$config->getController()?>'!='main'){
			location.href = '/<?=$config->getLanguage()['ab']?>';
		}else
			$("a#nav-profile-tab").tab('show');
		return false;
	}
</script>
