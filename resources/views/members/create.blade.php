<h1>WELCOME NEW MEMBER!</h1>
<form action="{{ route('members.store') }}" method="POST">
    @csrf
    <label for="member_number">Member Number:</label>
    <input type="text" name="member_number" id="member_number" required>
    <br><br>

    <label for="lname">Last Name:</label>
    <input type="text" name="lname" id="lname" required>
    <br><br>

    <label for="fname">First Name:</label>
    <input type="text" name="fname" id="fname" required>
    <br><br>

    <label for="mi">Middle Initial:</label>
    <input type="text" name="mi" id="mi" maxlength="3">
    <br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    <br><br>

    <label for="contactNumber">Contact Number:</label>
    <input type="text" name="contactNumber" id="contactNumber">
    <br><br>

    <button type="submit">Save Member</button>
</form>
