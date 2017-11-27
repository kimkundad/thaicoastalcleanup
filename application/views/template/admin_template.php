<!doctype html>
<html class="fixed sidebar-left-xs <?php if($this->uri->segment(1)=="iccCard"){ echo 'sidebar-left-collapsed'; }?>">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>Admin</title>
        <meta name="keywords" content="ผู้ใช้งาน" />
        <meta name="description" content="ผู้ใช้งาน">


        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Load It Like A Native App -->
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Bootstrap Core CSS -->

    <!-- Web Fonts
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css"> -->

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url('./assets/admin/assets/vendor/bootstrap/css/bootstrap.css'); ?>" />

        <link rel="stylesheet" href="<?php echo base_url('./assets/admin/assets/vendor/font-awesome/css/font-awesome.css'); ?>" />




        <!-- Specific Page Vendor CSS -->


        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url('./assets/admin/assets/stylesheets/theme.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('./assets/admin/assets/style.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('./assets/admin/assets/vendor/pnotify/pnotify.custom.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('./assets/admin/assets/vendor/magnific-popup/magnific-popup.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('./assets/admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('./assets/admin/assets/vendor/isotope/jquery.isotope.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('./assets/admin/assets/vendor/pnotify/pnotify.custom.css'); ?>">
        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url('./assets/admin/assets/stylesheets/theme-custom.css'); ?>">

        <!-- Head Libs -->
        <link rel="stylesheet" href="<?php echo base_url('./assets/admin/assets/vendor/select2/select2.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('./assets/admin/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css'); ?>">
        <link href="<?php echo base_url('./assets/admin/assets/text/dist/summernote.css'); ?>" rel="stylesheet">
        <script src="<?php echo base_url('./assets/admin/assets/vendor/modernizr/modernizr.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('./assets/admin/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css'); ?>">
        <!-- Dropzone -->
        <link href="<?php echo base_url('./assets/admin/assets/upload_image/css/fileinput.css'); ?>" rel="stylesheet">

        <style type="text/css">
        .select2-container .select2-choice {
                display: block;
                height: 35px;
            }
            .dataTables_wrapper .dataTables_length .select2-container {
                margin-right: 10px;
                width: 85px;
            }
            .page-header{
              display: none;
            }

            @media only screen and (min-width: 768px){
              html.fixed .inner-wrapper{
                padding-top: 40px;
              }
            }


        </style>



</head>

<body class="loading-overlay-showing" data-loading-overlay>
        <span class="loading-overlay dark">
            <span class="loader white"></span>
        </span>

    <section class="body">


        <header class="header">
                <div class="logo-container">
                    <a href="#" class="logo pull-left" style="margin-top:0px;">
                    <img src="<?php echo base_url('assets/images/logo/logo-5.png'); ?>" height="52"  /> <span style="font-size: 16px;">กรมทรัพยากรทางทะเลและชายฝั่ง<span>
                </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened"
                    data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <!-- start: search & user box -->
                <div class="header-right">





                    <span class="separator"></span>
                        <?php
                        if ( $this->session->userdata('isUserLoggedIn') ) {
                        ?>
                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                            
                              <img src="<?php echo base_url('./assets/admin/assets/images/avatar/1483537975.png'); ?>" width="35" height="35"  
                              class="img-circle" data-lock-picture="<?php echo base_url('./admin/assets/images/avatar/1483537975.png'); ?>" />
                        
                            </figure>
                            <div class="profile-info" data-lock-name="{{ Auth::user()->name }}" >
                                <span class="name"><?php  echo $this->session->userdata('user_name'); ?></span>
                                <span class="role"></span>
                            </div>

                            <i class="fa custom-caret"></i>
                        </a>

                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                              
                                <li>
                                    <a role="menuitem" tabindex="-1" href="<?php echo base_url('logout'); ?>" ><i class="fa fa-power-off"></i> ออกจากระบบ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                        <?php
                         }
                        ?>
                     






                </div>
                <!-- end: search & user box -->
            </header>
            <!-- end: header -->


<div class="inner-wrapper">




<style>

ul.nav-main > li.nav-expanded > a {
  box-shadow: 2px 0 0 #7347b3 inset;
}
html.no-overflowscrolling .nano > .nano-pane > .nano-slider {
    background: #7347b3;
}
.page-header h2 {
    border-bottom-color: #7347b3;
}
</style>
<!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">

                    <div class="sidebar-header">
                        <div class="sidebar-title">
                            Navigation
                        </div>
                        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fa fa-bars" aria-label="Toggle sidebar" ></i>
                        </div>
                    </div>

                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">
                                <ul class="nav nav-main">

                                    <li <?php if($this->uri->segment(1)=="dashboard"){ echo 'class=nav-expanded'; }?> >
                                        <a href="<?php echo base_url('dashboard'); ?>"  >
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>

                                    <li <?php if($this->uri->segment(1)=="iccCard"){ echo 'class=nav-expanded'; }?> >
                                        <a href="<?php echo base_url('iccCard'); ?>"  >
                                            <i class="fa fa-flag" aria-hidden="true"></i>
                                            <span>จัดการ iccCard</span>
                                        </a>
                                    </li>

                                    <li <?php if($this->uri->segment(1)=="blog"){ echo 'class=nav-expanded'; }?> >
                                        <a href="<?php echo base_url('blog'); ?>"  >
                                            <i class="fa fa-life-ring" aria-hidden="true"></i>
                                            <span>จัดการ บทความ/ข่าวสาร</span>
                                        </a>
                                    </li>

                                     <li <?php if($this->uri->segment(1)=="slideshow"){ echo 'class=nav-expanded'; }?> >
                                        <a href="<?php echo base_url('slideshow'); ?>"  >
                                            <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
                                            <span>จัดการ slideshows</span>
                                        </a>
                                    </li>
                                    <li <?php if($this->uri->segment(1)=="gallery"){ echo 'class=nav-expanded'; }?> >
                                        <a href="<?php echo base_url('gallery'); ?>"  >
                                            <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                            <span>ภาพกิจกรรมโครงการ </span>
                                        </a>
                                    </li>

                                </ul>



                            </nav>



                            <hr class="separator" />


                        </div>

                    </div>

                </aside>
                <!-- end: sidebar -->





<?php // print_r($this->session->all_userdata()); ?>



<?php if($body) echo $body;?>




                <!-- /.row -->
   </div>

    </section>
    <!-- /#section -->

    <!-- jQuery -->

<!-- Vendor -->
<script src="<?php echo base_url('./assets/admin/assets/vendor/jquery/jquery.js'); ?>"></script>
<script src="<?php echo base_url('./assets/admin/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js'); ?>"></script>
<script src="<?php echo base_url('./assets/admin/assets/vendor/jquery-cookie/jquery.cookie.js'); ?>"></script>
<script src="<?php echo base_url('./assets/admin/assets/vendor/bootstrap/js/bootstrap.js'); ?>"></script>
<script src="<?php echo base_url('./assets/admin/assets/vendor/nanoscroller/nanoscroller.js'); ?>"></script>
<script src="<?php echo base_url('./assets/admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
<script src="<?php echo base_url('./assets/admin/assets/vendor/magnific-popup/magnific-popup.js'); ?>"></script>
<script src="<?php echo base_url('./assets/admin/assets/vendor/jquery-placeholder/jquery.placeholder.js'); ?>"></script>

<!-- Specific Page Vendor -->
<script src="<?php echo base_url('./assets/admin/assets/vendor/select2/select2.js'); ?>"></script>

<script src="<?php echo base_url('./assets/admin/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('./assets/admin/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js'); ?>"></script>

<script src="<?php echo base_url('./assets/admin/assets/vendor/isotope/jquery.isotope.js'); ?>"></script>
<script src="<?php echo base_url('./assets/admin/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js'); ?>"></script>
<script src="<?php echo base_url('./assets/admin/assets/vendor/pnotify/pnotify.custom.js'); ?>"></script>
<script src="<?php echo base_url('./assets/admin/assets/vendor/magnific-popup/magnific-popup.js'); ?>"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url('./assets/admin/assets/javascripts/theme.js'); ?>"></script>

<!-- Theme Custom -->
<script src="<?php echo base_url('./assets/admin/assets/javascripts/theme.custom.js'); ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo base_url('./assets/admin/assets/javascripts/theme.init.js'); ?>"></script>


<!-- Analytics to Track Preview Website -->

<!-- Examples -->

<script src="<?php echo base_url('./assets/admin/assets/javascripts/ui-elements/examples.modals.js'); ?>"></script>
 <script src="<?php echo base_url('./assets/admin/assets/javascripts/tables/examples.datatables.default.js'); ?>"></script>

 <script src="<?php echo base_url('./assets/admin/assets/javascripts/ui-elements/examples.loading.overlay.js'); ?>"></script>
<script src="<?php echo base_url('./assets/admin/assets/vendor/jquery-validation/jquery.validate.js'); ?>"></script>

<script src="<?php echo base_url('./assets/admin/assets/text/dist/summernote.js?v1'); ?>"></script>
<script src="<?php echo base_url('./assets/admin/assets/upload_image/js/fileinput.js'); ?>"></script>

<script src="<?php echo base_url('./assets/admin/assets/vendor/magnific-popup/jquery.magnific-popup.js'); ?>"></script>
<script src="<?php echo base_url('./assets/admin/assets/vendor/jquery-placeholder/jquery-placeholder.js'); ?>"></script>


<script type="text/javascript">
$(document).ready(function() {

  $('#summernote').summernote({

    fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
    disableDragAndDrop: true,
    height: 450,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote

  });


});




</script>



<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyA89Rb8Kz1ArY3ks6sSvz2cNrn66CHKDiA&libraries=places&sensor=false'></script>
<script type="text/javascript">
      var map;
      var geocoder;
      var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP };

      function initialize() {
var myOptions = {
                center: new google.maps.LatLng(13.7211075, 100.5904873 ),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });

            var marker;
            function placeMarker(location) {
                if(marker){ //on vérifie si le marqueur existe
                    marker.setPosition(location); //on change sa position
                }else{
                    marker = new google.maps.Marker({ //on créé le marqueur
                        position: location,
                        map: map
                    });
                }
                document.getElementById('lat').value=location.lat();
                document.getElementById('lng').value=location.lng();
                getAddress(location);
            }

      function getAddress(latLng) {
        geocoder.geocode( {'latLng': latLng},
          function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
              if(results[0]) {
                document.getElementById("address").value = results[0].formatted_address;
              }
              else {
                document.getElementById("address").value = "No results";
              }
            }
            else {
              document.getElementById("address").value = status;
            }
          });
        }
      }
      google.maps.event.addDomListener(window, 'load', initialize);
