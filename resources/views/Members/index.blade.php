@extends('layouts.app')

@section('content')
<head>
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>

   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   
   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<!--登録ボタン-->
<a href="/members/create" class="right-top">>> 登録</a>

<!-- メンバー一覧表示 -->
@if (count($members) > 0)
<div class="panel panel-default">
   <div class="panel-heading">
      <h1> 会員一覧画面</h1>
   </div>

   <div class="panel-body">
        <!-- テーブルを用意 -->
       <table class="table table-striped member-table">

           <!-- テーブルヘッダ -->
           <thead>
               <th>名前</th>
               <th>電話番号</th>
               <th>メールアドレス</th>
               <th>編集</th> 
           </thead>

           <!-- テーブル本体 -->
           <tbody>
               @foreach ($members as $member)
               <tr>
                   <!-- メンバー名 -->
                   <td class="table-text">
                       <div>{{ $member->name }}</div>
                   </td>

                   <!-- 電話番号 -->
                   <td class="table-text">
                       <div>{{ $member->tel }}</div>
                   </td>

                   <!-- メールアドレス -->
                   <td class="table-text">
                       <div>{{ $member->email }}</div>
                   </td>

                   <td>
                        <!-- 編集ボタン -->
                        <a href="{{ url('member/edit/'.$member->id) }}" class="btn btn-warning" >
                            <i class="fa fa-btn fa-trash"></i>>> 編集
                        </a>
                   </td>
               </tr>
               @endforeach
           </tbody>
       </table>
   </div>
</div>
@endif
@endsection