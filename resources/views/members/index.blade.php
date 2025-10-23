@extends('layouts.app')
@section('content')

<h1>Members</h1>
<a href="{{ route('members.create') }}"><button>Add Member</button></a>
<br><br>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Member Number</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>MI</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->member_number }}</td>
                <td>{{ $member->lname }}</td>
                <td>{{ $member->fname }}</td>
                <td>{{ $member->mi }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->contactNumber }}</td>
                <td>
                    <a href="{{ route('members.edit', $member->id) }}"><button>Edit</button></a>

                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this member?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">No members found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
