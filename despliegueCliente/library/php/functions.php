<?php
include "db.php";
header("Content-Type: application/json");
$input=json_decode(file_get_contents("php://input"),true);
$conn=CoreDB::connect();

function jsonRes($success,$data=[]){ echo json_encode(array_merge(["success"=>$success],$data)); exit; }

$action=$input['action'];

// LOGIN
if($action=="login"){
 $email=$input['email']; $pass=$input['password'];
 $res=$conn->query("SELECT * FROM users WHERE email='$email' AND password='$pass'");
 if($res->num_rows>0){ $u=$res->fetch_assoc(); jsonRes(true,["user"=>["id"=>$u['id'],"role"=>$u['role']]]);}
 else{ jsonRes(false,["error"=>"Usuario o contraseña incorrectos"]); }
}

// OBTENER LIBROS
if($action=="getBooks"){
 $res=$conn->query("SELECT * FROM books");
 $books=[]; while($r=$res->fetch_assoc()){ $books[]=$r; }
 echo json_encode($books); exit;
}

// OBTENER UN LIBRO
if($action=="getBook"){
 $id=$input['id']; $res=$conn->query("SELECT * FROM books WHERE id=$id");
 if($res->num_rows>0){ echo json_encode($res->fetch_assoc()); } else { echo json_encode(["error"=>"Libro no encontrado"]); }
}

