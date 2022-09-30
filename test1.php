<?php
if (isset($_GET["GetWikiData"])) {
$country = $_GET["GetWikiData"];
$url = 'https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&redirects=1&titles='.$country;
$data = file_get_contents($url);
$decode = json_decode($data,true);
$pages = array_values($decode["query"]["pages"])[0];


$string = strip_tags($pages["extract"]);
if (strlen($string) > 200) {

    // truncate string
    $stringCut = substr($string, 0, 200);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $string .= '... <a target="_blank" href="https://en.wikipedia.org/wiki/'.$country.'">Read More</a>';
}
echo json_encode($string);
}
?>  