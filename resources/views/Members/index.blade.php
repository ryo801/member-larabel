@extends('layouts.app')

@section('content')

<!-- メンバー登録用パネル... -->
<div class="panel-body">
   <!-- バリデーションエラーの表示 -->
   @include('common.errors')

   <!-- 新メンバーフォーム -->
   <!-- web.phpの23行目に繋がる/url('member')が POSTされる-->
   <form action="{{ url('member') }}" method="POST" class="form-horizontal">
       {{ csrf_field() }}

       <!-- メンバー名 -->
       <div class="form-group">
           <label for="member-name" class="col-sm-3 control-label">名前</label>

           <div class="col-sm-6">
               <input type="text" name="name" id="member-name" class="form-control">
           </div>
       </div>

       <!-- 電話番号 -->
       <div class="form-group">
           <label for="member-tel" class="col-sm-3 control-label">電話番号</label>

           <div class="col-sm-6">
               <input type="text" name="tel" id="member-tel" class="form-control">
           </div>
       </div>

        <!-- メールアドレス -->
        <div class="form-group">
           <label for="member-email" class="col-sm-3 control-label">メールアドレス</label>

           <div class="col-sm-6">
               <input type="text" name="email" id="member-email" class="form-control">
           </div>
       </div>

       <!-- 登録ボタン 違うページにおく-->
       <div class="form-group">
           <div class="col-sm-offset-3 col-sm-6">
               <button type="submit" class="btn btn-default">
                   <i class="fa fa-plus"></i> 登録
               </button>
           </div>
       </div>
   </form>
</div>

<!-- メンバー一覧表示 -->
@if (count($members) > 0)
<div class="panel panel-default">
   <div class="panel-heading">
       Current Members
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
                        <a href="{{ url('member/'.$member->id).'/edit' }}" class="btn btn-warning" >
                            <i class="fa fa-btn fa-trash"></i>編集
                        </a>
                       </form>
                   </td>
               </tr>
               @endforeach
           </tbody>
       </table>
   </div>
</div>
@endif
@endsection