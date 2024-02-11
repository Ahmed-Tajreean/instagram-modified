<style>
  #header {
    width: 100%;
    height: 160px;
    background: radial-gradient(#2980B9 ,#ABEBC6);
    text-align: center;
    font-family: 'Lato',Arial;
    color: white;
    padding-top: 20px;
}
a {
    color: #E31337;
    text-decoration: none;
    text-decoration-line: none;
    text-decoration-thickness: initial;
    text-decoration-style: initial;
    text-decoration-color: initial;
}
h1 a {
    color: white;
}
input, textarea {
    background: #480a15;
    opacity: 0.5;
    border: 1px solid #777;
    border-radius: 6px;
    outline: none;
    font-size: 14px;
    padding: 8px;
    font-style: italic;
    color: #eee;
}
input[type=submit], input[type=button] {
    border-radius: 3px;
    background: #480a15;
    border: 1px solid #777;
    padding: 7px 25px 7px 25px;
    color: #fff;
    box-shadow: inset -1px -1px 4px #5a1b26;
    font-weight: bold;
    font-style: normal;
}
section {
    display: block;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<section id="header">
<div id="divautoupdate" style="display: block;"></div>
<h1><a href="index.php" class="keychainify-checked">HIVE INSTRAGRAM</a></h1><br><br>
<form id="form_search" method="post"><input type="text" name="userName" style="width:40%" > <input type="submit" name="submit" value="Search"></form></section>
  <!-- <form action=" " method="POST">
  <input type="text" name="userName" /><br />
  <input type="submit" name="submit" value="submit"/>
  </form> -->
</body>
</html>
<?php
/* Load Composer for autoload libs */
require __DIR__ . '/vendor/autoload.php';

/* Declase use statement to add Hive Condenser lib */
use Hive\PhpLib\Hive\Condenser as HiveCondenser;

/* Create config array and fill with settings */
$config = [
    "debug" => false,
    "disableSsl" => false,
    "heNode" => "api.hive-engine.com/rpc",
    "hiveNode" =>"anyx.io",
];

/* Instantiate Hive Condenser object */
$hiveApi = new HiveCondenser($config);
if(isset($_POST['submit'])){

$tag =  $_POST['userName'];
$limit = 10;

$result = $hiveApi->getDiscussionsByBlog($tag, $limit);

for ($x = 0; $x <= 10; $x++) {
    if($x!=7 && $x!=1)
    {
        print_r($result[$x]);
        echo('br');
    }
 }
}
?>