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

        try
        {
            $name=$_POST['name'];
            $reserve_date=$_POST['reserve_date'];
            $tel=$_POST['tel'];

            $dsn='mysql:dbname=okinawa_hotel;host=localhost;charset=utf8';
            $user='root';
            $password='';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql='SELECT * FROM reserve WHERE name="'.$name.'" && reserve_date="'.$reserve_date.'" && tel="'.$tel.'"';
            $stmt=$dbh->prepare($sql);
            $stmt->execute();

            $dbh=null;

            $rec=$stmt->fetch(PDO::FETCH_ASSOC);

            //var_dump($rec);

            if($rec)
            {
                
                print'【宿泊予定】';
                print'<br/>';
                print"　　　　予約日：${rec['reserve_date']}";
                print'<br/>';
                print"　　　　　氏名：${rec['name']}";
                print'<br/>';
                print"　　　電話番号：${rec['tel']}";
                print'<br/>';
                print"メールアドレス：${rec['email']}";
                print'<br/>';
                print"　　　宿泊人数：${rec['guest']}人";
                print'<br/>';
                print"　チェックイン：${rec['checkin_time']}";
                print'<br/>';
                print'予約内容に変更がある場合は、3日前までにお電話ください。<br/>';
                print'沖縄ホテル:098-999-999<br/>';
                
            }
            else
            {
                print $reserve_date;
                print'「'.$name.'」様でのご予約はありません。<br/>';
            }

            
        }
        catch(Exception $e)
        {
            print'ただいま障害により大変ご迷惑をおかけしております。';
            exit();
        }

        ?>

        <a href="index.php">TOPページに戻る</a>

    </body>
</html>