<?php
	$error = false;
	if(isset($_POST['send']) && $_POST['send']!=''){
		if(isset($_POST['questionnaire_id']) &&
			isset($_POST['user_id'])){
				$qrU = $this->database->getCon()->prepare("SELECT
																a.*,
																b.id as question_id,
																b.type,
																b.scale_lengt
																FROM
																	form_questionnaire_x_question a JOIN
																	form_question b ON a.question=b.id
																WHERE
																	a.questionnaire=:id");
				$qrU->bindParam(':id', $_POST['questionnaire_id']);
				$qrU->execute();
				$qrR = $qrU->fetchAll();

				$this->database->getCon()->beginTransaction();
				$qrQI = $this->database->getCon()->prepare("INSERT INTO form_usr_questionnaire (user, questionnaire) VALUES (:user, :questionnaire)");
				$qrQI->bindParam(':user', $_POST['questionnaire_id']);
				$qrQI->bindParam(':questionnaire', $_POST['user_id']);
				$qrQI->execute();
				$uQId = $this->database->getCon()->lastInsertId();
				$qGroups = array();
				$indicator = "";
				$g = 0;

				$qrAs = "INSERT INTO form_usr_answer (usr_questionnaire, question, answer_obj, answer_value, answer_adj) VALUES ";
				for($i=0; $i<count($_POST["question"]); $i++){
					$qrAs .= ($i>0)?',':'';
					$qrAs .= "(:usrq{$i}, :qid{$i}, :aobj{$i}, :aval{$i}, :adj{$i})";
				}

				$i = 0;
				$nV = null;
				$qrAI = $this->database->getCon()->prepare($qrAs);
				$qrAB = array();
				foreach($qrR as $r){
					if(isset($_POST["question"][$r['question_id']])){
						$qrAB[":usrq{$i}"] = $uQId;
						$qrAB[":qid{$i}"] = $r['question_id'];
						if($r['type'] == 'OBJ'){
							$qrAB[":aobj{$i}"] = $_POST["question"][$r['question_id']];
							$qrAB[":aval{$i}"] = $nV;
							$qrAB[":adj{$i}"] = $nV;
						}else{
							$qrAB[":aobj{$i}"] = $nV;
							$qrAB[":aval{$i}"] = $_POST["question"][$r['question_id']];
							$qrAB[":adj{$i}"] = $nV;
						}
					}else{
						$error = true;
						break;
					}
					$i++;
				}

				if(!$error){
					try{
						$qrAI->execute($qrAB);
					}catch(Exception $e){
						print_r($e);
					}
				}
			}else{$error = true;}

			if($error){
				$uQId = $this->database->getCon()->rollBack();
				echo "<div class='alert alert-danger alert-dismissible fade show' id='form_err' role='alert' >
								<strong>{$this->textFile['form']['error_ukn_title']}</strong>
								{$this->textFile['form']['error_ukn_description']}
							</div>";
			}else{
				$uQId = $this->database->getCon()->commit();
				echo "<div class='alert alert-success alert-dismissible fade show' id='form_success' role='alert' >
								<strong>Formulário enviado com sucesso</strong>
								Obrigado por colaborar com nossa pesquisa, agora fique atento para novidades sobre o mundo de Falling Worlds!
								<script>
									window.setTimeout(function(){
										window.location.href = '/';
									}, 500);
								</script>
							</div>";
			}

	}else{
		if(isset($_GET['q'])){
			$qrQ = $this->database->getCon()->prepare("SELECT b.title, b.description
														FROM
															form_questionnaire a JOIN
															form_questionnaire_language b ON a.id=b.questionnaire
														WHERE a.id=:id AND b.language=:lan");
			$qrQ->bindParam(':id', $_GET['q']);
			$qrQ->bindParam(':lan', $this->language['ab']);
			$qrQ->execute();
			$questionnaire = $qrQ->fetchObject();
			$qrU = $this->database->getCon()->prepare("SELECT
															a.*,
															b.id as question_id,
															b.label,
															c.question_text,
															b.type,
															b.scale_lengt
															FROM
																form_questionnaire_x_question a JOIN
																form_question b ON a.question=b.id JOIN
																form_question_language c ON b.id=c.question
															WHERE
																a.questionnaire=:id AND
																c.language=:lan");
			$qrU->bindParam(':id', $_GET['q']);
			$qrU->bindParam(':lan', $this->language['ab']);
			$qrU->execute();
			$qGroups = array();
			$indicator = "";
			$g = 0;
			while($r = $qrU->fetchObject()){
				$gp = substr($r->label, 0, 2);
				if(!array_key_exists($gp, $qGroups)){
					$qGroups[$gp] = array();
					$indicator .= "<li data-target='#carouselExampleIndicators' data-slide-to='{$g}' class='".(($g==0)?'active':'')."'></li>";
					$g++;
				}
				if($r->type == 'OBJ'){
					$qrA = $this->database->getCon()->prepare("SELECT
																											a.*,
																											b.answer_text
																											FROM
																												form_answer_obj a JOIN
																												form_answer_obj_language b ON a.id=b.answer_obj
																											WHERE
																												a.question=:id AND
																												b.language=:lan");
					$qrA->bindParam(':id', $r->question_id);
					$qrA->bindParam(':lan', $this->language['ab']);
					$qrA->execute();
				}
				$qGroups[$gp][] = array($r, $qrA->fetchAll());
			}
		}
?>

<div class="col-10" style="padding-right: 0"></div>
<div class="col-10 offset-1" style="">
	<div class="row">
		<div class="col-12">
			<h1 style="font-family: '1942 report';"><?=$questionnaire->title?></h1>
			<small><?=$questionnaire->description?></small>
			<div class="alert alert-danger alert-dismissible fade show" id="form_alert" style="display: none;" role="alert" >
			  <strong><?=$this->textFile['form']['error_title']?></strong>
				<?=$this->textFile['form']['error_description']?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
			<form action="" method="post" onsubmit="javascript: return sendForm(this)">
				<input type="hidden" name="questionnaire_id" value="<?=$_GET['q']?>" />
				<input type="hidden" name="user_id" value="<?=$_GET['u']?>" />
				<div class="carousel-inner">
					<?php
						$g = 0;
						foreach($qGroups as $group){
							echo "<ul class='question-group carousel-item ".(($g==0)?'active':'')."'>";
								foreach($group as $question){
									echo "<li class='d-block w-100 question border'>
													<h6 class='title'>{$question[0]->question_text}</h6>
													<div class='w-100 d-block'>";
														if($question[0]->type == "OBJ")
															foreach($question[1] as $ans)
																echo "<div class='form-check form-check-inline col-xs-12 col-sm-6 col-md-4'>
  																			<input class='form-check-input' data-group='{$g}' type='radio' name='question[{$question[0]->question_id}]' id='question[{$question[0]->question_id}][{$ans['id']}]' value='{$ans['id']}' />
																				<label class='form-check-label' for='question[{$question[0]->question_id}][{$ans['id']}]'>{$ans['answer_text']}</label>
																			</div>";
														elseif($question[0]->type == "SCL"){
															$sh = $sb = "";
															for($i=0; $i<$question[0]->scale_lengt; $i++){
																$sh .= "<th><label class='w-100 form-check-label' for='question[{$question[0]->question_id}][{$i}]'>{$i}</label></th>";
																$sb .= "<td><input class='' type='radio' data-group='{$g}' name='question[{$question[0]->question_id}]' id='question[{$question[0]->question_id}][{$i}]' value='{$i}' /></td>";
															}
															echo "<small>{$this->textFile['form']['scl_description']}</small>
																		<table class='scale table'>
																			<thead><tr>{$sh}</tr></thead>
																			<tbody><tr>{$sb}</tr></tbody>
																		</table>";
														}
									echo "	</div>
												</li>";
								}
								if($g==count($qGroups)-1){
									echo "<li class='text-right d-block w-100' style='margin-top: 15px'>
													<input class='btn btn-info' style='font-weight: bold' type='submit' name='send' value='Enviar Resposta'>
												</li>";
								}
							echo "</ul>";
							$g++;
						}
					?>
				</div>
				<ol class="carousel-indicators" style="position: relative; margin-top: 10px"><?=$indicator?></ol>
				<div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="position: relative; top: 0; bottom: 0; float: left; padding-bottom: 25px;">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class=""><?=$this->textFile['form']['prev']?></span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="position: relative; top: 0; bottom: 0; float: right; padding-bottom: 25px;">
						<span class=""><?=$this->textFile['form']['next']?></span>
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
					</a>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<script>
	$("#form_alert").hide();
	function sendForm(form){
		let ckd = {};
		let err = false;
		$.each($(form).find("input[type='checkbox'], input[type='radio']"), function(i, el){
			let pEl = $(el);
			if(ckd[pEl.attr('name')]===undefined){
				ckd[pEl.attr('name')] = true;
				let uEl = $(form).find("input[name='"+pEl.attr('name')+"']:checked");
				let cl = 'border-success';
				if(uEl.val()==undefined || uEl.val()==''){
					cl = 'border-danger';
					if(!err){
						$(form).find('.carousel-indicators > li').eq(parseInt(pEl.attr('data-group'))).click();
						$(window).scrollTop(pEl.scrollTop());
						err = true;
					}
				}
				pEl.parentsUntil('.question').last().parent().removeClass('border-success border-danger').addClass(cl);
			}
		});
		if(err){
			$("#form_alert").show();
			return false;
		}
	}
	$("#carouselExampleIndicators").on('slide.bs.carousel', function(){
		$("html, body").animate({scrollTop: "10px"}, 500, 'swing');
	});
</script>

<?php
	}
?>
