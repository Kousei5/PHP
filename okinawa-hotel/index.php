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

            session_start();
            session_regenerate_id(true);
            if(isset($_SESSION['login'])==true)
            {
                print"ようこそ、${_SESSION['name']}様";
            }
            else
            {
                print'ようこそ　ゲスト　様';
            }
        ?>

        <div class="menu">
            <ul>
                <li>
                    <form method="post" action="room_select.php">
                    <b>宿泊予定日を選択</b><br>
                        <b>　予約日：</b><input type="date" name="reserve_date"><br>
                        <input type="submit" value="空室一覧へ">
                    </form>
                </li>
                <li><a href="room_list.php">お部屋一覧</a></li>
                <li>
                    <form method="post" action="reserve_conf.php">
                        <b>予約内容確認</b><br>
                        <b>　　氏名：</b><input type="text" name="name"><br>
                        <b>　予約日：</b><input type="date" name="reserve_date"><br>
                        <b>電話番号：</b><input type="text" name="tel"><br>
                        <sup>※半角数字ならびに半角ハイフンありで入力</sup><br>
                        <input type="submit" value="予約確認へ">
                    </form>
                </li>
                <?php
                    if(isset($_SESSION['login'])==false)
                    {
                        print'<li><a href="new_member.php">新規会員登録</a></li>';
                        print'<li><a href="login.html">ログイン</a></li>';
                    }
                ?>
            </ul>
        </div>
    </body>
</html>