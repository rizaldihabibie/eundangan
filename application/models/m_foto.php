<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_foto extends CI_Model 
{

	function addFoto($data){
		$jml = count($data);
		$result = false;

		for($i=0;$i<$jml; $i++){

			if($this->db->insert('album_foto', $data[$i])){
				$result = true;
			}else{
				$result = false;
				break;
			}
		}
		
		return $result;
	}

	function getFoto($idUser){
		$this->db->where('id_user', $idUser);
		$this->db->get('album_foto')->result();
		return $this->db->get('album_foto')->result();
	}

}

?>