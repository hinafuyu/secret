	
	@include('secret.head') 

<section>
<body class="contact-body">
	@include('secret.contactHeader')
	<main>
		<div class="contact">
			<h3>お問い合わせ</h3>
			<div class="form">
				<p class="gray-back">下記の項目をご記入の上送信ボタンを押してください</p>
				<p class="form-message">送信頂いた件につきましては、担当より折り返しご連絡を差し上げます。<br>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。<br><span>*</span>は必須項目となります。</p>
				<form action="{{ route('inquery') }}" method="post" id="contact">
					@csrf
					<label class="name">氏名<span>*</span>
						@if($errors->has('name'))
							<p class="error-message">
								{{ $errors->first('name') }}
							</p>
						@endif
						<input class="form-item" type="name" name="name" value="{{ old('name') }}" placeholder="山田太郎" autofocus>
					</label>
					<label class="kana">フリガナ<span>*</span>
						@if($errors->has('kana'))
							<p class="error-message">
								{{ $errors->first('kana') }}
							</p>
						@endif
						<input class="form-item" type="text" name="kana" value="{{ old('kana') }}" placeholder="ヤマダタロウ" autofocus>
					</label>
					<label class="email">メールアドレス<span>*</span>
						@if($errors->has('email'))
							<p class="error-message">
								{{ $errors->first('email') }}
							</p>
						@endif
						<input class="form-item" type="email" value="{{ old('email') }}" placeholder="test@test.co.jp" name="email" autofocus>
					</label>
					<label class="kind">お問い合わせ内容の種類<span>*</span>
						@if($errors->has('tel'))
							<p class="error-message">
								{{ $errors->first('tel') }}
							</p>
						@endif
						<select form="contact" name="kind" required>    
							<option>お問い合わせ内容の種類を選んでください</option>
							<option value="0">観光地の場所</option>
							<option value="1">観光地の最寄り駅</option>
							<option value="2">観光地の周辺情報</option>
							<option value="3">観光地の交通状況</option>
							<option value="4">観光地のルール</option>
							<option value="5">観光地に纏わる歴史や文化</option>
							<option value="6">ホテルの情報</option>
							<option value="7">飲食店の情報</option>
							<option value="8">その他観光地の詳細</option>
							<option value="9">ログイン関係</option>
							<option value="10">ユーザー情報</option>
							<option value="11">その他</option>
						</select>
					</label>
					<label class="contents">
						<p class="gray-back">お問い合わせ内容をご記入ください<span>*</span></p>
						@if($errors->has('body'))
							<p class="error-message">
								{{ $errors->first('body') }}
							</p>
						@endif
						<textarea name="body" autofocus>{{ old('body') }}</textarea>
					</label>
					<button class="comfirm" type="submit" name="submit" value="complete">送信</button>
				</form>
			</div>
		</div>
	</main>
	@include('secret.footer')
</body>
</section>

</html>