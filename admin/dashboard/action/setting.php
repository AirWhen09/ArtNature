<?php
    $errors = [];
    $success = [];
    if(isset($_POST['saveNewRef'])){
        $groupName = mysqli_real_escape_string($conn, $_POST['addSelect']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $ranking = mysqli_real_escape_string($conn, $_POST['ranking']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $refCode = mysqli_real_escape_string($conn, $_POST['refCode']);

        $addNewRef = "INSERT INTO reference_code(ref_id, name, ranking, description, group_name)
                                        Values('$refCode', '$name', '$ranking', '$description', '$groupName')";
        $newRef = $conn->query($addNewRef);
        if($newRef){
            echo "<script>window.location.href = 'index.php?setting'</script>";
        }else{
            array_push($errors, "Something's wrong: ".$conn->error);
        }
    }

    if(isset($_POST['updateRef'])){
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $ranking = mysqli_real_escape_string($conn, $_POST['refRanking']);
        $name = mysqli_real_escape_string($conn, $_POST['refName']); 
        $refCode = mysqli_real_escape_string($conn, $_POST['refCode']); 

        $updateRefSql = "UPDATE reference_code set name = '$name', ranking = '$ranking', description = '$description' where ref_id = '$refCode'";
        $updateRef = $conn->query($updateRefSql);
        if($updateRef){
            echo "<script>window.location.href = 'index.php?setting'</script>";
        }else{
            array_push($errors, "Something's wrong: ".$conn->error);
        }
    }

    if(isset($_POST['removeRef'])){
        $id = $_POST['refId'];
        $deleteRef = $conn->query("DELETE from reference_code where ref_id = '$id'");
        if($deleteRef){
            echo "<script>window.location.href = 'index.php?setting'</script>";
        }else{
            array_push($errors, "Something's wrong: ".$conn->error);
        }
    }

    if(isset($_POST['updateLocation'])){
        $locationId = mysqli_real_escape_string($conn, $_POST['locationId']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);

        $updateLocation = "UPDATE location set address = '$address' where location_id = '$locationId'";
        $updateLocation = $conn->query($updateLocation);
        if($updateLocation){
            echo "<script>window.location.href = 'index.php?setting'</script>";
        }else{
            array_push($errors, "Something's wrong: ".$conn->error);
        }
    }

    if(isset($_POST['removeLocation'])){
        $id = $_POST['locId'];
        $deleteRef = $conn->query("DELETE from location where location_id = '$id'");
        if($deleteRef){
            echo "<script>window.location.href = 'index.php?setting'</script>";
        }else{
            array_push($errors, "Something's wrong: ".$conn->error);
        }
    }
?>