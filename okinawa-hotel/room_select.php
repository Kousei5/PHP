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
            print"ようこそ、${_SESSION['name']}様<br/>";
        }

        $reserve_date=$_POST['reserve_date'];

        if($reserve_date=='')
        {
            print'予定日を選択してください';
            print'<from>';
            print'<input type="button" onclick="history.back()" value="戻る">';
            print'</from>';
        }
        else
        {
            try
            {
                

                $dsn='mysql:dbname=okinawa_hotel;host=localhost;charset=utf8';
                $user='root';
                $password='';
                $dbh=new PDO($dsn,$user,$password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                $sql='SELECT room_no,room_name FROM room_info where room_no NOT IN (SELECT room_no FROM reserve WHERE "'.$reserve_date.'"=reserve_date)';
                $stmt=$dbh->prepare($sql);
                $stmt->execute();

                $dbh=null;

                $rec=$stmt->fetchAll(PDO::FETCH_ASSOC);

                print '【['.$reserve_date.']の空室一覧】';
                print '<br/>';

                if($rec)
                {
                    for($i=0; $i<count($rec); $i++)
                    {
                        $num=$rec[$i]['room_no'];
                        if(isset($_SESSION['login'])==true)
                        {
                            print'<a href="reserve_member.php?room_no='.$num.'&reserve_date='.$reserve_date.'">';
                        }
                        else
                        {
                            print'<a href="reserve.php?room_no='.$num.'&reserve_date='.$reserve_date.'">';
                        }
                        print $rec[$i]['room_no'];
                        print '</a>';
                        print '　';
                        print $rec[$i]['room_name'];
                        print '<br/>';
                    }
                }
                else
                {
                    print'満席のため予約できません。';
                }

                
            }
            catch(Exception $e)
            {
                print'ただいま障害により大変ご迷惑をおかけしております。';
                exit();
            }
        }
        
        ?>
        
    </body>
</html>