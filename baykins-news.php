<?php
$page = "News";
include "./components/header.php";
?>
<!-- Page content -->
<div class="bg-white">

    <!-- Content -->
    <div class="py-4 py-lg-8 pb-14 ">
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM news WHERE id='$id' order by dateCreated ASC ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {

                ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-12 mb-2">
                    <div class="text-center mb-4">
                        <p class="fs-5 fw-semi-bold d-block mb-4 text-primary">Baykins News</p>
                        <h1 class="display-3 fw-bold mb-4"><?php echo $row['title'];?></h1>
                        <span class="mb-3 d-inline-block">4 min read</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Image -->
                <div class="col-xl-10 col-lg-10 col-md-12 col-12 mb-6 text-center">
                    <img src="<?php echo $row['image'];?>" alt="" class="img-fluid rounded-3">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-12 mb-2">
                    <!-- Descriptions -->
                    <div>
                        <div class="mb-4">
                            <?php echo $row['body'];?>
                        </div>
                    </div>

                    <!-- Media -->
                    <hr class="mt-8 mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div class="d-flex align-items-center">
                            <img src="upload/news-icon.jpeg" alt="" class="rounded-circle avatar-md">
                            <div class="ms-2 lh-1">
                                <h5 class="mb-1 ">Staff News</h5>
                                <span class="text-primary">Baykins MGT.</span>
                            </div>
                        </div>
                        <div>
                            <p class="fs-6 mb-0"><?php
                                $dateCreated = $row['dateCreated'];
                                $date = strtotime($dateCreated);
                                echo date('F j, Y', $date); ?>
                            </p>
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
                        <h3 class='lead mt-3 display-3'>No News Yet!</h3>
                     </div>
                  </td>";
        }
        ?>

    </div>

<?php include "./components/footer.php"; ?>