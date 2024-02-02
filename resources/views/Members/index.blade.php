@extends('layouts.app')

@section('content')

<!-- メンバー一覧表示 -->
@if (count($members) > 0)
<div class="panel panel-default">
   <div class="panel-heading">
       Current Members
   </div>

   <div class="panel-body">
       <table class="table table-striped member-table">

           <!-- テーブルヘッダ -->
           <thead>
               <th>Member</th>
               <th>&nbsp;</th>
           </thead>

           <!-- テーブル本体 -->
           <tbody>
               @foreach ($members as $member)
               <tr>
                   <!-- タスク名 -->
                   <td class="table-text">
                       <div>{{ $member->name }}</div>
                   </td>

                   <td>
                       <!-- TODO: 削除ボタン -->
                   </td>
               </tr>
               @endforeach
           </tbody>
       </table>
   </div>
</div>
@endif
@endsection

