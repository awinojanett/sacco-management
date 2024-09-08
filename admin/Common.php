<?php
class Common
{
    public function getAllRecords($connection) {
        $query = "SELECT * FROM member-information";
        $result = $connection->query($query) or die("Error in query1".$connection->error);
        return $result;
    }
}



