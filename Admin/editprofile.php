


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Hotel Management System</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script>
function nmbonly(e){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8){ 
if (unicode!=9){ 
if (unicode<48||unicode>57) 
return false 
}}}
function nmbonly1(e){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8){ 
if (unicode!=9){ 
if (unicode!=46){
if (unicode<48||unicode>57) 
return false 
}}}}
// onkeypress="return nmbonly(event)"
</script>
</strong>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/plugins/excanvas.min.js"></script><![endif]-->
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->


</head>

<body class="withvernav">
<form action="adm-action.php" method="post" name="logout">
<input name="opr" value="logout" type="hidden" />
</form>
<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <h1 class="logo">Hotel Management<span> System</span></h1>
            <span class="slogan">Site admin</span>
            
            <br clear="all" />
            
        </div><!--left-->
        
        <div class="right">
            <div class="userinfo">
                            <img src="images/admin.jpg" height="25" alt="" />
                                <span>Administrator</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
            	<div class="avatar"><a href="#">
                      <img src="images/admin.jpg" height="95" alt="" />
                  
         </a>
         
                </div>
                <div class="userdata">
                	<h4>Administrator</h4>
                    <span class="email">apnigang@gmail.com</span>
                    <ul>
                    	<li><a href="editprofile.php">Edit Profile</a></li>
                        <li><a href="change-password.php">Change Password</a></li>
                        <li><a href="javascript:void(0)" onclick="document.logout.submit();">Sign Out</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    <div class="header">
    	<ul class="headermenu">
        	<li  ><a href="dashboard.php"><span class="icon icon-chart"></span>Admin</a></li>
            
           <li  ><a href="front-office.php"><span class="icon icon-flatscreen"></span>Front Office</a></li>
           
            <li  ><a href="booking.php"><span class="icon icon-pencil"></span></span>Booking</a></li>
           
        </ul>
        <div class="headerwidget">
        	<div class="earnings">
            	<div class="one_half">
                	
                </div>
                <div>
                    <h4>date</h4>
                    <h4><?php echo date('d/m/Y'); ?></h4>
                    </div>
            </div>
        </div>
       
        
    </div>

    <div class="vernav2 iconmenu">
    	
        
<a class="togglemenu"></a>
<br /><br />
</div>
   <script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="js/plugins/charCount.js"></script>
<script type="text/javascript" src="js/plugins/ui.spinner.min.js"></script>
<script type="text/javascript" src="js/plugins/chosen.jquery.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/forms.js"></script>
    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Edit Profile</h1>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        	
        	<div id="basicform" class="subcontent">
					                    <form class="stdform" action="adm-action.php" enctype="multipart/form-data" method="post">
					
                    	
                        <p>
                        	<label>Display Name</label>
                            <span class="field"><input type="text" name="name" class="smallinput" value=""  /></span>
                        </p>
                        <p>
                        	<label>Email</label>
                            <span class="field"><input type="text" name="email" class="smallinput" value="" /></span> 
                        </p>
                        
                        <p>
                        	<label>Upload Image</label>
                            <span class="field">
							<img src="..//" width="95" alt="" /><br />
                            	<input type="file" name="filename[]" />
<input type="hidden" name="unlink" value="..//" />
                            </span>
                        </p>
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2" name="edit_profile" type="submit">Edit Profile</button>
                            <input type="hidden" value="editprofile" name="admin" />
                            <input type="reset" class="reset radius2" value="Reset Button" />
                        </p>
                        
                        
                    </form>
                    
                    <br />

            </div>
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>

<!-- Mirrored from themepixels.com/themes/demo/webpage/amanda/forms.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 14 Feb 2013 07:04:37 GMT -->
</html>
