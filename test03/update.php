<?php
    //此程式實際執行更新記錄的作業
    //以下先取出表單來的id，放到$id變數中備用
    $id = $_POST["id"];
    //以下先取出表單中的name，放到$name中備用
    $name = $_POST["name"];

    if ($id==NULL) { //如果$id是空的，就直接返回
        header("Location: index.php");
        exit;
    }
    require "../includes/config.php";
    //要使用SQL 的 UPDATE 指令 
    $sql = "UPDATE playlist SET name='$name' WHERE id='$id' LIMIT 1";
    //以下執行SQL查詢指令，並把結果傳回給$result變數
    $result = $conn->query($sql);
    $conn->close();
    header("Location: index.php");
    exit;
?>