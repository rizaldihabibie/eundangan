<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_undangan extends CI_Model 
{
	function addMempelai($data){

		$result = $this->db->insert('undangan',$data);
		return $result;
	}

}

?>