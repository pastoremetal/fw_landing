<?php
  if(!isset($_SESSION['USER']['LOGED']) || $_SESSION['USER']['LOGED']!==true){
    echo "<script type=\"text/javascript\">location.href = 'login';</script>";
    exit;
  }
?>

<div class="col-10" style="padding-right: 0"></div>
<div class="col-12" style="padding: 30px">
  <div class="row">
    <div class="col-12">
      <h1 style="font-family: '1942 report';"><?=$this->textFile['dashboard']['welcometitle']?><!--<?=$_SESSION['language']?>--></h1>
      <p><?=$this->textFile['dashboard']['welcometext1']?></p>
      <p><?=$this->textFile['dashboard']['welcometext2']?></p>
      <p><?=$this->textFile['dashboard']['welcometext3']?></p>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <a href="/<?=$this->language['ab']?>/form/?q=1">
        <button class="btn btn-sm btn-success" style="font-weight: bold" type="button"><?=$this->textFile['dashboard']['fillform']?></button>
      </a>
    </div>
  </div>
</div>
