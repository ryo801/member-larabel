<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->

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


<!-- メンバー編集用パネル... -->
<div class="panel-body">
   
<!--バリデーションエラーの表示-->
    @include('common.errors')
    
   <h1>会員編集 会員ID : {{$member->id}}</h1>

    <!--メンバー編集-->
    <form action="/member/update/{{$member->id}}" method="POST">

    <!--クロスサイトリクエストフォージェリ（CSRF）とは、Webアプリケーションに存在する脆弱性、
    もしくはその脆弱性を利用した攻撃方法のこと-->
    {{ csrf_field() }}

        <!--入力欄-->
        <!--入力欄 valueFromに入力された値-->
        <!--二重波括弧の中はPHP-->
        <input type="text" class="member-control" name="name" value="{{$member->name}}" placeholder="名前" maxlength="50" required autofocus><br>
        <input type="text" class="member-control" name="tel" value="{{$member->tel}}" placeholder="電話番号" maxlength="50" required><br>
        <input type="email" class="member-control" name="email" value="{{$member->email}}" placeholder="メールアドレス" maxlength="254" required><br>
        <button class="w-100 btn btn-lg" type="submit">編集</button><br>
    </form>
    
    <td>
        <form action="/member/delete/{{$member->id}}" method="POST">
          @csrf
        <button class="w-100 btn btn-lg" type="submit">削除</button>
        </form>
    </td>


        <p class="mt-3 mb-2">
        <a href="{{ url('members')}}">会員一覧画面へ</a></p>

</div>

</div>
