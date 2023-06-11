 <div id="myModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" id="cancel" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ثبت آگهی</h4>
                    </div>
                    <div class="modal-body">
                        <div id="concept" class="row ">
                            <div  id="category_loader"class='loadingmessage' style='display:none'>
       <img src='img/ajax-loader.gif'/>
</div>
                            <div class="col-sm-6 ">
                                <!--parent select-->
                                <label for="main_cat"> موضوع:</label>
                                <select onchange="get_parent_index('sub_cat')" class="form-control" id="main_cat">
                                  </select>
                                <!--parent select-->
                            </div>
                            <div class="col-sm-6 ">
                                <!--sub select-->
                                 <?php 
                                    $fattr = array('class' => 'form-insert','id'=>'insert');
                                    echo form_open_multipart('/Myform/do_upload', $fattr); ?>
                                <label for="sub_cat">شاخه:</label>
                                <select id="sub_cat" name="category_id"class="form-control">
                                  </select>
                                <!--sub select-->
                            </div>
                            <div class="col-sm-12 gravity_center">
                                <button onclick="sec_show_hide('#detail','#concept')" id="accept_concept" type="button" class=" margin_top5 width_80 btn btn-info btn-lg">تایید موضوع </button>
                            </div>
                        </div>
                        <!--row 1 end-->
                        <div id="detail" class="row  margin_top5 form-group" style="display:none;">
                            <div class="col-sm-12 gravity_center">
                                <button  onclick="sec_show_hide('#concept','#detail')" id="edit_concept" type="button" class="width_80 btn btn-info btn-lg">تغییر موضوع  </button>
                            </div>
                            <div class="col-sm-6  margin_top5">
                               <div class="error_div"id="errors"></div>
                                <div id="divtitle">
                                    <label for="description" class="margin_top5">انتخاب شهر :</label>
                                    <select  class=" margin_top5 form-control" name="city" id="city_list">
                                  </select>
                                     <label for="title" class="margin_top5">عنوان :</label>

                                    <div class="form-group">
                                      <?php echo form_input(array('name'=>'title', 'id'=> 'title', 'placeholder'=>'', 'class'=>'form-control', 'value'=> set_value('title'))); ?>
                                      <?php echo form_error('title');?>
                                    </div>
                                </div>

                                <div id="divdescription">
                                     <label for="description" class="margin_top5">توضیحات :</label>
                                    <div class="form-group">
                                      <?php echo form_textarea(array('name'=>'description', 'id'=> 'description', 'placeholder'=>'', 'class'=>'form-control', 'value'=> set_value('description'))); ?>
                                      <?php echo form_error('description');?>
                                    </div>    
                                </div>
                                

                            </div>
                            <div class="col-sm-6  margin_top5">
                                <label for="comment" class="margin_top5">تصویر:</label>
                                <span style="width:100%;margin-bottom: 5px;" class="btn btn-default btn-file  margin_top5">    انتخاب تصویر آگهی 
                                <input  id="image" type="file"id="pic" name="pic" accept="image/*"></span>
                                
                                <label for="phone" class="margin_top5">شماره موبایل(بدون صفرابتدا):</label>
                               <div class="form-group">
                                  <?php echo form_input(array('name'=>'phone', 'id'=> 'phone', 'placeholder'=>'9123456789', 'class'=>'form-control', 'value'=> set_value('phone'))); ?>
                                  <?php echo form_error('phone');?>
                                </div>

                                <label for="email" class="margin_top5">آدرس ایمیل:</label>
                               <div class="form-group">
                                  <?php echo form_input(array('name'=>'email', 'id'=> 'email', 'placeholder'=>'Email@mail.com', 'class'=>'form-control', 'value'=> set_value('email'))); ?>
                                  <?php echo form_error('email');?>
                                </div>

                               <div  id="insert_loader"class='loadingmessage' style='display:none'>
       <img src='img/ajax-loader.gif'/>
</div>
                                <div class="modal-footer gravity_center">
                                    <button id="submit" class="btn btn-success width_80" >تایید نهایی</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
