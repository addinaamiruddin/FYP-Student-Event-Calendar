//PLEASE KNOW THIS WONT WORK WITHOUT CONNECTION TO CALENDAR PHP
<!DOCTYPE html>
<?php include("dataconnection.php");?>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Admin_dashboard-style.css">
	<link rel="stylesheet" type="text/css" href="Admin_popup-style.css">
	<link rel="stylesheet" type="text/css" href="Admin_modal-css.css">
    <link rel="stylesheet" type="text/css" href="Admin_calendar.css"/>

	<script type="text/javascript">
		function confirmation()
		{
			var answer=confirm("Do you want to delete this product?");
			return answer;
		}
	</script>
</head>
<body>
<div class="main"><!--use this class to add calendar-->

	<div class="topbar">
			<div class="search">
				<label>
					<input type="date">
					<i class="fa fa-search" aria-hidden="true"></i>
				</label>
			</div>

	</div>
			<div class="calendar-main">
			<?php
					include 'Calendar-new1.php';
					
					$calendar = new Calendar();
					
					echo $calendar->show();
			?>
			</div>
	<div class="container_main">
		<div class="navigation">
			
			<ul> <!--buttons-->
				<li>
					<span class="title"><h2>Organiser Name</h2></span>
				</li>
				
				<li>
					<button id="modal-btn1" class="button" >Add Event</button>
					<div id="my-modal1" class="modal">
						<div class="modal-content">
									<div class="content">
										<div class="container">
											<span class="close">&times;</span>
											<div class="modal-title">Add Your Event</div>
											<form name="addnewevent" method="post" action="">
												<p>Event Code : <input type="text" name="frm_code" placeholder="clubCode_DD/MM(startDate)">
												<p>Event Date : <input type="date" name="frm_startdate"> to <input type="date" name="frm_enddate">
												<p>Event Name : <input type="text" name="frm_name">
												
												<p>Duration of Event : <input type="int" name="frm_days">
												<p>Choose colour :  <br><select name="frm_colour">
																	<option value="l_grey">light grey</option> 
																	<option value="l_pink">light pink</option>
																	<option value="l_green">light green</option>
																	<option value="l_blue">light blue</option>
																	<option value="l_yellow">light yellow</option>
																	<option value="l_orange">light orange</option>
																	</select>
												<p>Event Category : <br><select name="frm_category">
																	<option value="workshop">Workshop</option>
																	<option value="seminar">Seminar</option>
																	<option value="carnival">Carnival</option>
																	<option value="game_night">Game Night</option>
																	<option value="competition">Competition</option>
																	</select>
												<p>Organizer : <input type="text" name="frm_organizer"><!--KIV THIS PART-->
												<p>Event Description : <input type="text" name="frm_desc">
												<p>Link to register : <input type="text" name="frm_links">
											
												<p><input type="submit" name="savebtn" value="Launch Event">
								
											</form>
										</div>
									</div>
						</div>
					</div>
				</li>
				<li>
					<button id="modal-btn2" class="button">Update Event</button>
					<div id="my-modal2" class="modal">
						<div class="modal-content">
									<div class="content">
										<div class="container">
											<span class="close">&times;</span>
											<div class="modal-title">Update Your Event</div>
											<form name="addnewevent" method="post" action="">

												<p>Event Name : <input type="text" name="frm_name">
												<p>Event Date : <input type="date" name="frm_startdate"> to <input type="date" name="frm_enddate">
												<p>Duration of Event : <input type="int" name="frm_days">
												<p>Choose colour :  <br><select name="frm_colour">
																	<option value="l_grey">light grey</option> 
																	<option value="l_pink">light pink</option>
																	<option value="l_green">light green</option>
																	<option value="l_blue">light blue</option>
																	<option value="l_yellow">light yellow</option>
																	<option value="l_orange">light orange</option>
																	</select>
												<p>Event Category : <br><select name="frm_category">
																	<option value="workshop">Workshop</option>
																	<option value="seminar">Seminar</option>
																	<option value="carnival">Carnival</option>
																	<option value="game_night">Game Night</option>
																	<option value="competition">Competition</option>
																	</select>
												<p>Organizer : <input type="text" name="frm_organizer">
												<p>Event Description : <input type="text" name="frm_desc">
												<p>Links : <input type="text" name="frm_links">
											
												<p><input type="submit" id="updatebtn" value="Update Event">
								
											</form>
										</div>
									</div>
						</div>
					</div>
				</li>
				<li>
					<button id="modal-btn3" class="button">View Events</button>
					<div id="my-modal3" class="modal">
						<div class="modal-content">
									<div class="content">
										<div class="container">
											<span class="close">&times;</span>
											<div class="modal-title">List of Events</div>
											<table width="100%" cellspacing=0>
			<tr>
				<th>Event Name</th>							
				<th>Start Date</th>
				<th>End Date</th>
				<th>Days</th>
				<th>Organiser</th>
				<th>Category</th>
				<th colspan="2">Actions</th>
			</tr>
			
									<?php
									
									$result = mysqli_query($connect, "SELECT * from events where event_code=0");	//select attributes from 2 tables
									$count = mysqli_num_rows($result);
									
									if ($count < 1)
									{
									?>
										<tr>
											<td colspan="6">No Records Found</td>
										</tr>
									
									<?php
									}
									else
									{
										while($row = mysqli_fetch_assoc($result))
										{
										//	$pay = $row["purchase_product_price"] * $row["purchase_quantity"]; //calculate payment for each purchase
										?>		

										<tr>
											<td><?php echo $row["event_name"];?></td>							
											<td><?php echo $row["start_date"];?></td>
											<td><?php echo $row["end_date"];?></td>
											<td><?php echo $row["days"]?></td>
											<td><?php echo $row["organizer"];?></td>
											<td><?php echo $row["category"];?></td>
											<td><a href="">Edit</a></td>
											<td><a href="adminDashboard.php?pcode=<?php echo $row['event_code'];?>" onclick="return confirmation();">Delete</a></td>
											
										</tr>
										
										<?php
										
										}
									}
									
									?>

								</table>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>

		

	</div>

