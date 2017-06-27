<?PHP
$uname = "";
$pword = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	require 'config.php';

	$uname = $_POST['username'];
	$pword = $_POST['password'];


	$conn= new PDO("sqlsrv:Server=".db_host.";Database=".db_name, db_user, db_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

	if ($conn) {
		$sql = $conn->prepare("SELECT * FROM login WHERE L1 = :user");
		$sql->bindParam(":user", $uname);
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		$sql->execute();
		$rowCount = $sql->rowCount();
		$result = $sql->fetch();
		
		if (password_verify($pword, $result['L2'])) {
			session_start();
			$_SESSION['login'] = "1";
			$_SESSION['username'] = $uname;
			header ("Location: page1.php");
		}
		else {
			$errorMessage = "Login FAILED";
			session_start();
			$_SESSION['login'] = '';
		}
	}
}
?>


<html>
<head>
<title>Basic Login Script</title>
</head>
<body>

<FORM NAME ="form1" METHOD ="POST" ACTION ="login.php">

Username: <INPUT TYPE = 'TEXT' Name ='username'  value="<?PHP print $uname;?>" maxlength="20">
Password: <INPUT TYPE = 'TEXT' Name ='password'  value="<?PHP print $pword;?>" maxlength="16">

<P align = center>
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Login">
</P>

</FORM>

<P>
<?PHP print $errorMessage;?>




</body>
</html>