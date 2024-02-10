@extends('layouts.app')

@section('content')

<!-- メンバー登録用パネル... -->
<div class="panel-body">
   
<!--バリデーションエラーの表示-->
    @include('common.errors')
    
   <h1>会員登録画面</h1>

    <!--新規メンバー登録-->
    <form action="/members/store" method="post">

    <!--クロスサイトリクエストフォージェリ（CSRF）とは、Webアプリケーションに存在する脆弱性、
    もしくはその脆弱性を利用した攻撃方法のこと-->
    {{ csrf_field() }}

        <!--入力欄　name属性が間違えてた-->
        <input type="text" class="member-control" name="name" placeholder="名前"maxlength="50" required autofocus><br>
        <input type="text" class="member-control" name="tel" placeholder="電話番号"maxlength="50" required><br>
        <input type="email" class="member-control" name="email" placeholder="メールアドレス" maxlength="254" required><br>
        <button class="w-100 btn btn-lg" type="submit">登録</button>
   

        <p class="mt-3 mb-2">
        <a href="{{ url('members') }}">会員一覧画面へ</a></p>


    </form>
</div>
