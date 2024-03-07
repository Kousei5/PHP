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

        
        if($name=='')
        {
            print'名前が入力されていません';
            print'<br/>';
        }
        if(preg_match('/^0[0-9]{1,4}-[0-9]{1,4}-[0-9]{3,4}\z/',$tel)==0)
        {
            print'・電話番号の入力には半角ハイフンと半角数字で入力してください。';
            print'<br/>';
        }
        if($email=='')
        {
            print'メールアドレスが入力されていません。<br/>';
        }
        if($pass=='')
        {
            print'パスワードが入力されていません。';
            print'<br/>';
        }

        if($name==''||preg_match('/^0[0-9]{1,4}-[0-9]{1,4}-[0-9]{3,4}\z/',$tel)==0||$email==''||$pass=='')
        {
            print'<from>';
            print'<input type="button" onclick="history.back()" value="戻る">';
            print'</from>';
        }
        else
        {
            $pass=md5($pass);
            print'【新規登録内容】';
            print'<br/>';
            print'　　　　　氏名：'.$name.'';
            print'<br/>';
            print'　　　電話番号：'.$tel.'';
            print'<br/>';
            print'メールアドレス：'.$email.'';
            print'<br/>';
            print'　　パスワード：******';
            print'<br/>';
            print'上記の内容でよろしければ「確認して送信」ボタンを押してください。';

            print'<form method="post" action="new_member_done.php">';
            print'<input type="hidden" name="name" value="'.$name.'">';
            print'<input type="hidden" name="tel" value="'.$tel.'">';
            print'<input type="hidden" name="email" value="'.$email.'">';
            print'<input type="hidden" name="pass" value="'.$pass.'">';
            print'<br/>';
            print'<input type="submit" value="確認して送信">';
            print'<input type="button" onclick="history.back()" value="戻る">';
        }
           
        ?>

    </body>
</html>