<form action="{{ route('subscribe') }}" method="POST">
  @csrf

  <label for="email">Email Address:</label>
  <input type="email" id="email" name="email" required>

  <button type="submit">Subscribe</button>
</form>