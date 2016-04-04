<?php
abstract class Controller {
	public function redirect($url) {
    session_start();
    $_SESSION['status'] = 'Updated Poem successfully';
    session_write_close(); 
		header("location: ".$url);
	}

	public function loadView($name, $path='view/') {
		$path=$path.$name.'.php';
		$name=$name;
		try {
			if(is_file($path)) {
				require $path;
				$ob = new $name();
			} else {
				throw new Exception('cant open view '.$name.' in '.$path);
			}
		}catch (Exception $e) {
			echo $e->getMessage().'<br/>
				File: '.$e->getFile().'<br/>
				Code line: '.$e->getLine().'<br/>
				Trace: '.$e->getTraceAsString();
			exit;
		}
		return $ob;
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
}
?>