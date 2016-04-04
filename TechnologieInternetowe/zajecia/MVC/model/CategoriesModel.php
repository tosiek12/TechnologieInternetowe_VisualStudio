<?php
include 'model/Model.php';

class CategoriesModel extends Model{
  public function insert($data) {
    $sql = 'INSERT INTO categories (name) VALUES (\''.$data['name'].'\')';
    
    if ($this->conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
    } else {
       throw new Exception ("Error: " . $sql . "<br>" . $this->conn->error);
    }
    
  }
  public function getAll() {
    return $this->select('categories');
  }
  public function delete($id) {
    $sql = 'DELETE FROM categories WHERE id=\''.$id.'\'';
    if ($this->conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
    } else {
       throw new Exception ("Error: " . $sql . "<br>" . $this->conn->error);
    }
  }
}
?>