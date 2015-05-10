<?php
require "connect.php";
require "todo.class.php";

// Select all the todos, ordered by position:
$query = mysql_query("SELECT * FROM `bf_todo` ORDER BY `position` ASC");

$todos = array();

// Filling the $todos array with new ToDo objects:

while ($row = mysql_fetch_assoc($query)) {
	$todos[] = new ToDo($row);
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>index</title>
		<meta name="description" content="">
		<meta name="author" content="vod">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">

		<!-- Including the jQuery UI Human Theme -->
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/themes/humanity/jquery-ui.css" type="text/css" media="all" />

		<!-- Our own stylesheet -->
		<link rel="stylesheet" type="text/css" href="styles.css" />

	</head>

	<body>

		<h1>TODO-List BFSAT</h1>

		<div id="main">

			<ul class="todoList">

				<?php

				foreach ($todos as $item) {
					echo $item;

				}
				
				?>
				
			</ul>

			<a id="addButton" class="green-button" href="#">Add a ToDo</a>

		</div>

		<!-- This div is used as the base for the confirmation jQuery UI POPUP. Hidden by CSS. -->
		<div id="dialog-confirm" title="Delete TODO Item?">
			Are you sure you want to delete this TODO item?
		</div>

		<p class="note">
			The todos are flushed every hour. You can add only one in 5 seconds.
		</p>

		<!-- Including our scripts -->

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		<script type="text/javascript" src="./script.js"></script>

	</body>
</html>
