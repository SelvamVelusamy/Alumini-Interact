<?php
$connection=mysqli_connect('localhost','1377010','8144993311Aa','1377010');
$query="select * from events";
$records=mysqli_query($connection,$query);
$count = mysqli_num_rows($records);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Alumini Page</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<form  method="post">
	<center>
		<h1>Welcome Alumini</h1>

		<?php
		if($count >0) {
			echo ' <table width="700" border="1" cellpadding="1" cellspacing="1">
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
		Reaction
	</th>
</tr>';
		
		$id = 0;
		$status1="accept";
		$status2="reject";
		while ($emp=mysqli_fetch_assoc($records)){
			echo "<tr align='center' id='$id'>";
			echo "<td>".$emp['name']."</td>";
			echo "<td>".$emp['contact']."</td>";
			echo "<td>".$emp['time']."</td>";
			echo "<td>".$emp['date']."</td>";
			echo "<td><button id='$id'  value='$status1' onclick='deleteRow(this.id,this.value)'>Accept</button>&nbsp;&nbsp;&nbsp;<button id='$id' value='$status2' onclick='deleteRow(this.id,this.value)'>Reject</button></td>";
			echo "</tr>";
			$id++;
		}
	 echo "</table>";}
	 else echo "<h3>No Any Request</h3>";
	?>	
</center>
</form>
<Script>
	function deleteRow(id,status){
		var Row = document.getElementById(id);
		var Cells = Row.getElementsByTagName("td");
		var name = Cells[0].innerText;
		var time = Cells[2].innerText;
		var studentstatus=status;
		$.ajax({
                    type: "POST",
                    url: 'delete.php',
                    data:{ stuname : name,
					       time:time,
						   status:studentstatus},
                    success: function(data)
                    {
                    },
					error: function(err){
						alert(err);
					}
                });
				//console.log(aluministatus);
	}

	
</Script>
<center><br><br><a href="index.html" >Logout</a></center>
</body>
</html>