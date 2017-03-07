<?php 
	/*
		Auto Marketing PHP
		Coded by João Artur (K3N1)
		www.github.com/JoaoArtur
		www.youtube.com/c/KeniGamer

		Greetz: Tibaah, Hayner, Mc Hackudão, N1ghtm4R3, Fuckzeraa, Xablazin, Smoke xxx, Felipe Trote, BeeCoding, Tuurky
	*/
		error_reporting(0);
		session_start();
		if (!isset($_SESSION['online'])) {
?>
<html>
<head>
	<title>Auto Marketing PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<center>
		<form method="post">
			<h1>Teste PhP</h1>
			<input type="text" placeholder="Username" name="user">
			<br />
			<input type="password" placeholder="Password" name="pass">
			<br />
			<input type="submit" value="Login">
			<?php
				if (isset($_POST['user']) and isset($_POST['pass'])) {
					$user = $_POST['user'];
					$pass = $_POST['pass'];
					if ($user == "admin" and $pass == "admin") {
						$_SESSION['user']=$user;
						$_SESSION['pass']=$pass;
						$_SESSION['online']=true;
						header("Location:./");
					}else{echo "<br>Incorrect username/password";}
				}
			?>
			
		</form>
	</center>
</body>
</html>
<?php
} else {
	if (!isset($_POST['started'])) {
?>
<html>
<head>
	<title>Auto Marketing PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<center>
		<form method="post">
			<h1>Auto Marketing PHP</h1>
			<input type="text" placeholder="Name" name="name">
			<br />
			<input type="text" placeholder="From" name="from">
			<br />
			<input type="text" placeholder="Subject" name="subject">
			<br />
			<textarea name="to" rows="4" placeholder="To"></textarea>
			<br />
			<textarea name="message" rows="4" placeholder="Message"></textarea>
			<br />
			<input type="hidden" name="started" value="started">
			<input type="submit" value="Send">
		</form>
</body>
</html>
<?php
} else {
	$name=$_POST['name'];
	$from=$_POST['from'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	$to=explode("\n",$_POST['to']);

	foreach($to as $person) {
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$headers .= 'From: '.$name.' <'.$from.'>' . "\r\n";
		$send=mail($person,$subject,$message,$headers);
		if ($send) {
			echo "[+] Email sent to <i>{$person}</i><br>";
		} else {
			echo "[-] Email can't be sent to <i>{$person}</i><br>";
		}
	}
}
}
?>