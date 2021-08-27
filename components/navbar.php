<div class="col-lg-3 col-md-4 col-12">
    <!-- User profile -->
    <nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
        <!-- Menu -->
        <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="dashboard-instructor.html#">Menu</a>
        <!-- Button -->
        <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
                data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="fe fe-menu"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav">
            <div class="navbar-nav flex-column">
                <span class="navbar-header">Dashboard</span>
                <ul class="list-unstyled ms-n2 mb-4">
                    <!-- Nav item -->
                    <li class="nav-item <?php if($page=='Dashboard'){echo 'active';}?>">
                        <a class="nav-link" href="dashboard"><i class="fe fe-home nav-icon"></i>My
                            Dashboard</a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link" href="test"><i class="fe fe-book nav-icon"></i>Assessments</a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link" href="reports"><i class="fe fe-star nav-icon"></i>Reports</a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link" href="queries"><i
                                class="fe fe-pie-chart nav-icon"></i>Queries</a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link" href="news"><i
                                class="fe fe-shopping-bag nav-icon"></i>News</a>
                    </li>
                </ul>
                <!-- Navbar header -->
                <span class="navbar-header">Account Settings</span>
                <ul class="list-unstyled ms-n2 mb-0">
                    <!-- Nav item -->
                    <li class="nav-item <?php if($page=='Profile'){echo 'active';}?>">
                        <a class="nav-link" href="profile"><i class="fe fe-user nav-icon"></i>Profile</a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item <?php if($page=='Security'){echo 'active';}?>">
                        <a class="nav-link" href="security"><i class="fe fe-lock nav-icon"></i>Security</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout"><i class="fe fe-power nav-icon"></i>Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>