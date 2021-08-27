<?php
$page = "Reports";
include "./components/header.php";
?>

<!-- Page header-->
<div class="py-4 py-lg-6 bg-primary">
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                <div class="d-lg-flex align-items-center justify-content-between">
                    <!-- Content -->
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
<!-- Page Content -->
<div class="pb-12">
    <div class="container">
        <div id="courseForm" class="bs-stepper">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                    <!-- Stepper Button -->
                    <div class="bs-stepper-header shadow-sm" role="tablist">
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
                    <!-- Stepper content -->
                    <div class="bs-stepper-content mt-5">
                        <form onSubmit="return false">

                            <!-- Content one -->
                            <div id="test-l-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger1">
                                <!-- Card -->
                                <div class="card mb-3 ">
                                    <div class="card-header border-bottom px-4 py-3">
                                        <h4 class="mb-0">Part One</h4>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="mb-3" style="display: none">
                                            <label for="staffId" class="form-label">id</label>
                                            <input name="staffId" class="form-control" type="text" value="<?php echo $id; ?>" readonly/>
                                        </div>
                                        <div class="mb-3" style="display: none">
                                            <label for="staffName" class="form-label">Branch</label>
                                            <input name="staffName" class="form-control" type="text" value="<?php echo $branch; ?>" readonly/>
                                        </div>
                                        <div class="mb-3" style="display: none">
                                            <label for="staffName" class="form-label">Staff Name</label>
                                            <input name="staffName" class="form-control" type="text" value="<?php echo $firstName; ?> <?php echo $lastName; ?>" readonly/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Work Shift</label>
                                            <select class="selectpicker" name="workShift" data-width="100%">
                                                <option value="">Select shift</option>
                                                <option value="7am - 12pm">7am - 12pm</option>
                                                <option value="12pm - 5pm">12pm - 5pm</option>
                                                <option value="5pm - 10pm">5pm - 10pm</option>
                                                <option value="10pm - 6am">10pm - 6am</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="salesCash" class="form-label">Sales Cash</label>
                                            <input id="salesCash" class="form-control" type="number" placeholder="2000" />
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="fcmb">FCMB</label>
                                                <input type="text" name="fcmb" class="form-control" value="FCMB POS"  readonly>
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="fcmbAmount">FCMB Sales Amount</label>
                                                <input type="number" name="fcmbAmount" class="form-control" placeholder="12300">
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="firstBank">First Bank</label>
                                                <input type="text" name="firstBank" class="form-control" value="First Bank POS"  readonly>
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="firstBankAmount">First Bank Sales Amount</label>
                                                <input type="number" name="firstBankAmount" class="form-control" placeholder="1000">
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="diamondBank">Diamond Bank</label>
                                                <input type="text" name="diamondBank" class="form-control" value="Diamond Bank POS"  readonly>
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="diamondBankAmount">Diamond Bank Sales Amount</label>
                                                <input type="number" name="diamondBankAmount" class="form-control" placeholder="13900">
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="sterlingBank">Sterling Bank</label>
                                                <input type="text" name="sterlingBank" class="form-control" value="Sterling Bank POS"  readonly>
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="sterlingBankAmount">Sterling Bank Sales Amount</label>
                                                <input type="number" name="sterlingBankAmount" class="form-control" placeholder="16500">
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="zenithBank">Zenith Bank</label>
                                                <input type="text" name="zenithBank" class="form-control" value="Zenith Bank POS"  readonly>
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="zenithBankAmount">Zenith Bank Sales Amount</label>
                                                <input type="number" name="zenithBankAmount" class="form-control" placeholder="111300">
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="titanBank">Titan Bank</label>
                                                <input type="text" name="titanBank" class="form-control" value="Titan Bank POS"  readonly>
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="titanBankAmount">Titan Bank Sales Amount</label>
                                                <input type="number" name="titanBankAmount" class="form-control" placeholder="130800">
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="gtBank">GT Bank</label>
                                                <input type="text" name="gtBank" class="form-control" value="GT Bank POS"  readonly>
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="gtBankAmount">GT Bank Sales Amount</label>
                                                <input type="number" id="gtBankAmount" class="form-control" placeholder="2300">
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="others">Others</label>
                                                <input type="text" name="others" class="form-control" value="Others POS">
                                            </div>
                                            <div class="mb-3 col-12 col-md-3">
                                                <label class="form-label" for="others">Others Sales Amount</label>
                                                <input type="number" name="others" class="form-control" placeholder="34300">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button -->
                                <button class="btn btn-primary" onclick="courseForm.next()">
                                    Next
                                </button>
                            </div>

                            <!-- Content two -->
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
                                    <button class="btn btn-secondary" onclick="courseForm.previous()">
                                        Previous
                                    </button>
                                    <button class="btn btn-primary" onclick="courseForm.next()">
                                        Next
                                    </button>
                                </div>
                            </div>

                            <!-- Content four -->
                            <div id="test-l-3" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger3">
                                <!-- Card -->
                                <div class="card mb-3  border-0">
                                    <div class="card-header border-bottom px-4 py-3">
                                        <h4 class="mb-0">Comment</h4>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">User report</label>
                                            <div id="editor" name="comment">
                                                <p>Insert course description</p>
                                                <p>Some initial <strong>bold</strong> text</p>
                                                <p><br /></p>
                                            </div>
                                            <small>A brief summary of your report.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mb-22">
                                    <!-- Button -->
                                    <button class="btn btn-secondary mt-5" onclick="courseForm.previous()">
                                        Previous
                                    </button>
                                    <button type="submit" class="btn btn-danger mt-5">
                                        Submit For Review
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
    <?php }
}
?>

