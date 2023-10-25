<div class="header">
    <div class="logo-container">
        <img src="{{ asset('admins/images/favicon.png') }}" alt="" onclick="window.location.href = ('/dashboard');">
        <span class="text-white">KodeGo Academy</span>
        <div class="menu-toggle" id="menu-toggle">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
    <div class="user-dropdown">
        <div class="circle">
            @if(Auth::user()->profile_picture)
            <img src="{{ asset('storage/auth/images/profile_pictures/' . Auth::user()->profile_picture) }}" alt="User" id="user-image" onclick="toggleDropdown()">
            @else
            <img src="{{ asset('auth/images/profile.png') }}" alt="User" id="user-image" onclick="toggleDropdown()">
            @endif
        </div>

        <div class="dropdown-content" id="dropdown-content">
            <a href="#" data-toggle="modal" data-target="#changePasswordModal">
                <i class="fa-solid fa-lock"></i> Change pw
            </a>
            <a href="{{ route('logout') }}">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>
        </div>
    </div>
</div>


<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your change password form here -->
                <form>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>