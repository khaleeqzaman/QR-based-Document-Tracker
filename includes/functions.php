
<?php
// Fetching Last ID - For Refrence - PDO

$stmt = $db->prepare("SELECT id FROM outward ORDER BY id DESC");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
// $row['id'] ??= 'default value';
$lastid = $row['id']??= '0';
if(isset($lastid) && !empty($lastid)){
	$idhere= $lastid+1;
}
else {
	$idhere = 1;
}
?>