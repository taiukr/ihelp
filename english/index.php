<?php

/*
 *english helper 
 * 1 add words
 * 2 list wordw 
 */

include('config.php');
include('functions.php');

$word = new Word();

if(isset($_POST['worden']) && isset($_POST['wordru']) 
    && strlen($_POST['wordru']) > 1
    && strlen($_POST['worden']))
{
    $word->add($_POST['worden'], $_POST['wordru']);
}

?>
<!DOCTYPE HTML >
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ihelp</title>
 </head>
 <body>
<div style="width: 800px; margin: 0 auto;" >
    <form method="POST" >
	<p>en:<input name="worden" type="text" ></p>
	<p>ru:<input name="wordru" type="text" ></p>
	<input type="submit">	
    </form>

<table border="1">

<?php 
    
  $arr =   $word->showAll(); 


    for($i = 0; $i<count($arr); $i++)
    {
	echo '<tr>';
	echo '<td>' . $arr[$i]['En'] . '</td>';
	echo '<td>' . $arr[$i]['Ru'] . '</td>';
	echo '</tr>';


    }
?>
</table>
<div>
</body>
</html> 

<?php

