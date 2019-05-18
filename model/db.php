<?php
    function get_connection()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'carebookdb');
        return $conn;
    }

    function get_result($sql)
    {
        $conn = get_connection();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function exe_query($sql)
    {
        $conn = get_connection();
        $status = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $status;
    }

    // when we need the id of the last inserted row
    function exe_query_id($sql)
    {
        $conn = get_connection();
        $status = mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);
        mysqli_close($conn);
        return $id;
    }
?>