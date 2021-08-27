<?php
$page = "Dashboard";
include "./components/header.php";
?>


<div class="pt-5 pb-5">
    <div class="container">
        <?php include "./components/userinfo.php"; ?>
        <!-- Content -->

        <div class="row mt-0 mt-md-4">
            <?php include "./components/navbar.php"; ?>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="p-3">
									<div class="d-flex mb-2">
                                        <span class="icon-shape icon-lg bg-light-primary me-2 text-dark-primary rounded-3">
                                            <i class="fe fe-dollar-sign"></i>
                                        </span>
                                        <h2 class="h3 fw-bold mb-0 mt-3 lh-1">₦3,210</h2>
                                    </div>
                                <p>Earning this month</p>
                                <div class="progress bg-light-primary" style="height: 2px">
                                    <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="p-3">
                                <div class="d-flex mb-2">
                                        <span class="icon-shape icon-lg bg-light-danger me-2 text-dark-danger rounded-3">
                                            <i class="fe fe-shopping-bag"></i>
                                        </span>
                                    <h2 class="h3 fw-bold mb-0 mt-3 lh-1">₦100,300,800.00</h2>
                                </div>
                                <p>Account Balance</p>
                                <div class="progress bg-light-danger" style="height: 2px">
                                    <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="p-3">
                                <div class="d-flex mb-2">
                                        <span class="icon-shape icon-lg bg-light-warning me-2 text-dark-warning rounded-3">
                                            <i class="fe fe-send"></i>
                                        </span>
                                    <h2 class="h3 fw-bold mb-0 mt-3 lh-1">₦10,800.00</h2>
                                </div>
                                <p>Total Report Sent</p>
                                <div class="progress bg-light-warning" style="height: 2px">
                                    <div class="progress-bar" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card header -->
                    <div class="card-header border-bottom-0">
                        <h3 class="h4 mb-0">Best Selling Courses</h3>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive border-0">
                        <table class="table mb-0">
                            <!-- Table head -->
                            <thead class="table-light">
                            <tr>
                                <th scope="col" class="border-0">COURSES</th>
                                <th scope="col" class="border-0">SALES</th>
                                <th scope="col" class="border-0">AMOUNT</th>
                                <th scope="col" class="border-0"></th>
                            </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                            <tr>
                                <td class="align-middle border-top-0">
                                    <a href="dashboard-instructor.html#">
                                        <div class="d-lg-flex align-items-center">
                                            <img src="assets/images/course/course-laravel.jpg" alt="" class="rounded img-4by3-lg" />
                                            <h5 class="mb-0 ms-lg-3 mt-2 mt-lg-0 text-primary-hover">
                                                Building Scalable APIs with GraphQL
                                            </h5>
                                        </div>
                                    </a>
                                </td>
                                <td class="align-middle border-top-0">34</td>
                                <td class="align-middle border-top-0">$3,145.23</td>
                                <td class="text-muted align-middle border-top-0">
											<span class="dropdown dropstart">
												<a class="text-muted text-decoration-none" href="dashboard-instructor.html#" role="button" id="courseDropdown1"
                                                   data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
													<i class="fe fe-more-vertical"></i>
												</a>
												<span class="dropdown-menu" aria-labelledby="courseDropdown1">
													<span class="dropdown-header">Setting </span>
													<a class="dropdown-item" href="dashboard-instructor.html#"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
													<a class="dropdown-item" href="dashboard-instructor.html#"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
												</span>
											</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <a href="dashboard-instructor.html#">
                                        <div class="d-lg-flex align-items-center">
                                            <img src="assets/images/course/course-sass.jpg" alt="" class="rounded img-4by3-lg" />
                                            <h5 class="mb-0 ms-lg-3 mt-2 mt-lg-0 text-primary-hover">
                                                HTML5 Web Front End Development
                                            </h5>
                                        </div>
                                    </a>
                                </td>
                                <td class="align-middle">30</td>
                                <td class="align-middle">$2,611.82</td>
                                <td class="text-muted align-middle">
											<span class="dropdown dropstart">
												<a class="text-muted text-decoration-none" href="dashboard-instructor.html#" role="button" id="courseDropdown2"
                                                   data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
													<i class="fe fe-more-vertical"></i>
												</a>
												<span class="dropdown-menu" aria-labelledby="courseDropdown2">
													<span class="dropdown-header">Setting </span>
													<a class="dropdown-item" href="dashboard-instructor.html#"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
													<a class="dropdown-item" href="dashboard-instructor.html#"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
												</span>
											</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <a href="dashboard-instructor.html#">
                                        <div class="d-lg-flex align-items-center">
                                            <img src="assets/images/course/course-vue.jpg" alt="" class="rounded img-4by3-lg" />
                                            <h5 class="mb-0 ms-lg-3 mt-2 mt-lg-0 text-primary-hover">
                                                Learn JavaScript Courses from Scratch
                                            </h5>
                                        </div>
                                    </a>
                                </td>
                                <td class="align-middle">26</td>
                                <td class="align-middle">$2,372.19</td>
                                <td class="text-muted align-middle">
											<span class="dropdown dropstart">
												<a class="text-muted text-decoration-none" href="dashboard-instructor.html#" role="button" id="courseDropdown3"
                                                   data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
													<i class="fe fe-more-vertical"></i>
												</a>
												<span class="dropdown-menu" aria-labelledby="courseDropdown3">
													<span class="dropdown-header">Setting </span>
													<a class="dropdown-item" href="dashboard-instructor.html#"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
													<a class="dropdown-item" href="dashboard-instructor.html#"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
												</span>
											</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle border-bottom-0">
                                    <a href="dashboard-instructor.html#">
                                        <div class="d-lg-flex align-items-center">
                                            <img src="assets/images/course/course-react.jpg" alt="" class="rounded img-4by3-lg" />
                                            <h5 class="mb-0 ms-lg-3 mt-2 mt-lg-0 text-primary-hover">
                                                Get Started: React Js Courses
                                            </h5>
                                        </div>
                                    </a>
                                </td>
                                <td class="align-middle border-bottom-0">20</td>
                                <td class="align-middle border-bottom-0">$1,145.23</td>
                                <td class="text-muted align-middle border-bottom-0">
											<span class="dropdown dropstart">
												<a class="text-muted text-decoration-none" href="dashboard-instructor.html#" role="button" id="courseDropdown4"
                                                   data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
													<i class="fe fe-more-vertical"></i>
												</a>
												<span class="dropdown-menu" aria-labelledby="courseDropdown4">
													<span class="dropdown-header">Setting </span>
													<a class="dropdown-item" href="dashboard-instructor.html#"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
													<a class="dropdown-item" href="dashboard-instructor.html#"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
												</span>
											</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->


<?php include "./components/footer.php"; ?>