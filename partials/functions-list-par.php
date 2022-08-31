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

    function displayList($connection, $userid){
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
            $fid = $row["fid"];
        
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
                    <td class="td">
                        <a href="../links/edit-list.php?id='.$fid.'" target="_blank" class="edit">Edit</a>
                    </td>
            </tr>';
        }
    }

    function displayFiction($connection, $userid, $fid){
        $sql = "SELECT * FROM score_list WHERE created_by = $userid AND fid = $fid;";

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
            $fid = $row["fid"];
            
            echo '<h2>'.$fname.'</h2>';

            echo '<tr>
                <td class="td">'.$fid.'</td>
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

            echo '<form action="../partials/updatelist-par.php" method="POST">
            <tr>
            <td class="td"> <input name="fid" readonly required value ="'.$fid.'"> </td>
                <td class="td"> <input name="fname" type="text" required> </td>
                <td class="td"> 
                    <select name="fcat" id="select-category">
                        <option value="movie" class="option-category">Movie</option>
                        <option value="tv-show" class="option-category">TV Show</option>
                        <option value="anime" class="option-category">Anime</option>
                    </select>
                </td>
                <td class="td"> <input name="fmain" type="number" min="-1" max="10" class="input-table"> </td>
                <td class="td"> <input name="fsecond" type="number" min="-1" max="10" class="input-table"> </td>
                <td class="td"> <input name="fant" type="number" min="-1" max="10" class="input-table"> </td>
                <td class="td"> <input name="fscript" type="number" min="-1" max="10" class="input-table"> </td>
                <td class="td"> <input name="fper" type="number" min="-1" max="10" class="input-table"> </td>
                <td class="td"> <input name="fextra" type="number" min="0" max="10" class="input-table unlisted" id="extra-points"> </td>
                <td class="td"> <input name="fscore" type="number" readonly id="score"> </td>
                <td class="td">
                    <button type="submit" name="submit">Save</button>   
                </td>
            </tr> </form>';

            echo '
                <form action="../partials/deletelist-par.php" method="POST">
                    <div class="container"> <button type="submit" name="delete" id="delete">Delete fiction</button></div> 
                </form>';

            include("../partials/dynamic-calculator-par.php");
        }
    }

    function checkProperty($connection, $userid, $fid){
        $sql = "SELECT * FROM score_list WHERE created_by = ? AND fid = ?;";

        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../links/list.php?error=stmtfailed");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ii", $userid, $fid);
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

    function updateFiction($connection, $fname, $fcat, $fmain, $fsecond, $fant, $fscript, $fper, $fextra, $fscore, $fid) {

        $sql = "UPDATE score_list SET fname = ?, fcat = ?, fmain = ?, fsecond = ?, fant = ?, fscript = ?, fper = ?, fextra = ?, fscore = ? WHERE fid = $fid;";
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: /index.php?error=stmtfailed");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ssiiiiiii", $fname, $fcat, $fmain, $fsecond, $fant, $fscript, $fper, $fextra, $fscore);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        header("location: /index.php?error=none");
        exit();
    }

    function deleteFiction($connection, $fid) {

        $sql = "DELETE FROM score_list WHERE fid = ?;";
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: /index.php?error=stmtfailed");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "i", $fid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        header("location: /index.php?error=none");
        exit();
    }

?>