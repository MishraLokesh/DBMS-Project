<?php
require '../../include/db_conn.php';
page_protect();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>अखाडा STUDIO | Payments</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	 <link href="a1style.css" type="text/css" rel="stylesheet">
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    	.page-container .sidebar-menu #main-menu li#paymnt > a {
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

		<h2>Payments</h2>

		<hr />
		
		<table class="table table-bordered datatable" id="table-1" border=1>
			<thead>
				<tr>
					<th>Sl.No</th>
					<th>Membership Expiry</th>
					<th>Name</th>
					<th>Member ID</th>
					<th>Phone</th>
					<th>E-Mail</th>
					<th>Gender</th>
					<th>Action</th>
				</tr>
			</thead>

				<tbody>

				<?php


					$query  = "select * from enrolls_to where renewal='yes' ORDER BY expire";
					//echo $query;
					$result = mysqli_query($con, $query);
					$sno    = 1;

					if (mysqli_affected_rows($con) != 0) {
					    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

					        $uid   = $row['uid'];
					        $planid=$row['pid'];
					        $query1  = "select * from users WHERE userid='$uid'";
					        $result1 = mysqli_query($con, $query1);
					        if (mysqli_affected_rows($con) == 1) {
					            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
					                
					                 echo "<tr><td>".$sno."</td>";
					                echo "<td>" . $row['expire'] . "</td>";
					                echo "<td>" . $row1['username'] . "</td>";
					                echo "<td>" . $row1['userid'] . "</td>";
					                echo "<td>" . $row1['mobile'] . "</td>";
					                echo "<td>" . $row1['email'] . "</td>";
					                echo "<td>" . $row1['gender'] . "</td>";
					                
					                $sno++;
					                
					                echo "<td><form action='make_payments.php' method='post'><input type='hidden' name='userID' value='" . $uid . "'/>
					                <input type='hidden' name='planID' value='" . $planid . "'/><input type='submit' class='a1-btn a1-blue' value='Add Payment ' class='btn btn-info'/></form></td></tr>";
									
					                $uid = 0;
					            }
					        }
					    }
					}

					?>									
				</tbody>

		</table>



    	</div>

    </body>
</html>


