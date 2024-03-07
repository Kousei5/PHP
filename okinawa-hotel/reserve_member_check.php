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
            $no=$_SESSION['no'];
            print"ようこそ、${_SESSION['name']}様<br/>";
        }
        
        try
        {
            $dsn='mysql:dbname=okinawa_hotel;host=localhost;charset=utf8';
            $user='root';
            $password='';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql='SELECT m_name, m_tel, m_email FROM member WHERE m_no="'.$no.'"';
            $stmt=$dbh->prepare($sql);
            $stmt->execute();

            $dbh=null;

            $rec=$stmt->fetch(PDO::FETCH_ASSOC);

            $name=$rec['m_name'];
            $tel=$rec['m_tel'];
            $email=$rec['m_email'];
            $room_no=$_POST['room_no'];
            $reserve_date=$_POST['reserve_date'];
            $guest=$_POST['guest'];
            $checkIn=$_POST['checkIn'];

            if($reserve_date=='')
            {
                print'月日が選択されてません';
                print'<br/>';
            }
            if(0>=$guest||$guest>=11)
            {
                print'１名様から最大１０名様までです。';
                print'<br/>';
            }
            if($checkIn=='')
            {
                print'チェックインの時刻が選択されていません。';
                print'<br/>';
            }

            if($reserve_date==''||0>=$guest||$guest>=11||$checkIn=='')
            {
                print'<from>';
                print'<input type="button" onclick="history.back()" value="戻る">';
                print'</from>';
            }
            else
            {
                print'【会員限定・宿泊予約】';
                print'<br/>';
                print'　　　　予約日：'.$reserve_date.'';
                print'<br/>';
                print'　　　　　氏名：'.$name.'';
                print'<br/>';
                print'　　　電話番号：'.$tel.'';
                print'<br/>';
                print'メールアドレス：'.$email.'';
                print'<br/>';
                print'　　　宿泊人数：'.$guest.'人';
                print'<br/>';
                print'　チェックイン：'.$checkIn.'';
                print'<br/>';
                print'上記の内容でよろしければ「予約確定」ボタンを押してください。';

                print'<form method="post" action="reserve_member_done.php">';
                print'<input type="hidden" name="reserve_date" value="'.$reserve_date.'">';
                print'<input type="hidden" name="name" value="'.$name.'">';
                print'<input type="hidden" name="tel" value="'.$tel.'">';
                print'<input type="hidden" name="email" value="'.$email.'">';
                print'<input type="hidden" name="room_no" value="'.$room_no.'">';
                print'<input type="hidden" name="guest" value="'.$guest.'">';
                print'<input type="hidden" name="checkIn" value="'.$checkIn.'">';
                print'<br/>';
                print'<input type="submit" value="予約確定">';
                print'<input type="button" onclick="history.back()" value="戻る">';
            }
        }
        catch(Exception $e)
        {
            print'ただいま障害により大変ご迷惑をおかけしております。';
            exit();
        }
        
        ?>

    </body>
</html>