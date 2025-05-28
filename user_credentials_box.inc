<!-- NOTE if using this you need to include the button such as signup/login -->
<label for="username">Username:</label>
<input type="text" name="username" required>

<br>

<label for="password">Password:</label>
<input type="password" name="password" required>

<!-- show label error if has contents, will be empty if no error, and thus not shown. html special char for security -->
<label>
    <?php if (isset($error)) echo htmlspecialchars($error); ?>
</label>
<br>