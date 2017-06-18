<?php
session_start();
include('config.inc.php');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
  <!-- Author: Manoj Sureddi
Facebook: https://www.facebook.com/manoj.sureddi
Email: manoj.wolverine8@gmail.com
Description:This page is for the development of admin panel for getmefood.in
-->
  
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="author" content="Manoj Sureddi">
    
    <meta name="contact details" content="manoj.wolverine8@gmail.com">
    
    <title>
      Admin Panel
    </title>
	
      <link rel="shortcut icon" href="../favicon.ico">
      <link rel="stylesheet" type="text/css" href="css/normalize.css" />
      
      <link rel="stylesheet" type="text/css" href="css/icons.css" />
      <link rel="stylesheet" type="text/css" href="css/component.css" />
      <link rel="stylesheet" type="text/css" href="css/demo.css" />
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
      <link rel="stylesheet" type="text/css" href="assets/css/github.min.css">
      <script src="js/modernizr.custom.js">
      </script>
      
      <script src="js/jquery.min.js" type="text/javascript">
      </script>
      <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
      <script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js">
      </script>
      <link type="text/css" href="css/jquery-ui-1.9.1.custom.min.css" rel="stylesheet" />
      
      <style>
        .input-group {
          width: 110px;
          margin-bottom: 10px;
        }
        .pull-center {
          margin-left: auto;
          margin-right: auto;
        }
      </style>
  </head>
  <body>
    <div id="st-container" class="st-container">
      <!-- 	
example menus 
these menus will be on top of the push wrapper
-->
      
      
      <nav class="st-menu st-effect-2" id="menu-2">
        <h2 class="icon icon-stack" style="margin-bottom:0;padding-bottom:0;text-align:center">
        </h2>
        <h2 style="margin-top:5px; padding-top:.5em;padding-bottom:0.2em;text-align:center">
          Getmefood.in
        </h2>
        <!--				
<ul>
<li>
<a class="icon icon-data" href="#">
Data Management
</a>
</li>
<li>
<a class="icon icon-location" href="#">
Location
</a>
</li>
<li>
<a class="icon icon-study" href="#">
Study
</a>
</li>
<li>
<a   href="#">
Collections
</a>
</li>
<li>
<a class="icon icon-wallet" href="#">
Credits
</a>
</li>
</ul>
-->
              <section class="ac-container">
                <ul>
                  <li>
                    <a class="icon icon-data" href="index.php?page=
<?php echo md5('home')?>
">
  Home
                  </a>
                              </li>
                              
                              </ul>
                              
                              <div>
                                <input id="ac-1" name="accordion-1" type="radio" checked />
                                <label for="ac-1" class="icon icon-location">
                                  Area Management
                                </label>
                                <article class="ac-medium">
                                  <ul>
                                    <li>
                                      <a href="index.php?page=
<?php echo md5('addCity')?>
">
  Add City
  </a>
  </li>
  
  <li>
    <a href="index.php?page=
<?php echo md5('addarea')?>
">
  Add Area
  </a>
  </li>
  
  <li>
    <a href="index.php?page=
<?php echo md5('ViewAreas')?>
">
  View Cities With Areas
  </a>
  </li>
                      </ul>
                  </article>
                              </div>
                              <div>
                                <input id="ac-2" name="accordion-1" type="radio" />
                                <label for="ac-2" class="icon icon-study">
                                  Restaurant Management
                                </label>
                                <article class="ac-medium">
                                  <ul>
                                    <li>
                                      <a href="index.php?page=
<?php echo md5('restaurant')?>
">
  Add Restaurant
          </a>
          </li>
          <!--   
<li>
<a href="index.php?page=
<?php //echo md5('addcusine')?>
">
Add Cuisine
</a>
</li>
-->
          <li>
            <a href="index.php?page=
<?php echo md5('addcat')?>
">
  Add Category
          </a>
          </li>
          <li>
            <a href="index.php?page=
<?php echo md5('menu')?>
">
  Add Menu Items
          </a>
          </li>
                      </ul>
                  </article>
                              </div>
                              <div>
                                <input id="ac-6" name="accordion-1" type="radio" />
                                <label for="ac-6" class="icon icon-photo">
                                  Order Management
                                </label>
                                <article class="ac-small">
                                  <ul>
                                    <li>
                                      <a href="index.php?page=
<?php echo md5('vieworders')?>
">
  View Orders
          </a>
                              </li>
                              <li>
                                <a href="index.php?page=
<?php echo md5('viewallorders')?>
">
  All Orders
        </a>
                              </li>
                              
                      </ul>
                                  </article>
                              </div>
                              <div>
                                <input id="ac-3" name="accordion-1" type="radio" />
                                <label for="ac-3" class="icon icon-photo">
                                  Employee Management
                                </label>
                                <article class="ac-medium">
                                  <ul>
                                    <li>
                                      <a href="index.php?page=
<?php echo md5('viewdeliverboystatus')?>
">
  Delivery Boy Status
  </a>
  </li>
  <li>
    <a href="index.php?page=
<?php echo md5('viewemployees')?>
">
  View Employees
  </a>
  </li>
  <li>
    <a href="index.php?page=
<?php echo md5('Addemployees')?>
">
  Add Employees
  </a>
  </li>
  
                      </ul>
                  </article>
                              </div>
                              
                              <div>
                                <input id="ac-4" name="accordion-1" type="radio" />
                                <label for="ac-4" class="icon icon-data">
                                  User Management 
                                  <br/>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;& Statistics
                                </label>
                                <article class="ac-small">
                                  <ul>
                                    <li>
                                      <a href="index.php?page=
<?php echo md5('viewUsers')?>
">
  View Users
  </a>
                          </li>
                          <li>
                            <a href="index.php?page=
<?php echo md5('EmployeeWiseStatistics')?>
">
  Weekly Reports
  </a>
                          </li>
                      </ul>
                  </article>
                              </div>
                              <!--               				
<div>
<input id="ac-5" name="accordion-1" type="radio" />
<label for="ac-5" class="icon icon-wallet">
Employee Management
</label>
<article class="ac-large">
<p>
You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now. We said we'd say it was the snow that killed the other two, but it wasn't. Nature is lethal but it doesn't hold a candle to man. 
</p>
</article>
</div>
-->
              </section>
          </nav>
          
          
          <!-- content push wrapper -->
          <div class="st-pusher">
			<div class="st-content">
              <!-- this is the wrapper for the content -->
              <div class="st-content-inner">
                <!-- extra div for emulating position:fixed of the menu -->
                <div id="header">
                  <div style="float:left">
                    <div id="st-trigger-effects" >
                      <button id="menulo" data-effect="st-effect-2">
                      </button>
                      
                    </div>
                  </div>
                  <div id="logo">
                    <img src="images/iconadmin.png">
                    <h1 >
                      Admin Panel
                    </h1>
                  </div>
                  <div id="userpanel">
                    <ul>
                      <li>
                        <img src="images/notifications.png">
                        <ul>
                          
                          <li>
                            No Messages
                          </li>
                        </ul>
                      </li>
                      <li>
                        <img src="images/user.png">
                        <ul>
                          <li>
                            <a href="">
                              My Profile
                            </a>
                          </li>
                          <li>
                            <a href="">
                              Change Password
                            </a>
                          </li>
                          <li>
                            <a href="logout.php">
                              Log out
                            </a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
                