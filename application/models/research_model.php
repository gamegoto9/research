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
		$sql = "select sMenuId,sMenuName,mMenuName,submenu.mMenuId 
		from submenu,mainmenu 
		where submenu.mMenuId = mainmenu.mMenuId 
		order by sMenuId asc";

		$result = $this->db->query($sql)->result_array();
		
			return $result;
	
	}

	function getMajor(){
		$sql = 'select * from major order by mMajorId asc';
		$result = $this->db->query($sql)->result_array();
		
			return $result;
		
	}

	function getSubject(){
		$sql = "select mSubjectId,mSubjectName,mMajorName,subject.mMajorId 
		from subject,major 
		where subject.mMajorId = major.mMajorId 
		order by mSubjectId asc";

		$result = $this->db->query($sql)->result_array();
		
			return $result;
	
	}
        
        
	
}