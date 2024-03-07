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

        $email=$_POST['email'];
        $pass=$_POST['pass'];

        $pass=md5($pass);

        try
        {
            $dsn='mysql:dbname=okinawa_hotel;host=localhost;charset=utf8';
            $user='root';
            $password='';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql='SELECT m_no,m_name FROM member WHERE m_email="'.$email.'" && m_pass="'.$pass.'"';
            $stmt=$dbh->prepare($sql);
            $stmt->execute();

            $dbh=null;

            $rec=$stmt->fetch(PDO::FETCH_ASSOC);

            if($rec)
            {
                $no=$rec['m_no'];
                $name=$rec['m_name'];
                session_start();
                $_SESSION['login']=1;
                $_SESSION['name']=$name;
                $_SESSION['no']=$no;
                header('Location:index.php?name=');
                exit();
            }
            else
            {
                print'メールアドレスもしくは、パスワードの入力に誤りがあります。';
                print'<from>';
                print'<input type="button" onclick="history.back()" value="戻る">';
                print'</from>';
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