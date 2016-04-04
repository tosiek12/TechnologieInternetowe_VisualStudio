<?php
include 'model/Model.php';

class ArticlesModel extends Model{

    public function getAll() {
        $query="SELECT a.id, a.title, a.date_add, a.autor, c.name FROM articles AS a LEFT JOIN categories AS c ON a.id_categories=c.id";
        $select=$this->conn->query($query);
        if ($select->num_rows > 0) {
			    // output data of each row
			    while($row = $select->fetch_assoc()) {
            $data[]=$row;
			    }
		    }
        $select->close();
        return $data;
    }
    public function getOne($id) {
        $query="SELECT a.id, a.title, a.date_add, a.autor, c.name, a.content FROM articles AS a LEFT JOIN categories AS c ON a.id_categories=c.id where a.id=".$id;
        $select=$this->conn->query($query);
        if ($select->num_rows > 0) {
			    // output data of each row
			    while($row = $select->fetch_assoc()) {
            $data[]=$row;
			    }
		    }
        $select->close();
        return $data;
    }
    public function insert($data) {
        $ins=$this->conn->prepare('INSERT INTO articles (title, content, date_add, autor, id_categories) VALUES (
            ?, ?, ?, ?, ?)');
        $ins->bind_param('sssss', $data['title'],
                                  $data['content'], 
                                  $data['date_add'],
                                  $data['author'], 
                                  $data['cat']);
        $ins->execute();
        $ins->close();
    }
    public function delete($id) {
        $sql = 'DELETE FROM articles WHERE id=\''.$id.'\'';
        
        if (!$this->conn->query($sql) === TRUE) {
           throw new Exception ("Error: " . $sql . "<br>" . $this->conn->error);
        }        
    }
}
?>