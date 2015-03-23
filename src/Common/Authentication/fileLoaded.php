<?php
echo __FILE__.PHP_EOL;
	class FileLoaded implements IAuthentcation
	{
		protected $username;
	    protected $password;
	    public function __construct($posting)
	    {
	        $this->username = $posting->username;
	        $this->password = $posting->password;
	    }
		
		// send the info from txt so it can be put into an array
		private function checkForFile($retreiveFile)
		{
				//return it as string
			 $theFile = file_get_contents($retreiveFile); 
             $returnArr = explode(",",$theFile);
			 return $returnArr;
		}
		public function authenticate()
		{
			// set our text file to the variable 
			$retreiveFile='authFile.txt';
			//retrieve the info from txt and then stuff it into our array
			$FileLoadArr=$this->checkFileVerification($retreiveFile);
			$getusername = $FileLoadArr[0] ;//load array
			$getpassword = $FileLoadArr[1];
			if($this->username === $getusername and $this->password === $getpassword)
			{
				return TRUE;
			}
			return FALSE;
		}		
	}