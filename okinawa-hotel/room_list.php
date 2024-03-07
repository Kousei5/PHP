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
            $dsn='mysql:dbname=okinawa_hotel;host=localhost;charset=utf8';
            $user='root';
            $password='';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql='SELECT * FROM room_info where 1';
            $stmt=$dbh->prepare($sql);
            $stmt->execute();

            $dbh=null;

            $rec=$stmt->fetchAll(PDO::FETCH_ASSOC);

            for($i=0; $i<count($rec); $i++)
            {
                print $rec[$i]['room_no'];
                print '号室 ';
                print 'タイプ:';
                print $rec[$i]['room_name'];
                print '<br/>';
                print '【お部屋について】';
                print '<br/>';
                print $rec[$i]['room_pr'];
                print '<br/>';
                print '【設備情報】';
                print '<br/>';
                print $rec[$i]['room_exp'];
                print '<br/>';
                print '【宿泊料金(一部屋)】';
                print '<br/>';
                print '&yen';
                print number_format($rec[$i]['room_price']);
                print '<br/>';
                print '<img src="./room_p/'.$rec[$i]['room_p1'].'" width="300" height="200">';
                print '<br/>';
                print '<img src="./room_p/'.$rec[$i]['room_p2'].'" width="300" height="200">';
                print '<br/>';
                print '<img src="./room_p/'.$rec[$i]['room_p3'].'" width="300" height="200">';
                print '<br/>';
                print '------------------------------------------------------------';
                print '<br/>';
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