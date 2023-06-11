<?php require_once 'header2.php';?>
<div class="container">
<div   id="path">
    همه آگهی ها
</div>
<div id="search_div">
                               <div class=" search_form form-group">
                               <label style="width: 1px; display: table-cell;" for="btnsearch" class="margin_top5"><i id="btnsearch" class="fa fa-search" aria-hidden="true"></i></label>
      <?php echo form_input(array('name'=>'search', 'id'=> 'search', 'placeholder'=>'جستجو', 'class'=>'form-control', 'value'=> set_value('search'))); ?>
      <?php echo form_error('search');?>
    </div></div>
<?php require_once 'sidbar.php';?>


<div id="mycontainer" class="col-sm-10 text-right">

<div class='loadingmessage' style='display:none'>
       <img src='img/ajax-loader.gif'/>
</div>
 
    <!--<div text-left>بازگشت    <i class="fa fa-arrow-left" aria-hidden="true"></i></div>!-->
    <div id="search_result">
<?php if(sizeof($adv)==0){echo $city['result'];?> <script>hidesidebar(); if(checkCookie()){set_city_title();};</script>
                      <?php  }else{  ?>
<script> showsidebar();set_city_title();</script>
<?php
foreach($adv as $key)
	{
?>
    <a onclick="javascript:get_one(<?php echo $key->id; ?>)"  id="one">
	  <div class=" col-md-6   col-lg-4 maincard" >
        <div class="card" >
            <div class="row">
		     
	       <div class="col-sm-6 col-xs-6 txtsec">
		      <h5 class="card-title"><?php print($key->name); ?></h5>
		      <h6 class="card-date"> <?php print($key->date);?></h6>
           
	       </div>
	        <div class="col-sm-6  col-xs-6 imgsec">
		          <img class="card-img-top cardimg"  src="<?php echo base_url()."assets/upload/$key->img"; ?>" alt="Card image cap">
	          </div>
	
	       </div>
            <div class="row">
                <div class=" price_div"><h6 class="card-price">  قیمت: 200،000  تومان </h6></div>
            </div>
	   </div>
    </div>
 </a>

    <?php
}}
?>
</div>
</div>


</div>
<script>
    
    function hidesidebar() {
                $('.sidbar').hide();
            }

    
            function showsidebar() {
                $('.sidbar').show();
            }

    //==========================================
            function set_city_title() {
                if (checkCookie()) {
                    var $city_id = getCookie('city_id');
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>" + "Show/get_city_name_json",
                        data: ({
                            'id': $city_id
                        }),
                        dataType: 'json',
                        cache: false,
                        success: function(data) {
                            if (data != null) {
                                $('.select_city').html(data[0].name);
                                //console.log(data[0].name);
                            }
                        },

                        error: function(errMsg) {
                            console.log(errMsg);
                        }
                    });
                }
            }

            //==========================
</script>

<?php require_once 'footer.php';?>
