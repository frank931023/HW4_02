<?php
namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // 顯示會員資料
    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', compact('member'));
    }
}
