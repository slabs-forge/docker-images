<html>
<head>
<style type="text/css">
#grad {
  background-image: linear-gradient(-90deg, #05160b , #0a3519);
}

table { 
  border: 2px solid #41e27a;
  border-radius: 13px; 
  border-spacing: 0;
  width: 70%;
  margin-left: 15%;
  margin-right: 15%;
  margin-top: 20px;
  margin-bottom: 20px;
}

tr,td {
  padding: 10px;
}

td:nth-child(1) {
	color: #0fc5fc;
}

td:nth-child(n+2) {
	color: #ff60f4;
}

</style>
</head>
<body id="grad">
<?php
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (!function_exists('getallheaders')) {
    function getallheaders() {
    $headers = [];
    foreach ($_SERVER as $name => $value) {
        if (substr($name, 0, 5) == 'HTTP_') {
            $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
        }
    }
    return $headers;
    }
}

?>
<table>
<colgroup>
  <col class="c1"/>
  <col class="c2"/>
</colgroup>
<tbody>
<tr>
<td>Link:</td>
<td><?=$actual_link?></td>
</tr>
</tbody>
</table>

<table>
<colgroup>
  <col class="c1"/>
  <col class="c2"/>
</colgroup>
<tbody>
<?php
foreach(getallheaders() as $name => $value) {
	$name = htmlspecialchars($name);
	$value = htmlspecialchars($value);
	echo "<tr>";
	echo "<td>$name</td>";
	echo "<td>$value</td>";
	echo "</tr>";
}
?>
</tbody>
</table>



</body>
<html>
