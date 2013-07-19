<?php
/**
 * model baseクラス
 * @author ysawano
 *
 */
class M_area_mapper extends Base_mapper
{
	private $_table = 'm_area';
	public function getTable() { return $this->_table; }
	function __construct()
	{
		parent::__construct($this->_table);
		parent::initMap();
	}
	
	/**
	 * @return M_area M_areaクラスを返却
	 */
	public function getMapper()
	{
		return parent::getMap();
	}
	
	public function findOne()
	{
		$this->db->where('area_id', 3);
		return parent::findOne();
	}
	public function findAll()
	{
		
	}
	public function findQuery()
	{
		$sql = 'select * from m_area';
		return parent::findQuery($sql);
	}
	
	public function ins($value)
	{
		$data = $this->getMapper();
		$data->setAreaName($value['area_name']);
		return parent::insert($data);
	}
}