<?php
if(isset($_POST["submit"])){
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));

        $id = $_POST["id_don"];
        
        //Credenciales Mysql
        $Host = 'localhost';
        $Username = 'root';
        $Password = '';
        $dbName = 'donation-center';
        
        //Crear conexion con la abse de datos
        $db = new mysqli($Host, $Username, $Password, $dbName);
        
        // Cerciorar la conexion
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
                        
        //Insertar imagen en la base de datos
        $insertar = $db->query("UPDATE donaciones SET evidencia='$imgContenido', estado='3' WHERE id_donacion='$id' ");
		// COndicional para verificar la subida del fichero
        if($insertar){
            echo "Archivo Subido Correctamente.";
        }else{
            echo "Ha fallado la subida, reintente nuevamente.";
        } 
		// Sie el usuario no selecciona ninguna imagen
    }else{
        echo "Por favor seleccione imagen a subir.";
    }
}



?>