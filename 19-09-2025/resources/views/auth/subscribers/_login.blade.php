@php
$transparent = $transparent ?? false;
@endphp

<div class="login-box {{ $transparent ? 'transparent-login' : 'solid-login' }}">
  @if($errors->any())
  <div style="color: red;">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <h4>Login to Your Account</h4>
  <form method="POST" action="{{ url('subscriber/login') }}">
    @csrf
    <input type="hidden" name="back" value="{{ request()->query('back') }}">

    <div class="form-group">
      <input type="email" name="email" class="form-control" placeholder="Email address" required>
    </div>
    <div class="form-group">
      <input type="password" name="password" class="form-control" placeholder="Password" required>
    </div>

    <button type="submit" class="btn-submit">Login</button>

    <div class="text-link">
      <a href="{{ route('subscriber.password.request') }}">Forgot password?</a>
    </div>

    <hr>

    <div class="text-link">
      <span style="color: black;">Don't have an account?</span>
      <a href="{{ url('subscriber/register') }}">Sign Up</a>
    </div>
  </form>
</div>