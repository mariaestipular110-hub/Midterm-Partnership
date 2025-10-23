<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'member_number' => 'required|string|max:9|unique:members,member_number',
            'lname'         => 'required|string|max:150',
            'fname'         => 'required|string|max:150',
            'mi'            => 'nullable|string|max:3',
            'email'         => 'nullable|email|max:150',
            'contactNumber' => 'nullable|string|max:20',
        ]);

        Member::create($data);

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $data = $request->validate([
            'member_number' => 'required|string|max:9|unique:members,member_number,' . $member->id,
            'lname'         => 'required|string|max:150',
            'fname'         => 'required|string|max:150',
            'mi'            => 'nullable|string|max:3',
            'email'         => 'nullable|email|max:150',
            'contactNumber' => 'nullable|string|max:20',
        ]);

        $member->update($data);

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
