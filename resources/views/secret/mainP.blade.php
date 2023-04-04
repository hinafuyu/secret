@include('secret.head')
    <body>
        @include('secret.headerP')
        <main class="main">
            <div class="logo">
                <img class="mainlogo" src="{{ asset('img/logo.png') }}" alt="logo">
            </div>

            <!-- スライドショー -->
            <div class="slideshow" id="slideshow">
                <img src="{{ asset('img/front-station.jpg') }}" alt="">
                <img src="{{ asset('img/omi.jpg') }}" alt="">
                <img src="{{ asset('img/ship.jpg') }}" alt="">
                <img src="{{ asset('img/tullys-kane.jpg') }}" alt="">
                <img src="{{ asset('img/hososimakou.jpg') }}" alt="">
            </div>
        
            <!-- 観光地スポット表示 -->
            <div class="spotTitle" id="spotTitle">
                <p><span>☆</span>観光地スポット<span>☆</span></p>
            </div>
            <p class="bookmarkGuide">
                ※★を１回クリックするとブックマークを登録できます。<br/>
                ※★を２回クリックするとブックマークを解除できます。
            </p>

            @foreach($spots as $spot)
            <div class="spot">
                <img class="spotImg" src="{{ asset('img/'.$spot['content']) }}" alt="">
                <div class="spotBody">
                    <div class="spotcontent">
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