<?php

if(isset($_POST['confirmed']) && isset($_POST['id']))
{
	$con=mysqli_connect ("localhost", 'root', '','demo');

	if (!$con) {
	    die('Not connected : ' . mysqli_connect_error());
	}

	$id = mysqli_real_escape_string($con, $_POST['id']);
	$confirmed = mysqli_real_escape_string($con, $_POST['confirmed']);

	// update location with confirm if admin confirm.
	$query = "update locations set location_status = $confirmed WHERE id = $id ";
	$query1 = "delete locations set location_status = $confirmed WHERE id = $id ";

	$result = mysqli_query($con,$query);

	$result2 = mysqli_query($con,$query1);

	if ($result) {
	    echo 'Location added.';
	    return;
	}
	if ($result1) {
	    echo 'Location deleted.';
	    return;
	}

	echo 'Can\'t add location';
}
else
{
	echo 'Please enter required fields';
}