</script>


<script type="text/javascript">

<?php  if($this->session->flashdata('success_blog')){ ?>
        new PNotify({
            title: 'ยินดีด้วยค่ะ',
            text: 'คุณทำการเพิ่มเนื้อหาสำเร้จแล้ว.',
            type: 'success'
        });
<?php  } ?>


<?php  if($this->session->flashdata('success_blog_edit')){ ?>
        new PNotify({
            title: 'ยินดีด้วยค่ะ',
            text: 'คุณทำการแก้ไขเนื้อหาสำเร้จแล้ว.',
            type: 'success'
        });
<?php  } ?>

<?php  if($this->session->flashdata('success_blog_del_img')){ ?>
        new PNotify({
            title: 'ยินดีด้วยค่ะ',
            text: 'คุณทำการแก้ไขเนื้อหาสำเร้จแล้ว.',
            type: 'success'
        });
<?php  } ?>


<?php  if($this->session->flashdata('success_slide')){ ?>
        new PNotify({
            title: 'ยินดีด้วยค่ะ',
            text: 'คุณทำการเพิ่ม slideshow เสร็จแล้ว.',
            type: 'success'
        });
<?php  } ?>


<?php  if($this->session->flashdata('success_slideshow_edit')){ ?>
        new PNotify({
            title: 'ยินดีด้วยค่ะ',
            text: 'คุณทำการแก้ไข slideshow เสร็จแล้ว.',
            type: 'success'
        });
<?php  } ?>


<?php  if($this->session->flashdata('success_blog_del')){ ?>
        new PNotify({
            title: 'ยินดีด้วยค่ะ',
            text: 'คุณทำการลบเนื้อหา รูปภาพ เสร็จแล้ว.',
            type: 'success'
        });
<?php  } ?>


<?php  if($this->session->flashdata('success_slide_del')){ ?>
        new PNotify({
            title: 'ยินดีด้วยค่ะ',
            text: 'คุณทำการลบเนื้อหา รูปภาพ เสร็จแล้ว.',
            type: 'success'
        });
<?php  } ?>

//flash:old:success_blog success_blog_del_img success_blog_del success_slide_del
</script>


</body>

</html>