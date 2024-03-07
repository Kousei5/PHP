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

        $reserve_date=$_POST['reserve_date'];
        $name=$_POST['name'];
        $tel=$_POST['tel'];
        $email=$_POST['email'];
        $room_no=$_POST['room_no'];
        $guest=$_POST['guest'];
        $checkIn=$_POST['checkIn'];

        try
        {
            $dsn='mysql:dbname=okinawa_hotel;host=localhost;charset=utf8';
            $user='root';
            $password='';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql='INSERT INTO reserve(reserve_date,name,tel,email,room_no,guest,checkin_time) VALUES(?,?,?,?,?,?,?)';
            $stmt=$dbh->prepare($sql);
            $data[]=$reserve_date;
            $data[]=$name;
            $data[]=$tel;
            $data[]=$email;
            $data[]=$room_no;
            $data[]=$guest;
            $data[]=$checkIn;
            $stmt->execute($data);

            $dbh=null;

            print'【予約確定】<br/>';
            print'ご予約が無事完了いたしました。<br/>';
            print'当日は、お気をつけてお越しくださいませ。<br/>';
        }
        catch(Exception $e)
        {
            print'ただいま障害により大変ご迷惑をおかけしております。';
            exit();
        }

        ?>

        <a href="index.php">戻る</a>

    </body>
</html>