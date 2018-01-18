<?php
if (isset($_GET["action"]) && isset($_GET["name"]))
{
	if ($_GET["action"] == "set")
		setcookie($_GET["name"], $_GET["value"], time() + (24 * (60 * 60)));
	else if ($_GET["action"] == "get")
	{
		if (isset($_COOKIE[$_GET["name"]]))
			echo $_COOKIE[$_GET["name"]]."\n";
	}
	else if ($_GET["action"] == "del")
		setcookie($_GET["name"], $_GET["value"], -1);
}
?>
