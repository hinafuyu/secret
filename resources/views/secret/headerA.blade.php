<header id="header">
    <nav class="nav">
        <p class="sitename"><a href="#header">secret</br>sightseeing</a></p>
        <div class="burger-menu">
            <div class="burger-back"></div>
            <div class="menu">
                <ul>
                    <li><a href="#slideshow">はじめに</a></li>
                    <li><a href="#spotTitle">スポット</a></li>
                    <li><a href="{{ url('adminList') }}">一覧</a></li>
                </ul>
                <p class="sign-in">ログイン関係</p>
            </div>
        </div>
        <img class="burger" src="{{ asset('img/menu.png') }}" alt="">
    </nav>
    <div class="popup">
        <div class="popup-back"></div>
        <div class="popup-item">
            <h3>ログイン情報に関して</h3>
            <div class="loginInfor">
                <p>☆<a href="{{ route('profile.show') }}">ユーザープロフィールはこちら</a></p>
                <p>※アカウント削除を行うと、一部機能が使えなくなります。</p>
                <p>※プロフィールからパスワードの変更ができます。</p>
                <p>※ログアウトはプロフィール画面の右上のリストから選択できます。</p>
            </div>
        </div>
    </div>
</header>