<!-- Modal -->
<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center d-flex">
                <h4 class="modal-title" id="paymentModalLabel">
                    Add New Payment Method
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div>
                    <!-- Form -->
                    <form class="row mb-4">
                        <div class="mb-3 col-12 col-md-12 mb-4">
                            <h5 class="mb-3">Credit / Debit card</h5>
                            <!-- Radio button -->
                            <div class="d-inline-flex">
                                <div class="form-check me-2">
                                    <input type="radio" id="paymentRadioOne" name="paymentRadioOne" class="form-check-input" />
                                    <label class="form-check-label" for="paymentRadioOne"><img
                                            src="assets/images/creditcard/americanexpress.svg" alt="" /></label>
                                </div>
                                <!-- Radio button -->
                                <div class="form-check me-2">
                                    <input type="radio" id="paymentRadioTwo" name="paymentRadioOne" class="form-check-input" />
                                    <label class="form-check-label" for="paymentRadioTwo"><img
                                            src="assets/images/creditcard/mastercard.svg" alt="" /></label>
                                </div>

                                <!-- Radio button -->
                                <div class="form-check">
                                    <input type="radio" id="paymentRadioFour" name="paymentRadioOne" class="form-check-input" />
                                    <label class="form-check-label" for="paymentRadioFour"><img src="assets/images/creditcard/visa.svg"
                                                                                                alt="" /></label>
                                </div>
                            </div>
                        </div>
                        <!-- Name on card -->
                        <div class="mb-3 col-12 col-md-4">
                            <label for="nameoncard" class="form-label">Name on card</label>
                            <input id="nameoncard" type="text" class="form-control" name="nameoncard" placeholder="Name" required />
                        </div>
                        <!-- Month -->
                        <div class="mb-3 col-12 col-md-4">
                            <label class="form-label">Month</label>
                            <select class="selectpicker" data-width="100%">
                                <option value="">Month</option>
                                <option value="Jan">Jan</option>
                                <option value="Feb">Feb</option>
                                <option value="Mar">Mar</option>
                                <option value="Apr">Apr</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="Aug">Aug</option>
                                <option value="Sep">Sep</option>
                                <option value="Oct">Oct</option>
                                <option value="Nov">Nov</option>
                                <option value="Dec">Dec</option>
                            </select>
                        </div>
                        <!-- Year -->
                        <div class="mb-3 col-12 col-md-4">
                            <label class="form-label">Year</label>
                            <select class="selectpicker" data-width="100%">
                                <option value="">Year</option>
                                <option value="June">2018</option>
                                <option value="July">2019</option>
                                <option value="August">2020</option>
                                <option value="Sep">2021</option>
                                <option value="Oct">2022</option>
                            </select>
                        </div>
                        <!-- Card number -->
                        <div class="mb-3 col-md-8 col-12">
                            <label for="cc-mask" class="form-label">Card Number</label>
                            <input type="text" class="form-control" id="cc-mask" data-inputmask="'mask': '9999 9999 9999 9999'" inputmode="numeric" placeholder="xxxx-xxxx-xxxx-xxxx" required />
                        </div>
                        <!-- CVV -->
                        <div class="mb-3 col-md-4 col-12">
                            <div class="mb-3">
                                <label for="cvv" class="form-label">CVV Code
                                    <i class="fas fa-question-circle ms-1" data-bs-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="A 3 - digit number, typically printed on the back of a card."></i></label>
                                <input type="password" class="form-control" name="cvv" id="cvv" placeholder="xxx" maxlength="3" inputmode="numeric" required />
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="col-md-6 col-12">
                            <button class="btn btn-primary" type="submit">
                                Add New Card
                            </button>
                            <button class="btn btn-outline-white" type="button" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>
                    <span><strong>Note:</strong> that you can later remove your card at
							the account setting page.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addSectionModal" tabindex="-1" role="dialog" aria-labelledby="addSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addSectionModalLabel">
                    Add New Section
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <input class="form-control mb-3" type="text" placeholder="Add new section" />
                <button class="btn btn-primary" type="Button">
                    Add New Section
                </button>
                <button class="btn btn-outline-white" data-bs-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addLectureModal" tabindex="-1" role="dialog" aria-labelledby="addLectureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addLectureModalLabel">
                    Add New Lecture
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <input class="form-control mb-3" type="text" placeholder="Add new lecture" />
                <button class="btn btn-primary" type="Button">
                    Add New Lecture
                </button>
                <button class="btn btn-outline-white" data-bs-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="newCatgory" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Create New Category
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="title">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Write a Category" id="title" required>
                        <small>Field must contain a unique value</small>
                    </div>
                    <div class="mb-3 mb-2">
                        <label class="form-label">Slug</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="slug">https://example.com</span>
                            </div>
                            <input type="text" class="form-control" id="basic-url" aria-describedby="slug" placeholder="designcourses" required>
                        </div>
                        <small>Field must contain a unique value</small>
                    </div>
                    <div class="mb-3 mb-2">
                        <label class="form-label">Parent</label>
                        <select class="selectpicker" data-width="100%">
                            <option value="">Select</option>
                            <option value="Course">Course</option>
                            <option value="Tutorial">Tutorial</option>
                            <option value="Workshop">Workshop</option>
                            <option value="Company">Company</option>
                        </select>
                    </div>
                    <div class="mb-3 mb-3">
                        <label class="form-label">Description</label>
                        <div id="editor">
                            <br>
                            <h4>One Ring to Rule Them All</h4>
                            <br>
                            <p>
                                Three Rings for the
                                <i> Elven-kingsunder</i> the sky,
                                <br> Seven for the
                                <u>Dwarf-lords</u> in halls of stone, Nine for Mortal Men,
                                <br> doomed to die, One for the Dark Lord on his dark throne.
                                <br> In the Land of Mordor where the Shadows lie.
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Enabled</label>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="customSwitch1" checked>
                            <label class="form-check-label" for="customSwitch1"></label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Add New Category</button>
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->


