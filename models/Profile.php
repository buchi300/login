<?php
  class Profile {
    // DB Stuff
    private $conn;
    private $table = 'profile';

    // Properties
    public $id;
    public $about;
    public $image;
    

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
      
    }

    public function createNew(){
        // Create Query
     $query = 'INSERT INTO ' .
     $this->table . '(profile_id, about)
     VALUES (:id, :about)';     

     // Prepare Statement
     $stmt = $this->conn->prepare($query);   

     // Bind data
     $stmt->bindParam(':id', $this->id);
     $stmt->bindParam(':about', $this->about);

     // Execute query
     if($stmt->execute()) {
       return true;
     }
    }

    public function read_single(){
      // Create query
    $query = 'SELECT * from
    ' . $this->table . '
      WHERE profile_id = ? LIMIT 0,1';

      //Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->id);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // set properties
      $this->id = $row['profile_id'];
      $this->about =$row['about'];
      $this->image = $row['image'];

      
    }

    public function update(){
    }

      public function delete(){
      }
}

 ?>