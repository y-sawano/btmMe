<?php
/**
 * m_areaクラス
 * @author ysawano
 *
 */
class M_area extends Base_table
{
	function __construct() {
		error_log('hoge', 3, '/tmp/log.log');
	}
	private $_area_id;
	private $_area_name;
	private $_create_date;
	private $_update_date;
	//自身を配列で返却
	public function getObjToAry() {

	}
	
	//setter
	public function setAreaId($value) { $this->_area_id = $value; }
	public function setAreaName($value) { $this->_area_name = $value; }
	public function setCreateDate($value) { $this->_create_date = $value; }
	public function setUpdateDate($value) { $this->_update_date = $value; }
	
	//getter
	public function getAreaId() { return (int) $this->_area_id; }
	public function getAreaName() { return (string) $this->_area_name; }
	public function getCreateDate() { return (string) $this->_create_date; }
	public function getUpdateDate() { return (string) $this->_update_date; }
}