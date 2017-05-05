<?php

	session_start();

	require_once 'class.php';
	$session = new USER();



	if(!$session->is_loggedin())
	{
		$session->redirect('index.php');
	}