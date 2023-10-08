@include('components.Form._Formheader')

<div class="container">
    <div class="title text-center">
        <h1>Login</h1>
    </div>

    <div class="row justify-content-center">
        <form action="" method="POST" class="col-md-4">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <br>

            <div class="form-group">
                <a href="/registration">Click here if you dont have an account</a><br>
                <a href="#" id="forgot-password">Forgot password</a>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Login</button>
        </form>
    </div>
</div>

@include('components.Form._Formfooter')