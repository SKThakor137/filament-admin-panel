<form method="POST" action="/set-password">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <label>Password</label>
    <input type="password" name="password" required>

    <label>Confirm Password</label>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Set Password</button>
</form>
    