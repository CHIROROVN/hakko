
@extends('backend.layouts.app')

@section('content')

<table width="960" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td width="150%" class="col_1">■八幸 Website 管理画面　＞　「新着情報」管理　＞　新規登録</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    {!! Form::open(array('route' => ['backend.infos.regist'], 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}

    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td colspan="2" class="col_3">タイトル <span class="required">必須</span></td>
            <td><input name="info_title" type="text" id="info_title" size="60" value="{{old('info_title')}}">
                @if ($errors->first('info_title'))
                <div class="error-text"> {{$errors->first('info_title')}}</div>
                @endif
            </td>
          </tr>
          <tr>
            <td colspan="2" class="col_3">情報登録日 <span class="required">必須</span></td>
            <td>
            <select name="info_year" id="info_year">
                <option value="">----年</option>
                @for( $y=(date('Y')-3); $y<= (date('Y') + 3); $y++ )
                <option value="{{$y}}" @if(old('info_year') == $y) selected @endif > {{$y}}年</option>
                @endfor
              </select>
                <select name="info_month" id="info_month">
                <option value="">--月</option>
                @for( $m=1; $m<= 12; $m++ )
                  <option value="{{c2digit($m)}}" @if(old('info_month') == c2digit($m)) selected @endif >{{c2digit($m)}}月</option>
                @endfor
                </select>
                <select name="info_day" id="info_day">
                <option value="">--日</option>
                @for( $d=1; $d<= 31; $d++ )
                  <option value="{{c2digit($d)}}" @if(old('info_day') == c2digit($d) ) selected @endif >{{c2digit($d)}}日</option>
                @endfor
              </select>
              　
              <input type="button" name="btn_now" id="btn_now" value="今日">
               @if ($errors->first('info_year'))
                <div class="error-text"> {{$errors->first('info_year')}}</div>
                @endif

                @if ($errors->first('info_month'))
                <div class="error-text"> {{$errors->first('info_month')}}</div>
                @endif

                @if ($errors->first('info_day'))
                <div class="error-text"> {{$errors->first('info_day')}}</div>
                @endif
                </td>
          </tr>
          <tr>
            <td colspan="2" class="col_3">サムネイル画像</td>
            <td>
              @if(old('info_list_img'))
              <a href="{{ asset('public') }}{{old('info_list_img')}}" target="_blank" title="">画像ビュー</a>
              @endif              
              <input type="file" name="info_list_img" id="info_list_img" value="{{old('info_list_img')}}">
              <input type="button" id="info_list_img_del" class="btn-reset" value="X" title="リセット">

              <input type="hidden" name="info_list_img_old" value="{{old('info_list_img')}}">
              　※正方形の画像を指定
              @if ($errors->first('info_list_img'))
                <div class="error-text"> {{$errors->first('info_list_img')}}</div>
              @endif
            </td>
          </tr>
          <tr>
            <td colspan="2" class="col_3">TOP用文章</td>
            <td><input name="info_list_txt" type="text" id="info_list_txt" size="70" value="{{old('info_list_txt')}}">
            </td>
          </tr>
          <tr>
            <td colspan="2" class="col_3">お知らせカテゴリ</td>
            <td><input type="radio" name="info_cat" id="info_cat1" value="1" @if(old('info_cat') == 1 || old('info_cat') == null) checked @endif >
              お知らせ　　　
              <input type="radio" name="info_cat" id="info_cat2" value="2" @if(old('info_cat') == 2) checked @endif>
              イベント　　　
              <input type="radio" name="info_cat" id="info_cat3" value="3" @if(old('info_cat') == 3) checked @endif>
              お勧め商品</td>
          </tr>
          <tr>
            <td colspan="2" class="col_3">タイプ <span class="required">必須</span></td>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
              <tbody>
                <tr>
                  <td width="1%"><input type="radio" name="info_type" id="info_type1" value="1" @if(old('info_type') == 1) checked @endif ></td>
                  <td>タイプ1：タイトルをクリックすると指定URLを表示</td>
                </tr>
                <tr>
                  <td width="1%"><input type="radio" name="info_type" id="info_type2" value="2" @if(old('info_type') == 2) checked @endif ></td>
                  <td>タイプ2：タイトルをクリックすると指定ファイルを表示</td>
                </tr>
                <tr>
                  <td width="1%"><input type="radio" name="info_type" id="info_type3" value="3" @if(old('info_type') == 3) checked @endif ></td>
                  <td>タイプ3：タイトルをクリックすると詳細ページを表示</td>
                </tr>

              </tbody>
            </table>
                @if ($errors->first('info_type'))
                <div class="error-text"> {{$errors->first('info_type')}}</div>
                @endif
            </td>
          </tr>
          <tr>
            <td width="10%" class="col_3">タイプ1</td>
            <td width="15%" class="col_3">リンク先URL</td>
            <td>
              <input name="info1_url" type="text" id="info1_url" size="60" value="{{old('info1_url')}}">
              @if ($errors->first('info1_url'))
              <div class="error-text"> {{$errors->first('info1_url')}}</div>
              @endif
            </td>
          </tr>
          <tr>
            <td width="10%" class="col_3">タイプ2</td>
            <td width="15%" class="col_3">表示ファイル</td>
            <td>
              @if(old('info2_file'))
              <a href="{{ asset('public') }}{{old('info2_file')}}" target="_blank" title="">ファイルビュー</a>
              @endif
              <input type="file" name="info2_file" id="info2_file" multiple value="{{old('info2_file')}}">
              <input type="button" id="info2_file_del" class="btn-reset" value="X" title="リセット">
              <input type="hidden" name="info2_file_old" value="{{old('info2_file')}}">
              @if ($errors->first('info2_file'))
                <div class="error-text"> {{$errors->first('info2_file')}}</div>
              @endif
            </td>
          </tr>
          <tr>
            <td width="10%" rowspan="4" class="col_3">タイプ3</td>
            <td width="15%" class="col_3">詳細</td>
            <td><textarea name="info3_contents" id="info3_contents" class="info3_contents" rows="4" cols="50" >@if(old('info3_contents')){{old('info3_contents')}}@endif</textarea>
              @if ($errors->first('info3_contents'))
              <div class="error-text"> {{$errors->first('info3_contents')}}</div>
              @endif
            </td>
          </tr>

          <tr>
            <td width="15%" class="col_3">画像</td>
            <td>
              @if(old('info3_img'))
              <a href="{{ asset('public') }}{{old('info3_img')}}" target="_blank" title="">画像ビュー</a>
              @endif
            <input type="file" name="info3_img" id="info3_img" value="{{old('info3_img')}}">
            <input type="button" id="info3_img_del" class="btn-reset" value="X" title="リセット">
              @if ($errors->first('info3_img'))
                <div class="error-text"> {{$errors->first('info3_img')}}</div>
                @endif
            <input type="hidden" name="info3_img_old" value="{{old('info3_img')}}">
            </td>
          </tr>


          <tr>
            <td width="15%" class="col_3">ファイル</td>
            <td>
            @if(old('info3_file'))
            <a href="{{ asset('public') }}{{old('info3_file')}}" target="_blank" title="">ファイルビュー</a>
            @endif
              <input type="file" name="info3_file" id="info3_file" multiple value="{{old('info3_file')}}">
              <input type="button" id="info3_file_del" class="btn-reset" value="X" title="リセット">
              <input type="hidden" name="info3_file_old" value="{{old('info3_file')}}">
              @if ($errors->first('info3_file'))
                <div class="error-text"> {{$errors->first('info3_file')}}</div>
                @endif
            </td>
          </tr>
          <tr>
            <td width="15%" class="col_3">ファイル名</td>
            <td><input name="info3_filename" type="text" id="info3_filename" size="60" value="{{old('info3_filename')}}"></td>
          </tr>


          <tr>
            <td colspan="2" class="col_3">表示／非表示</td>
            <td><input type="checkbox" name="info_dspl_flag" id="info_dspl_flag" value="1" @if( !empty(old('info_dspl_flag')) && old('info_dspl_flag') == 1 ) checked @endif >一時的に非表示にする</td>
          </tr>
          <tr>
            <td colspan="2" class="col_3">TOP表示設定</td>
            <td><input type="checkbox" name="info_top_flag" value="1" id="info_top_flag" @if( !empty(old('info_top_flag')) && old('info_top_flag') == 1 ) checked @endif >
            常にTOPに表示する</td>
          </tr>

          <tr>
            <td width="10%" rowspan="2" class="col_3">タイマー</td>
            <td width="15%" class="col_3">開始日時：</td>
            <td>
              <select name="year_start" id="year_start">
        <option value="" @if(old('year_start') == '') selected @endif >----年</option>
        @for( $y=(date('Y')-3); $y<= (date('Y') + 3); $y++ )
        <option value="{{$y}}" @if(old('year_start') == $y) selected @endif >{{$y}}年</option>
        @endfor
      </select>
        <select name="month_start" id="month_start">
        <option value="" @if(old('month_start') == '') selected @endif >--月</option>
        @for( $m=1; $m<= 12; $m++ )
          <option value="{{c2digit($m)}}" @if(old('month_start') == c2digit($m)) selected @endif >{{c2digit($m)}}月</option>
        @endfor
        </select>
        <select name="day_start" id="day_start">
        <option value="">--日</option>
        @for( $d=1; $d<= 31; $d++ )
          <option value="{{c2digit($d)}}" @if(old('day_start') == c2digit($d) ) selected @endif >{{c2digit($d)}}日</option>
        @endfor
        </select>
        　
        <select name="hour_start" id="hour_start">
        <option value="" @if(old('hour_start') == '' ) selected @endif>--時</option>
        <option value="00" @if(old('hour_start') == '00' ) selected @endif>00時</option>
         @for( $hour=1; $hour<= 23; $hour++ )
          <option value="{{c2digit($hour)}}" @if(old('hour_start') == c2digit($hour) ) selected @endif >{{c2digit($hour)}}時</option>
        @endfor
        </select>
        <select name="minute_start" id="minute_start">
        <option value="" @if(old('minute_start') == '' ) selected @endif >--分</option>
        <option value="00" @if(old('minute_start') == '00' ) selected @endif >00分</option>
        @for( $min=1; $min<= 59; $min++ )
          <option value="{{c2digit($min)}}" @if(old('minute_start') == c2digit($min) ) selected @endif >{{c2digit($min)}}分</option>
        @endfor
        </select>
        <br></td>
      </tr>
      
      <tr>
      <td width="15%" class="col_3">終了日時：</td>
      <td>
          <select name="year_end" id="year_end">
            <option value="" @if(old('year_end') == '') selected @endif >----年</option>
            @for( $y=(date('Y')-3); $y<= (date('Y') + 3); $y++ )
            <option value="{{$y}}" @if(old('year_end') == $y) selected @endif >{{$y}}年</option>
            @endfor
          </select>
            <select name="month_end" id="month_end">
            <option value="" @if(old('month_end') == '' ) selected @endif>--月</option>
            @for( $m=1; $m<= 12; $m++ )
              <option value="{{c2digit($m)}}" @if(old('month_end') == c2digit($m) ) selected @endif >{{c2digit($m)}}月</option>
            @endfor
            </select>
            <select name="day_end" id="day_end">
            <option value="" @if(old('day_end') == '' ) selected @endif>--日</option>
            @for( $d=1; $d<= 31; $d++ )
              <option value="{{c2digit($d)}}" @if(old('day_end') == c2digit($d) ) selected @endif >{{c2digit($d)}}日</option>
            @endfor
            </select>
          　
          <select name="hour_end" id="hour_end">
            <option value="" @if(old('hour_end') == '' ) selected @endif >--時</option>
            <option value="00" @if(old('hour_end') == '00' ) selected @endif >00時</option>
            @for( $hour=1; $hour<= 23; $hour++ )
              <option value="{{c2digit($hour)}}" @if(old('hour_end') == c2digit($hour) ) selected @endif >{{c2digit($hour)}}時</option>
            @endfor
          </select>
          <select name="minute_end" id="minute_end">
            <option value="" @if(old('minute_end') == '' ) selected @endif >--分</option>
            <option value="00" @if(old('minute_end') == '00' ) selected @endif >00分</option>
             @for( $min=1; $min<= 59; $min++ )
              <option value="{{c2digit($min)}}" @if(old('minute_end') == c2digit($min) ) selected @endif >{{c2digit($min)}}分</option>
            @endfor
          </select>

            </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" id="btn-submit" value="登録する">
        　　　　　
      <input type="reset" name="reset" id="reset" value="クリア"></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='{{route('backend.infos.index')}}'" value="「お知らせ」一覧に戻る"></td>
    </tr>

    {!! Form::close() !!}
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

<script>
  $(document).ready(function(){
    $('.btn-reset').addClass('btn-hide');    
    var date = new Date();
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();

    $("#btn_now").click(function(){
        $('#info_year option[value="' + year + '"]').prop('selected', true);
        $('#info_month option[value="' + c2Digit(month) + '"]').prop('selected', true);
        $('#info_day option[value="' + c2Digit(day) + '"]').prop('selected', true);
    });
  });

  $('#info_list_img').change(function(){
    if($(this).length > 0){
      $('#info_list_img_del').removeClass('btn-hide');
    }    
  });

  $('#info_list_img_del').click(function(){
    var $el = $('#info_list_img');
    $el.wrap('<form>').closest('form').get(0).reset();
    $el.unwrap();
    $('#info_list_img_del').addClass('btn-hide');
    $('#info_list_img').val('');
  });

  $('#info2_file').change(function(){
    if($(this).length > 0){
      $('#info2_file_del').removeClass('btn-hide');
    }    
  });

  $('#info2_file_del').click(function(){
    var $el = $('#info2_file');
    $el.wrap('<form>').closest('form').get(0).reset();
    $el.unwrap();
    $('#info2_file_del').addClass('btn-hide');
    $('#info2_file').val('');
  });

  $('#info3_img').change(function(){
    if($(this).length > 0){
      $('#info3_img_del').removeClass('btn-hide');
    }    
  });

  $('#info3_img_del').click(function(){
    var $el = $('#info3_img');
    $el.wrap('<form>').closest('form').get(0).reset();
    $el.unwrap();
    $('#info3_img_del').addClass('btn-hide');
    $('#info3_img').val('');
  });
  

  $('#info3_file').change(function(){
    if($(this).length > 0){
      $('#info3_file_del').removeClass('btn-hide');
    }    
  });

  $('#info3_file_del').click(function(){
    var $el = $('#info3_file');
    $el.wrap('<form>').closest('form').get(0).reset();
    $el.unwrap();
    $('#info3_file_del').addClass('btn-hide');
    $('#info3_file').val('');
  });


  function c2Digit(num){
    return (num < 10? '0' : '') + num;
  }
</script>

<script>
  tinymce.init({
    selector: '#info3_contents',
    language: 'ja',
    height: 320,
    menubar: false,
    forced_root_block : "", 
    force_br_newlines : true,
    force_p_newlines : false,
    fontsize_formats: "8pt 9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 17pt 18pt 19pt 20pt 21pt 22pt 23pt 24pt 25pt 26pt 27pt 28pt 29pt 30pt 31pt 32pt",

    plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern',

    toolbar: 'bold italic | strikethrough forecolor backcolor | fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | imageupload',
    content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
    ],
    setup: function(editor) {
            var inp = $('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
            $(editor.getElement()).parent().append(inp);

            inp.on("change",function(){
                var input = inp.get(0);
                var file = input.files[0];
                var fr = new FileReader();
                fr.onload = function() {
                    var img = new Image();
                    img.src = fr.result;
                    editor.insertContent('<img src="'+img.src+'"/>');
                    inp.val('');
                }
                fr.readAsDataURL(file);
            });

            editor.addButton( 'imageupload', {
                text:"画像",
                icon: false,
                title:"画像を挿入する",
                onclick: function(e) {
                    inp.trigger('click');
                }
            });
        }
  });
</script>
@endsection
