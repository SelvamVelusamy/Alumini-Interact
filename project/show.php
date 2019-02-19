<?php
$name=$_REQUEST['varname'];
$connection=mysqli_connect('localhost','1377010','8144993311Aa','1377010');
$query="select * from sevents where name='$name'";
$records=mysqli_query($connection,$query);
$count=mysqli_num_rows($records);?>
<!DOCTYPE html>
<html>
<head>
	<title>Event Page</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<center>
	<?php
	if($count>0) {
   	echo '<form  method="post">
		<h1>Event Page</h1>
<table width="700" border="1" cellpadding="1" cellspacing="1">
<tr>
	<th>
		Name
	</th>
	<th>
		Contact
	</th>
	<th>
		Time Slot
	</th>
	<th>
		Date
	</th>
	<th>
		Result
	</th>
	<th>
		Ok
	</th>
</tr>';
		$id = 0;
		while ($emp=mysqli_fetch_assoc($records)){
			echo "<tr align='center' id='$id'>";
			echo "<td>".$emp['name']."</td>";
			echo "<td>".$emp['contact']."</td>";
			echo "<td>".$emp['time']."</td>";
			echo "<td>".$emp['date']."</td>";
			echo "<td>".$emp['status']."</td>";
			echo "<td><button id='$id'  onclick='deleteRow(this.id)'>OK</button></td>";
			echo "</tr>";
			$id++;
		}
	   echo '</table>
	   </form>';}
	   else echo '<h3>No any Events</h3>';
	   echo '<br><a href="'.$name.'.html">Back</a></center>';
	?>	
<Script>
	function deleteRow(id){
		var Row = document.getElementById(id);
		var Cells = Row.getElementsByTagName("td");
		var name = Cells[0].innerText;
		var time = Cells[2].innerText;
		var aluministatus=status;
		$.ajax({
                    type: "POST",
                    url: 'delete1.php',
                    data:{ stuname : name,
					       time:time},
                    success: function(data)
                    {
                    },
					error: function(err){
						alert(err);
					}
                });
	}

	
</Script>
</body>
</html>