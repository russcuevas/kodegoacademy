@include('components.Form._Formheader')

<div class="container">
    <div class="title text-center">
        <h1>Login</h1>
    </div>

    <div class="row justify-content-center">
        <form class="col-md-4 mt-5 loginRequest" action="{{ route('loginrequest') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <div class="password-input-wrapper">
                    <input type="password" class="form-control" id="password" name="password">
                    <span class="password-toggle" onclick="togglePasswordVisibility()">&#x1F441;</span>
                </div>
            </div>
            
            <br>

            <div class="form-group">
                <a href="/registration">Click here if you dont have an account</a><br>
            <a href="#" id="forgot-password-link" data-toggle="modal" data-target="#forgot-password-modal">Forgot password</a>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Login</button>
        </form>

        <div class="modal fade" id="forgot-password-modal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="forgotPasswordForm" action="{{ route('forgotpassword') }}" method="POST" class="forgotPasswordForm">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="text-black mb-2">Enter Email:</label>
                                <input type="email" class="form-control" id="forgot-email" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.Form._Formfooter')
