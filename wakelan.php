<!--
WakeOnLAN by Scott Rainville
This web page allows a user to remotely power on PCs on their network.
I do not recommend making this page internet accessible, for security reasons.
-->

<?php
#Enter the desired password for the page. You can remove the password entirely by changing the code below.
$pw = "password";
?>

<hmtl>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<title>WakeOnLan Page</title>
	</head>
	<body>
		<div id=top>
			<h4 class="topwords" id="title">WakeOnLAN</h4>
			<p class="topwords">By Scott Rainville (youtube.com/user/someone7089)</p>
		</div>
		<div id="main">
			<form action="" method="post">
				<p>Select Computer:</p>
				<select name="dropdown">
					<!--
						Enter MAC addresses and PC descriptions here. Format:
						<option value="MACADDRESSHERE">DESCRIPTIONHERE</option>

						MAC addresses need to be with colons, not dashes!
					-->
					<option value="">[none]</option>
					<option value="BC:5F:F4:3B:3E:9A">Scott's PC</option>
				</select>
				<p>Password:</p><input type="password" name="password"> <!--This is the password entry box-->
				<input type="submit" value="Submit"> <!--submit button-->
			</form>
		
			<?php
				#desired MAC and password are sent to the server via HTTP POST
				$mac = $_POST["dropdown"];
				$password = $_POST["password"];

				#if the password is correct...
				if ($password == $pw)
				{	
					#if the mac variable exists, send the packet
					if ($mac)
					{
						echo "<font color='green'>Sent Magic Packet to: $mac</font>";
						exec("wakeonlan $mac");
					}
				}
				elseif ($password) {echo '<font color="red">Incorrect Password.</font>';}
			?>
			
		</div>
	</body>
</hmtl>

