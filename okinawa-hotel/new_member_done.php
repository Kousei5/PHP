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

        $name=$_POST['name'];
        $tel=$_POST['tel'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];

        try
        {
            $dsn='mysql:dbname=okinawa_hotel;host=localhost;charset=utf8';
            $user='root';
            $password='';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql='INSERT INTO member(m_name,m_tel,m_email,m_pass) VALUES(?,?,?,?)';
            $stmt=$dbh->prepare($sql);
            $data[]=$name;
            $data[]=$tel;
            $data[]=$email;
            $data[]=$pass;
            $stmt->execute($data);

            $dbh=null;

            print'【登録完了】<br/>';
            print'新規会員登録が完了しました。<br/>';
            print'下記のリンクより、ログインしてください。<br/>';
        }
        catch(Exception $e)
        {
            print'ただいま障害により大変ご迷惑をおかけしております。';
            exit();
        }

        ?>

        <br>
        <a href="login.html">ログイン</a>

    </body>
</html>