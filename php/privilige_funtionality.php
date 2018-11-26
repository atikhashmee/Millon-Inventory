

	

		<?php 


           require_once("dboperation.php");

           
           class RBAS extends Db
           {
           	  private $userid;
           	  private $pagename;

           	  private $create = false;
           	  private $view   = false;
           	  private $update = false;
           	  private $delete = false;
           	  private $print =  false;

           	 
           	
           	       function __construct(){
				    	parent::__construct();
				    }

				 public function setUserid($id)
				 {
				 	$this->userid = $id;
				 	
				 	/*echo "<pre>";
				 	 print_r($GLOBALS['ss']);
				 	echo "</pre>";*/
				 }

				 public function setPageName($pagename)
				 {
				 	$this->pagename = $pagename;

				 	return $this;
				 }


				 public function fetchRole()
				 {
				 	$sql = "SELECT * FROM `role_base_access_system` WHERE `pagename`='{$this->pagename}' AND `user_id`='{$this->userid}'";
				 	$qrry  = $this->joinQuery($sql)->fetchAll();
				 	/*echo "<pre>";
				 	print_r($qrry);
				 	echo "</pre>";*/
				 	
				 	if (count($qrry) != 0) {
				 		$rolesdata =  $this->getPageProperty();
				 		
				 		foreach ($qrry as $qval) {
				 		   if ($rolesdata[$qval['roles']] == "create") {
				 		   	   $this->create = true;
				 		   } 
				 		   if ($rolesdata[$qval['roles']] == "view") {
				 		   	
				 		   	   $this->view = true;
				 		   }
				 		   if ($rolesdata[$qval['roles']] == "update") {
				 		   	   $this->update = true;
				 		   }
				 		   if ($rolesdata[$qval['roles']] == "delete") {
				 		   	   $this->delete = true;
				 		   }
				 		   if ($rolesdata[$qval['roles']] == "print") {
				 		   	   $this->print = true;
				 		   }


				 	   }
				 	}
				 	else {  //if there is no rules then he will have the access of everything 
						  $this->create = true;
			           	  $this->view   = true;
			           	  $this->update = true;
			           	  $this->delete = true;
			           	  $this->print =  true;
				 	}
				 	
				 }
				 public function run()
				 {
				     $this->fetchRole();
				 }

				 public function getPageProperty()
				 {
				 	for ($i=0; $i <count($GLOBALS['ss']['priviliges']) ; $i++) { 
				 		if ($this->pagename == $GLOBALS['ss']['priviliges'][$i]['priv_id']) {
				 			  return $GLOBALS['ss']['priviliges'][$i]['subdata'];
				 		    }
				 	}
				 	return -1;
				 }

				

				

								   

								   
				       
				    

				    /**
				     * @return mixed
				     */
				    public function getCreate()
				    {
				        return $this->create;
				    }

				    /**
				     * @return mixed
				     */
				    public function getView()
				    {
				        return $this->view;
				    }

				    /**
				     * @return mixed
				     */
				    public function getUpdate()
				    {
				        return $this->update;
				    }

				    /**
				     * @return mixed
				     */
				    public function getDelete()
				    {
				        return $this->delete;
				    }

				    /**
				     * @return mixed
				     */
				    public function getPrint()
				    {
				        return $this->print;
				    }

				    
}

		?>