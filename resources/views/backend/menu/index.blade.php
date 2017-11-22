@extends('backend.layouts.app')
@section('content')
<table width="960" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>

    <tr>
      <td class="col_1">■八幸 Website 管理画面　＞　メニュー</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="col_2"><strong>▼「新着情報」管理</strong></td>
    </tr>
    <tr>
      <td>　・<a href="{{route('backend.infos.index')}}">「新着情報」の新規登録／一覧／変更／削除</a></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>

  </tbody>
</table>
@endsection