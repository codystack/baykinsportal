<?php
$page = "News";
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
                        $sql = "SELECT * FROM news WHERE status='Published' order by dateCreated ASC ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {

                                ?>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                <!-- Card -->
                                <div class="card mb-4 shadow-lg">
                                    <a href="baykins-news?id=<?php echo $row['id'];?>" target="_blank" class="card-img-top">
                                        <!-- Img  -->
                                        <img src="<?php echo $row['image'];?>" class="card-img-top rounded-top-md" alt=""></a>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <h3><a href="baykins-news?id=<?php echo $row['id'];?>" target="_blank" class="text-inherit">
                                                <?php echo $row['title'];?>
                                            </a>
                                        </h3>
                                        <?php echo substr_replace($row['body'], "...", 120); ?>
                                        <p>
                                            <a href="baykins-news?id=<?php echo $row['id'];?>" target="_blank" class="text-inherit">
                                                Read More <i class="fe fe-arrow-right nav-icon"></i>
                                            </a>
                                        </p>
                                        <!-- Media content -->
                                        <div class="row align-items-center g-0 mt-4">
                                            <div class="col-auto">
                                                <img src="upload/news-icon.jpeg" alt="" class="rounded-circle avatar-sm me-2">
                                            </div>
                                            <div class="col lh-1">
                                                <h5 class="mb-1">Staff News</h5>
                                            </div>
                                            <div class="col-auto">
                                                <p class="fs-6 mb-0"><?php
                                                    $dateCreated = $row['dateCreated'];
                                                    $date = strtotime($dateCreated);
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
                                        <img src='assets/images/newspaper.png' width='212'>
                                        <h3 class='lead mt-3 display-5'>No News Yet!</h3>
                                     </div>
                                  </td>";
                        }
                        ?>
                        <!-- Buttom -->
                        <!--<div class="col-xl-12 col-lg-12 col-md-12 col-12 text-center mt-4">
                            <a href="blog.html#" class="btn btn-primary">
                                <div class="spinner-border spinner-border-sm me-2" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>Load More
                            </a>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->


<?php include "./components/footer.php"; ?>