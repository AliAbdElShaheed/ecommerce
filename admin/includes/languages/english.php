<?php
	/*
	$language = array(

		'Ali' => 'Zero'  

	);

	echo $language['Ali'];
	*/


	function language ( $phrase ) {

		static $language = array(

			//'MESSAGE' => 'Welcome' ,
			//'ADMIN' => 'Administrator' 

			// navbar

			'Homa Admin'		=> 'Home',
			'Categories'		=> 'Categories',
			'Items'				=> 'Items',
			'Members'			=> 'Members',
			'Comments'			=> 'Comments',
			'Statistices'		=> 'Statistices',
			'Logs'				=> 'Logs'


		);

		return $language[$phrase];
	}

