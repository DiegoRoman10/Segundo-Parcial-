<?php
require 'database.php';

Class User{

  public static function create($Nombre, $Correo, $Comentarios) {
    $sql = 'INSERT INTO Newsletter (Nombre, Correo, Comentarios) VALUES (:Nombre,:Correo,:Comentarios)';
    try {
      $db = Database::connect();
      $stmt = $db->prepare($sql);
      $stmt->bindParam(':Nombre', $Nombre);
      $stmt->bindParam(':Correo', $Correo);
      $stmt->bindParam(':Comentarios', $Comentarios);
      $stmt->execute();
      Database::disconnect();
      return true;
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      return false;
    }
  }

  public static function update($id, $username,$password){
    $sql = 'UPDATE Newsletter SET username=:username,password=:password WHERE id=:id';
    try {
      $db = Database::connect();
      $stmt = $db->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->bindParam(":username", $username);
      $stmt->bindParam(":password", $password);
      $stmt->execute();
      Database::disconnect();
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }

  public static function delete($id){
    $sql = 'DELETE FROM Newsletter WHERE id=:id';
    try {
      $db = Database::connect();
      $stmt = $db->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      Database::disconnect();
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }


  public static function readAll(){
    $sql = "SELECT * FROM Newsletter ORDER BY id";
    try {
        $db = Database::connect();
        $stmt = $db->query($sql);
        $Newsletter = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $Newsletter;

        Database::disconnect();
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
  }


  public static function read($id){
    $sql = "SELECT * FROM Newsletter WHERE id=:id";
    try {
        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $user = $stmt->fetchObject();

        return $user;

        Database::disconnect();
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
  }

}


?>