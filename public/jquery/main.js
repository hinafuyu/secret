$(function () {

    /* お問い合わせ確認 */
    $(".comfirm").on("click", function(){

        if(!confirm("お問い合わせを送信します。よろしいですか？")){
            return false;
        }else{};

    })

    /**
     * スライドショー
     */
    $(".slideshow").each(function(){

            //全てのスライド
        var $slides = $(this).find('img'),
            //スライドの点数
            slideCount = $slides.length,
            //現在のスライドを表すインデックス
            currentIndex = 0;

        //最初のスライドをフェードイン
        $slides.eq(currentIndex).fadeIn();

        //7500ミリ秒ごとにshowNextSlide()関数を実行
        setInterval(showNextSlide, 5000);

        //次のスライドを表示する関数
        function showNextSlide() {

            //次に表示するスライドのインデックス
            //最期のスライドなら最初のスライドへ
            var nextIndex = (currentIndex + 1) % slideCount;

            //現在のスライドをフェードアウト
            $slides.eq(currentIndex).fadeOut();

            //次のスライドをフェードイン
            $slides.eq(nextIndex).fadeIn();

            //現在のスライドのインデックスを更新
            currentIndex = nextIndex;
        }
    })

    /**
     * ロゴを操作して、シークレットページへの遷移を行う
     */
    var _isMoving = false; //移動中かどうかのフラグ true:移動中 false:停止中
    var _clickX,  _clickY; //クリックされた位置
    var _position;         //クリックされた時の要素の位置

    //mousedownイベント
    $(".mainlogo").on("mousedown", function(e) {
      if (_isMoving) return; //移動中の場合は処理しない

      _isMoving = true; //移動中にする

      //クリックされた座標を保持します
      _clickX = e.screenX;
      _clickY = e.screenY;

      //クリックされた時の要素の座標を保持します
      _position = $(".mainlogo").position();
    });

    //mousemoveイベント
    $(".logo").on("mousemove", function(e) {
      if (_isMoving == false) return; //移動中でない場合は処理しない

      //クリックされた時の要素の座標に、移動量を加算したものを、座標として設定します
      $(".mainlogo").css("left", (_position.left + e.screenX - _clickX) + "px");
      $(".mainlogo").css("top" , (_position.top  + e.screenY - _clickY) + "px");

      //Y座標が0を超えるとき
      if((_position.top  + e.screenY - _clickY) > 0){

        //パスを取得
        var path = $(location).attr('pathname');

        //パスの値で分岐
        if(path == '/index' || path == '/' || path == ''){
            return location.href = '/secret';
        }
        if(path == '/indexP'){
            return location.href = '/secretP';
        }
        if(path == '/indexA'){
            return location.href = '/secretA';
        }

      }
    });

    //mouseupイベント
    $(".mainlogo").on("mouseup", function(e) {
      if (_isMoving == false) return; //移動中でない場合は処理しない

      _isMoving = false; //停止中にする
    })

    /**
     * ロゴを操作して、メインページへの遷移を行う
     */
    var _isMoving = false; //移動中かどうかのフラグ true:移動中 false:停止中
    var _clickX,  _clickY; //クリックされた位置
    var _position;         //クリックされた時の要素の位置

    //mousedownイベント
    $(".secretlogoImg").on("mousedown", function(e) {
      if (_isMoving) return; //移動中の場合は処理しない

      _isMoving = true; //移動中にする

      //クリックされた座標を保持します
      _clickX = e.screenX;
      _clickY = e.screenY;

      //クリックされた時の要素の座標を保持します
      _position = $(".secretlogoImg").position();
    });

    //mousemoveイベント
    $(".secretlogo").on("mousemove", function(e) {
      if (_isMoving == false) return; //移動中でない場合は処理しない

      //クリックされた時の要素の座標に、移動量を加算したものを、座標として設定します
      $(".secretlogoImg").css("left", (_position.left + e.screenX - _clickX) + "px");
      $(".secretlogoImg").css("top" , (_position.top  + e.screenY - _clickY) + "px");

      //Y座標が0を超えるとき
      if((_position.top  + e.screenY - _clickY) > 0){

        //パスを取得
        var path = $(location).attr('pathname');

        //パスの値で分岐
        if(path == '/secret'){
            return location.href = '/';
        }
        if(path == '/secretP'){
            return location.href = '/indexP';
        }
        if(path == '/secretA'){
            return location.href = '/indexA';
        }

      }
    });

    //mouseupイベント
    $(".secretlogoImg").on("mouseup", function(e) {
      if (_isMoving == false) return; //移動中でない場合は処理しない

      _isMoving = false; //停止中にする
    })

    /* 削除確認 */
    $(".delete").on("click", function(){

      if(!confirm("本当に削除しますか？")){
          return false;
      }else{};
    })
    
})