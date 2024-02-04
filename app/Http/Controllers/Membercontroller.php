<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{

    /**
     * メンバー一覧
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
       * メンバー登録
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
       * メンバー登録画面
       *
       * @param Request $request
       * @return Response
       */
      public function create(Request $request)
      {
        return view('members.create');
   
      }

        /** 
         * メンバー削除
         * 
         * @param Request $request
         * @param Member $member
         * @return Response
        */
        public function destroy(Request $request, Member $member)
        {

            $member->delete();
            return redirect(route('/members.index'));
        }

}
