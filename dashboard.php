<?php
$page = "Dashboard";
include "./config/db.php";
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
                                <?php
                                    $countReports = mysqli_query($conn, "SELECT id FROM report WHERE staffID='".$_SESSION['id']."'");
                                    echo "<h2 class=\"h3 fw-bold mb-0 mt-3 lh-1\">".number_format(mysqli_num_rows($countReports), 0, '.', ',')."</h2>";
                                    ?>
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
                        <h3 class="h4 mb-0">Top 5 latest sales report</h3>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive border-0">
                        <table class="table mb-0">
                            <!-- Table head -->
                            <thead class="table-light">
                            <tr>
                                <th scope="col" class="border-0">REPORT DATE</th>
                                <th scope="col" class="border-0">REPORT REFERENCE</th>
                                <th scope="col" class="border-0">STATUS</th>
                                <th scope="col" class="border-0"></th>
                            </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                            <?php
                            $select_query = "SELECT * FROM report WHERE staffID='".$_SESSION['id']."' LIMIT 5";
                            $result = mysqli_query($conn, $select_query);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $staffID = $row['staffID'];
                                    $reportRef = $row['reportRef'];
                                    $reportDate = $row['reportDate'];
                                    $status = $row['status'];
                                    switch ($status) {
                                        case "Pending";
                                            $class  = 'bg-warning';
                                            break;
                                        case "Approved";
                                            $class  = 'bg-success';
                                            break;
                                        default:
                                            $class  = '';
                                    }
                            
                            echo "<tr>";
                                echo "<td class=\"align-middle border-top-0\">";
                                    echo "<a href=\"view-report?id=$id\">";
                                    echo "<div class=\"d-lg-flex align-items-center\">";
                                    echo "<img src='assets/images/svg/report.svg' class='rounded img-4by3-xs'>";
                                    echo "<h5 class=\"mb-0 ms-lg-3 mt-2 mt-lg-0 text-primary-hover\">"
                                                .date('d(D) M Y', strtotime($reportDate)).
                                            "</h5>";
                                        "</div>";
                                    "</a>";
                                "</td>";
                                echo "<td class=\"align-middle border-top-0\">" .$reportRef. "</td>";
                                echo "<td class=\"align-middle border-top-0\">" ."<span class='badge $class'> $status</span>". "</td>";
                                echo "<td class=\"text-muted align-middle border-top-0\">"
                                    ."<span class=\"dropdown dropstart\">
                                        <a class=\"text-muted text-decoration-none\" href=\"dashboard-instructor.html#\" role=\"button\" id=\"courseDropdown1\"
                                            data-bs-toggle=\"dropdown\" data-bs-offset=\"-20,20\" aria-expanded=\"false\">
                                            <i class=\"fe fe-more-vertical\"></i>
                                        </a>
                                        <span class=\"dropdown-menu\" aria-labelledby=\"courseDropdown1\">
                                            <span class=\"dropdown-header\">Actions </span>
                                            <a class=\"dropdown-item\" href=\"view-report?id=$id\"><i class=\"fe fe-eye dropdown-item-icon\"></i>View Report</a>
                                            <a class=\"dropdown-item\" href=\"edit-report?id=$id\"><i class=\"fe fe-edit dropdown-item-icon\"></i>Edit Report</a>
                                        </span>
                                    </span>".
                                "</td>";
                            "</tr>";

                                }
                            }else {
                                echo "<td><p>No Sales Report Yet!</p></td>";
                            }
                            ?>
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