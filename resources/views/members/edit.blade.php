
    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Member Number:</label>
        <input type="text" name="member_number" value="{{ $member->member_number }}" required><br><br>

        <label>Last Name:</label>
        <input type="text" name="lname" value="{{ $member->lname }}" required><br><br>

        <label>First Name:</label>
        <input type="text" name="fname" value="{{ $member->fname }}" required><br><br>

        <label>Middle Initial:</label>
        <input type="text" name="mi" value="{{ $member->mi }}"><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $member->email }}"><br><br>

        <label>Contact Number:</label>
        <input type="text" name="contactNumber" value="{{ $member->contactNumber }}"><br><br>

        <button type="submit">Update Member</button>
    </form>
 