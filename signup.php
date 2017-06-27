<?PHP
$uname = "";
$pword = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require 'config.php';

	$uname = $_POST['username'];
	$pword = $_POST['password'];

	$db_found = new PDO("sqlsrv:Server=".db_host.";Database=".db_name, db_user, db_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

	if ($db_found) {		
		$sql = $db_found->prepare("SELECT * FROM login WHERE L1 = :uname");
		$sql->bindParam(":uname", $uname);
		$sql->execute();
		$rowCount = $sql->rowCount();
		$result = $sql->fetch();

		if ($rowCount > 0) {
			$errorMessage = "Username already taken";
		}
		else {
			$phash = password_hash($pword, PASSWORD_DEFAULT);
			$sql = $db_found->prepare("INSERT INTO login (L1, L2) VALUES (:uname, :phash)");
			$sql->bindParam(":uname", $uname);
			$sql->bindParam(":phash", $phash);
			$sql->execute();

			header ("Location: login.php");
		}
	}
	else {
		$errorMessage = "Database Not Found";
	}
}
?>

	<html>
	<head>
	<title>Basic Signup Script</title>


	</head>
	<body>


<FORM NAME ="form1" METHOD ="POST" ACTION ="signup.php">

Username: <INPUT TYPE = 'TEXT' Name ='username'  value="<?PHP print $uname;?>" >
Password: <INPUT TYPE = 'TEXT' Name ='password'  value="<?PHP print $pword;?>" >

<P>
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Register">


</FORM>
<P>

<?PHP print $errorMessage;?>

	</body>
	</html>
