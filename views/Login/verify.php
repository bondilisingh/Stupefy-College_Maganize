<?php 
    require("config.php"); 
    $submitted_reg_no = ''; 
    if(!empty($_POST)){ 
        $query = " 
            SELECT  
                reg_no, 
                password,
                Name 
            FROM  magazine
            WHERE 
                reg_no = :reg_no AND
                password = :password 
        "; 
        $query_params = array( 
            ':reg_no' => $_POST['reg_no'],
            ':password' => $_POST['password'] 
        ); 
          
        try{ 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $login_ok = false; 

        $row = $stmt->fetch(); 
        if($row){
            /*if($check_password === $row['password'])*/
                $login_ok = true;
             
        } 
 
        if($login_ok){  
            unset($row['password']); 
            $_SESSION['magazine'] = $row;  
            header("Location: ../../index.html"); 
            die("Redirecting to: ../../index.html"); 
        } 
        else{ 
            print("Login Failed."); 
            $submitted_reg_no = htmlentities($_POST['reg_no'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
?> 