<?php
$page = "Reports";
include "./components/header.php";
?>


    <div class="pt-5 pb-5">
        <div class="container">
            <?php include "./components/userinfo.php"; ?>
            <!-- Content -->

            <div class="row mt-0 mt-md-4">
                <?php include "./components/navbar.php"; ?>
                <div class="col-lg-9 col-md-8 col-12">

                    <!-- Card -->
                    <div class="card mb-4">
                        <!-- Card header -->
                        <div class="card-header d-lg-flex justify-content-between align-items-center">
                            <div class="mb-3 mb-lg-0">
                                <h3 class="h4 mb-0">All Reports</h3>
                            </div>
                        </div>
                        <div class=card-body>
                            <!-- Table -->
                            <table class="table mb-0" id="allReports">
                                <!-- Table head -->
                                <thead class="table-light">
                                <tr>
                                    <th scope="col" class="border-0">S/N</th>
                                    <th scope="col" class="border-0">REPORT DATE</th>
                                    <th scope="col" class="border-0">REPORT REFERENCE</th>
                                    <th scope="col" class="border-0">STATUS</th>
                                    <th scope="col" class="border-0 text-end">ACTIONS</th>
                                </tr>
                                </thead>
                                <!-- Table body -->
                                <tbody>
                                <?php
                                $report_id = 1;
                                $select_query = "SELECT * FROM report WHERE staffID='".$_SESSION['id']."' ORDER BY reportDate ASC";
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
                                        echo "<td class='border-top-0'>" .$report_id. "</td>";
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
                                        echo "<td class=\"text-muted align-middle text-end border-top-0\">"
                                            ."<span class=\"dropdown dropstart\">
                                        <a class=\"text-muted text-decoration-none\" href=\"dashboard-instructor.html#\" role=\"button\" id=\"courseDropdown1\"
                                            data-bs-toggle=\"dropdown\" data-bs-offset=\"-20,20\" aria-expanded=\"false\">
                                            <i class=\"fe fe-more-vertical\"></i>
                                        </a>
                                        <span class=\"dropdown-menu\" aria-labelledby=\"courseDropdown1\">
                                            <span class=\"dropdown-header\">Actions </span>
                                            <a class=\"dropdown-item\" href=\"view-report?id=$id\"><i class=\"fe fe-eye dropdown-item-icon\"></i>View Report</a>
                                            <a class=\"dropdown-item\" href=\"request-support\"><i class=\"fe fe-edit dropdown-item-icon\"></i>Request Edit Report</a>
                                        </span>
                                    </span>".
                                            "</td>";
                                        "</tr>";
                                        $report_id++;
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