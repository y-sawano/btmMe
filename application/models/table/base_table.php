<?php
/**
 * model baseクラス
 * @author ysawano
 *
 */
class Base_table extends CI_Model
{
	private $_cnt = 0;
	public function getCnt() { return $this->_cnt; }
	
	public function getObject()
	{
		$obj = Array();
		foreach ($this as $key => $value) {
			$obj[$key] = $value;
		}
		echo "hogehoge";
		echo '<pre>';
		echo var_dump($this);
		echo '</pre>';
		exit;
	}
}