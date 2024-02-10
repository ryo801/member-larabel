<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{

    /**
     * メンバー一覧
     * index メソッドは、すべてのメンバーをデータベースから取得しmembers.index ビューに渡して表示している
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $members = Member::orderBy('created_at', 'asc')->get();
        return view('members.index', [
            'members' => $members,
        ]);
    }
    /**
       * メンバー登録画面
       * store メソッドは新しいメンバーをデータベースに作成。作成後は、メンバー一覧画面にリダイレクトする
       *
       * @param Request $request
       * @return Response
       */
      public function store(Request $request)
      {
          Member::create([
            'name'=>$request->name,
            'tel'=>$request->tel,
            'email'=>$request->email,
          ]);

          return redirect()->route('members');
      }

      /**
       * メンバー登録画面表示
       * create メソッドは新しいメンバーを作成するための入力フォームを提供するビューを表示する
       *
       * @param Request $request
       * @return Response
       */
      public function create(Request $request)
      {
        return view('members.create');
      }

    /**
       * メンバー編集画面
       * edit メソッドは指定されたメンバーの編集フォームをビューを表示する
       *
       * @param Request $request
       * @return Response
       */
      public function edit(Request $request,$id)
      {
        $member=Member::find($id);
        return view('members.edit',[
            'member' => $member,
        ]);
      }

    /**
       * メンバー更新画面
       * update メソッドは指定されたメンバーの情報を更新。更新後はメンバー一覧画面にリダイレクトする
       *
       * @param Request $request
       * @return Response
       */
      public function update(Request $request,$id)
      {
        $member=Member::find($id);
        $member->update([
          'name'=>$request->name,
          'tel'=>$request->tel,
          'email'=>$request->email,
        ]);
        return redirect() ->route('members');
      }

        /** 
         * メンバー削除
         * delete メソッドは指定されたメンバーを削除。削除後はメンバー一覧画面にリダイレクトする
         * 
         * @param Request $request
         * @param Member $member
         * @return Response
        */
        public function delete(Request $request, $id)
        {
            //Membersテーブルから指定のIDのレコード1件を取得
            $member=Member::find($id);
            //レコードを削除
            $member->delete();
            //削除したら一覧画面にリダイレクト
            return redirect()->route('members');
        }

}
