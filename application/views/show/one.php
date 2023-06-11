<?php 
$img = base_url('assets/upload')."/".$one_adv->result()[0]->img;
?>
<div id="one_container"class="col-sm-9 text-right">
  <div class="col-xs-6 col-md-4  post-info-box" >
  <img src="<?php echo $img; ?>" class="img" style="height:300px;width:350px;"/>
  </div>
   <div class="col-xs-11 col-sm-5 col-md-7  ">
   <div class="post-info-box">
   <h1><?php print($one_adv->result()[0]->name); ?></h1>
   <p><?php print($one_adv->result()[0]->description); ?></p>
   <p><?php print($one_adv->result()[0]->date); ?></p>
   </div>
   <div class="post-info-box">
    <p>شماره تماس آگهی » <?php print($one_adv->result()[0]->phone); ?></p>
   </div>
   </div>
</div>