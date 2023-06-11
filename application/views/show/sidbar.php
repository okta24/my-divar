<div class="col-sm-2 sidbar">
    <div class="panel-group" id="accordion">
      <div class=" allboxheader  panel-heading " >
                        <h4 class="panel-title">
                            <a class=" alladv activetitle" >همه آگهی ها</a>
                        </h4>
                    </div>
        <?php
if(@$categories[0]->parent_id != 0 )
{
	?>
            <div><a href="<?php echo base_url(''); ?>"> بازگشت </a></div>
            <?php
}
foreach($categories as $key)
	{
        if($key->parent_id==0){
		
?>
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        <h4 class="panel-title">
                            <a calss="panel-title-link" onclick="javascript:showcat(<?php echo $key->category_id?>,' <?php echo $key->title?>')" data-toggle="collapse" data-parent="#accordion" href="<?php echo "#collapse".$key->category_id?>">
                                <?php echo $key->title?>
                            </a>
                        </h4>
                    </div>
                    <div id="<?php echo "collapse".$key->category_id?>" class="panel-collapse collapse " >
                        <div>
                            <div  class="list-group">
                                <?php 
                                    for ($x = 0; $x <count($categories); $x++) {
                                        if($key->category_id==$categories[$x]->parent_id){?>
                                <a style=" background: #f3e5f5" href="javascript:show(<?php echo $categories[$x]->category_id?>,'<?php echo $categories[$x]->title ?>')" class="list-group-item">
                                    <?php echo $categories[$x]->title ?>
                                </a>
                                <?php 
                                        }
                                    } 
                                 ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
	   } 
    }
	?>

    </div>
    

</div>
