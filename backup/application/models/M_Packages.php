<?php 
class M_Packages extends MY_Model
{

	protected $_table_name = 'packages';
	protected $_primary_key = 'id';
	function __construct()
	{
		parent::__construct();
	}

	public function get_all() {
		return $this->db->get($this->_table_name)->result();
	}
	public function get_by_id($id) {
		$this->db->where('id', $id);
		return $this->db->get($this->_table_name)->row();
	}
	public function search($keyword) {
		$this->db->like('name', $keyword);
		$this->db->or_like('details', $keyword);
     	$query = $this->db->get($this->_table_name);
     	$this->db->order_by('id', 'desc');
     	return $query->result();
	}

}

?>