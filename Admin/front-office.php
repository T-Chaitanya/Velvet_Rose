


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
            
           <li  class="current"  ><a href="front-office.php"><span class="icon icon-flatscreen"></span>Front Office</a></li>
           
            <li  ><a href="booking.php"><span class="icon icon-pencil"></span></span>Booking</a></li>
           
        </ul>
        <div class="headerwidget">
        	<div class="earnings">
            	<div class="one_half">
                	
                </div>
                <div class="one_half last alignright">
                	<h4>Today's date</h4>
                    <h2>07/03/2024</h2>
                </div>
            </div>
        </div>
       
        
    </div>

    <div class="vernav2 iconmenu">
    	

<ul>
<li 
><a href="#rooms" class="gallery">Rooms</a>
    
    <span class="arrow"></span>
    <ul id="rooms">
       <li ><a href="roomList.php">Room List</a></li>
      <!-- <li ><a href="roomList1.php">Room List 1</a></li>
              <li ><a href="roomList1.php">Room List 2</a></li>
                     <li ><a href="roomList1.php">Room List 3</a></li>
       <li ><a href="room.php">Room Transfer</a></li>-->
    </ul>
</li>

<li ><a href="#guest" class="gallery">Front Office</a>
    <span class="arrow"></span>
    <ul id="guest">
    
    
<li ><a href="position.php">Position On 07 Mar 2024</a></li>

    	<li ><a href="reservation-list.php">Reservation List</a></li>
        <li ><a href="arriva-list.php">Arrival List</a></li>
        <li ><a href="departure-list.php">Departure List</a></li>
        <li ><a href="group-reservation.php">Group Reservation</a></li>
        
         <li ><a href="inhouse-group.php">Inhouse Group</a></li>
         
        
        <li ><a href="departed-group.php">Departed Group</a></li>
        
        
      
          
          
        <li ><a href="guest.php">Guest DB</a></li>
</ul>
</li>

        
     <li ><a href="#Cashering" class="gallery">Cashering</a>
    <span class="arrow"></span>
    <ul id="Cashering">
    	
                   <li ><a href="agent.php">Travel Agent</a></li>
           
        <li ><a href="company.php">Company Database</a></li>
        
<li ><a href="cashering.php">Cashering Center</a></li>
       
</ul>
</li>
   


<li ><a href="#House" class="gallery">House Keeping</a>
    <span class="arrow"></span>
    <ul id="House">
    	
        <li ><a href="house-status.php">House Status</a></li>
        <li ><a href="maintenance-block-list.php">Maintenance Block List</a></li>
        
        <li ><a href="work-order.php">Work Order Listt</a></li>
        
        
       
</ul>
</li>
   
<li ><a href="request.php" class="tables">Booking Request</a></li>
</ul>
        
