<?php
$json = file_get_contents('country.json');
$dec = json_decode($json,true);

$i=1;
foreach($dec["country"] AS $key => $value):

    $res[$i]["id"] = $i;
    $res[$i]["name"] = $value["name"];
    $res[$i]["flag"] = $value["flag"];
$i++;
endforeach;

echo "<pre>";
print_R($res);
echo "</pre>";


echo json_encode($res,true);    
?>  