
@include('secret.head')
    <body>
        @include('secret.adminHeader')
        <main>
            <div class="table">
                <h4>ユーザー一覧</h4>
                <table class="userTable">
                    <tr>
                        <th>ユーザー名</th>
                        <th>メールアドレス</th>
                        <th>ユーザー種類</th>
                    </tr>
                    @foreach($users as $user)
                    <tr>  
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="table">
                <h4>お問い合わせ一覧</h4>
                <table class="contactTable">
                    <tr>
                        <th>氏名</th>
                        <th>フリガナ</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせ内容</th>
                        <th>削除</th>
                    </tr>
                    @foreach($contacts as $contact)
                    <tr>
                        <td class="name">{{ $contact->name }}</td>
                        <td class="kana">{{ $contact->kana }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->body }}</td>
                        <td><a href="{{ route('delContact', ['id' => $contact->id]) }}"><button type="submit" class="delete" name="delete">削除</button></a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </main>
        @include('secret.footer')
    </body>
</html>