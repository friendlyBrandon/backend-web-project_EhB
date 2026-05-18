<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h1>Welcome back!</h1>

    @if($user)
        <p>Your Username: <strong>{{ $user->username }}</strong></p>
        <p>Your Email: <strong>{{ $user->email }}</strong></p>
        
        <!-- Optional: Show a logout button -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endif
</body>
</html>