<?php
class Mysql{
	private $db_host; //数据库主机
    private $db_user; //数据库用户名
    private $db_pwd; //数据库用户名密码
    private $db_database; //数据库名
    private $coding; //数据库编码，GBK,UTF8,gb2312
	private $conn; //数据库连接标识;
	private $result; //执行query命令的结果资源标识
	
	/*构造函数*/
	public function __construct()
	{
		$this->db_host = "localhost";
        $this->db_user = "root";
        $this->db_pwd = "root";
        $this->db_database = "test";
		$this->coding="UTF8";
        $this->connect();
	}
	
	/*数据库连接*/
    public function connect() {
        
        $this->conn = mysqli_connect($this->db_host, $this->db_user, $this->db_pwd,$this->db_database);
        mysqli_query($this->conn,"SET NAMES $this->coding");
    }
	
	/*数据库执行语句，可执行查询添加修改删除等任何sql语句*/
    public function query($sql) {
 
        $this->result = mysqli_query($this->conn,$sql);
        return $this->result;
    }
	//得到查询数据 用法 while() $row[0] 
	public function get_row()
	{
		return mysqli_fetch_row($this->result);
	}
	
	public function get_array()
	{
		return mysqli_fetch_array($this->result);
	}
	
	//等到查询数据 用法 while() $row->name
	public function get_object()
	{
		return mysqli_fetch_object($this->result);
	}
	//得到查询之后行的数目
	public function get_count()
	{
		return mysqli_num_rows($this->result);
	}
	
	    //释放结果集
    public function free() {
        @ mysqli_free_result($this->result);
    }
	
	//析构函数，自动关闭数据库,垃圾回收机制
   public function __destruct() {
        if (!empty ($this->result)) {
            $this->free();
        }
        mysqli_close($this->conn);
    }
}