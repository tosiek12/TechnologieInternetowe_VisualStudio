<?php
abstract class Model { 
  /* ms sql connection */
  protected $conn;
	/* Set connection to db */
	public function  __construct() {
        try {
            require 'config/sql.php';
            
            $this->conn=new mysqli($host, $user, $pass, $dbase);
            // Check connection
		        if ($conn->connect_error) {
              throw new Exception('Connection failed: '.$conn->connect_error);
		        }
        }
        catch(DBException $e) {
            echo 'The connect can not create: ' . $e->getMessage();
        }
    }
	
	public function loadModel($name, $path='model/') {
        $path=$path.$name.'.php';
        $name=$name;
        try {
            if(is_file($path)) {
                require $path;
                $ob=new $name();
            } else {
                throw new Exception('Can not open model '.$name.' in: '.$path);
            }
        }
        catch(Exception $e) {
            echo $e->getMessage().'<br />
                File: '.$e->getFile().'<br />
                Code line: '.$e->getLine().'<br />
                Trace: '.$e->getTraceAsString();
            exit;
        }
        return $ob;
    }

	public function select($from, $select='*', $where=NULL, $order=NULL, $limit=NULL) {
        $query='SELECT '.$select.' FROM '.$from;
        if($where!=NULL)
            $query=$query.' WHERE '.$where;
        if($order!=NULL)
            $query=$query.' ORDER BY '.$order;
        if($limit!=NULL)
            $query=$query.' LIMIT '.$limit;
 
        $select=$this->conn->query($query);
        
        if ($select->num_rows > 0) {
			    // output data of each row
			    while($row = $select->fetch_assoc()) {
            $data[]=$row;
			    }
		    }
		    $this->conn->close();
        return $data;
    }
}
?>