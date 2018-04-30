<div class="col-xs-12 col-md-3" style="padding-right: 0">
	<div>
		<nav>
			<div class="nav flex-column nav-pills" id="nav-tab" role="tablist"  aria-orientation="vertical">
				<a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?=$this->textFile['about']['about']?></a>
				<a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?=$this->textFile['register']['register']?></a>
				<a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><?=$this->textFile['contact']['contact_form']['form']?></a>
			</div>
		</nav>
	</div>
</div>
<div class="col-xs-12 col-md-8" style="">
	<div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			<div class="row" style="padding: 30px 0;">
				<div class="col">
					<h1 style="font-family: '1942 report';">Falling Worlds</h1>
					<p style="font-size: 1.2rem"><?=$this->textFile['about']['welcometext']?></p>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
			<div class="row" style="padding-top: 30px;">
				<div class="col">
					<h1 style="font-family: '1942 report';">Open Beta</h1>
					<p><?=$this->textFile['register']['invitetext']?></p>
				</div>
			</div>
			<form method="post" class="row" style="padding: 30px 0" name="register_form" id="register_form" onsubmit="javascript: return saveRegister()" autocomplete="off">
				<input type="hidden" name="language" value="<?=$this->language['ab']?>" />
				<div id="register_success" class="alert alert-success w-100" style="display: none" role="alert"><?=$this->textFile['register']['register_form']['success_message']?></div>
				<div id="register_error" class="alert alert-danger w-100" style="display: none" role="alert"><?=$this->textFile['register']['register_form']['error_message']?></div>

				<div class="form-group col col-xs-12 col-md-6">
					<input type="text" class="form-control required" name="register_firstname" id="register_firstname" placeholder="<?=$this->textFile['register']['register_form']['first_name']?>">
				</div>
				<div class="form-group col col-xs-12 col-md-6">
					<input type="text" class="form-control required" name="register_lastname" id="register_lastname" placeholder="<?=$this->textFile['register']['register_form']['last_name']?>">
				</div>
				<div class="form-group col col-xs-12 col-md-6">
					<input type="email" class="form-control required" name="register_email" id="register_email" aria-describedby="emailHelp" placeholder="<?=$this->textFile['register']['register_form']['email']?>">
					<small id="emailHelp" class="form-text text-muted"><?=$this->textFile['register']['register_form']['form_help']?></small>
				</div>
				<div class="form-group col col-xs-12 col-md-6">
					<select class="form-control required" name="register_country" id="register_country">
						<option value=""><?=$this->textFile['register']['register_form']['country']?></option>
						<option value="af">Afghanistan</option><option value="ax">Aland Islands</option><option value="al">Albania</option><option value="dz">Algeria</option><option value="as">American Samoa</option><option value="ad">Andorra</option><option value="ao">Angola</option><option value="ai">Anguilla</option><option value="aq">Antarctica</option><option value="ag">Antigua And Barbuda</option><option value="ar">Argentina</option><option value="am">Armenia</option><option value="aw">Aruba</option><option value="au">Australia</option><option value="at">Austria</option><option value="az">Azerbaijan</option><option value="bs">Bahamas</option><option value="bh">Bahrain</option><option value="bd">Bangladesh</option><option value="bb">Barbados</option><option value="by">Belarus</option><option value="be">Belgium</option><option value="bz">Belize</option><option value="bj">Benin</option><option value="bm">Bermuda</option><option value="bt">Bhutan</option><option value="bo">Bolivia</option><option value="ba">Bosnia And Herzegovina</option><option value="bw">Botswana</option><option value="bv">Bouvet Island</option><option value="br">Brazil</option><option value="io">British Indian Ocean Territory</option><option value="bn">Brunei Darussalam</option><option value="bg">Bulgaria</option><option value="bf">Burkina Faso</option><option value="bi">Burundi</option><option value="kh">Cambodia</option><option value="cm">Cameroon</option><option value="ca">Canada</option><option value="cv">Cape Verde</option><option value="ky">Cayman Islands</option><option value="cf">Central african republic</option><option value="td">Chad</option><option value="cl">Chile</option><option value="cn">China</option><option value="cx">Christmas island</option><option value="cc">Cocos (keeling) Islands</option><option value="co">Colombia</option><option value="km">Comoros</option><option value="cg">Congo</option><option value="cd">The Democratic Republic Of Congo</option><option value="ck">Cook Islands</option><option value="cr">Costa Rica</option><option value="ci">Cote D'ivoire</option><option value="hr">Croatia</option><option value="cu">Cuba</option><option value="cy">Cyprus</option><option value="cz">Czech Republic</option><option value="dk">Denmark</option><option value="dj">Djibouti</option><option value="dm">Dominica</option><option value="do">Dominican Republic</option><option value="ec">Ecuador</option><option value="eg">Egypt</option><option value="sv">El Salvador</option><option value="gq">Equatorial Guinea</option><option value="er">Eritrea</option><option value="ee">Estonia</option><option value="et">Ethiopia</option><option value="fk">Falkland Islands (malvinas)</option><option value="fo">Faroe Islands</option><option value="fj">Fiji</option><option value="fi">Finland</option><option value="fr">France</option><option value="gf">French Guiana</option><option value="pf">French Polynesia</option><option value="tf">French Southern Territories</option><option value="ga">Gabon</option><option value="gm">Gambia</option><option value="ge">Georgia</option><option value="de">Germany</option><option value="gh">Ghana</option><option value="gi">Gibraltar</option><option value="gr">Greece</option><option value="gl">Greenland</option><option value="gd">Grenada</option><option value="gp">Guadeloupe</option><option value="gu">Guam</option><option value="gt">Guatemala</option><option value="gg">Guernsey</option><option value="gn">Guinea</option><option value="gw">Guinea-bissau</option><option value="gy">Guyana</option><option value="ht">Haiti</option><option value="hm">Heard Island And Mcdonald Islands</option><option value="va">Holy See (vatican City State)</option><option value="hn">Honduras</option><option value="hk">Hong Kong</option><option value="hu">Hungary</option><option value="is">Iceland</option><option value="in">India</option><option value="id">Indonesia</option><option value="ir">Iran</option><option value="iq">Iraq</option><option value="ie">Ireland</option><option value="im">Isle Of Man</option><option value="il">Israel</option><option value="it">Italy</option><option value="jm">Jamaica</option><option value="jp">Japan</option><option value="je">Jersey</option><option value="jo">Jordan</option><option value="kz">Kazakhstan</option><option value="ke">Kenya</option><option value="ki">Kiribati</option><option value="kp">North Korea</option><option value="kr">South Korea</option><option value="kw">Kuwait</option><option value="kg">Kyrgyzstan</option><option value="la">Lao People's Democratic Republic</option><option value="lv">Latvia</option><option value="lb">Lebanon</option><option value="ls">Lesotho</option><option value="lr">Liberia</option><option value="ly">Libyan Arab Jamahiriya</option><option value="li">Liechtenstein</option><option value="lt">Lithuania</option><option value="lu">Luxembourg</option><option value="mo">Macao</option><option value="mk">Macedonia</option><option value="mg">Madagascar</option><option value="mw">Malawi</option><option value="my">Malaysia</option><option value="mv">Maldives</option><option value="ml">Mali</option><option value="mt">Malta</option><option value="mh">Marshall Islands</option><option value="mq">Martinique</option><option value="mr">Mauritania</option><option value="mu">Mauritius</option><option value="yt">Mayotte</option><option value="mx">Mexico</option><option value="fm">Micronesia</option><option value="md">Moldova</option><option value="mc">Monaco</option><option value="mn">Mongolia</option><option value="me">Montenegro</option><option value="ms">Montserrat</option><option value="ma">Morocco</option><option value="mz">Mozambique</option><option value="mm">Myanmar</option><option value="na">Namibia</option><option value="nr">Nauru</option><option value="np">Nepal</option><option value="nl">Netherlands</option><option value="an">Netherlands Antilles</option><option value="nc">New Caledonia</option><option value="nz">New Zealand</option><option value="ni">Nicaragua</option><option value="ne">Niger</option><option value="ng">Nigeria</option><option value="nu">Niue</option><option value="nf">Norfolk Island</option><option value="mp">Northern Mariana Islands</option><option value="no">Norway</option><option value="om">Oman</option><option value="pk">Pakistan</option><option value="pw">Palau</option><option value="ps">Palestine</option><option value="pa">Panama</option><option value="pg">Papua New Guinea</option><option value="py">Paraguay</option><option value="pe">Peru</option><option value="ph">Philippines</option><option value="pn">Pitcairn</option><option value="pl">Poland</option><option value="pt">Portugal</option><option value="pr">Puerto Rico</option><option value="qa">Qatar</option><option value="re">Reunion</option><option value="ro">Romania</option><option value="ru">Russian Federation</option><option value="rw">Rwanda</option><option value="sh">Saint Helena</option><option value="kn">Saint Kitts And Nevis</option><option value="lc">Saint Lucia</option><option value="pm">Saint Pierre And Miquelon</option><option value="vc">Saint Vincent And The Grenadines</option><option value="ws">Samoa</option><option value="sm">San Marino</option><option value="st">Sao Tome And Principe</option><option value="sa">Saudi Arabia</option><option value="sn">Senegal</option><option value="rs">Serbia</option><option value="sc">Seychelles</option><option value="sl">Sierra Leone</option><option value="sg">Singapore</option><option value="sk">Slovakia</option><option value="si">Slovenia</option><option value="sb">Solomon Islands</option><option value="so">Somalia</option><option value="za">South Africa</option><option value="gs">South Georgia And The South Sandwich islands</option><option value="es">Spain</option><option value="lk">Sri Lanka</option><option value="sd">Sudan</option><option value="sr">Suriname</option><option value="sj">Svalbard And Jan Mayen</option><option value="sz">Swaziland</option><option value="se">Sweden</option><option value="ch">Switzerland</option><option value="sy">Syrian Arab Republic</option><option value="tw">Taiwan</option><option value="tj">Tajikistan</option><option value="tz">Tanzania</option><option value="th">Thailand</option><option value="tl">Timor-leste</option><option value="tg">Togo</option><option value="tk">Tokelau</option><option value="to">Tonga</option><option value="tt">Trinidad And Tobago</option><option value="tn">Tunisia</option><option value="tr">Turkey</option><option value="tm">Turkmenistan</option><option value="tc">Turks And Caicos Islands</option><option value="tv">Tuvalu</option><option value="ug">Uganda</option><option value="ua">Ukraine</option><option value="ae">United Arab Emirates</option><option value="gb">United Kingdom</option><option value="us">United States</option><option value="um">United States Minor Outlying Islands</option><option value="uy">Uruguay</option><option value="uz">Uzbekistan</option><option value="vu">Vanuatu</option><option value="ve">Venezuela</option><option value="vn">Viet Nam</option><option value="vg">British Virgin Islands</option><option value="vi">U.S. Virgin Islands</option><option value="wf">Wallis And Futuna</option><option value="eh">Western Sahara</option><option value="ye">Yemen</option><option value="zm">Zambia</option><option value="zw">Zimbabwe</option>
					</select>
				</div>
				<div class="form-group col col-xs-12 col-md-3">
					<select type="text" class="form-control required" name="register_gender" id="register_gender" placeholder="<?=$this->textFile['register']['register_form']['gender']?>">
						<option hidden value=''><?=$this->textFile['register']['register_form']['gender']['gender']?></option>
						<option value='f'><?=$this->textFile['register']['register_form']['gender']['female']?></option>
						<option value='m'><?=$this->textFile['register']['register_form']['gender']['male']?></option>
					</select>
				</div>
				<div class="w-100"></div>
				<div class="form-group col col-xs-12 col-md-6">
					<input type="text" class="form-control required" name="register_user" id="register_user" placeholder="<?=$this->textFile['register']['register_form']['user']?>">
				</div>

				<div class="form-group col col-xs-12 col-md-6">
					<input type="password" class="form-control required" name="register_pass" id="register_pass" placeholder="<?=$this->textFile['register']['register_form']['password']?>">
				</div>
				<div class="form-group col-12 text-right">
					<button type="submit" class="btn btn-success" id="register_submit"><?=$this->textFile['register']['register_form']['send']?></button>
				</div>
				<div class="form-group col-12 text-center">
					<div class="progress" id="register_progress" style="display: none">
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
					</div>
				</div>
			</form>
		</div>
		<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
			<form method="post" class="row" style="padding: 30px 0" name="contact_form" id="contact_form" onsubmit="javascript: return sendMessage()" autocomplete="off">
				<input type="hidden" name="language" value="<?=$this->language['ab']?>" />
				<div id="contact_success" class="alert alert-success w-100" style="display: none" role="alert"><?=$this->textFile['contact']['contact_form']['success_message']?></div>
				<div id="contact_error" class="alert alert-danger w-100" style="display: none" role="alert"><?=$this->textFile['contact']['contact_form']['error_message']?></div>

				<div class="form-group col col-xs-12 col-md-6">
					<input type="text" class="form-control required" name="contact_firstname" id="contact_firstname" placeholder="<?=$this->textFile['contact']['contact_form']['first_name']?>">
				</div>
				<div class="form-group col col-xs-12 col-md-6">
					<input type="text" class="form-control required" name="contact_lastname" id="contact_lastname" placeholder="<?=$this->textFile['contact']['contact_form']['last_name']?>">
				</div>
				<div class="form-group col col-xs-12 col-md-6">
					<input type="email" class="form-control required" name="contact_email" id="contact_email" aria-describedby="emailHelp" placeholder="<?=$this->textFile['contact']['contact_form']['email']?>">
					<small id="emailHelp" class="form-text text-muted"><?=$this->textFile['contact']['contact_form']['form_help']?></small>
				</div>
				<div class="form-group col col-xs-12 col-md-6">
					<select class="form-control required" name="contact_country" id="contact_country">
						<option value=""><?=$this->textFile['contact']['contact_form']['country']?></option>
						<option value="af">Afghanistan</option><option value="ax">Aland Islands</option><option value="al">Albania</option><option value="dz">Algeria</option><option value="as">American Samoa</option><option value="ad">Andorra</option><option value="ao">Angola</option><option value="ai">Anguilla</option><option value="aq">Antarctica</option><option value="ag">Antigua And Barbuda</option><option value="ar">Argentina</option><option value="am">Armenia</option><option value="aw">Aruba</option><option value="au">Australia</option><option value="at">Austria</option><option value="az">Azerbaijan</option><option value="bs">Bahamas</option><option value="bh">Bahrain</option><option value="bd">Bangladesh</option><option value="bb">Barbados</option><option value="by">Belarus</option><option value="be">Belgium</option><option value="bz">Belize</option><option value="bj">Benin</option><option value="bm">Bermuda</option><option value="bt">Bhutan</option><option value="bo">Bolivia</option><option value="ba">Bosnia And Herzegovina</option><option value="bw">Botswana</option><option value="bv">Bouvet Island</option><option value="br">Brazil</option><option value="io">British Indian Ocean Territory</option><option value="bn">Brunei Darussalam</option><option value="bg">Bulgaria</option><option value="bf">Burkina Faso</option><option value="bi">Burundi</option><option value="kh">Cambodia</option><option value="cm">Cameroon</option><option value="ca">Canada</option><option value="cv">Cape Verde</option><option value="ky">Cayman Islands</option><option value="cf">Central african republic</option><option value="td">Chad</option><option value="cl">Chile</option><option value="cn">China</option><option value="cx">Christmas island</option><option value="cc">Cocos (keeling) Islands</option><option value="co">Colombia</option><option value="km">Comoros</option><option value="cg">Congo</option><option value="cd">The Democratic Republic Of Congo</option><option value="ck">Cook Islands</option><option value="cr">Costa Rica</option><option value="ci">Cote D'ivoire</option><option value="hr">Croatia</option><option value="cu">Cuba</option><option value="cy">Cyprus</option><option value="cz">Czech Republic</option><option value="dk">Denmark</option><option value="dj">Djibouti</option><option value="dm">Dominica</option><option value="do">Dominican Republic</option><option value="ec">Ecuador</option><option value="eg">Egypt</option><option value="sv">El Salvador</option><option value="gq">Equatorial Guinea</option><option value="er">Eritrea</option><option value="ee">Estonia</option><option value="et">Ethiopia</option><option value="fk">Falkland Islands (malvinas)</option><option value="fo">Faroe Islands</option><option value="fj">Fiji</option><option value="fi">Finland</option><option value="fr">France</option><option value="gf">French Guiana</option><option value="pf">French Polynesia</option><option value="tf">French Southern Territories</option><option value="ga">Gabon</option><option value="gm">Gambia</option><option value="ge">Georgia</option><option value="de">Germany</option><option value="gh">Ghana</option><option value="gi">Gibraltar</option><option value="gr">Greece</option><option value="gl">Greenland</option><option value="gd">Grenada</option><option value="gp">Guadeloupe</option><option value="gu">Guam</option><option value="gt">Guatemala</option><option value="gg">Guernsey</option><option value="gn">Guinea</option><option value="gw">Guinea-bissau</option><option value="gy">Guyana</option><option value="ht">Haiti</option><option value="hm">Heard Island And Mcdonald Islands</option><option value="va">Holy See (vatican City State)</option><option value="hn">Honduras</option><option value="hk">Hong Kong</option><option value="hu">Hungary</option><option value="is">Iceland</option><option value="in">India</option><option value="id">Indonesia</option><option value="ir">Iran</option><option value="iq">Iraq</option><option value="ie">Ireland</option><option value="im">Isle Of Man</option><option value="il">Israel</option><option value="it">Italy</option><option value="jm">Jamaica</option><option value="jp">Japan</option><option value="je">Jersey</option><option value="jo">Jordan</option><option value="kz">Kazakhstan</option><option value="ke">Kenya</option><option value="ki">Kiribati</option><option value="kp">North Korea</option><option value="kr">South Korea</option><option value="kw">Kuwait</option><option value="kg">Kyrgyzstan</option><option value="la">Lao People's Democratic Republic</option><option value="lv">Latvia</option><option value="lb">Lebanon</option><option value="ls">Lesotho</option><option value="lr">Liberia</option><option value="ly">Libyan Arab Jamahiriya</option><option value="li">Liechtenstein</option><option value="lt">Lithuania</option><option value="lu">Luxembourg</option><option value="mo">Macao</option><option value="mk">Macedonia</option><option value="mg">Madagascar</option><option value="mw">Malawi</option><option value="my">Malaysia</option><option value="mv">Maldives</option><option value="ml">Mali</option><option value="mt">Malta</option><option value="mh">Marshall Islands</option><option value="mq">Martinique</option><option value="mr">Mauritania</option><option value="mu">Mauritius</option><option value="yt">Mayotte</option><option value="mx">Mexico</option><option value="fm">Micronesia</option><option value="md">Moldova</option><option value="mc">Monaco</option><option value="mn">Mongolia</option><option value="me">Montenegro</option><option value="ms">Montserrat</option><option value="ma">Morocco</option><option value="mz">Mozambique</option><option value="mm">Myanmar</option><option value="na">Namibia</option><option value="nr">Nauru</option><option value="np">Nepal</option><option value="nl">Netherlands</option><option value="an">Netherlands Antilles</option><option value="nc">New Caledonia</option><option value="nz">New Zealand</option><option value="ni">Nicaragua</option><option value="ne">Niger</option><option value="ng">Nigeria</option><option value="nu">Niue</option><option value="nf">Norfolk Island</option><option value="mp">Northern Mariana Islands</option><option value="no">Norway</option><option value="om">Oman</option><option value="pk">Pakistan</option><option value="pw">Palau</option><option value="ps">Palestine</option><option value="pa">Panama</option><option value="pg">Papua New Guinea</option><option value="py">Paraguay</option><option value="pe">Peru</option><option value="ph">Philippines</option><option value="pn">Pitcairn</option><option value="pl">Poland</option><option value="pt">Portugal</option><option value="pr">Puerto Rico</option><option value="qa">Qatar</option><option value="re">Reunion</option><option value="ro">Romania</option><option value="ru">Russian Federation</option><option value="rw">Rwanda</option><option value="sh">Saint Helena</option><option value="kn">Saint Kitts And Nevis</option><option value="lc">Saint Lucia</option><option value="pm">Saint Pierre And Miquelon</option><option value="vc">Saint Vincent And The Grenadines</option><option value="ws">Samoa</option><option value="sm">San Marino</option><option value="st">Sao Tome And Principe</option><option value="sa">Saudi Arabia</option><option value="sn">Senegal</option><option value="rs">Serbia</option><option value="sc">Seychelles</option><option value="sl">Sierra Leone</option><option value="sg">Singapore</option><option value="sk">Slovakia</option><option value="si">Slovenia</option><option value="sb">Solomon Islands</option><option value="so">Somalia</option><option value="za">South Africa</option><option value="gs">South Georgia And The South Sandwich islands</option><option value="es">Spain</option><option value="lk">Sri Lanka</option><option value="sd">Sudan</option><option value="sr">Suriname</option><option value="sj">Svalbard And Jan Mayen</option><option value="sz">Swaziland</option><option value="se">Sweden</option><option value="ch">Switzerland</option><option value="sy">Syrian Arab Republic</option><option value="tw">Taiwan</option><option value="tj">Tajikistan</option><option value="tz">Tanzania</option><option value="th">Thailand</option><option value="tl">Timor-leste</option><option value="tg">Togo</option><option value="tk">Tokelau</option><option value="to">Tonga</option><option value="tt">Trinidad And Tobago</option><option value="tn">Tunisia</option><option value="tr">Turkey</option><option value="tm">Turkmenistan</option><option value="tc">Turks And Caicos Islands</option><option value="tv">Tuvalu</option><option value="ug">Uganda</option><option value="ua">Ukraine</option><option value="ae">United Arab Emirates</option><option value="gb">United Kingdom</option><option value="us">United States</option><option value="um">United States Minor Outlying Islands</option><option value="uy">Uruguay</option><option value="uz">Uzbekistan</option><option value="vu">Vanuatu</option><option value="ve">Venezuela</option><option value="vn">Viet Nam</option><option value="vg">British Virgin Islands</option><option value="vi">U.S. Virgin Islands</option><option value="wf">Wallis And Futuna</option><option value="eh">Western Sahara</option><option value="ye">Yemen</option><option value="zm">Zambia</option><option value="zw">Zimbabwe</option>
					</select>
				</div>
				<div class="form-group col-12 col-xs-12">
					<textarea class="form-control required" name="contact_message" id="contact_message" placeholder="<?=$this->textFile['contact']['contact_form']['message']?>"></textarea>
				</div>
				<div class="form-group col-6">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="contact_newsletter" id="contact_newsletter" value="1" checked="checked">
						<label class="form-check-label" for="contact_newsletter"><?=$this->textFile['contact']['contact_form']['receive_newsletter']?></label>
					</div>
				</div>
				<div class="form-group col-6 text-right">
					<div class="g-recaptcha" style="display: inline-block" data-sitekey="6LezYlMUAAAAAL67TV34-fARTG-yenvDpSyGje_D"></div>
				</div>
				<div class="form-group col-12 text-right">
					<button type="submit" class="btn btn-success" id="contact_submit"><?=$this->textFile['contact']['contact_form']['send']?></button>
				</div>
				<div class="form-group col-12 text-center">
					<div class="progress" id="contact_progress" style="display: none">
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	function saveRegister(){
		$("#register_success, #register_error").hide();
		let error = null;
		$.each($("#register_form").find("input, select, textarea"), function(i, el){
			elem = $(el);
			elem.removeClass('is-invalid');
			if(elem.hasClass("required") && (elem.val()==undefined || elem.val()=='' || elem.val()==null)){
				elem.addClass('is-invalid');
				error = true;
			}
		});
		if(error===null){
			$("#register_submit").hide();
			$("#register_progress").show();
			$.ajax({
				type: "POST",
				url: "/application/registerSend.php?f=sendReg",
				data: $("#register_form").serialize(),
				success: function(data){
					if(data.SUCCESS==true){
						$("#register_success").show();
						$("#register_progress").hide();
					}else{
						$("#register_submit, #register_error").show();
						$("#register_progress").hide();
					}
				},
				dataType: "json"
			});
		}else{
			$("#register_submit, #register_error").show();
			$("#register_progress").hide();
		}
		return false;
	}

	function sendMessage(){
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
		let recaptcha = $("#contact_form").find("[name='g-recaptcha-response']").val();
		if(recaptcha==undefined ||recaptcha=='' || recaptcha==null)
			error = true;
		if(error===null){
			$("#contact_submit").hide();
			$("#contact_progress").show();
			$.ajax({
				type: "POST",
				url: "/application/contactSend.php?f=sendMsg",
				data: $("#contact_form").serialize(),
				success: function(data){
					if(data.SUCCESS==true){
						$("#contact_success").show();
						$("#contact_progress").hide();
						window.setTimeout(function(){
							window.header.location.href = "/<?=$this->language['ab']?>/form?q=1&u="+data.ID;
						}, 50);
					}else{
						$("#contact_submit, #contact_error").show();
						$("#contact_progress").hide();
					}
				},
				dataType: "json"
			});
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
