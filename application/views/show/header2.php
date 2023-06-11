<!DOCTYPE html>
<html lang="en">

<head>
    <title>Divar Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon"      type="image/png"      href="/img/divar_logo.png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.rtl.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style2.css?vertion=<?php echo date(" h:i:sa ") ?>">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/font-awesome/css/font-awesome.min.css">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>


    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        
        .row.content {
            height: 450px
        }
        /* Set gray background color and 100% height */
        
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }
        /* Set black background color, white text and some padding */
        
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }
        /* On small screens, set height to 'auto' for sidenav and grid */
        
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {
                height: auto;
            }
        }

    </style>
</head>

<body>
    <script>
        var csrf = {
            '<?= $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>'
        };

    </script>
    <nav class="navbar">
       
        <div id="main_nav"class="container-fluid">
            <img id="brand" class="navbar-brand " src="img/divar_logo.png"/>
            <div style="float: left;" class="navbar-header navbar-left">
                

               <div id="loading" style='display:none'>
               <img src='img/ajax-loader.gif'/>
                </div>
                
                <a id="logout" class="select_btn" onclick="logout()" ><i style="    margin-top: 2px;"class="fa fa-power-off" aria-hidden="true"></i><span class="logout2"> خروج از حساب کاربری</span>  </a>
                
                
                
              
                <a id="city_btn" class="select_btn" onclick="fill_ostanha_combo()" data-toggle="modal" data-target="#cityModal"><span class="select_city">انتخاب شهر</span>  <i style="    margin-top: 2px;"class="fa fa-chevron-down" aria-hidden="true"></i></a>

                <a id="add_btn" class="btn btn-success" onclick="javascript:my_get_city('#city_list');my_get_category('#main_cat','#sub_cat')" data-toggle="modal" data-target="#myModal"><i class=" plus fa fa-plus"></i><span style="margin-right:4px"class="hidden-xs">ثبت آگهی</span> </a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
            </div>
            <div class="collapse navbar-collapse  " id="myNavbar">
                <ul class="nav navbar-nav">
                    <li  class="active"><a id="home" href="# ">صفحه اصلی</a></li>
                   <li><a href="# " onclick="check_login()" >آگهی من</a></li>
                    <li><a href="# ">در باره ما</a></li>
                    <li><a  href="# ">تماس با ما</a></li>
                </ul>

            </div>
        </div>
        
         <div class='myalert' style='display:none'>Event Created</div>
	





        <!--insert Modal -->
        <?php require_once 'insert_modal.php';?>
        
         <?php require_once 'myadv.php';?>
         
          <?php require_once 'delete.php';?>
              <?php require_once 'edit.php';?>
        <!--end insert Modal -->

        <!--select city Modal -->
        <?php require_once 'city_modal.php';?>

        <!--end select city Modal -->
       

    </nav>
<script>
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
//=================================================
     function checkCookie() {
                var city = getCookie("city_id");
                if (city != "") {
                    return true;
                } else {
                    return false;
                }
            }
            //=========================
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
    ///==============================
   function hidesidebar() {
                $('.sidbar').hide();
            }
           
   function showsidebar() {
                $('.sidbar').show();
            }

            

            //==============================================
    </script>