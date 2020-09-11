<?php
    //此程式是用來顯示出要編輯的記錄，
    //提供一個表單讓使用者可以編輯
    $id = $_GET["id"];
    if ($id==NULL) {
        //如果網址中沒有提供id，就直接返回練習首頁
        header("Location: index.php");
        exit;
    }
    require "../includes/config.php";

    //使用SQL 的 SELECT 指令找出要被編輯的對象
    $sql = "SELECT * from playlist WHERE id='$id' LIMIT 1";
    //以下執行SQL查詢指令，並把結果傳回給$result變數
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { //檢查記錄的數量，看看是否有資料
        $row = $result->fetch_assoc();  //從資料庫中取出一筆記錄
        $id = $row["id"];               //取出id欄位，放到$id中
        $name =  $row["name"];    //取出name欄位，放到$name中
        //以下建立一個用來編輯內容的表單，按下「修改」之後會前往update.php
        echo "以下是你要修改的播放清單！<br>";
        echo "<form method=POST action=update.php>";
        echo "<input type=hidden value=$id name=id>";
        echo "清單名稱：<input type=text value='$name' name=name size=30>";
        echo "<input type=submit value=修改>";
        echo "</form>";
        echo "<a href='index.php'>不修改，直接回去</a>";
    } else {
        echo "找不到你要編輯的記錄~~<br>"; // 如果資料表中沒有記錄，要顯示的內容
        echo "<a href='index.php'>回上頁</a>";
    }
    $conn->close();
?>