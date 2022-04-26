<?php
$dsn = 'mysql:host=localhost;dbname=login-portal';
$db = new PDO($dsn, 'root', '');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<form>
	<select class="form-control form-control-user">
                            <option selected disabled>-- SELECT Category --</option>
                        <?php
                        $stat = $db->prepare("SELECT * FROM inward");
                    	$stat->execute();
                    	while ($row = $stat->fetch()) {
                             echo '<option value="'.$row['id'].'">'.$row['diaryno'].'</option>';
                          	}
                        ?>
                        </select>
</form>


</body>
</html>