<?php

namespace controller;

class Controller
{

	public function index()
	{
		$title = 'CLEO X AZZH Fashion';

		return '
			<html>
			<head>
			</head>

			<body>
			Hello world! Welcome to ' + $title + '!
			</body>
			</html>
		';
	}
}
