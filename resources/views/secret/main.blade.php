@include('secret.head')
    <body>
        @include('secret.beforeHeader')
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
            
            @foreach($spots as $spot)
            <div class="spot">
                <img class="spotImg" src="{{ asset('img/'.$spot['content']) }}" alt="">
                <div class="spotBody">
                    <div class="spotcontent">
                        <h2>☆{{ $spot['name'] }}</h2>
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

