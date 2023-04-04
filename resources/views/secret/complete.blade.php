@include('secret.head')
    <body class="contact-body">
        @include('secret.contactHeader')
        <main>
            <div class="contact complete">
                <h3>お問い合わせ</h3>
                <p class="complete-text">お問い合わせ頂きありがとうございます。<br> 送信頂いた件につきましては、担当より折り返しご連絡を差し上げます。<br>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
                <p class="back-top"><a href="{{ url('indexP') }}">トップへ戻る</a></p>
            </div>
        </main>
        @include('secret.footer')
    </body>
</html>