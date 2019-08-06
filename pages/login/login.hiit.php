<div class="container">
    <div class="row">
        <form action="./auth/login" method="post">
            <div class="sys_message">
                <?= (isset($_SESSION['system_message'])) ? $_SESSION['system_message'] : '' ?>
                <?php unset($_SESSION['system_message']); ?>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <div class="clearFix">
                <a href="register">create an account! ?</a>
            </div>
            <button type="submit" class="btn btn-primary">login</button>
        </form>
    </div>
</div>