</div>
	<script type="text/javascript"></script>
	<script src="Admin_modal-btn1.js"></script>
	<script src="Admin_modal-btn2.js"></script>
	<script src="Admin_modal-btn3.js"></script>
</body>
</html>

<?php
if (isset($_POST['savebtn'])) 	
{
	//$new_name=$_POST['name_inHTMLform'];
    $pcode=$_POST['frm_code'];
    $pname=$_POST['frm_name'];
	$p_start_date=$_POST['frm_startdate'];
    $p_end_date=$_POST['frm_enddate'];
    $pdays=$_POST['frm_days'];
    $pcolour=$_POST['frm_colour'];
    $pcategory=$_POST['frm_category'];
    $porganizer=$_POST['frm_organizer'];
    $pdesc=$_POST['frm_desc'];
    $plinks=$_POST['frm_links'];

	$result=mysqli_query($connect, "SELECT * from events where event_code='$pcode'");
	$count=mysqli_num_rows($result);

	if ($count!=0)
	{
		?>
		<script>
			alert("The product code is already in use. Please change.");
		</script>
		<?php
	}
	else
	{
		//insert into database
		mysqli_query($connect, "INSERT into events (event_code, event_name, start_date, end_date, days, colour, category, organizer, description, links) VALUES ('$pcode', '$pname', '$p_start_date', '$p_end_date', '$pdays', '$pcolour', '$pcategory', '$porganizer', '$pdesc', '$plinks')");

		?>
		<script>
			alert("Event saved!");
		</script>
		<?php
	}
	
}
?>

<?php
//remove product from product list
if (isset($_GET['$pcode'])) 
{
	//update product table and set product_isDelete to 1
	mysqli_query($connect, "UPDATE events SET event_code=1");
	header("location:adminDashboard.php");
}

?>
