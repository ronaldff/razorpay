<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payment_model extends CI_Model {
	
	public function fetchCustometdata($id)
	{
		$this->db->where('c_id', $id);
    $result = $this->db->get('customer')->row_array();
    return $result;
	}

	public function payment_transaction($id)
	{
		$this->db->where('id', $id);
    $result = $this->db->get('payment_transaction')->row_array();
    return $result;
	}

	public function getallordersbycustomerid($id)
	{
		$this->db->select("c.c_name,c.c_email,p.*",false);            
		$this->db->from("payment_transaction as p");
		$this->db->join('customer as c', 'c.c_id = p.user_id', 'both');
		$this->db->where('p.user_id', $id);
		$this->db->order_by('p.id', 'desc');

		$query = $this->db->get();
		$data = $query->result_array(); 
		return $data;
	}
}