<a class="togglemenu"></a>
<br /><br />
</div>
   
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.pie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.slimscroll.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/dashboard.js"></script>        


   <div class="centercontent">

        <div class="pageheader">
            <h1 class="pagetitle">Dashboard</h1>
            <span class="pagedesc"></span>
            
           
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        
        	<div id="updates" class="subcontent">
 
                    <div class="notibar announcement">
                        <a class="close"></a>
                        <h3>Announcement</h3>
                        <p>Welcome to Nondon Hotel Booking System</p>
                    </div>

                    <div class="two_third dashboard_left">
                    
                    <ul class="shortcuts">
                     <li><a href="roomList.php" class="events"><span>Rooms List</span></a></li>
                            <li><a href="reservation-list.php" class="analytics"><span>Reservation List</span></a></li>
                        	<li><a href="guest.php" class="users"><span>Guest Database</span></a></li>
                            <li><a href="house-status.php" class="gallery"><span>House Status</span></a></li>
                           
                        </ul>
                        
                        <br clear="all" />
                    
                   <div class="contenttitle2 nomargintop">
                            <h3> Report</h3>
                        </div>
                       
                      <form action="" method="post">
                      <div class="overviewhead">
                        	<div class="overviewselect">
                               <!-- <select id="overviewselect" name="select">
                                    <option value="">Last 1 hour ago</option>
                                    <option value="">Last 5 hours ago</option>
                                    <option value="">Today</option>
                                    <option value="">Yesterday</option>
                                    <option value="">This Week</option>
                                    <option value="">Last Week</option>
                                    <option value="">This Month</option>
                                    <option value="">Last Month</option>
                                </select>-->
                            </div>
                        	From: &nbsp;<input name="from" type="text" id="datepickfrom" value="07-03-2024" /> &nbsp; &nbsp; To: &nbsp;
                            <input name="to" type="text" id="datepickto" value="07-03-2024" /> &nbsp; &nbsp; 
                            <button class="submit radius2">Search</button>
                        </div>
                        </form> 
                        
                        
                        <br clear="all" />
                        
                    <table cellpadding="0" cellspacing="0" border="0" class="stdtable overviewtable">
                            <colgroup>
                                <col class="con0" width="20%" />
                                <col class="con1" width="20%" />
                                <col class="con0" width="20%" />
                                <col class="con1" width="20%" />
                                <col class="con0" width="20%" />
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="head1">Check In</th>
                                   <!--  <th class="head1">Online Reservation</th>-->
                                    <th class="head0">Online Reservation / Reservation</th>
                                    <th class="head1">Cancelled</th>
                                     <th class="head0">No Show Fee</th>
                                      <th class="head1">Void</th
                                ></tr>
                            </thead>
                            <tbody>
                                <tr>
                                      <td>0</td>
                                      <!--  <td></td>-->
                                    <td>0 / 0</td>
                                     <td>0</td>
                                  <td>0</td>
                                     <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <br clear="all" />
                        
                       
                        
                      <div class="contenttitle2 nomargintop">
                            <h3> Today Arrival</h3>
                        </div>
                    <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablecb overviewtable2">
                            <colgroup>
                                <col class="con0" style="width: 4%" />
                                <col class="con1" />
                                <col class="con0" />
                                <col class="con1" />
                                <col class="con0" />
                                <col class="con1" />
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="head0"><input type="checkbox" class="checkall" /></th>
                                    <th class="head1">Res#</th>
                                    <th class="head0">Guest Name</th>
                                    <th class="head1">Room</th>
                                    <th class="head10">Type</th>
                                 	<th class="head1" width="100">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                   <th class="head0"><input type="checkbox" class="checkall" /></th>
                                    <th class="head1">Res#</th>
                                    <th class="head0">Guest Name</th>
                                    <th class="head1">Room</th>
                                    <th class="head10">Type</th>
                                 	<th class="head1">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                </tr>
                            </tbody>
                        </table>
                      
                        <br />
                        
                    </div>
                    
                    <div class="one_third last dashboard_right">
                    
     
                   <div class="contenttitle2 nomargintop">
                            <h3>Overview</h3>
                        </div>                    
                    
                    	<ul class="toplist">
                        	
                            <li>
                            	<div>
                                	<span class="three_fourth">
                                    	<span class="left">
                                    		<span class="title"><a href="#">Rooms</a></span>
                                        	<span class="desc">Total Rooms</span>
                                    	</span>
                                    </span>
                                    <span class="one_fourth last">
                                    	<span class="right">
                                        	<span class="h3">
6</span>
                                        </span>
                                    </span>
                                    <br clear="all" />
                                </div>
                                
                            </li>
                            
                        	<li>
                            	<div>
                                	<span class="three_fourth">
                                    	<span class="left">
                                    		<span class="title"><a href="#">GUEST</a></span>
                                        	<span class="desc">Total Guest</span>
                                    	</span>
                                    </span>
                                    <span class="one_fourth last">
                                    	<span class="right">
                                        	<span class="h3">
71</span>
                                        </span>
                                    </span>
                                    <br clear="all" />
                                </div>
                            </li>
                        	<li>
                            	<div>
                                	<span class="three_fourth">
                                    	<span class="left">
                                    		<span class="title"><a href="#">Travel Agent</a></span>
                                        	<span class="desc">Total Agent</span>
                                    	</span>
                                    </span>
                                    <span class="one_fourth last">
                                    	<span class="right">
                                        	<span class="h3">
1</span>
                                        </span>
                                    </span>
                                    <br clear="all" />
                                </div>
                            </li>
                            <li>
                            	<div>
                                	<span class="three_fourth">
                                    	<span class="left">
                                    		<span class="title"><a href="#">Company</a></span>
                                        	<span class="desc">Total Company</span>
                                    	</span>
                                    </span>
                                    <span class="one_fourth last">
                                    	<span class="right">
                                        	<span class="h3">
1</span>
                                        </span>
                                    </span>
                                    <br clear="all" />
                                </div>
                                
                            </li>
                            
                            
                        </ul>
                      
                        
                        
						                        
                      
                      
                      
                                                                    
                    </div>
                    
                    
            </div><!-- #updates -->
            
            <div id="activities" class="subcontent" style="display: none;">
            	&nbsp;
            </div><!-- #activities -->
        
        </div><!--contentwrapper-->
        
        <br clear="all" />
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>

</html>
