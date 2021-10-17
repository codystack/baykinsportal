<?php
$page = "Queries";
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
                        <?php
                        if (isset($_SESSION['error_message'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-message text-center">
                                    <?php echo $_SESSION['error_message']; ?>
                                </div>
                            </div>
                            <meta http-equiv='refresh' content='3; URL=queries'>
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
                            <meta http-equiv='refresh' content='3; URL=queries'>
                            <?php
                            unset($_SESSION['success_message']);
                        }
                        ?>
                        <?php
                        $sql = "SELECT * FROM queries WHERE staffID='".$_SESSION['id']."'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {

                                ?>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card mb-4 shadow-lg">
                                        <a href="staff-query?id=<?php echo $row['id'];?>" class="card-img-top">
                                            <!-- Img  -->
                                            <img src="<?php echo $row['image'];?>" class="card-img-top rounded-top-md" alt=""></a>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <h3><a href="staff-query?id=<?php echo $row['id'];?>" class="text-inherit">
                                                    <?php echo $row['title'];?>
                                                </a>
                                            </h3>
                                            <?php echo substr_replace($row['question'], "...", 120); ?>
                                            <p class="mt-2">
                                                <a href="staff-query?id=<?php echo $row['id'];?>" class="text-inherit">
                                                    Respond to query <i class="fe fe-arrow-right nav-icon"></i>
                                                </a>
                                            </p>
                                            <!-- Media content -->
                                            <div class="row align-items-center g-0 mt-4">
                                                <div class="col-auto">
                                                    <img src="upload/news-icon.jpeg" alt="" class="rounded-circle avatar-sm me-2">
                                                </div>
                                                <div class="col lh-1">
                                                    <h5 class="mb-1">Staff Query</h5>
                                                </div>
                                                <div class="col-auto">
                                                    <p class="fs-6 mb-0"><?php
                                                        $queryDate = $row['queryDate'];
                                                        $date = strtotime($queryDate);
                                                        echo date('F j, Y', $date); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }else {
                            echo "<td>
                                     <div class='col-xl-12 col-lg-12 col-md-12 col-12 text-center mt-5'>
                                        <img src='assets/images/suggestions.png' width='212'>
                                        <h3 class='lead mt-3 display-5'>No Queries Yet!</h3>
                                     </div>
                                  </td>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->


<?php include "./components/footer.php"; ?>