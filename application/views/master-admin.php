<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<!-- start CDN header -->
<?php echo $this->load->view(CDN_HEADER,NULL, true); ?>
<!-- end CDN header -->
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<?php echo $this->load->view(HEADER_NAV,NULL, true); ?>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<?php echo $this->load->view(PRIMARY_NAV,NULL, true); ?>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<?php echo $main_content; ?>

</div>

<!--end-main-container-part-->
<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

<!--end-Footer-part-->
<?php echo $this->load->view(CDN_FOOTER,NULL, true); ?>

</body>
</html>
