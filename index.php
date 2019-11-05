<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Domain</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" placeholder="URL" required name="url">
        <input type="text" placeholder="Domain" required name="domain">
        <button type="submit" name="submit">Process</button>
    </form>
</body>
</html>

<?php
if(isset($_POST["submit"])){
    $url  = $_POST["url"];
    $domain = $_POST["domain"];
    $final = "";

    if (strpos($url, 'http://') !== false) {
        $url = str_replace("http://","",$url);
    }
    if (strpos($url, 'https://') !== false) {
        $url = str_replace("https://","",$url);
    }
    $result = explode("/", $url);
    $result[0] = $domain;
    
    for ($i=0; $i < count($result); $i++) { 
        $final = $final.$result[$i].'/';
    }

    echo $final;
}