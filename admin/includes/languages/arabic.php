<?php

	function lang ( $phrase ) {

		static $lang = array(

			'MESSAGE' => 'Welcome in Arabic' ,

			'ADMIN' => 'Arabic Administrator' 


		);

		return $lang[$phrase];
	}

