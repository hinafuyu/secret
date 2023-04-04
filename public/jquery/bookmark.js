$(function () {

    // toggleWish（クラス名）を持つタグがクリックされた時の処理
    $('.toggleWish').on('click', function(){

        // 表示しているspotのIDと状態、押下し他ボタンの情報を取得
        spot_id = $(this).attr("spot_id"),
        likeSpot = $(this).attr("likeSpot"),
        clickButton = $(this);

        // ajaxのセットアップ
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        // ajaxでの処理
        $.ajax({

            // POST送信するURL（route.phpに指定しているもの）
            url: '/indexP',

            // POSTメソッドで送信
            type: 'POST',

            // コントローラーに送信するデータ
            data: {
                'spot_id': spot_id,
                'likeSpot': likeSpot,
            },

        })
        // 正常にコントローラーの処理が完了した時
        .done(function(data){
            if( data == 0){

                //クリックしたタグのステータスを変更
                clickButton.attr("likeSpot", "1");

                //クリックしたタグの子の要素を変更（色を黄色に変更する）
                clickButton.children().addClass("liked");
            }
            if( data == 1){

                //クリックしたタグのステータスを変更
                clickButton.attr("likeSpot", "0");

                //クリックしたタグの子の要素を変更（色指定を無しにする）
                clickButton.children().removeClass("liked");
            }
        })

        //正常に処理ができなかったとき
        .fail(function(data){
            alert('ブックマークに登録できませんでした。');
            alert(JOSN.stringify(data));
        })
    });

    
});