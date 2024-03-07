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

        $room_no=$_POST['room_no'];
        $reserve_date=$_POST['reserve_date'];
        $name=$_POST['name'];
        $tel=$_POST['tel'];
        $email=$_POST['email'];
        $guest=$_POST['guest'];
        $checkIn=$_POST['checkIn'];

        if($reserve_date=='')
        {
            print'月日が選択されてません';
            print'<br/>';
        }
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
            $email='登録なし';
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

        if($reserve_date==''||$name==''||preg_match('/^0[0-9]{1,4}-[0-9]{1,4}-[0-9]{3,4}\z/',$tel)==0||0>=$guest||$guest>=11||$checkIn=='')
        {
            print'<from>';
            print'<input type="button" onclick="history.back()" value="戻る">';
            print'</from>';
        }
        else
        {
            print'【宿泊予定】';
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

            print'<form method="post" action="reserve_done.php">';
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
           
        ?>

    </body>
</html>