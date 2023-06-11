 <div id="edit_modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" id="cancel" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ثبت آگهی</h4>
                    </div>
                    <div class="modal-body">
                        <div id="concept2" class="row ">
                            <div  id="category_loader"class='loadingmessage' style='display:none'>
       <img src='img/ajax-loader.gif'/>
</div>
                            <div class="col-sm-6 ">
                                <!--parent select-->
                                <label for="main_cat2"> موضوع:</label>
                                <select onchange="get_parent_index()" class="form-control" id="main_cat2">
                                  </select>
                                <!--parent select-->
                            </div>
                            <div class="col-sm-6 ">
                                <!--sub select-->
                                 <?php 
                                    $fattr = array('class' => 'form-edit','id'=>'edit');
                                    echo form_open_multipart('/Myform/do_edit', $fattr); ?>
                                <label for="sub_cat2">شاخه:</label>
                                <select id="sub_cat2" name="category_id2"class="form-control">
                                  </select>
                                <!--sub select-->
                            </div>
                            <div class="col-sm-12 gravity_center">
                                <button onclick="sec_show_hide('#detail2','#concept2')" id="accept_concept2" type="button" class=" margin_top5 width_80 btn btn-info btn-lg">تایید موضوع </button>
                            </div>
                        </div>
                        <!--row 1 end-->
                        <div id="detail2" class="row  margin_top5 form-group" style="display:none;">
                            <div class="col-sm-12 gravity_center">
                                <button onclick="sec_show_hide('#concept2','#detail2')" id="edit_concept" type="button" class="width_80 btn btn-info btn-lg">تغییر موضوع  </button>
                            </div>
                            <div class="col-sm-6  margin_top5">
                               <div class="error_div"id="errors2"></div>
                                <div id="divtitle">
                                    <label for="description" class="margin_top5">انتخاب شهر :</label>
                                    <select  class=" margin_top5 form-control" name="city2" id="city_list2">
                                  </select>
                                     <label for="title2" class="margin_top5">عنوان :</label>

                                    <div class="form-group">
                                      <?php echo form_input(array('name'=>'title2', 'id'=> 'title2', 'placeholder'=>'', 'class'=>'form-control', 'value'=> set_value('title2'))); ?>
                                      <?php echo form_error('title2');?>
                                    </div>
                                </div>

                                <div id="divdescription">
                                     <label for="description2" class="margin_top5">توضیحات :</label>
                                    <div class="form-group">
                                      <?php echo form_textarea(array('name'=>'description2', 'id'=> 'description2', 'placeholder'=>'', 'class'=>'form-control', 'value'=> set_value('description2'))); ?>
                                      <?php echo form_error('description2');?>
                                    </div>    
                                </div>
                                

                            </div>
                            <div class="col-sm-6  margin_top5">
                                <label for="comment" class="margin_top5">تصویر:</label>
                                <span style="width:100%;margin-bottom: 5px;" class="btn btn-default btn-file  margin_top5">    انتخاب تصویر آگهی 
                                <input  id="image" type="file"id="pic" name="pic" accept="image/*"></span>
                                
                                <label for="phone3" class="margin_top5">شماره موبایل(بدون صفرابتدا):</label>
                               <div class="form-group">
                                  <?php echo form_input(array('name'=>'phone3', 'id'=> 'phone3', 'placeholder'=>'9123456789', 'class'=>'form-control', 'value'=> set_value('phone3'))); ?>
                                  <?php echo form_error('phone3');?>
                                </div>

                                <label for="email3" class="margin_top5">آدرس ایمیل:</label>
                               <div class="form-group">
                                  <?php echo form_input(array('name'=>'email3', 'id'=> 'email3', 'placeholder'=>'Email@mail.com', 'class'=>'form-control')); ?>
                                  <?php echo form_error('email3');?>
                                </div>
                                  <input type="hidden" name="hiddenValue2" id="hiddenValue2" value="" />
                                    <input type="hidden" name="hiddenimg" id="hiddenimg" value="" />
                                    <div id="edit_loader"class='loadingmessage' style='display:none'>
                                   <img src='img/ajax-loader.gif'/>
                                    </div>
                                <div class="modal-footer gravity_center">
                                    <button id="e-submit" class="btn btn-success width_80" >ثبت تغییرات </button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
