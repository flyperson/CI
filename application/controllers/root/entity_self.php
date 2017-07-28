<?php
 	defined('BASEPATH') OR exit('No direct script access allowed');
	class Entity_self extends CI_Controller{
		//实体质量自检
		public function index(){
			$entity_timestamp = $this->uri->segment(3);
			$this->load->model('root/entity_self_model','entity_self');
			$data['entity_data'] = $this->entity_self->self_inspection($entity_timestamp);
			$data['witness_data'] = $this->entity_self->witness($entity_timestamp);
			$data['result_data'] = $this->entity_self->result($entity_timestamp);
			$data['entity_timestamp'] = $entity_timestamp;
			$this->load->view('root/entity_self.html',$data);
		}
	}
?>