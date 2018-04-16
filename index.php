<?php
include "application/config.php";
$config = new config();
$texts = $config->snippeter->getTexts();
?>

<!doctype html>
<html lang="<?=$config->getLanguage()['ab']?>">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="/libs/bootstrap-4.1.0-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="/fonts1942-report/stylesheet.css">
		<link rel="stylesheet" href="/style.css">
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<title>Hello, world!</title>
	</head>
	<body>
		<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
			<a class="navbar-brand logoColor" style="font-family: '1942 report'; font-size: 30px; font-weight: bold" href="#">Falling Worlds</a>
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
			</div>
		</nav>
		
		<div class="fullscreen-bg">
			<video loop muted autoplay poster="application/contents/images/videoframe.jpg" class="fullscreen-bg__video">
				<source src="application/contents/videos/big_buck_bunny.webm" type="video/webm">
				<source src="application/contents/videos/big_buck_bunny.mp4" type="video/mp4">
				<source src="application/contents/videos/big_buck_bunny.ogv" type="video/ogg">
			</video>
		</div>
		
		<div class="container" style="top: 70px; padding-bottom: 40px; position: relative;">
			<div class="row content" id="beginning" style="margin-top: 60px; background: rgba(200, 200, 200, 0.8)">
				<!--<div class="col-xs-12">
					<div class="row">-->
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
					<!--</div>
				</div>-->
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
			<div class="row content" style="margin-top: 60px; background: rgba(200, 200, 200, 0.8)" id="contact">
				<div class="col col-xs-12">
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
						<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><?=$texts['contact']['contact_form']['form']?></a>
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
					<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
						<form class="row" style="padding: 30px 0" name="contact_form" id="contact_form" onsubmit="javascript: return sendMessage()" autocomplete="off">
							<div id="contact_success" class="alert alert-success w-100" style="display: none" role="alert"><?=$texts['contact']['contact_form']['success_message']?></div>
							<div id="contact_error" class="alert alert-danger w-100" style="display: none" role="alert"><?=$texts['contact']['contact_form']['error_message']?></div>
							
							<div class="form-group col col-xs-12 col-md-6">
								<input type="text" class="form-control required" name="contact_firstname" id="contact_firstname" placeholder="<?=$texts['contact']['contact_form']['first_name']?>">
							</div>
							<div class="form-group col col-xs-12 col-md-6">
								<input type="text" class="form-control required" name="contact_lastname" id="contact_lastname" placeholder="<?=$texts['contact']['contact_form']['last_name']?>">
							</div>
							<div class="form-group col col-xs-12 col-md-6">
								<input type="email" class="form-control required" name="contact_email" id="contact_email" aria-describedby="emailHelp" placeholder="<?=$texts['contact']['contact_form']['email']?>">
								<small id="emailHelp" class="form-text text-muted"><?=$texts['contact']['contact_form']['form_help']?></small>
							</div>
							<div class="form-group col col-xs-12 col-md-6">
								<select class="form-control required" name="contact_country" id="contact_country">
									<option value=""><?=$texts['contact']['contact_form']['country']?></option>
									<option value="af">Afghanistan</option><option value="ax">Aland Islands</option><option value="al">Albania</option><option value="dz">Algeria</option><option value="as">American Samoa</option><option value="ad">Andorra</option><option value="ao">Angola</option><option value="ai">Anguilla</option><option value="aq">Antarctica</option><option value="ag">Antigua And Barbuda</option><option value="ar">Argentina</option><option value="am">Armenia</option><option value="aw">Aruba</option><option value="au">Australia</option><option value="at">Austria</option><option value="az">Azerbaijan</option><option value="bs">Bahamas</option><option value="bh">Bahrain</option><option value="bd">Bangladesh</option><option value="bb">Barbados</option><option value="by">Belarus</option><option value="be">Belgium</option><option value="bz">Belize</option><option value="bj">Benin</option><option value="bm">Bermuda</option><option value="bt">Bhutan</option><option value="bo">Bolivia</option><option value="ba">Bosnia And Herzegovina</option><option value="bw">Botswana</option><option value="bv">Bouvet Island</option><option value="br">Brazil</option><option value="io">British Indian Ocean Territory</option><option value="bn">Brunei Darussalam</option><option value="bg">Bulgaria</option><option value="bf">Burkina Faso</option><option value="bi">Burundi</option><option value="kh">Cambodia</option><option value="cm">Cameroon</option><option value="ca">Canada</option><option value="cv">Cape Verde</option><option value="ky">Cayman Islands</option><option value="cf">Central african republic</option><option value="td">Chad</option><option value="cl">Chile</option><option value="cn">China</option><option value="cx">Christmas island</option><option value="cc">Cocos (keeling) Islands</option><option value="co">Colombia</option><option value="km">Comoros</option><option value="cg">Congo</option><option value="cd">The Democratic Republic Of Congo</option><option value="ck">Cook Islands</option><option value="cr">Costa Rica</option><option value="ci">Cote D'ivoire</option><option value="hr">Croatia</option><option value="cu">Cuba</option><option value="cy">Cyprus</option><option value="cz">Czech Republic</option><option value="dk">Denmark</option><option value="dj">Djibouti</option><option value="dm">Dominica</option><option value="do">Dominican Republic</option><option value="ec">Ecuador</option><option value="eg">Egypt</option><option value="sv">El Salvador</option><option value="gq">Equatorial Guinea</option><option value="er">Eritrea</option><option value="ee">Estonia</option><option value="et">Ethiopia</option><option value="fk">Falkland Islands (malvinas)</option><option value="fo">Faroe Islands</option><option value="fj">Fiji</option><option value="fi">Finland</option><option value="fr">France</option><option value="gf">French Guiana</option><option value="pf">French Polynesia</option><option value="tf">French Southern Territories</option><option value="ga">Gabon</option><option value="gm">Gambia</option><option value="ge">Georgia</option><option value="de">Germany</option><option value="gh">Ghana</option><option value="gi">Gibraltar</option><option value="gr">Greece</option><option value="gl">Greenland</option><option value="gd">Grenada</option><option value="gp">Guadeloupe</option><option value="gu">Guam</option><option value="gt">Guatemala</option><option value="gg">Guernsey</option><option value="gn">Guinea</option><option value="gw">Guinea-bissau</option><option value="gy">Guyana</option><option value="ht">Haiti</option><option value="hm">Heard Island And Mcdonald Islands</option><option value="va">Holy See (vatican City State)</option><option value="hn">Honduras</option><option value="hk">Hong Kong</option><option value="hu">Hungary</option><option value="is">Iceland</option><option value="in">India</option><option value="id">Indonesia</option><option value="ir">Iran</option><option value="iq">Iraq</option><option value="ie">Ireland</option><option value="im">Isle Of Man</option><option value="il">Israel</option><option value="it">Italy</option><option value="jm">Jamaica</option><option value="jp">Japan</option><option value="je">Jersey</option><option value="jo">Jordan</option><option value="kz">Kazakhstan</option><option value="ke">Kenya</option><option value="ki">Kiribati</option><option value="kp">North Korea</option><option value="kr">South Korea</option><option value="kw">Kuwait</option><option value="kg">Kyrgyzstan</option><option value="la">Lao People's Democratic Republic</option><option value="lv">Latvia</option><option value="lb">Lebanon</option><option value="ls">Lesotho</option><option value="lr">Liberia</option><option value="ly">Libyan Arab Jamahiriya</option><option value="li">Liechtenstein</option><option value="lt">Lithuania</option><option value="lu">Luxembourg</option><option value="mo">Macao</option><option value="mk">Macedonia</option><option value="mg">Madagascar</option><option value="mw">Malawi</option><option value="my">Malaysia</option><option value="mv">Maldives</option><option value="ml">Mali</option><option value="mt">Malta</option><option value="mh">Marshall Islands</option><option value="mq">Martinique</option><option value="mr">Mauritania</option><option value="mu">Mauritius</option><option value="yt">Mayotte</option><option value="mx">Mexico</option><option value="fm">Micronesia</option><option value="md">Moldova</option><option value="mc">Monaco</option><option value="mn">Mongolia</option><option value="me">Montenegro</option><option value="ms">Montserrat</option><option value="ma">Morocco</option><option value="mz">Mozambique</option><option value="mm">Myanmar</option><option value="na">Namibia</option><option value="nr">Nauru</option><option value="np">Nepal</option><option value="nl">Netherlands</option><option value="an">Netherlands Antilles</option><option value="nc">New Caledonia</option><option value="nz">New Zealand</option><option value="ni">Nicaragua</option><option value="ne">Niger</option><option value="ng">Nigeria</option><option value="nu">Niue</option><option value="nf">Norfolk Island</option><option value="mp">Northern Mariana Islands</option><option value="no">Norway</option><option value="om">Oman</option><option value="pk">Pakistan</option><option value="pw">Palau</option><option value="ps">Palestine</option><option value="pa">Panama</option><option value="pg">Papua New Guinea</option><option value="py">Paraguay</option><option value="pe">Peru</option><option value="ph">Philippines</option><option value="pn">Pitcairn</option><option value="pl">Poland</option><option value="pt">Portugal</option><option value="pr">Puerto Rico</option><option value="qa">Qatar</option><option value="re">Reunion</option><option value="ro">Romania</option><option value="ru">Russian Federation</option><option value="rw">Rwanda</option><option value="sh">Saint Helena</option><option value="kn">Saint Kitts And Nevis</option><option value="lc">Saint Lucia</option><option value="pm">Saint Pierre And Miquelon</option><option value="vc">Saint Vincent And The Grenadines</option><option value="ws">Samoa</option><option value="sm">San Marino</option><option value="st">Sao Tome And Principe</option><option value="sa">Saudi Arabia</option><option value="sn">Senegal</option><option value="rs">Serbia</option><option value="sc">Seychelles</option><option value="sl">Sierra Leone</option><option value="sg">Singapore</option><option value="sk">Slovakia</option><option value="si">Slovenia</option><option value="sb">Solomon Islands</option><option value="so">Somalia</option><option value="za">South Africa</option><option value="gs">South Georgia And The South Sandwich islands</option><option value="es">Spain</option><option value="lk">Sri Lanka</option><option value="sd">Sudan</option><option value="sr">Suriname</option><option value="sj">Svalbard And Jan Mayen</option><option value="sz">Swaziland</option><option value="se">Sweden</option><option value="ch">Switzerland</option><option value="sy">Syrian Arab Republic</option><option value="tw">Taiwan</option><option value="tj">Tajikistan</option><option value="tz">Tanzania</option><option value="th">Thailand</option><option value="tl">Timor-leste</option><option value="tg">Togo</option><option value="tk">Tokelau</option><option value="to">Tonga</option><option value="tt">Trinidad And Tobago</option><option value="tn">Tunisia</option><option value="tr">Turkey</option><option value="tm">Turkmenistan</option><option value="tc">Turks And Caicos Islands</option><option value="tv">Tuvalu</option><option value="ug">Uganda</option><option value="ua">Ukraine</option><option value="ae">United Arab Emirates</option><option value="gb">United Kingdom</option><option value="us">United States</option><option value="um">United States Minor Outlying Islands</option><option value="uy">Uruguay</option><option value="uz">Uzbekistan</option><option value="vu">Vanuatu</option><option value="ve">Venezuela</option><option value="vn">Viet Nam</option><option value="vg">British Virgin Islands</option><option value="vi">U.S. Virgin Islands</option><option value="wf">Wallis And Futuna</option><option value="eh">Western Sahara</option><option value="ye">Yemen</option><option value="zm">Zambia</option><option value="zw">Zimbabwe</option>
								</select>
							</div>
							<div class="form-group col-12 col-xs-12">
								<textarea class="form-control required" name="contact_message" id="contact_message" placeholder="<?=$texts['contact']['contact_form']['message']?>"></textarea>
							</div>
							<div class="form-group col-6">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="contact_newsletter" id="contact_newsletter" value="1" checked="checked">
									<label class="form-check-label" for="contact_newsletter"><?=$texts['contact']['contact_form']['receive_newsletter']?></label>
								</div>
							</div>
							<div class="form-group col-6 text-right">
								<div class="g-recaptcha" style="display: inline-block" data-sitekey="6LezYlMUAAAAAL67TV34-fARTG-yenvDpSyGje_D"></div>
							</div>
							<div class="form-group col-12 text-right">
								<button type="submit" class="btn btn-primary" id="contact_submit"><?=$texts['contact']['contact_form']['send']?></button>
							</div>
							<div class="form-group col-12 text-center">
								<div class="progress" id="contact_progress" style="display: none">
									<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
								</div>
							</div<
						</form>
					</div>
				</div>
				</div>
			</div>
		</div>
		
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="/libs/jquery/jquery-3.3.1.min.js"></script>
		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>-->
		<script src="/libs/bootstrap-4.1.0-dist/js/bootstrap.min.js"></script>
		<script src="/libs/janpaepke-ScrollMagic-ae215ee/scrollmagic/minified/ScrollMagic.min.js"></script>
		<script>
			function sendMessage(){
				//console.log($("#contact_form").serialize());
				$("#contact_success, #contact_error").hide();
				let error = null;
				$.each($("#contact_form").find("input, select, textarea"), function(i, el){
					elem = $(el);
					elem.removeClass('is-invalid');
					if(elem.hasClass("required") && (elem.val()==undefined || elem.val()=='' || elem.val()==null)){
						elem.addClass('is-invalid');
						error = true;
					}
				});
				console.log(("#contact_form").serialize());return false;
				if(error===null){
					$("#contact_submit").hide();
					$("#contact_progress").show();
					$.post("/application/contactSend.php?f=sendMsg", $("#contact_form").serialize(), function(data) {
						console.log(data.SUCCESS);
						if(data.SUCCESS==true)
							$("#contact_success").show();
						$("#contact_progress").hide();
						else{
							$("#contact_submit, #contact_error").show();
							$("#contact_progress").hide();
						}
					}, "json");
				}else{
					$("#contact_submit, #contact_error").show();
					$("#contact_progress").hide();
				}
				
				return false;
			}
		
		
			$("li.nav-item > a").click(function(){
				let scrT = $($(this).attr('href')).offset().top - 140;
				$('html,body').animate({scrollTop: scrT},'slow');
				return false;
			});
		</script>
		
	</body>
</html>