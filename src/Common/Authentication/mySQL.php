<?php
namespace Common\Authentication;
use PDO;
	class UserFromMySQL implements IAuthentication
	{
		
		private $db;
		protected $username;
	    protected $password;
	
	    public function __construct($posting)
	    {
	        $this->username = $posting->username;
	        $this->password = $posting->password;
	    }
		public function authenticate()
		{
		
		try
			{
				$this->db = new PDO('mysql:host=localhost;dbname=wsu4350;charset=utf8', 'root', '');
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
        $query = "select username, password from users";
        $results = $this->db->query($query);
        while($r = $results->fetch(PDO::FETCH_ASSOC))
        {
            if($r["username"]=== $this->username && $r["password"] === $this->password)
            {               
                return true;
            }
        }
        
        return false;
		}
	}