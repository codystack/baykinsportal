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
                        <i class="fe fe-trending-up"></i>
                    </span>
                    <?php
                    $balance = "SELECT
                        SUM(salesCash) as 'salesCash',
                        SUM(fcmbAmount) as 'fcmbAmount',
                        SUM(firstBankAmount) as 'firstBankAmount',
                        SUM(diamondBankAmount) as 'diamondBankAmount',
                        SUM(sterlingBankAmount) as 'sterlingBankAmount',
                        SUM(zenithBankAmount) as 'zenithBankAmount',
                        SUM(gtBankAmount) as 'gtBankAmount',
                        SUM(othersAmount) as 'othersAmount',
                        SUM(directTransferTitan) as 'directTransferTitan',
                        SUM(directTransferOthers) as 'directTransferOthers',
                        SUM(moneyTransferCash) as 'moneyTransferCash',
                        SUM(moneyTransferCharges) as 'moneyTransferCharges',
                        SUM(moneyTransferPos) as 'moneyTransferPos',
                       (SUM(salesCash) + SUM(fcmbAmount) + SUM(firstBankAmount) + SUM(diamondBankAmount) + SUM(sterlingBankAmount) + SUM(zenithBankAmount) + SUM(gtBankAmount) + SUM(othersAmount) + SUM(directTransferTitan) + SUM(directTransferOthers) + SUM(moneyTransferCash) + SUM(moneyTransferCharges) + SUM(moneyTransferPos)) as 'total'
                    FROM report";
                    foreach ($conn->query($balance) as $row) {
                    echo "<h2 class=\"h3 fw-bold mb-0 mt-3 lh-1\">"."₦".number_format($row['total'], 2, '.', ','). "</h2>";
                    }
                    ?>
                </div>
                <p>Total Revenue</p>
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