    
@include('secret.head')
    
    <body  class="bookmark">
        @include('secret.markHeader')

        <main>
            <!-- 観光地スポット表示 -->
            <div class="spotTitle" id="spotTitle">
                <p><span>☆</span>ブックマーク登録一覧<span>☆</span></p>
            </div>
            @foreach($bookmarks->unique('spot_id','user_id') as $bookmark)
            <div class="spot">
                <img class="spotImg" src="{{ asset('img/'.$bookmark->spot->content) }}" alt="">
                <div class="spotBody">
                    <div class="spotcontent">
                        <h2>
                        <i class="fa-solid fa-star liked"></i> {{ $bookmark->spot->name }}
                        </h2>
                        <p>{{ $bookmark->spot->body }}</p>
                    </div>
                    <img class="map" src="{{ asset('img/'.$bookmark->spot->map) }}" alt="map">
                </div>
            </div>
            @endforeach
        </main>

        @include('secret.footer')
    </body>

</head>
    
    
    
    
    
