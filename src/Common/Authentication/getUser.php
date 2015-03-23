<?php
	interface autherizeUser
	{	
			// i used interface because interface is essentially what a class can do.
		 	// and this interface just gets the users username and password
			public function getUsername();		
			public function getPassword();
	}