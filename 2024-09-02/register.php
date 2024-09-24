<?php

// 他のPHPファイルを読み込む
require_once __DIR__ . '/functions/user.php';

// フォームが送信されたかチェックする
if (isset($_POST['submit-button'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 連想配列を作成
    $user = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
    ];

    // 関数を呼び出す
    saveUser($user);
    header('Location: ./my-page.php');
}

?>
<html>
    <body>
        <h1>会員登録</h1>
        <!-- action: フォームの送信先 -->
        <!-- method: 送信方法 (GET / POST) -->
        <form action="./register.php" method="post">
            <div>
                お名前<br>
                <input type="text" name="name">
            </div>
            <div>
                Email Address<br>
                <input type="email" name="email">
            </div>
            <div>
                PassWord<br>
                <input type="password" name="password">
            </div>
            <div>
                <!-- <button type="submit">登録</button> -->
                <input type="submit" value="登録" name="submit-button">
            </div>
        </form>
    </body>
</html>
<?php

// 他のPHPファイルを読み込む
require_once __DIR__ . '/functions/user.php';

// これを忘れない
session_start();

// フォームが送信されたかチェックする
if (isset($_POST['submit-button'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 連想配列を作成
    $user = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
    ];

    // 関数を呼び出す
    $user = saveUser($user);

    // セッションにIDを保存
    $_SESSION['id'] = $user['id'];

    // my-page に移動させる（リダイレクト）
    header('Location: ./my-page.php');
    exit();
}

?>
<html>
    <body>
        <h1>会員登録</h1>
        <!-- action: フォームの送信先 -->
        <!-- method: 送信方法（GET / POST） -->
        <form action="./register.php" method="post">
            <div>
                お名前<br>
                <input type="text" name="name">
            </div>
            <div>
                メールアドレス<br>
                <input type="email" name="email" required>
            </div>
            <div>
                パスワード<br>
                <input type="password" name="password">
            </div>
            <div>
                <!-- <button type="submit">登録</button> -->
                <input type="submit" value="登録" name="submit-button">
            </div>
        </form>
        <?php include __DIR__ . '/includes/footer.php' ?>
    </body>
</html>