<!-- Course Modal -->
<div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header py-4 align-items-lg-center">
                <div class="d-lg-flex">
                    <div class="mb-3 mb-lg-0">
                        <img src="assets/images/svg/feature-icon-1.svg" alt="" class=" bg-primary icon-shape icon-xxl rounded-circle">
                    </div>
                    <div class="ms-lg-4">
                        <h2 class="fw-bold mb-md-1 mb-3">Introduction to JavaScript <span class="badge bg-warning ms-2">Free</span></h2>
                        <p class="text-uppercase fs-6 fw-semi-bold mb-0"><span class="text-dark">Courses -
                  1</span> <span class="ms-3">6 Lessons</span> <span class="ms-3">1 Hour 12 Min</span></p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <h3>In this course you’ll learn:</h3>
                <p class="fs-4">Vanilla JS is a fast, lightweight, cross-platform framework for building incredible, powerful JavaScript applications.</p>
                <ul class="list-group list-group-flush">
                    <!-- List group item -->
                    <li class="list-group-item ps-0">
                        <a href="add-course.html#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i
                                        class="mdi mdi-play fs-4"></i></span>
                                <span>Introduction</span>
                            </div>
                            <div class="text-truncate">
                                <span>1m 7s</span>
                            </div>
                        </a>
                    </li>
                    <!-- List group item -->
                    <li class="list-group-item ps-0">
                        <a href="add-course.html#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i
                                        class="mdi mdi-play fs-4"></i></span>
                                <span>Installing Development Software</span>
                            </div>
                            <div class="text-truncate">
                                <span>3m 11s</span>
                            </div>
                        </a>
                    </li>
                    <!-- List group item -->
                    <li class="list-group-item ps-0">
                        <a href="add-course.html#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i
                                        class="mdi mdi-play fs-4"></i></span>
                                <span>Hello World Project from GitHub</span>
                            </div>
                            <div class="text-truncate">
                                <span>2m 33s</span>
                            </div>
                        </a>
                    </li>
                    <!-- List group item -->
                    <li class="list-group-item ps-0">
                        <a href="add-course.html#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i
                                        class="mdi mdi-play fs-4"></i></span>
                                <span>Our Sample Javascript Files</span>
                            </div>
                            <div class="text-truncate">
                                <span>22m 30s</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- new chat modal-->


