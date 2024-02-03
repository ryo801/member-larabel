<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class Membercontroller extends Controller
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

          //メンバー登録
          Member::create([
            'name'=>$request->name,
            'tel'=>$request->tel,
            'email'=>$request->email,
          ]);

          return redirect('/members');
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
