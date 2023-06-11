
<footer class=" footer col-sm-12  text-center">
  <p>نیازمندی های روز</p>
</footer>
    <script src="<?php echo base_url();?>assets/js/bootstrap-rtl.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>statics/user.js?vertion=<?php echo date(" h:i:sa ") ?>"></script>




   <script>
            /*window.onbeforeunload = function (e) {
                            var message = "Are you sure ?";
                            var firefox = /Firefox[\/\s](\d+)/.test(navigator.userAgent);
                            if (firefox) {
                                //Add custom dialog
                                //Firefox does not accept window.showModalDialog(), window.alert(), window.confirm(), and window.prompt() furthermore
                                var dialog = document.createElement("div");
                                document.body.appendChild(dialog);
                                dialog.id = "dialog";
                                dialog.style.visibility = "hidden";
                                dialog.innerHTML = message;
                                var left = document.body.clientWidth / 2 - dialog.clientWidth / 2;
                                dialog.style.left = left + "px";
                                dialog.style.visibility = "visible";
                                var shadow = document.createElement("div");
                                document.body.appendChild(shadow);
                                shadow.id = "shadow";
                                //tip with setTimeout
                                setTimeout(function () {
                                    document.body.removeChild(document.getElementById("dialog"));
                                    document.body.removeChild(document.getElementById("shadow"));
                                }, 0);
                            }
                            return message;
                        }*/
            ///================================
            
        
            
           $(document).ready(function(){
               $('#search').keyup(function () {
                   if($('#search').val()!=''){
                        mysearch($('#search').val());
                   }    
               });
           });
            //==================================
            function mysearch(word){
                if (checkCookie()) {
                    var $city_id = getCookie('city_id');}
    $('.loadingmessage').show();
                $.ajax({
                    url: "<?php echo site_url('Show/json_search'); ?>",
                    method: "POST",
                    data: {
                        'word': word,
                        'city':$city_id
                    },
                    success: function(data) {
                           $('.loadingmessage').hide();
                       
                        var json = JSON.parse(data);
                        refreshcontent(json);
            
                    },
                    error: function(errMsg) {
                       console.log(errMsg);
                    }
                });
            }
       //=====================
       
            //==================================
        /*    $("#submit").click(function(e) {
                // console.log("helo");
                //concept.style.display = "block";
                //      detail.style.display = "none";
                e.preventDefault();
                var title = $("#title").val();
                var phone = $("#phone").val();
                var description = $("textarea#description").val();
                var email = $("#email").val();
                 var sub_cat = $('#sub_cat').val();
                var city_id = $('#city_list').val();
                //console.log(city_id,phone,sub_cat);
                $.ajax({
                    url: "<?php echo site_url('Myform/new_adv'); ?>",
                    method: "POST",
                     header:('Content-Type: application/json'),
                    data: {
                        'title': title,
                       'description': description,
                        'email': email,
                        'phone': phone,
                        'city': city_id,
                        'category_id': sub_cat
                    },
                    success: function(data) {
                       // console.log(data);
                        var json = JSON.parse(data);
                        //console.log(json["code"])
                        if((json["code"]==2)||(json["code"]==0)){
                        $('#errors').html(json["result"]);
                             $('#errors').css('display','block');}
                        else{
                           //  $('#errors').css('display','none');
                            $('#errors').css('display','none');
                           
                            empty_fields();
                         $('#myModal').modal('hide');
                            alert(json["result"]);
                        }
                    },
                    error: function(errMsg) {
                       console.log(errMsg);
                    }
                });
            });*/
       //============================
           $(document).ready(function() {
                $('#loading').hide();
        $.ajax({
                    url: "<?php echo site_url('Myform/check_login'); ?>",
                    method: "GET",
                     header:('Content-Type: application/json'),
                   success: function(data) {
                       // console.log(data);
                        var json = JSON.parse(data);
                      //  console.log(json);
                        if(json["code"]==0){ $('#logout').hide();}
                        else{
                            $('#logout').show();
                        }
                    },
                    error: function(errMsg) {
                       console.log(errMsg);
                    }
                });
        });
       //==============================
       function logout(){
            $('#loading').show();
            $.ajax({
                    url: "<?php echo site_url('Myform/logout'); ?>",
                    method: "GET",
                     header:('Content-Type: application/json'),
                   success: function(data) {
                        $('#loading').hide();
                        console.log(data);
                          $('.myalert').html(data);
                        $('.myalert').fadeIn(400).delay(3000).fadeOut(400);
                        $('#logout').hide();
                       all();
                        
                    },
                    error: function(errMsg) {
                       console.log(errMsg);
                    }
                });
       }
            //==============================
            function check_login(){
                $.ajax({
                    url: "<?php echo site_url('Myform/check_login'); ?>",
                    method: "GET",
                     header:('Content-Type: application/json'),
                   success: function(data) {
                        console.log(data);
                        var json = JSON.parse(data);
                        console.log(json);
                        if(json["code"]==0){$('#myadv').modal('show');}
                        else{
                            $title="<div id='myadv_title'> آگهی های شما</div>"
                             show_myadv(json["result"],$title);
                        }
                    },
                    error: function(errMsg) {
                       console.log(errMsg);
                    }
                });
                
            }
            //=======================================
               $("#phone_submit").click(function(e) {
                   
                    e.preventDefault(); 
                    if($('#phone2').val()!='')
                        {
                            $('.loadingmessage').show();
                   $.ajax({
                    url: "<?php echo site_url('Myform/phone_login'); ?>",
                    method: "POST",
                    data:{'phone' : $('#phone2').val()},
                     header:('Content-Type: application/json'),
                   success: function(data) {
                       $('.loadingmessage').hide();
                        var json = JSON.parse(data);
                       // console.log(data);
                        if((json["code"]==2)||(json["code"]==0)){
                        $('#login_errors').html(json["result"]);
                             $('#login_errors').css('display','block');}
                        else{
                          $('#logout').show();
                            $('#login_errors').css('display','none');
                           
                            $('#myadv').modal('hide');
                            var title="<div id='myadv_title'>با شماره تلفن وارد شده آگهی های زیر به ثبت رسیده است.</div>";
                             show_myadv(json["result"],title);
                            //(json["result"]);
                        }
                    },
                    error: function(errMsg) {
                       console.log(errMsg);
                    }
                });}else   {$('#login_errors').html("لطفا شماره تماس را وارد کنید."); $('#login_errors').css('display','block');}
            });
             //=======================================
               $("#email_submit").click(function(e) {
                   
                    e.preventDefault(); 
                    if($('#email2').val()!='')
                        {
                            $('.loadingmessage').show();
                   $.ajax({
                    url: "<?php echo site_url('Myform/email_login'); ?>",
                    method: "POST",
                    data:{'email' : $('#email2').val()},
                     header:('Content-Type: application/json'),
                   success: function(data) {
                       $('.loadingmessage').hide();
                                       //        console.log(data);
                        var json = JSON.parse(data);
                       // console.log(data);
                        if((json["code"]==2)||(json["code"]==0)){
                        $('#login_errors').html(json["result"]);
                             $('#login_errors').css('display','block');}
                        else{
                 $('#logout').show();

                            $('#login_errors').css('display','none');
                           
                            $('#myadv').modal('hide');
                            $title="<div id='myadv_title'>با ایمیل وارد شده آگهی های زیر به ثبت رسیده است.</div>"
                             show_myadv(json["result"],$title);
                            //(json["result"]);
                        }
                    },
                    error: function(errMsg) {
                       console.log(errMsg);
                    }
                });}else   {$('#login_errors').html("لطفا ایمیل خود را وارد کنید."); $('#login_errors').css('display','block');}
            });
            //===================================================================
            function show_myadv(data,title) {
               e2= "javascript:my_get_city('#city_list2');my_get_category('#main_cat2','#sub_cat2');";
                
               
            str = "";
            for (var i = 0; i < data.length; i++) {
                var item = data[i];
                json="{'id':'"+item.id+"','description':'"+item.description+"','phone':'"+item.phone+"','email':'"+item.email+"'}";
                var accept="";
                if(item.accept==0)
                    accept="در انتظار انتشار";
                else
                    if(item.accept==1)
                        accept="منتشر شده";
                else
                    accept="رد شده";
                var str = str + "<div class='col-sm-6 col-md-6 col-lg-4 maincard' ><div class='card'><div class='row'><div class='col-sm-6 col-xs-6 txtsec'><h5 class='card-title'>" + item.name + "</h5><h6 class='card-text'>" + item.description + "شهر</h6><h6 style='color:#aaa;'>" + item.date + "</h6>		<h6>" + item.city_id + "قیمت</h6></div><div class='col-sm-6  col-xs-6 imgsec '> <img class='card-img-top cardimg'  src='assets/upload/" + item.img + "'alt='Card image cap'></div></div><div class='row'><div id='op' class='col-md-12 text-center'><div class='text-right' id='accept'>وضعیت:"+accept+"</div> <a onclick="+e2+" data-toggle='modal' data-target='#edit_modal' data-id='"+item.id+"' data-phone='"+item.phone+"'data-name='"+item.name+"' data-email='"+item.email+"' data-description='"+item.description+"' data-hiddenimg='"+item.img+"' class='mybtn' id='edit'>ویرایش </a><a  data-toggle='modal' data-target='#delete' data-id='"+item.id+"' data-phone='"+item.phone+"' class='mybtn' id='del'>حذف </a></div></div></div> </div>" ;
            }
            if (str.length <= 0) {
                str = "موردی یافت نشد";
            }
                str=title+str;
            $('#search_result').html(str);


        }
             //=====================================
            $('#edit_modal').on('show.bs.modal', function(e) {
             var hiddenimg=$(e.relatedTarget).data('hiddenimg');
                var advId=$(e.relatedTarget).data('id');
                 var name=$(e.relatedTarget).data('name');
                var phone=$(e.relatedTarget).data('phone');
                var email=$(e.relatedTarget).data('email');
                var description=$(e.relatedTarget).data('description');
                
                $("#hiddenimg").val(hiddenimg);
                $("#hiddenValue2").val(advId);
                $("#phone3").val(phone);
                 $("#email3").val(email);
                 $("#description2").val(description);
                 $("#title2").val(name);
            });
              //==================================
            $("#edit").submit(function(e) {
             e.preventDefault(); 
              var phone=$('#phone3').val();
          
        var formdata=new FormData(this);
         var other_data = $('#edit').serializeArray();
                for (var pair of formdata.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
}
                   $('#e-submit').hide();
    $('.loadingmessage').show();
                $.ajax({
                    url: "<?php echo site_url('Myform/do_edit'); ?>",
                    method: "POST",
                    data:formdata,
                     processData:false,
                    contentType:false,
                    cache:false,
                   success: function(data) {
                          $('#e-submit').show();
                        $('.loadingmessage').hide();
                                              // console.log(data);
                        var json = JSON.parse(data);
                        console.log(json);
                        if((json["code"]==2)||(json["code"]==0)){
                        $('#errors2').html(json["result"]);
                             $('#errors2').css('display','block');}
                        else{
                         
                            $('#errors2').css('display','none');
                           refresh_by_phone(phone);
                           
                         $('#edit_modal').modal('hide');
                              $('.myalert').html(json["result"]);
                        $('.myalert').fadeIn(400).delay(3000).fadeOut(400);
                        }
                    },
                    error: function(errMsg) {
                       console.log(errMsg);
                    }
                });
            });
             //==================================
            $("#insert").submit(function(e) {
             e.preventDefault(); 
                 var inputFile=$('input[name=pic]');
        var fileToUpload=inputFile[0].files[0];
        var other_data = $('#insert').serializeArray();
          
        var formdata=new FormData(this);
           /* for (var pair of formdata.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
}*/
               
       // formdata.append('fileToUpload',fileToUpload);
        formdata.append('other_data',other_data);
                 $('#submit').hide();
   $('.loadingmessage').show();
                $.ajax({
                    url: "<?php echo site_url('Myform/do_upload'); ?>",
                    method: "POST",
                    data:formdata,
                     processData:false,
                    contentType:false,
                    cache:false,
                   success: function(data) {
                        $('#submit').show();
                         $('.loadingmessage').hide();
                        var json = JSON.parse(data);
                        
                        if((json["code"]==2)||(json["code"]==0)){
                        $('#errors').html(json["result"]);
                             $('#errors').css('display','block');}
                        else{
                         
                            $('#errors').css('display','none');
                           
                            empty_fields();
                         $('#myModal').modal('hide');
                              $('.myalert').html(json["result"]);
                        $('.myalert').fadeIn(400).delay(3000).fadeOut(400);
                        }
                    },
                    error: function(errMsg) {
                       console.log(errMsg);
                    }
                });
            });
            //=======================================
            function  empty_fields(){
                 $('#title').val('');
                 $('#description').val('');
                 $('#email').val('');
                 $('#phone').val('');
                
            }
            //=====================================
            $('#delete').on('show.bs.modal', function(e) {
                var advId=$(e.relatedTarget).data('id');
                var phone=$(e.relatedTarget).data('phone');

                $("#hiddenValue").val(phone);
                $("#btndel").val(advId);
            });
            ///====================================
            $('#btndel').click(function(){
                   $('#btndel').hide();
                   $('.loadingmessage').show();
                 var advId = $(this).val();
                var phone= $("#hiddenValue").val();
              //  console.log(advId);
                 jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>" + "Adv/delete_by_id_json",
                    data: {
                        'id': advId
                    },
                    header:('Content-Type: application/json'),
                    cache: false,
                    success: function(data) {
                          $('#btndel').hide();
                           $('.loadingmessage').hide();
                        var json = JSON.parse(data);
                        $('.myalert').html(json["result"]);
                        $('.myalert').fadeIn(400).delay(3000).fadeOut(400);
                       refresh_by_phone(phone);
                    },
                    error: function(errMsg) {
                        console.log(errMsg);
                    }
                });
            });
            //=====================================
            function  refresh_by_phone(phone){
                    $('.loadingmessage').show();
                 $.ajax({
                    url: "<?php echo site_url('Myform/phone_login'); ?>",
                    method: "POST",
                    data:{'phone' :phone},
                     header:('Content-Type: application/json'),
                   success: function(data) {
                          $('.loadingmessage').hide();
                        var json = JSON.parse(data);
                       // console.log(data);
                        if((json["code"]==0)){
                        $('#search_result').html(json["result"]);
                            }
                        else{
                            var title="<div id='myadv_title'>با شماره تلفن وارد شده آگهی های زیر به ثبت رسیده است.</div>";
                             show_myadv(json["result"],title);
                           
                        }
                    },
                    error: function(errMsg) {
                       console.log(errMsg);
                    }
                });
            }
            //=====================================
            function show_snakbar(){
                 // Get the snackbar DIV
    var x = document.getElementById("snackbar")

    // Add the "show" class to DIV
   // x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
            //=========================================
            function get_one(id) {
             //   console.log(id);
                   $('.loadingmessage').show();
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>" + "Show/getadv_by_id_json",
                    data: {
                        'id': id
                    },
                    header:('Content-Type: application/json'),
                    cache: false,
                    success: function(data) {
                           $('.loadingmessage').hide();
                        var json = JSON.parse(data);
                        console.log(json["result"]);
                        show_one(json["result"]);
                    },
                    error: function(errMsg) {
                        console.log(errMsg);
                    }
                });
            }
            //==========================================
            function show_one(data) {
               //  var json = JSON.parse(data);
               // console.log(json);
                item = data[0];
                img2 = "<?php echo base_url('assets/upload') ?>/" + item.img;
                str = "<div class=' row card'><div id='txtdiv2' class=' col-sm-7 '>   <div class='box'><h2>" + item.name + "</h2></div><div class='box'><p>" + item.description + "</p></div><div class='box'><p>" + item.date + "</p></div><div class='box'><p>شماره تماس آگهی : " + item.phone + "</p></div></div><div id='img_div' class=' col-sm-5  '><img src='" + img2 + "' class='myimg' ></div></div>";
                $('#search_result').html(str);
                
            }
            //==========================================
            function set_city_title() {
                if (checkCookie()) {
                    var $city_id = getCookie('city_id');
                       $('.loadingmessage').show();
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>" + "Show/get_city_name_json",
                        data: ({
                            'id': $city_id
                        }),
                        dataType: 'json',
                        cache: false,
                        success: function(data) {
                              $('.loadingmessage').hide();
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
            function hidesidebar() {
                $('.sidbar').hide();
            }

            function showsidebar() {
                $('.sidbar').show();
            }

            //==============================================
            $('.nav').on('click', 'li', function() {
                $('.nav li').removeClass('active');
                $(this).addClass('active');
            });
            //==================================

            //===================================
            $(document).ready(function() {
                $('h4.panel-title a').click(function(e) {

                    $('h4.panel-title a').removeClass('activetitle');

                    var $parent = $(this);
                    if (!$parent.hasClass('activetitle')) {
                        $parent.addClass('activetitle');
                    }
                    e.preventDefault();
                });
            });

            //====================================
            function getSelectedText(elementId) {
                var elt = document.getElementById(elementId);

                if (elt.selectedIndex == -1)
                    return null;

                return elt.options[elt.selectedIndex].text;
            }
            //==========================================
            var x;
            var accept_city = document.getElementById('accept_city');
            var detail = document.getElementById('detail');
            var concept = document.getElementById('concept');

            var edit_concept = document.getElementById("edit_concept");

            var cancel = document.getElementById('cancel');
            var submit = document.getElementById('submit');
            var accept_concept = document.getElementById("accept_concept");
            
            /*  accept_city.onclick = function() {
                  localStorage.setItem('city_id', $('#city_combo').val());
                  localStorage.setItem('ostanha_id', $('#ostanha_combo').val());
                  show_by_city($('#city_combo').val());
              }*/
            accept_city.onclick = function() {
                setCookie('city_id', $('#city_combo').val(), 240);
                setCookie('ostanha_id', $('#ostanha_combo').val(), 240);
                $('.select_city').html(getSelectedText('city_combo'));
                show_by_city($('#city_combo').val());
            }


         /*   edit_concept.onclick = function() {
                concept.style.display = "block";
                detail.style.display = "none";
            }*/
          /*  accept_concept.onclick = function() {
                detail.style.display = "block";
                concept.style.display = "none";
            }*/
            /* submit.onclick = function() {
                 concept.style.display = "block";
                 detail.style.display = "none";
                 add();

             }*/
            cancel.onclick = function() {
                concept.style.display = "block";
                detail.style.display = "none";
            }

            //=================================================
            function sec_show_hide(show2,hide2){
                 $(hide2).css('display','none');
                 $(show2).css('display','block');
                $(show2).fadeIn(400).delay(3000);
                
            }

            //=================================================
            function show_by_city(id) {
                   $('.loadingmessage').show();
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>" + "Show/by_city_id_json",
                    data: ({
                        'id': id
                    }),
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                           $('.loadingmessage').hide();
                        if (data != null) {
                            refreshcontent(data);
                            showsidebar();
                        } else {
                            hidesidebar();
                            $('#search_result').html("موردی یافت نشد");
                        }

                    },

                    error: function(errMsg) {
                        console.log(errMsg);
                    }
                });
            }

            //=================================================
            function fill_ostanha_combo() {
                   $('.loadingmessage').show();

                jQuery.ajax({
                    type: "GET",
                    url: "<?php echo base_url();?>" + "Show/all_ostan_json",
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                           $('.loadingmessage').hide();
                        fill_list('#ostanha_combo', data);
                        ff();
                    },

                    error: function(errMsg) {
                        console.log(errMsg);
                    }
                });

            }

            function ff() {
                if (checkCookie()) {
                    var $ostanha_id = getCookie('ostanha_id');
                    // console.log($city_id);
                    $('#ostanha_combo').val($ostanha_id);
                    onload_get_city_by_ostan_id($ostanha_id);
                } else {
                    get_city_by_ostan_id(1);

                }
            }

            //======================================================
            function fill_list(id, data) {
                $(id).html("");
                for (var i = 0; i < data.length; i++) {
                    var item = data[i];

                    $(id).append("<option value='" + item.id + "'>" + item.name + "</option>");
                }
            }
            
            //=======================================================
            function onload_get_city_by_ostan_id(id) {
                   $('.loadingmessage').show();
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>" + "Show/by_ostan_id_json",
                    data: ({
                        'id': id
                    }),
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                           $('.loadingmessage').hide();
                        fill_list('#city_combo', data);
                        if (checkCookie()) {
                            var $city_id = getCookie('city_id');
                            $('#city_combo').val($city_id);
                        }
                    },

                    error: function(errMsg) {
                        console.log(errMsg);
                    }
                });
            }
            //======================================================================================
            function get_city_by_ostan_id(id) {
                    $('.loadingmessage').show();
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>" + "Show/by_ostan_id_json",
                    data: ({
                        'id': id
                    }),
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                           $('.loadingmessage').hide();
                        fill_list('#city_combo', data);
                    },

                    error: function(errMsg) {
                        console.log(errMsg);
                    }
                });
            }
            //==================================================
            function get_ostan_id() {
                var e = document.getElementById("ostanha_combo");
                var x = e.options[e.selectedIndex].value;
                get_city_by_ostan_id(x);
            }
            //=======================================================
            function my_get_category(id,sub) {
                   $('.loadingmessage').show();
                jQuery.ajax({
                    type: "GET",
                    url: "<?php echo base_url();?>" + "Show/all_cat_json",
                    dataType: 'json',
                    cache: false,
                    success: function(data) {                     
                    $('.loadingmessage').hide();
                       fill_cat(id,data);
                         get_sub_by_main_id(1,sub);
                    },
                    error: function(errMsg) {
                        console.log(errMsg);
                    }
                });
            }
            //==================================================.======
            function my_get_city(id) {
                   $('.loadingmessage').show();
                jQuery.ajax({
                    type: "GET",
                    url: "<?php echo base_url();?>" + "Show/all_city_json",
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                           $('.loadingmessage').hide();
                        fill_list(id, data);
                       //    console.log(data);
                    },
                    error: function(errMsg) {
                        console.log(errMsg);
                    }
                });
            }
       //======================================
        $("#main_cat").change(function () {
        var x = this.value;
             get_sub_by_main_id(x,'#sub_cat');
    });
          //======================================
        $("#main_cat2").change(function () {
        var x = this.value;
             get_sub_by_main_id(x,'#sub_cat2');
    });
            //=================================================
           /* function get_parent_index(list) {
                var e = document.getElementById("main_cat");
                var x = e.options[e.selectedIndex].value;
                get_sub_by_main_id(x,list);
            }*/
            //==================================================
            function get_sub_by_main_id(id,list_name) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>" + "Show/by_parent_id_json",
                    data: ({
                        'id': id
                    }),
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                      
                        fill_cat(list_name,data);
                    },
                     error: function(errMsg) {
                        console.log(errMsg);
                    }
                });
            }
            //==================================================
          /*  function fill_sub_cat(data) {
                $('#sub_cat').html("");
                for (var i = 0; i < data.length; i++) {
                    var item = data[i];
                    $('#sub_cat').append("<option value='" + item.category_id + "'>" + item.title + "</option>");
                }
            */
              //==================================================.======

            function fill_cat(id,data) {
                $(id).html("");
                for (var i = 0; i < data.length; i++) {
                    var item = data[i];
                   
                        $(id).append("<option value='" + item.category_id + "'>" + item.title + "</option>");
                   
                }
                
            }
            //==================================================

            function add() {
                var name = document.getElementById("title").value;
                var phone = document.getElementById("phone").value;
                var email = document.getElementById("email").value;
                var image = document.getElementById("image").value;
                var e = document.getElementById("sub_cat");
                var sub_cat = e.options[e.selectedIndex].value;
                var description = $("textarea#description").val();
                var city_id = $('#city_list').val();
                  $('.loadingmessage').show();

                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>" + "Adv/my_add",
                    data: {
                        'name': name,
                        'description': description,
                        'email': email,
                        'phone': phone,
                        'city': city_id,
                        'category_id': sub_cat
                    },
                    //contentType: "application/json",
                    dataType: 'json',
                    async: true,
                    cache: false,
                    success: function(data) {
                        alert(data.result);
                            $('.loadingmessage').hide();
                    },
                    error: function(errMsg) {
                        console.log(errMsg);
                    }
                });
            }
            //======================================================
            function setCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }

            function getCookie(cname) {
                var name = cname + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            function checkCookie() {
                var city = getCookie("city_id");
                if (city != "") {
                    return true;
                } else {
                    return false;
                }
            }
//===== sidbar script ------------------
$('.alladv').click(function() {
            all();
        });
       //------------------------------------------------
       
       $('#home').click(function() {
            all();
        });
        //--------------------------------------
         function all() {
                $('.loadingmessage').show();
              $('#path').html('همه آگهی ها'  );
             if (checkCookie()) {
                    var $city_id = getCookie('city_id');
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url();?>" + "Show/all_json",
                dataType: 'json',
                cache: false,
                data: ({
                            'id': $city_id
                        }),
                success: function(data) {
                    refreshcontent(data);
                        $('.loadingmessage').hide();
                },
                error: function(errMsg) {
                        console.log(errMsg);
                    }
            });}
        }
        
        //=======================================================
        function Remove(str, startIndex) {
            return str.substr(0, startIndex);
            }

      
       ///========================================
        function show(id,title) {
              $('.loadingmessage').show();
            var path = document.getElementById('path');
            textpath = path.textContent;
            var n = textpath.lastIndexOf("/");
            if(n==-1){n=textpath.length;}
            var newpath=Remove(textpath,n);
            $('#path').html(newpath);
             $('#path').append("/"+title);
            if (checkCookie()) {
                    var $city_id = getCookie('city_id');
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url();?>" + "Show/by_sub_category_json",
                data: ({
                    'id': id,
                     'city_id':$city_id

                }),
                dataType: 'json',
                cache: false,
                success: function(data) {
                     $('.loadingmessage').hide();
                    refreshcontent(data);
                }
            });}
        }
        //=======================================================
        function showcat(id,title) {
             $('#path').html(title);
             $('.loadingmessage').show();
             if (checkCookie()) {
                    var $city_id = getCookie('city_id');
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url();?>" + "Show/get_adv_by_parentid_json",
                data: ({
                    'id': id,
                    'city_id':$city_id
                }),
                dataType: 'json',
                cache: false,
                success: function(data) {
                       $('.loadingmessage').hide();
                    refreshcontent(data);
                }
            });}
        }
        //=========================================================

        function refreshcontent(data) {
            str = "";
            for (var i = 0; i < data.length; i++) {
               var item = data[i];
                var str = str + "<a  href=javascript:get_one(" + item.id + ") id='one'> " +
                 " <div class='col-md-6 col-lg-4 maincard' ><div class='card'><div class='row'><div class='col-sm-6 col-xs-6 txtsec'><h5 class='card-title'>" + item.name +
                    "</h5><h6 class='card-date'>" + item.date + 
                    "</h6><h6 class='card-price'>" + "قیمت : 200،00 تومان" +
                     "</h6>       </div><div class='col-sm-6  col-xs-6 imgsec '> <img class='card-img-top cardimg'  src='assets/upload/" +
                  item.img +
                   "'alt='Card image cap'></div></div><div class='row'><div class=' price_div'><h6 class='card-price'>  قیمت: 200،000  تومان </h6></div>      </div></div>    </div>" +             "</a>";
            }
            if (str.length <= 0) {
                str = "موردی یافت نشد";
            }
            $('#search_result').html(str);


        }
        </script>
</body>
</html>