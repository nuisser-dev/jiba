<?php
function connect(){
  // 1 connexion to the database
$servername="localhost";
$DBuser="root" ;
$DBpassword="";
$DBname="databasemagasin" ;


try {
$conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Connected successfully";
} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();

}
return $conn;
}

function getAllCategories(){
    // 1 connexion to the database
$conn=connect();


//  2 creation requete 
$requette="SELECT * FROM categories ";

// 3 requete execution
$resultat=$conn->query($requette);
// 4 requete result
$categories=$resultat->fetchAll();
//var_dump($categories);

return $categories;

}

function getAllProducts(){
  

// 1 connexion to the database
$conn=connect();

//  2 creation requete 
$requette="SELECT * FROM products ";

// 3 requete execution
$resultat=$conn->query($requette);
// 4 requete result
$products=$resultat->fetchAll();
//var_dump($categories);

return $products;

}
function SearchProducts(){
    // 1 connexion to the database
    $conn=connect();

//  2 creation requete 
$requette="SELECT * FROM products WHERE productname Like '%keywords%' ";


// 3 requete execution
$resultat=$conn->query($requette);

//4 resultat
$products=$resultat->fetchAll();

return $products;

}


function searchproduct($keyword){
    // 1 connexion to the database
    $conn=connect();
  //2 requet creation
  $requette="SELECT * FROM products where productname like '%$keyword%'";
  //3 requet execution 
  $resultat=$conn->query($requette);
  //4 resultat
  $products=$resultat->fetchAll();
  return $products;

}

function GetProductById($id){
  
  $conn=connect();
  //1 requet creation 

  $requette="SELECT * FROM products WHERE id=$id ";

  //3 requet execution 
  $resultat=$conn->query($requette);
  //4 resultat
  $product=$resultat->fetch();
  return $product;


}
function Addvisitor($data)
{
    $conn = connect();
    
    // Fixing the quotation marks inside the query
    $mpSecure=md5($data['mp'] );
    $requette = "INSERT INTO visitor (username, email, mp, phone) VALUES ('" . $data['username'] . "', '" . $data['email'] . "', '" . $mpSecure. "', '" . $data['phone'] . "')";
    
    $resultat = $conn->query($requette);

    if ($resultat) {
        return true;
    } else {
        return false;
    }
}
function VisitorConnection1($data) {
  $conn = connect();
  $email = $data['email'];
  $mp = md5($data['mp']);
  
  $requette = $conn->prepare("SELECT * FROM visitor WHERE email = :email AND mp = :mp");
  $requette->execute(['email' => $email, 'mp' => $mp]);
  $user = $requette->fetch();
  var_dump($user);
  echo($mp);
  return $user;
}

function AdminConnection($data){
  $conn = connect();
  $email = $data['email'];
  $mp = ($data['mp']);
  $requette = "SELECT * FROM Administrator where email='$email' AND mp='$mp'  ";

  $resultat = $conn->query($requette);
  $user = $resultat->fetch();

  return $user;
}

function deleteproduit($id){
$conn=connect();
$requette = " DELETE  FROM categories where id='$id' ";
$resultat = $conn->query($requette);


return $resultat;
}



?>