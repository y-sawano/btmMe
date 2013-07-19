<?php
/**
 * model baseクラス
 * @author ysawano
 *
 */
class Base_mapper extends CI_Model
{
	private $_map;
	private $_limit=10;
	private $_offset=1;
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * tableクラスインスタンス生成
	 * 数レコード生成したいときはこちらを明示的に呼び、getMapを呼ぶ
	 */
	public function initMap()
	{
		$name = $this->getTable();
		$this->load->model('table/' . $name);
		$class = ucfirst($name);
		$this->$name = new $class();
	}
			
	/**
	 * tableクラス取得
	 * なければインスタンスを生成
	 */
	public function getMap()
	{
		$name = $this->getTable();
		if (is_null($this->$name)) {
			$this->initMap();
		}
		return $this->$name;
	}
		
	/**
	 * m_xxテーブルクラスにマッピングしてオブジェクト返却
	 * @param Array $value
	 * @return mixed $rtn
	 */
	private function orm_one($value)
	{
		$rtn = $this->getMap();
		if (!is_null($value)) {
			$rtn->_cnt = 1;
			foreach ($value as $key => $res) {
				$rtn->$key = $res;
			}
		}
 		return $rtn;
	}
	
	/**
	 * m_xxテーブルクラスにマッピングしてオブジェクト配列返却
	 * @param CI_DB_mysql_result $value
	 * @return multitype:array $rtn
	 */
	private function orm_all(CI_DB_mysql_result $value)
	{
		$rtn = array();
		if ($value->num_rows() > 0) {
			foreach ($value->result() as $row) {
				$map = $this->getMap();
				$map->_cnt = $value->num_rows();
				foreach ($row as $key => $res) {
					$map->$key = $res;
				}
				$rtn[] = $map;
				$this->initMap();
			}
		}
		return $rtn;		
	}
	
	/**
	 * 一件取得
	 * @return mixed Object
	 */
	protected function findOne()
	{
		$query = $this->db->get($this->getTable());
		return $this->orm_one($query->row());
	}
	
	/**
	 * リスト返却、デフォルトlimit10件
	 * @param int $limit
	 * @param int $offset
	 */
	protected function findList($limit=null, $offset=null)
	{
		$lmt = (is_null($limit)) ? $this->_limit : $limit;
		$ost = (is_null($offset)) ? $this->_offset : $offset;
		$query = $this->db->get($this->getTable(), $lmt, $ost);
	}
	
	/**
	 * 全件取得
	 * @return multitype:Object
	 */
	protected function findAll()
	{
		return $this->orm_all($this->db->get($this->getTable())->result());
	}
	
	/**
	 * sqlクエリを実行し、全件取得
	 * @param String $sql
	 * @return multitype:Object
	 */
	protected function findQuery($sql)
	{
		return $this->orm_all($this->db->query($sql));
	}
	
	/**
	 * Insert
	 * @return int 0:false 0以上:insertしたレコードID
	 */
	protected function insert($value)
	{
		$now = $this->getSystemDate();
		$value->setCreateDate($now);
		$value->setUpdateDate($now);
		$value->getObject();
		//ここでstdClassに変換しないとだめ
// 		$data = $this->orm_one($value);
		$ret = $this->db->insert($this->getTable(), $data);
		if ($ret === false) {
			return 0;
		}
		return $this->db->insert_id();
	}
	
	/**
	 * システム日付
	 * @return string
	 */
	protected function getSystemDate() {
		return date('Y-m-d H:i:s');
	}
}