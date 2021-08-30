<?php
$page = "Reports";
include "./components/header.php";
require_once "./auth/query.php";
?>


<div class="py-4 py-lg-6 bg-primary">
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                <div class="d-lg-flex align-items-center justify-content-between">
                    <div class="mb-4 mb-lg-0">
                        <h1 class="text-white mb-1">Add New Daily Sales Report</h1>
                        <p class="mb-0 text-white lead">
                            Fill the form with correct details.
                        </p>
                    </div>
                    <div>
                        <button class="btn btn-white" onclick="goBack()">Go Back</button>
                        <button type="submit" class="btn btn-dark" name="send_report_btn">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_SESSION['id'];
$select_query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."'";
$result = mysqli_query($conn, $select_query);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $branch = $row['branch'];
        $badge = $row['badge'];
        $email = $row['email'];
?>

<div class="pb-12">
    <div class="container">
        <div id="courseForm" class="bs-stepper">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                    <!-- Stepper Button -->
                    <div class="bs-stepper-header shadow-sm mb-2" role="tablist">
                        <div class="step" data-target="#test-l-1">
                            <button type="button" class="step-trigger" role="tab" id="courseFormtrigger1" aria-controls="test-l-1">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Part One</span>
                            </button>
                        </div>
                        <div class="bs-stepper-line"></div>
                        <div class="step" data-target="#test-l-2">
                            <button type="button" class="step-trigger" role="tab" id="courseFormtrigger2" aria-controls="test-l-2">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Part Two</span>
                            </button>
                        </div>
                        <div class="bs-stepper-line"></div>
                        <div class="step" data-target="#test-l-3">
                            <button type="button" class="step-trigger" role="tab" id="courseFormtrigger3" aria-controls="test-l-3">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">Comment</span>
                            </button>
                        </div>
                    </div>
                    <?php
                        if (isset($_SESSION['error_message'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-message text-center">
                                    <?php echo $_SESSION['error_message']; ?>
                                </div>
                            </div>
                            <?php
                            unset($_SESSION['error_message']);
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['success_message'])) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                <div class="alert-message text-center">
                                    <?php echo $_SESSION['success_message']; ?>
                                </div>
                            </div>
                            <?php
                            unset($_SESSION['success_message']);
                        }
                        ?>
                    <!-- Stepper content -->
                    <div class="bs-stepper-content mt-3">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">

                            <div id="test-l-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger1">
                                <!-- Card -->
                                <div class="card mb-3 ">
                                    <div class="card-header border-bottom px-4 py-3">
                                        <h4 class="mb-0">Part One</h4>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="mb-3" style="display: none">
                                            <label for="staffID" class="form-label">id</label>
                                            <input name="staffID" class="form-control" type="text" value="<?php echo $id; ?>" readonly/>
                                        </div>
                                        <div class="mb-3" style="display: none">
                                            <label for="branch" class="form-label">Branch</label>
                                            <input name="branch" class="form-control" type="text" value="<?php echo $branch; ?>" readonly/>
                                        </div>
                                        <div class="mb-3" style="display: none">
                                            <label for="staffName" class="form-label">Staff Name</label>
                                            <input name="staffName" class="form-control" type="text" value="<?php echo $firstName; ?> <?php echo $lastName; ?>" readonly/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Work Shift</label>
                                            <select class="selectpicker" name="workShift" data-width="100%">
                                                <option value="">Select shift</option>
                                                <option value="7am - 5pm">7am - 5pm</option>
                                                <option value="2pm - 10pm">2pm - 10pm</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="salesCash" class="form-label">Sales Cash</label>
                                            <input name="salesCash" class="form-control" type="number" placeholder="2000" />
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-12 col-md-4">
                                                <label class="form-label" for="fcmbAmount">FCMB POS Sales Amount</label>
                                                <input type="number" name="fcmbAmount" class="form-control" placeholder="12300">
                                            </div>
                                            <div class="mb-3 col-12 col-md-4">
                                                <label class="form-label" for="firstBankAmount">First Bank POS Sales Amount</label>
                                                <input type="number" name="firstBankAmount" class="form-control" placeholder="1000">
                                            </div>
                                            <div class="mb-3 col-12 col-md-4">
                                                <label class="form-label" for="diamondBankAmount">Diamond Bank POS Sales Amount</label>
                                                <input type="number" name="diamondBankAmount" class="form-control" placeholder="13900">
                                            </div>
                                            <div class="mb-3 col-12 col-md-4">
                                                <label class="form-label" for="sterlingBankAmount">Sterling Bank POS Sales Amount</label>
                                                <input type="number" name="sterlingBankAmount" class="form-control" placeholder="16500">
                                            </div>
                                            <div class="mb-3 col-12 col-md-4">
                                                <label class="form-label" for="zenithBankAmount">Zenith Bank Sales POS Amount</label>
                                                <input type="number" name="zenithBankAmount" class="form-control" placeholder="111300">
                                            </div>
                                            <div class="mb-3 col-12 col-md-4">
                                                <label class="form-label" for="titanBankAmount">Titan Bank Sales POS Amount</label>
                                                <input type="number" name="titanBankAmount" class="form-control" placeholder="130800">
                                            </div>
                                            <div class="mb-3 col-12 col-md-4">
                                                <label class="form-label" for="gtBankAmount">GT Bank Sales POS Amount</label>
                                                <input type="number" name="gtBankAmount" class="form-control" placeholder="2300">
                                            </div>
                                            <div class="mb-3 col-12 col-md-4">
                                                <label class="form-label" for="others">Others POS Sales Amount</label>
                                                <input type="number" name="othersAmount" class="form-control" placeholder="34300">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button -->
                                <button type="button" class="btn btn-primary" onclick="courseForm.next()">
                                    Next
                                </button>
                            </div>

                            <div id="test-l-2" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger2">
                                <!-- Card -->
                                <div class="card mb-3  border-0">
                                    <div class="card-header border-bottom px-4 py-3">
                                        <h4 class="mb-0">Part Two</h4>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-12 col-md-6">
                                                <label for="creditSales" class="form-label">Credit Sales</label>
                                                <input name="creditSales" class="form-control" type="number" placeholder="19850"/>
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="directTransferTitan">Direct Transfer(Titan)</label>
                                                <input type="number" name="directTransferTitan" class="form-control" placeholder="23700">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="directTransferOthers">Direct Transfer(Others)</label>
                                                <input type="number" name="directTransferOthers" class="form-control" placeholder="18094">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="moneyTransferCash">Money Transfer Cash</label>
                                                <input type="number" name="moneyTransferCash" class="form-control" placeholder="17094">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="moneyTransferCharges">Money Transfer Charges</label>
                                                <input type="number" name="moneyTransferCharges" class="form-control" placeholder="194">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="moneyTransferPos">Money Transfer POS</label>
                                                <input type="number" name="moneyTransferPos" class="form-control" placeholder="2000">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="voucherNetCash">Voucher Net Cash</label>
                                                <input type="number" name="voucherNetCash" class="form-control" placeholder="3000">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="voucherNetPos">Voucher Net POS</label>
                                                <input type="number" name="voucherNetPos" class="form-control" placeholder="76000">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="changeOwed">Change Owed</label>
                                                <input type="number" name="changeOwed" class="form-control" placeholder="200">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="changeGivenOut">Change Given Out</label>
                                                <input type="number" name="changeGivenOut" class="form-control" placeholder="150">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="cashPaidOut">Cash Paid Out</label>
                                                <input type="number" name="cashPaidOut" class="form-control" placeholder="250">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="cashBalance">Cash Balance</label>
                                                <input type="number" name="cashBalance" class="form-control" placeholder="500">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-secondary" type="button" onclick="courseForm.previous()">
                                        Previous
                                    </button>
                                    <button class="btn btn-primary" type="button" onclick="courseForm.next()">
                                        Next
                                    </button>
                                </div>
                            </div>

                            <div id="test-l-3" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger3">
                              
                                <div class="card mb-3  border-0">
                                    <div class="card-header border-bottom px-4 py-3">
                                        <h4 class="mb-0">Comment</h4>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">User report</label>
                                            <textarea rows="3" class="form-control" name="staffComment" placeholder="A brief summary of your report."></textarea>
                                            <small>A brief summary of your report.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mb-22">
                                    
                                    <button class="btn btn-secondary mt-5" type="button" onclick="courseForm.previous()">
                                        Previous
                                    </button>

                                    <button type="submit" name="send_report_btn" class="btn btn-danger mt-5">
                                        Submit Report
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    }
}
?>

<?php include "./components/footer.php"; ?>