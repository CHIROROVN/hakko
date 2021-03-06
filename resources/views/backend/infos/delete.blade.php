
@extends('backend.layouts.app')

@section('content')

<table width="960" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
	<tr>
	  <td width="150%" class="col_1">■敷島堂 Website 管理画面　＞　「お知らせ」管理　＞　削除の確認</td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	</tr>
	<tr>
	  <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
		<tbody>
		  <tr>
			<td colspan="2" class="col_3">タイトル <span class="required">必須</span></td>
			<td>{{$info->info_title}}</td>
		  </tr>
		  <tr>
			<td colspan="2" class="col_3">情報登録日 <span class="required">必須</span></td>
			<td>{{japan_date($info->info_date)}}</td>
		  </tr>
		  <tr>
			<td colspan="2" class="col_3">サムネイル画像</td>
			<td>
			@if(empty($info->info_list_img))
			なし
			@else
			<a href="{{ asset('public') }}{{$info->info_list_img}}" target="_blank" title="">表示</a>
			@endif
			</td>
		  </tr>
		  <tr>
			<td colspan="2" class="col_3">TOP用文章</td>
			<td>{{$info->info_list_txt}}</td>
		  </tr>
		  <tr>
			<td colspan="2" class="col_3">お知らせカテゴリ</td>
			<td>{{ info_cat($info->info_cat) }}</td>
		  </tr>
		  <tr>
			<td colspan="2" class="col_3">タイプ</td>
			<td><table width="100%" border="0" cellspacing="0" cellpadding="3">
			  <tbody>
				<tr>
					@if($info->info_type == 1)
					<td>タイプ1：タイトルをクリックすると指定URLを表示</td>
					@elseif($info->info_type == 2)
					<td>タイプ2：タイトルをクリックすると指定ファイルを表示</td>
					@else
					<td>タイプ3：タイトルをクリックすると詳細ページを表示</td>
					@endif
				</tr>
			  </tbody>
			</table></td>
		  </tr>
		  @if($info->info_type == 1)
		  <tr>
			<td width="10%" class="col_3">タイプ1</td>
			<td width="15%" class="col_3">リンク先URL</td>
			<td>{{$info->info1_url}}</td>
		  </tr>
		  @elseif($info->info_type == 2)
		  <tr>
			<td width="10%" class="col_3">タイプ2</td>
			<td width="15%" class="col_3">表示ファイル</td>
			<td><a href="{{ asset('public') }}{{$info->info2_file}}" target="_blank" title="">画像ビュー</a></td>
		  </tr>
		  @else
		  <tr>
			<td width="10%" rowspan="16" class="col_3">タイプ3</td>
			<td width="15%" class="col_3">詳細</td>
			<td>{!! html_entity_decode($info->info3_contents) !!}</td>
		  </tr>
		  
		  <tr>
			<td width="15%" class="col_3">画像</td>
			<td>
			  @if(!empty($info->info3_img))
			  <a href="{{ asset('public') }}{{$info->info3_img}}" target="_blank" title="">画像ビュー</a>
			  @else
			  なし	  
			  @endif
			  </td>
		  </tr>		  

		  <tr>
			<td width="15%" class="col_3">ファイル</td>
			<td>
			  @if(!empty($info->info3_file))
			  <a href="{{ asset('public') }}{{$info->info3_file}}" target="_blank" title="">ファイルビュー</a>
			  @else
			  なし	  
			  @endif
			  </td>
		  </tr>
		  <tr>
			<td width="15%" class="col_3">ファイル名</td>
			<td>{{$info->info3_filename}}</td>
		  </tr>	  

		  @endif

		  <tr>
			<td colspan="2" class="col_3">表示／非表示</td>
			<td>
				@if($info->info_dspl_flag == 1)
				表示しない
				@else
				表示する
				@endif
			</td>
		  </tr>
		  <tr>
			<td colspan="2" class="col_3">TOP表示設定</td>
			<td>
				@if($info->info_top_flag == 1)
				常にTOPに表示する
				@else
				設定なし
				@endif
			</td>
		  </tr>

		  <tr>
			<td width="10%" rowspan="2" class="col_3">タイマー</td>
			<td width="15%" class="col_3">開始日時：</td>
			<td>{{dateJp($info->info_start)}}</td>
		  </tr>
		  <tr>
			<td width="15%" class="col_3">終了日時：</td>
			<td>{{dateJp($info->info_end)}}</td>
		  </tr>
		</tbody>
	  </table></td>
	</tr>
	<tr>
		<td align="center">
			<input type="button" id="btn-delete" onClick="location.href='{{route('backend.infos.delete_save', $info->info_id)}}'" value="削除する（確認済）">
			<input type="button" onclick="history.go(-1)" id="btn-back" value="戻る">
		</td>
	</tr>
	<tr>
	  <td align="center">&nbsp;</td>
	</tr>
	<tr>
	  <td align="center"><input type="button" onClick="location.href='{{route('backend.infos.index')}}'" value="投稿一覧に戻る"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	</tr>
  </tbody>
</table>

@endsection
