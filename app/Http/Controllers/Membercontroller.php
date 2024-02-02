<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;

class Membercontroller extends Controller
{
    /**
       * メンバー一覧
       *
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
}
