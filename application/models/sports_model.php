<?php

class Sports_model extends CI_Model
{

	protected $tablename = 'sport_2015';

	public function __construct()
	{
		parent::__construct();
	}

	public function AddUser($name=null, $lname=null)
	{
		if (is_null($name) || is_null($lname))
		{
			return false;
		}

		$data = array('stdTitle'=>$name, 
                              'stdName'=>$lname,
                                'sportId' =>'S02');
		$insert_id = $this->db->insert('player_sport_2015', $data);
//		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function ListAll()
	{
                
		$sports = $this->db->get($this->tablename)->result();	
		return $sports;
	}
        
        public function ListPlay($id)
	{
                
		$player = $this->db->get_where('player_sport_2015',array('sportId'=>$id))->result();	
		return $player;
	}
        
        
	
}