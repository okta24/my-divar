 <div id="myadv" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" id="cancel" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">آگهی من</h4>
                    </div>
                    <div class="modal-body">
                       <div id="myadv_load" class='loadingmessage' style='display:none'>
       <img src='img/ajax-loader.gif'/>
</div>
                        <h2> <p>لطفا شماره تماس یا ایمیل خود را وارد نمایید.</p></h2>
	 <div class="error_div" id="login_errors"></div>
<?php 
    $fattr2 = array('class' => 'phone_login ', 'id'=> "phone_login");
    echo form_open('/Myform/phone_login', $fattr2); ?> 
    <div class="form-group login_form">
     <label for="phone" class="margin_top5 width100">شماره موبایل(بدون صفرابتدا):</label>
      <?php 
        $phone1=array(            'name'=>'phone2',
                                  'id'=> 'phone2',
                                   'maxlength'   => '100',
                                  
                                    'style'       => 'width:50%;display:inline-block;height: 44px;',
                                 'placeholder'=>'9123456789',
                                 
                                  'class'=>'form-control',
                                  'value'=> set_value('phone2')
                           );
        echo form_input($phone1) ?>
        
      <?php echo form_error('phone2');?>
      
      <?php echo form_submit(array('value'=>'تایید','id'=> 'phone_submit','style'       => 'width:40%',  'class'=>'btn btn-lg btn-primary ')); ?>
    </div>
    
     <?php echo form_close(); ?>
     
     <?php 
                        
    $fattr3 = array('class' => 'email_login ', 'id'=> "email_login");
                        
    echo form_open('/Myform/email_login', $fattr3); ?> 
    
    <div class="form-group login_form">
    
     <label for="email" class="margin_top5 width100">آدرس ایمیل:</label>
     
      <?php echo form_input(array('name'=>'email2','style'       => 'width:50%;display:inline-block;height: 44px;', 'id'=> 'email2',
                                  
                                  'placeholder'=>'Email@mail.com',  'class'=>'form-control', 'value'=> set_value('email2'))); ?>
      
      <?php echo form_error('email2');?>
      
      <?php echo form_submit(array('value'=>'تایید','id'=> 'email_submit','style'       => 'width:40%', 'class'=>'btn btn-lg btn-primary'
                                  )); ?>
    
    </div>
    
    <?php echo form_close(); ?>
	
                    </div>

                </div>

            </div>
        </div>