<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_undangan extends CI_Model 
{
	function addMempelai($data){

		$result = $this->db->insert('undangan',$data);
		return $result;
	}

	function addAcara($data){
		$result = $this->db->update('undangan', $data);
		return $result;
	}

	function addAyat($data){
		$result = $this->db->update('undangan', $data);
		return $result;
	}

}

?>