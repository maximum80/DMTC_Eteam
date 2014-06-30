<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', Input::post('title', isset($post) ? $post->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

        <form name="myform">
        <input type="button" value="音声認識開始" onclick="startRecognition();"/>
        <input type="button" value="音声認識終了" onclick="recognition.stop();"/>
        連続認識<input id="continuous" type="checkbox"checked>
        中間結果の表示<input id="interim" type="checkbox"checked>
        <div id="state">停止中</div>
        <div id="recognizedText"></div>
        <div id="recognizedDetail"></div>

			<?php echo Form::label('Body', 'body', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('body', Input::post('body', isset($post) ? $post->body : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Body')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Img', 'img', array('class'=>'control-label')); ?>

				<?php echo Form::input('img', Input::post('img', isset($post) ? $post->img : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Img')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Deadline', 'deadline', array('class'=>'control-label')); ?>

				<?php echo Form::input('deadline', Input::post('deadline', isset($post) ? $post->deadline : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Deadline')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'どうぞ', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>

<script>
	$(function(){
		$(document).on("click",".botton",function(){
			  var text = $(this).next(".sentaku").text();
        console.log(text);
        $('textarea').val(text);
		});
	});

    var recognition = new webkitSpeechRecognition();
    recognition.lang = "ja-JP";
    recognition.maxAlternatives = 10;

    //認識開始+設定の変更
    function startRecognition(){
        //連続認識
        if($("#continuous").prop("checked") == true) recognition.continuous = true;
        else recognition.continuous = false;

        //中間結果の表示
        if($("#interim").prop("checked") == true) recognition.interimResults = true;
        else recognition.interimResults = false;

        recognition.start();
    }
    //話し声の認識中
    recognition.onsoundstart = function(){
        $("#state").text("認識中");
    };
    //マッチする認識が無い
    recognition.onnomatch = function(){
        $("#recognizedText").text("もう一度試してください");
    };
    //エラー
    recognition.onerror= function(){
        $("#recognizedText").text("エラー");
    };
    //話し声の認識終了
    recognition.onsoundend = function(){
        $("#state").text("停止中");
    };
    //認識が終了したときのイベント
    recognition.onresult = function(event){
        var results = event.results;
        for (var i = event.resultIndex; i<results.length; i++){
            //認識の最終結果
            if(results[i].isFinal){
                $("#recognizedText").text(results[i][0].transcript);
            }
            //認識の中間結果
            else{
            $("#recognizedText").text(results[i][0].transcript);
            }
        }



        //トップ10の認識仮説の表示
        $("#recognizedDetail").empty();
        for (var i = event.resultIndex; i<results.length; i++){
            if(results[i].isFinal){
                for (var j = 1; j<recognition.maxAlternatives - 1; j++){
                	console.log(results[i][j].transcript);
                    $("#recognizedDetail").append("<p>" + "<input type=\"button\" value=\"選択\" class='botton' /> <span class='sentaku'>"　+ results[i][j].transcript + "</span>" + "</p>");
                }
            }
        }

    };
</script>