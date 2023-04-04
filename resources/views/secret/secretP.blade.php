@include('secret.head')
    <body>
        @include('secret.headerP')
        <main class="secret">
            <div class="secretlogo">
                <img class="secretlogoImg" src="{{ asset('img/logo.png') }}" alt="logo">
            </div>

            <!-- スライドショー -->
            <div class="slideshow" id="slideshow">
                <img src="{{ asset('img/omi-bridge.jpg') }}" alt="">
                <img src="{{ asset('img/sinnseityou.jpg') }}" alt="">
                <img src="{{ asset('img/night-tullys-sea.jpg') }}" alt="">
                <img src="{{ asset('img/komenoyama.jpg') }}" alt="">
                <img src="{{ asset('img/sunrise.jpg') }}" alt="">
            </div>

            <!-- 観光地スポット表示 -->
            <div class="secretTitle" id="spotTitle">
                <p><span>☆</span>観光地スポット<span>☆</span></p>
            </div>
            <p class="bookmarksecret">
                ※★を１回クリックするとブックマークを登録できます。<br/>
                ※★を２回クリックするとブックマークを解除できます。
            </p>
            @foreach($spots as $spot)
            <div class="secretSpot">
                <img class="spotImg" src="{{ asset('img/'.$spot['content']) }}" alt="">
                <div class="secretSpotBody">
                    <div class="secretcontent">
                        <h2>
                            <!-- ログインしているか確認 -->
                            @if(Auth::user())
                                <!-- likeSpotの値で分岐 -->
                                @if(isset($spot->likeSpot[0]))<!-- 色の付かない星 -->
                                    <a class="toggleWish" spot_id="{{ $spot->id }}" likeSpot="1">
                                        <i class="fa-solid fa-star"></i> 
                                    </a>
                                @else<!-- 黄色の星　-->
                                    <a class="toggleWish" spot_id="{{ $spot->id }}" likeSpot="0">
                                        <i class="fa-solid fa-star"></i> 
                                    </a>
                                @endif
                            @endif
                            {{ $spot['name'] }}
                        </h2>
                        <p>{{ $spot['body'] }}</p>
                    </div>
                    <img class="map" src="{{ asset('img/'.$spot['map']) }}" alt="map">
                </div>
            </div>
            @endforeach
        </main>
        @include('secret.footer')
    </body>
</html>
