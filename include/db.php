<?php
//konekcija sa bazom podataka
try{
    $connection = new PDO (
        'mysql:host=localhost;dbname=blog1',
        'root',
        ''
    );

    
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //var_dump($connection);
}   
catch(PDOException $e){
    echo $e->getMessage();
}

    function database($sql, $connection, $fetch){
        $sql;
        $statement = $connection->prepare($sql);
        //$statement->bindParam(':id', $id);
        //izvrsavam upit
        $statement->execute();
        
        $statement->setFetchMOde(PDO::FETCH_ASSOC);

        $results = $statement->fetchAll();//daj mi rezultate koje si dobio, kad smo setovali fetch mode
        
        return $results;
    }
?>