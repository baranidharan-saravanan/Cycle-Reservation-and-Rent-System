<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Check_Todays_Bills</title>
	<style type="text/css">
      .top_box{
      overflow: hidden;
      
      position: absolute;
      border: 2px solid #52525b;
      top :0;
      left: 0;
      margin: 0px;
      width: 100%;
      background-color: #71717a;
      height: 35px;
      float: left;
      
    }
    #nav{
      padding-left: 20px;
      text-decoration: none;
      color: white;
      padding-bottom: 20px;
    }
    #home_btn{
      position: fixed;
      right: 0;
      padding-top:8px ;
      padding-right: 5px;
      padding-bottom: 10px;
      color: whitesmoke;
    }
    ion-icon{
      font-size: 23px;
    }
    th,td{
    	text-align: center;
    }
    .center_box{
    	margin-top: 100px;
    	border-width: 1px;
    	box-shadow: 5px 0px 8px 3px;
    	margin-right: 400px;
    	margin-left: 400px;
    	border-radius: 10px;
    	background-color: whitesmoke;

    }
    h3{
    	padding-left: 10px;
    	padding-top: 10px;
    }
    button{
    	background-color: lightblue;
    	padding: 5px;
    	margin-bottom: 30px;
    }
    .detailsbtn {
		background-color: black;
		color: white;
		padding: 12px;
		font-size: 12px;
	}
	.details{
		position:fixed;
		display: block;
	}
	.detailslist-content {
		display: none;
		position: absolute;
		background-color: greenyellow;
		min-width: 120px;
		z-index: 1;
	}
	.detailslist-content a {
		color: darkblue;
		padding: 14px 18px;
		display: block;
	}
	.detailslist-content a:hover {background-color: lightcyan;}
	.details:hover .detailslist-content {display: block;}
	.details:hover .detailsbtn {background-color: blue;}
	.amtpay{
		width: 28%;
		padding-left: 30px;
	}
	#pay{
		position: relative;
		float: right;

	}
	body{
		background-image: url('invoice.jpg');
		height: 100%;
		width: 100%;
 		background-position: center;
  	background-repeat: no-repeat;
  	background-size: cover;
  	overflow: hidden;
	}
    </style>
</head>
<body>
	 <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <div class="top_box">
    <nav >
    
        <a href="Mainpage.html" id="home_btn"><ion-icon name="home" ></ion-icon></a>

    </nav>
  </div>
  		<div class="center_box">
		<h3 >Bills For today ,September 14</h3>
		<table align="center" cellpadding="5px" cellspacing="5px">
			
			
			<?php
		$server = "localhost";
		$username = "root";
		
		$conn = new mysqli($server,$username,'','iwp project');
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		$reg = $_SESSION['RegNo'];
		$query1 = "select * from cycle where RegNo='$reg'";
        $result1 = mysqli_query($conn, $query1);
		$tot = 0;
		$cnt =1;
		echo "<
			<tr>
				<th>S.No</th>
				<th>Cycle_id</th>
				<th>Run Time(mins)</th>
				<th>Cost(Rs)</th>
			</tr>
			";
		$cost=0;
		while($row = $result1->fetch_assoc()){
			$id = $row['ID'];
			$run = $row['MinsRun'];
			$cost = $run * 0.05;
			$tot += $cost;
			echo "
			<tr>
				<td>".$cnt."</td>
				<td>".$id."</td>
				<td>".$run."</td>
				<td>".$cost."</td>

				
			</tr>
			";
			$cnt++;
			
		}
		echo "
			<tr>
				<td></td>
				<td></td>
				<td><b>Total</b></td>
				<td>".$tot."</td>

				
			</tr>
			";
		
		
		
		
		?>

			
		</table>
		<br>
		<br>
		<div class="amtpay">Total Amount to be Paid : <p id="pay">150</p> </div>
		<br>
		<br>
		<center><a href="#"><button>Pay Now</button></a></center>
		
	</div>
	<?php
		echo "
		<script>
		document.getElementById('pay').innerHTML= '$tot';
		</script>
		";
	?>
</body>
</html>