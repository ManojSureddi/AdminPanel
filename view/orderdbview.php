<!-- Author: Manoj Sureddi
Facebook: https://www.facebook.com/manoj.sureddi
Email: manoj.wolverine8@gmail.com
Description:This page is for the development of admin panel for getmefood.in
-->

<?php
include "config.inc.php";
$_SESSION['referer']=$_SERVER['PHP_SELF'];
?>

<style>
  #three th
  {
	background:#388a5a !important;
	color:#FFF;
	padding:10px 8px 10px 5px;
	font-size:13px;
  }
  #three table
  {
	margin:auto;
	margin-top:60px;
	border:1px solid #388a5a;
	margin-left:-180px;
	width:1000px;
    
  }
  #three td
  {
    padding:10px 8px 10px 5px;
    color:#000;
    font-weight:500;
    font-size:12px;
  }
  #three tbody > tr:nth-child(odd) > td {
    background-color: #f9f9f9;
    padding:10px 10px 10px 10px;
  }
  #three tbody > tr:nth-child(even) > td{
    background-color: #CCCCCC;
    padding:10px 10px 10px 10px;
  }
  #three .submit{
	
  }
</style>
</head>
<body>
  
      
      <h1>
        Order Page
      </h1>
      
      
      
      
      <!--  
<select id="select"  name="category" onChange="changedStatus(this.value,this.selected)">
<option value="INPROCESS">
INPROCESS
</option>
<option value="CONFIRMED">
CONFIRMED
</option>
<option value="PLACED">
PLACED
</option>
<option value="ASSIGNED">
ASSIGNED
</option>
<option value="DELIVERED">
DELIVERED
</option>
<option value="CANCELED">
CANCELLED
</option>
<option value="All">
ALL
</option>
</select>
-->
      <form method="post" action="orderdb.php" class="selform">
        <div class="squaredThree">
          <input  id="c1" type="checkbox" name="optionz[]" value="INPROCESS" onchange="fireStateChanged()" >
          
          <label for="c1">
          </label>
          <p>
            INPROCESS
          </p>
        </div>
        <div class="squaredThree">
          <input id="c2" type="checkbox" name="optionz[]" value="ASSIGNED" onchange="fireStateChanged()">
          <label for="c2">
          </label>
          <p>
            ASSIGNED EXECUTIVE
          </p>
        </div>
        <div class="squaredThree">
          <input id="c3" type="checkbox" name="optionz[]" value="CONFIRMED" onchange="fireStateChanged()">
          <label for="c3">
          </label>
          <p>
            CONFIRMED
          </p>
        </div>
        <div class="squaredThree">
          <input id="c9" type="checkbox" name="optionz[]" value="PLACED" onchange="fireStateChanged()">
          
          <label for="c9">
          </label>
          <p>
            PLACED
          </p>
        </div>
        <div class="squaredThree">
          <input id="c4" type="checkbox" name="optionz[]" value="YET_TO_DISPATCH" onchange="fireStateChanged()">
          
          <label for="c4">
          </label>
          <p>
            YET TO DISPATCH
          </p>
        </div>
        <div class="squaredThree">
          <input id="c5" type="checkbox" name="optionz[]" value="IN_TRANSIT" onchange="fireStateChanged()">
        
        <label for="c5">
        </label>
        <p>
          IN TRANSIT
        </p>
      </div>
      <div class="squaredThree">
        <input id="c6" type="checkbox" name="optionz[]" value="DELIVERED" onchange="fireStateChanged()">
        
        <label for="c6">
        </label>
        <p>
          DELIVERED
        </p>
      </div>
      <div class="squaredThree">
        <input id="c7" type="checkbox" name="optionz[]" value="CANCELED" onchange="fireStateChanged()">
        <label for="c7">
        </label>
        <p>
          CANCELED
        </p>
      </div>
      <div class="squaredThree">
        <input id="c8" type="checkbox" name="optionz[]" value="All" onchange="fireStateChanged()">
        
        <label for="c8">
        </label>
        <p>
          Select All
        </p>
      </div>
      <div class="squaredThree">
        <input id="c10" type="checkbox" name="optionz[]" value="" onchange="fireStateChanged()">
        <label for="c10">
        </label>
        <p>
          Deselect All
        </p>
      </div>
      <div style="display:block;width:300px;">
        <label>
          Select a specific date:
        </label>
        
        <input name="workfromdate" id="datepicker" type="text" onchange="fireStateChanged()" />
        <div id="datepicker">
        </div>
      </div>
      </form>
      <a href="allorders.php" class="submit" style="float:left; margin-left:20px;">
        All Orders >
      </a>
      <div style="float:right;">
        <input type="text" name="searchtype" id="query" style="float:left">
        <input id="search" type="button" value="search" class="submitbut" style="padding:.2em .2em;width:100px;  float:left">
      </div>
      <script type="text/javascript">
        $("#search").click(function(e) {
          $.ajax({
            url:"orderdb.php",
            async:true,
            type:"POST",
            data:"search="+$("#query").val(),
            success: function(data)
            {
              document.getElementById("table").innerHTML=data;
              
            }
            
          }
                );
        }
                          );
      </script>
      <div id="three">
        
        <div id="rightbox">
          <div id="table">
            <table border="0" cellspacing="5" cellpadding="10">
              <tr>
                <th align="center">
                  Order Id
                </th>
                <th align="center">
                  Time Of Order
                </th>
                <th align="center">
                  Order Status
                </th>
                <th align="center">
                  Area
                </th>
                <th align="center">
                  Restaurant Id
                </th>
                <th align="center">
                  Restaurant Name
                </th>
                
                <th align="center">
                  Custumer Id
                </th>
                <th align="center">
                  Custumer Name
                </th>
                <th align="center" >
                  Assigned Executive
                </th>
                <th align="center" >
                  Assigned Delivery Boy
                </th>
                <th align="center" >
                </th>
                <th align="center" >
                </th>
                
              </tr>
            </table>
          </div>
          <div id="hai">
          </div>
        </div>
        <script>
          $(document).ready(function(e) {
            $('#c1').prop("checked",true);
            fireStateChanged();
          }
                           );
          $('#c8').click(function(e) {
            $('#c1').prop("checked",true);
            $('#c2').prop("checked",true);
            $('#c3').prop("checked",true);
            $('#c4').prop("checked",true);
            $('#c5').prop("checked",true);
            $('#c6').prop("checked",true);
            $('#c7').prop("checked",true);
            $('#c9').prop("checked",true);
            $('#c10').prop("checked",false);
            fireStateChanged();
          }
                        );
          $('#c10').click(function(e) {
            $('#c1').prop("checked",false);
            $('#c2').prop("checked",false);
            $('#c3').prop("checked",false);
            $('#c4').prop("checked",false);
            $('#c5').prop("checked",false);
            $('#c6').prop("checked",false);
            $('#c7').prop("checked",false);
            $('#c8').prop("checked",false);
            $('#c9').prop("checked",false);
            fireStateChanged();
          }
                         );
        </script>
        <script>
          
          function callit(str1,str2){
			  
			  alert(str1+" "+str2+" "+$('#sel'+str2).val());
            var datastring="";
            if(str1==1)
            {
              $('#sel'+str2).val();
              datastring="pq="+str1+"&r="+str2+"&sel="+$('#seli'+str2).val();
            }
            else 	if(str1==0)
            {
              $('#sel'+str2).val();
              datastring="pq="+str1+"&r="+str2+"&sel="+$('#sel'+str2).val();
            }
            else 	if(str1==2)
            {
              $('#sel'+str2).val();
              datastring="pq="+str1+"&r="+str2+"&sel="+$('#sel'+str2).val()+"&cos="+$('#cos'+str2).val();
            }
            else if(str1==3)
            {
              $('#sel'+str2).val();
              datastring="pq="+str1+"&r="+str2+"&sel="+$('#sel'+str2).val();
            }
            else if(str1==4)
            {
              datastring="pq="+str1+"&r="+str2;
            }
			else if(str1==5)
            {
              datastring="pq="+str1+"&r="+str2;
            }
  else if(str1==6)
  {
    datastring="pq="+str1+"&r="+str2;
  }
  
  document.getElementById("hai").innerHTML='<img src="500.GIF" />';
  $.ajax({
    url:"update.php",
    async:true,
    type:"POST",
    data:datastring,
    success: function(data)
    {
      alert("fuck");
      document.getElementById("hai").innerHTML='';
      fireStateChanged();
    }
	
}
      );
  
}
  
   </script>
   
   
   <script>
     
     function fireStateChanged()
     {
       var le=$('input[name="optionz[]"]:checked').length;
       var comma="";
       var opt=""
           $('input[name="optionz[]"]:checked').each(function() {
             opt = opt + comma+ $(this).val();
             comma=",";
           }
                                                    );
       var lt=$('input[name="workfromdate"]').val();
       var datastring="";
       if(lt.indexOf("/")!=-1)
       {
         datastring="optionz="+opt+"&workfromdate="+lt;
       }
       else
       {
         datastring="optionz="+opt;
       }
       $.ajax({
         url:"orderdb.php",
         async:true,
         type:"POST",
         data:datastring,
         success: function(data)
         {
           document.getElementById("table").innerHTML=data;
         }
       }
             )
     }
   </script>
   
   
   
      </div>
      