<!-- Modal -->
<div class="modal fade" id="newchatModal" tabindex="-1" role="dialog" aria-labelledby="newchatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
        <div class="modal-content ">
            <div class="modal-header align-items-center">
                <h4 class="mb-0" id="newchatModalLabel">Create New Chat</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body px-0">
                <!-- contact list -->
                <ul class="list-unstyled contacts-list mb-0">
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="add-course.html#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-away">
                                        <img src="assets/images/avatar/avatar-5.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Pete Martin</h5>
                                        <p class="mb-0 text-muted">On going description of group...
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">2/10/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="add-course.html#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-offline">
                                        <img src="assets/images/avatar/avatar-9.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Olivia Cooper</h5>
                                        <p class="mb-0 text-muted">On going description of group...
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">2/3/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="add-course.html#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-busy">
                                        <img src="assets/images/avatar/avatar-19.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Jamarcus Streich</h5>
                                        <p class="mb-0 text-muted">Start design system for UI.
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">1/24/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="add-course.html#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-busy">
                                        <img src="assets/images/avatar/avatar-12.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Lauren Wilson</h5>
                                        <p class="mb-0 text-muted">Start design system for UI...
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">3/3/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="add-course.html#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img src="assets/images/avatar/avatar-14.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">User Name</h5>
                                        <p class="mb-0 text-muted">On going description of group..
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">1/5/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="add-course.html#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img src="assets/images/avatar/avatar-15.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Rosalee Roberts</h5>
                                        <p class="mb-0 text-muted">On going description of group..
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">1/14/2021</small>
                            </div>
                        </div>


                    </li>



                </ul>
            </div>

        </div>
    </div>
</div>



<!-- add task -->


<!-- Modal -->
<div class="modal fade" id="taskModal" tabindex="-1" role="dialog"
     aria-labelledby="taskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskModalLabel">Create New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close">
                    <i class="fe fe-x-circle"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="row">
                    <div class="mb-2 col-12">
                        <label for="taskTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="taskTitle"
                               placeholder="Title" required>
                    </div>
                    <div class="col-6">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="selectpicker" data-width="100%" id="priority">
                            <option selected>Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>

                        </select>
                    </div>
                    <div class="mb-2 col-6">
                        <label for="date" class="form-label">Due Date</label>
                        <input class="form-control flatpickr" type="text"
                               placeholder="Select Date" id="date" required>
                    </div>
                    <div class="mb-2 col-12">
                        <label for="descriptions" class="form-label">Descriptions</label>
                        <textarea class="form-control" id="descriptions"
                                  rows="3" required></textarea>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="assignTo" class="form-label">Assign To</label>
                        <select class="selectpicker" id="assignTo" data-width="100%">
                            <option selected>Codescandy</option>
                            <option value="John Deo">John Deo</option>
                            <option value="Misty">Misty</option>
                            <option value="Simon Ray">Simon Ray</option>

                        </select>
                    </div>



                    <div class="col-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-outline-secondary
                            me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create
                            Task</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?php include "./components/footer.php"; ?>