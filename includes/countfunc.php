<?php 
// Count Outward IDs
$stmt = $db->prepare("SELECT id FROM outward ORDER BY id DESC");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$outid = $row['id']??= '0';
if(isset($outid) && !empty($outid)){
    $outidhere= $outid;
}
else {
    $outidhere = 0;
}
// Count Inward IDs
$stmt = $db->prepare("SELECT id FROM inward ORDER BY id DESC");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$inwardid = $row['id']??= '0';
if(isset($inwardid) && !empty($inwardid)){
    $inwardidhere= $inwardid;
}
else {
    $inwardidhere = 0;
}
// Count Doc Categories
$stmt = $db->prepare("SELECT id FROM category ORDER BY id DESC");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$countcategory = $row['id']??= '0';
if(isset($countcategory) && !empty($countcategory)){
    $categoryhere= $countcategory;
}
else {
    $categoryhere = 0;
}
// Count Doc Reciever Staff 
$stmt = $db->prepare("SELECT id FROM staff ORDER BY id DESC");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$recstaff = $row['id']??= '0';
if(isset($recstaff) && !empty($recstaff)){
    $recstaffhere= $recstaff;
}
else {
    $recstaffhere = 0;
}
?>