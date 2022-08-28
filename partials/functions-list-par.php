<?php

use LDAP\Result;

    function emptyInputs($fname, $fcat, $fmain, $fsecond, $fant, $fscript, $fper, $fextra) {

        $result = "";

        if (empty($fname) || empty($fcat) || (empty($fmain) && empty($fsecond) && empty($fant) && empty($fscript) && empty($fper) && empty($fextra))){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function fictionExist($connection, $fname){
        $sql = "SELECT * FROM score_list WHERE fname = ?;";
        $stmt = mysqli_stmt_init($connection);
    
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: /index.php?error=stmtfailed");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $fname);
            mysqli_stmt_execute($stmt);
        }
    
        $resultdata = mysqli_stmt_get_result($stmt);
    
        if ($row = mysqli_fetch_assoc($resultdata)){
            return $row;
        }
        else{ 
            $result = false;
        }
        return $result;
    
        mysqli_stmt_close($stmt);
    }

    function saveFiction($connection, $fname, $fcat, $fmain, $fsecond, $fant, $fscript, $fper, $fextra, $fscore, $userid){

        $sql = "INSERT INTO score_list (fname, fcat, fmain, fsecond, fant, fscript, fper, fextra, fscore, created_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: /index.php?error=stmtfailed");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ssiiiiiiii", $fname, $fcat, $fmain, $fsecond, $fant, $fscript, $fper, $fextra, $fscore, $userid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        header("location: /index.php?error=none");
        exit();
            
    }

    function userHasFiction($connection, $userid){
        $sql = "SELECT * FROM score_list WHERE created_by = ?;";
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: /index.php?error=stmtfailed");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "i", $userid);
            mysqli_stmt_execute($stmt);
        }
        
        $resultdata = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultdata)){
            return $row;
        }
        else{ 
            $result = false;
        }
        return $result;
    
        mysqli_stmt_close($stmt);

    }

    function displayFiction($connection, $userid){
        $sql = "SELECT * FROM score_list WHERE created_by = $userid;";

        $result = mysqli_query($connection, $sql);

        while($row = mysqli_fetch_array($result)){
            $fname = $row["fname"];
            $fcat = $row["fcat"];
            $fmain = $row["fmain"];
            $fsecond = $row["fsecond"];
            $fant = $row["fant"];
            $fscript = $row["fscript"];
            $fper = $row["fper"];
            $fextra = $row["fextra"];
            $fscore = $row["fscore"];
        
            echo '<tr>
                    <td class="td">'.$fname.'</td>
                    <td class="td">'.$fcat.'</td>
                    <td class="td">'.$fmain.'</td>
                    <td class="td">'.$fsecond.'</td>
                    <td class="td">'.$fant.'</td>
                    <td class="td">'.$fscript.'</td>
                    <td class="td">'.$fper.'</td>
                    <td class="td">'.$fextra.'</td>
                    <td class="td">'.$fscore.'</td>
            </tr>';
        }
    }

?>