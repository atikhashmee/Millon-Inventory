                                   
                                   <?php 




/**
* 
*/
class Connection extends PDO
{
	public static $instance=null;
	public function __construct()
	{
		 parent::__construct("mysql:host=localhost;dbname=mys", "root", "");
		
	}
	public static function getInstance()
	{
		try {

			if (!self::$instance) {
				self::$instance  = new Connection();
	self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    }

		} catch (PDOException $e ) {
			echo $sql . "<br>" . $e->getMessage();
		}

		
		return self::$instance;
	}
}





?>
                                   
                                   
                                   
                                   
                                   