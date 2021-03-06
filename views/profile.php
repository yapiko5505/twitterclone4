<?php
// 設定関連を読み込む
include_once('../config.php');
// 便利な関数を読み込む
include_once('../util.php');

// ツイート一覧作成
$view_tweets = [
    [
        'user_id' => 1,
        'user_name' =>'taro',
        'user_nickname' =>'太郎',
        'user_image_name' => '\sample-person.jpg',
        'tweet_body' => '今プログラミングをしています。',
        'tweet_image_name' => null,
        'tweet_created_at' => '2021-03-15 14:00:00',
        'Like_id' => null,
        'Like_count' => 0,
    ],

];

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    
    <?php include_once('../views/common/head.php'); ?>
    <title>プロフィール画面/twitterクローン</title>
    <meta name="discription" content="プロフィール画面です">

</head>
<body class="home profile text-center">
    <div class="container">
    
        <?php include_once('../views/common/side.php'); ?>   
        <div class="main">
            <div class="main-header">
                <h1>太郎</h1>
                
            </div>
            <div class="profile-area">
                <div class="top">
                    <div class="user"><img src="\TwitterClone\views\img_uploaded\user\sample-person.jpg" alt=""></div>

                        <?php if (isset($_GET['user_id'])) : ?>
                            <!-- 他人のプロフィール -->
                            <?php if (isset($_GET['case'])) : ?>
                                <button class="btn btn-sm">フォローを外す</button>
                            <?php else : ?>   
                                <button class="btn btn-reverse">フォローする</button>
                            <?php endif; ?>
                        <?php else: ?>
                            <!-- 自分のプロフィール -->
                            <button class="btn btn-reverse btn-sm js-modal-button" type="submit" data-bs-toggle="modal" data-bs-target="#js-modal">プロフィール編集</button>

                            <div class="modal fade" id="js-modal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="profile.php" method="post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title">プロフィールを編集</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="user">
                                                    <img src="\TwitterClone\views\img_uploaded\user\sample-person.jpg" alt="">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="mb-1">プロフィール写真</label>
                                                    <input type="file" class="form-control form-control-sm" name="image">
                                                </div>

                                                <input type="text" class="mb-4 from-control" name="nickname" maxlength="50" value="太郎" placeholder="ニックネーム" required>
                                                <input type="text" class="mb-4 from-control" name="name" maxlength="50" value="taro" placeholder="ユーザー名" required>
                                                <input type="email" class="mb-4 from-control" name="email" maxlength="254" value="taro@techis.jp" placeholder="メールアドレス" required>
                                                <input type="password" class="mb-4 from-control" name="password" minlength="4" maxlength="128" value="" placeholder="パスワードを変更する場合はご入力ください">
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-reverse" data-bs-dismiss="modal">キャンセル</button>
                                                <button class="btn" type="submit">保存する</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        <?php endif; ?> 
                            </div>
                    </div>

                    <div class="name">太郎</div>
                    <div class="text-muted">@taro</div>

                    <div class="follow-follower">
                        <div class="follow-count">1</div>
                        <div class="follow-text">フォロー中</div>
                        <div class="follow-count">1</div>
                        <div class="follow-text">フォロワー</div>
                    </div>
            </div>
            <div class="ditch"></div>

            <?php if (empty($view_tweets)): ?>
                <p class="p-3">ツイートがまだありません</p>
            <?php else: ?>
                <div class="tweet-list">
                    <?php foreach ($view_tweets as $view_tweet): ?>
                    <?php include('../views/common/tweet.php'); ?>
                    <?php endforeach; ?>
                </div>
            <?php endif;?>
            
        </div>
    </div>
    <?php include_once('../views/common/foot.php'); ?>
</body>

</html>
