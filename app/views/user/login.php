<h2>Login</h2>

<?php if (!empty($error)): ?>
  <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<form action="/login" method="POST">
  <label>Email:</label>
  <input type="email" name="email" required><br><br>

  <label>Password:</label>
  <input type="password" name="password" required><br><br>

  <button type="submit">Login</button>
</form>