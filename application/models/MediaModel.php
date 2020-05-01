<?php

class MediaModel extends MY_Model {

    public $_table = 'media';

    public function getImages(){

		$this->db->select("$this->_table.*");
		$result = $this->db->get();


		return $result;

	}
}
