@include('secret.head')
    <body>
        @include('secret.beforeHeader')
        <main class="signup">
            <h1>新規登録</h1>
            <p class="guide">必要事項を入力して、登録ボタンを押してください。</p>
            <form action="{{ route('signup') }}" method="post" id="signup">
                @csrf
                <div class="name">
                    <p>名前（ニックネーム可）</p>
                    <input type="name" name="name" autofocus>
                </div>
                <div class="email">
                    <p>メールアドレス<span>（必須）</span></p>
                    <input type="email" name="email" required autofocus>
                </div>
                <div class="password">
                    <p>パスワード<span>（必須）</span></p>
                    <p><span>6文字以上で入力してください。</span></p>
                    <input type="password" name="password" minlength="6" required autofocus>
                </div>
                <div class="role">
                    <p>ユーザー種類<span>（必須）</span></p>
                    <select form="signup" name="role" required>    
                        <option>どのユーザーで登録するか選んでください</option>
                        <option value="0">一般ユーザー</option>
                        <option value="1">管理者ユーザー</option>
                    </select>
                </div>
                <button type="submit" class="register" value="register">登録</button>
            </form>
            <p class="guide">登録している方は<a href="{{ url('/') }}">こちら</a>でログインしてください。</p>
        </main>
        @include('secret.footer')
    </body>
</html>