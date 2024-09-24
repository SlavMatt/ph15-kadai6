<?php

// 他のPHPファイルを読み込む
require_once __DIR__ . '/functions/user.php';

// これを忘れない
session_start();

// セッションとCOOKIEにIDが保存されていなければ
// ログインページに移動
if (!isset($_SESSION['id']) && !isset($_COOKIE['id'])) {
    header('Location: ./login.php');
    exit();
}

// セッションにIDが保存されていればセッション
// ない場合はCOOKIEからIDを取得
$id = $_SESSION['id'] ?? $_COOKIE['id'];

// フォームが送信されたかチェックする
if (isset($_POST['submit-button'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 連想配列を作成
    $user = [
        'id' => $id,
        'name' => $name,
        'email' => $email,
        'password' => $password,
    ];

    // 関数を呼び出す
    $user = editUser($user);

    // セッションにIDを保存
    $_SESSION['id'] = $user['id'];

    // my-page に移動させる（リダイレクト）
    header('Location: ./my-page.php');
    exit();
}

?>
<html>
    <body>
        <h1>情報変更</h1>
        <form action="./edit.php" method="post">
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
