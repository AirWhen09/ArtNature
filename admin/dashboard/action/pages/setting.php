<?php
    //get reference group name
    $groupName = "SELECT description, group_name from reference_code group by group_name";
    $getGroupName = $conn->query($groupName);

    //
?>