<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>沖縄ホテル 簡易版</title>
    </head>
    <body>
        <!--ヘッダー-->
        <header>
            <h1>沖縄ホテル　簡易版</h1>
            <h3>～あなたに究極の癒しを～</h3>
        </header>

        <?php
            $reserve_date=$_GET['reserve_date'];
            $room_no=$_GET['room_no'];

            session_start();
            session_regenerate_id(true);
            if(isset($_SESSION['login'])==true)
            {
                print"ようこそ、${_SESSION['name']}様";
            }
        ?>

        <form method="post" action="reserve_member_check.php">
            <input type="hidden" name="reserve_date" value="<?php echo $reserve_date; ?>">
            <input type="hidden" name="room_no" value="<?php echo $room_no; ?>">
            <b>【会員限定・宿泊予約】</b><br>
            <b>　　　　予約日：<?php print$reserve_date;?><br>
            <b>　　　宿泊人数：</b><input type="text" name="guest" max="10"><sup>※最大10人</sup><br>
            <b>　チェックイン：</b><select name="checkIn">
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                    </select><br>
            <input type="submit" value="送信">
        </form>        
    </body>
</html>