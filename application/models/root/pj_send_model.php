<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pj_send_model extends CI_Model{
	/**
	 * 送检记录
	 * @return [type] [description]
	 */
	public function check($pj_timestamp){
		$sql = "select * from 材料送检 where 工程时间戳=? and (工程单状态=? or 工程单状态=? or 工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($pj_timestamp,'新增','新增复检','取样','取样复检'))->result_array();
		return $data;
	}

	public function witness($pj_timestamp){
		$sql = "select * from 材料送检 where 工程时间戳=? and (工程单状态=? or 工程单状态=? or 工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($pj_timestamp,'未见证','未见证复检','已见证','已见证复检'))->result_array();
		return $data;
	}
	public function samp($pj_timestamp){
		$sql = "select * from 材料送检 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($pj_timestamp,'收样','收样复检'))->result_array();
		return $data;
	}
	public function result($pj_timestamp){
		$sql = "select * from 材料送检 where 工程时间戳=? and (工程单状态=? or 工程单状态=? or 工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($pj_timestamp,'合格','不合格','已处理','复检不合格'))->result_array();
		return $data;
	}
	


	/**
	 * 送检添加
	 */
	public function add($data){
		$this->db->insert('材料送检',$data);
	}

	/**
	 * 送检详情
	 */
//	初检
	public function detail_st($send_id){
		$data = $this->db->get_where('材料送检初检表',array('id'=>$send_id))->result_array();
		return $data;
	}
//	复检
	public function detail_nd($send_id){
		$data = $this->db->get_where('材料送检',array('id'=>$send_id))->result_array();
		return $data;
	}


}
?>