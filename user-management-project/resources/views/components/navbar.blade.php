<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="/home" class="navbar-brand">User Management</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="/home" class="nav-item nav-link">Home</a>
                <a href="/allUsers" class="nav-item nav-link">All Users</a>
                <a href="/testForm" class="nav-item nav-link">Digital Signature</a>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="userProfile" class="btn btn-primary"><span><i class="fa-solid fa-circle-user"></i> User Profile</span></a>&nbsp;&nbsp;
                <button class="btn btn-primary" onclick="window.location = '{{ route('user.userlogout') }}'"><span><i class="fa-solid fa-right-from-bracket"></i> LogOut </span></button>
            </div>
        </div>
    </div>
</nav>


