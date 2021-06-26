
<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>अखाडा STUDIO| View Plan</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
 		#button1
		{
		width:126px;
		}
		.page-container .sidebar-menu #main-menu li#planhassubopen > a {
    		background-color: #2b303a;
    		color: #ffffff;
		}
		table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
  border: 1px solid #00000f;

}
	</style>
</head>
     <body class="page-body  page-fade" onload="collapseSidebar()">

    	<div class="page-container sidebar-collapsed" id="navbarcollapse">	
	
		<div class="sidebar-menu">
	
			<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<!--<a href="main.php">
					<img src="../../images/gym.jpg" alt="APNA JIM" width="192" height="80" />
				</a>-->
				<p class="logoa">अखाडा  <span>STUDIO</span> </p>
			</div>
			
					<!-- logo collapse icon -->
					<div class="sidebar-collapse" onclick="collapseSidebar()">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
							
			
		
			</header>
    		<?php include('nav.php'); ?>
    	</div>

    		<div class="main-content">
		
				<div class="row">
					
					<!-- Profile Info and Notifications -->
					<div class="col-md-6 col-sm-8 clearfix">	
							
					</div>
					
					
					<!-- Raw Links -->
					<div class="col-md-6 col-sm-4 clearfix hidden-xs">
						
						<ul class="list-inline links-list pull-right">
						
						<li>
							<a href="logout.php" class="btn btn-info btn-lg">
								<span class="glyphicon glyphicon-log-out"></span> Log out
							</a>
						</li>
						</ul>
						
					</div>
					
				</div>

		<h3>Manage Plan</h3>

		<hr />

		<table class="table table-bordered datatable" id="table-1" border=1>

			<thead>
				<tr>
					<th>S.No</th>
					<th>Plan ID</th>
					<th>Plan name</th>
					<th>Plan Details</th>
					<th>Months</th>
					<th>Rate</th>
					<th>Action</th>
				</tr>
			</thead>		
				<tbody>
					<?php


					$query  = "select * from plan where active='yes' ORDER BY amount DESC";
					//echo $query;
					$result = mysqli_query($con, $query);
					$sno    = 1;

					if (mysqli_affected_rows($con) != 0) {
					    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					        $msgid = $row['pid'];
					        
					        
					        echo "<tr><td>" . $sno . "</td>";
					        echo "<td>" . $row['pid'] . "</td>";
					        echo "<td>" . $row['planName'] . "</td>";
					        echo "<td width='380'>" . $row['description'] . "</td>";
					        echo "<td>" . $row['validity'] . "</td>";
					        echo "<td>₹" . $row['amount'] . "</td>";
					        
					        $sno++;
					        
					        echo '<td><a href=edit_plan.php?id="'.$row['pid'].'"><input type="button" class="a1-btn a1-blue" id="boxxe" style="width:100%" value="Edit Plan" ></a><form action="del_plan.php" method="post" onSubmit="return ConfirmDelete();"><input type="hidden" name="name" value="' . $msgid .'"/><input type="submit" id="button1" value="Delete Plan" class="a1-btn a1-orange"/></form></td></tr>';
					        
							$msgid = 0;
					    }
					    
					}

					?>																
				</tbody>
		</table>



    	</div>

    </body>
</html>



				
