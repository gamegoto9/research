<?php

class Research_model extends CI_Model
{

	// protected $tablename = 'research';
	protected $tablename = 'research';

	public function __construct()
	{
		parent::__construct();
	}


	function getMainMenu(){
		$sql = 'select * from mainmenu order by mMenuId asc';
		$result = $this->db->query($sql)->result_array();
		
			return $result;
		
	}

	function getSubMenu(){
		$sql = 'select * from submenu order by sMenuId asc';
		$result = $this->db->query($sql)->result_array();
		
			return $result;
	
	}
        
        
	
}