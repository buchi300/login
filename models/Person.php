<?php
  class Person {
    // DB Stuff
    private $conn;
    private $table = 'person';

    // Properties
    public $id;
    public $firstname;
    public $middlename;
    public $lastname;
    public $email;
    public $password;
    public $phone;
    public $dob;
    public $createdAt;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
      
    }

    public function closeConn(){
      $this->conn->close();
    }

     // Create Category
  public function createNew() {
    //check email is unique
    $query = 'SELECT email FROM  ' . $this->table .' where email = "'.$this->email.'"';
      // Prepare statement
      $stmt = $this->conn->prepare($query);
      // Execute query
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($row >0){
         return false;
      }
    // get a unique id
    $idTaken = true;
    do {
      $id = uniqid();
      $query = 'SELECT person_id FROM  ' . $this->table .' where person_id = "'.$id.'"';
      // Prepare statement
      $stmt = $this->conn->prepare($query);
      // Execute query
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($row ==0){
         $idTaken = false;
      }

      }while($idTaken);

      $this->id =$id;
      
     // Create Query
     $query = 'INSERT INTO ' .
      $this->table . '(person_id, firstName, middleName, lastName, email, password, phone, dob)
      VALUES (:id, :firstname, :middlename, :lastname, :email, :password, :phone, :dob)';     

      // Prepare Statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->firstname = htmlspecialchars(strip_tags($this->firstname));
      $this->middlename = htmlspecialchars(strip_tags($this->middlename));
      $this->lastname = htmlspecialchars(strip_tags($this->lastname));
      $this->email = htmlspecialchars(strip_tags($this->email));
      $this->password = password_hash($this->password, PASSWORD_DEFAULT);
      $this->phone = htmlspecialchars(strip_tags($this->phone));
      $this->dob = htmlspecialchars(strip_tags($this->dob));

      // Bind data
      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':firstname', $this->firstname);
      $stmt->bindParam(':middlename', $this->middlename);
      $stmt->bindParam(':lastname', $this->lastname);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':password', $this->password);
      $stmt->bindParam(':phone', $this->phone);
      $stmt->bindParam(':dob', $this->dob);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: $s.\n", $stmt->error);

      return false;
  }


    // Get Persons
    public function read() {
      // Create query
      $query = 'SELECT *
      FROM
        ' . $this->table . '
      ORDER BY
        created_at DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Person
  public function read_single(){
    // Create query
    $query = 'SELECT * from
          ' . $this->table . '
      WHERE id = ?
      LIMIT 0,1';

      //Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->id);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // set properties
      $this->id =$row['person_id']; 
      $this->firstname = $row['firstName'];
      $this->middlename =$row['middleName'];
      $this->lastname =$row['lastName'];
      $this->email =$row['email'];
      $this->phone =$row['phone'];
      $this->dob =$row['dob'];
      $this->createdAt=$row['createdAt'];
  }

   // Verify login
   public function login(){
    // Create query
    $query = 'SELECT * from
          ' . $this->table . '
      WHERE email = :email 
      LIMIT 0,1';

      //Prepare statement
      $stmt = $this->conn->prepare($query);

      
      // Execute query
      $stmt->execute(['email' =>$this->email]);

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      
      // set properties 
      if ($row>0 && password_verify($this->password, $row['password'])){
      $this->id =$row['person_id']; 
      $this->firstname = $row['firstName'];
      $this->middlename =$row['middleName'];
      $this->lastname =$row['lastName'];
      $this->email =$row['email'];
      $this->phone =$row['phone'];
      $this->dob =$row['dob'];
      $this->createdAt=$row['createdAt'];
      return true;
      }
      else{
        return false;
      }
  }

  // Update Person
  public function update() {
  
  }

  // Delete Person
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE person_id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind Data
    $stmt-> bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);

    return false;
    }
  }
