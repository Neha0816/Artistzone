<?php
    require_once 'database1.php';

    $sql = "SELECT * FROM images LIMIT 9";
    $res = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Makeup Artist</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="style(M).css">
</head>

<body style="overflow: auto">


    <header id="myHeader">
    <a class="navbar-brand" href="#" style="padding: 28px 15px; color:  #fff !important;font-size: 25px;">ARTISTZONE</a>
        <div class="desktop-ss-menu container">
            <nav class="hdr-btn-right">
                <div class="nv-btn">
                    <span class="nv-btn-content ss-nv-login">
                        <a class="search" href="makeup.php">
                            <i class="fa fa-home"></i>
                            Home
                        </a>
                    </span>
                </div>
                <span class="nv-border-vertical">
                </span>
                <div class="nv-btn">
                    <span class="nv-btn-content ss-nv-login">
                        <a class="search" href="about.php">
                            <i class="fa fa-info-circle"></i>
                            About Us
                        </a>
                    </span>
                </div>
                <span class="nv-border-vertical">
                </span>
                <!-- <div class="nv-btn">
                    <span class="nv-btn-content ss-nv-search ">
                        <a class="search" href="register_make.php">
                            <i class="fa fa-user-circle"></i>
                            Sign Up
                        </a>
                    </span>
                </div>
                <span class="nv-border-vertical">
                </span> -->

                <!-- <div class="nv-btn">
                    <span class="nv-btn-content ss-nv-login">
                        <a class="search" href="login_make.php">
                            <i class="fa fa-heart"></i>
                            Login
                        </a>
                    </span>
                </div>
                <span class="nv-border-vertical">
                </span> -->
                <div class="nv-btn">
                    <span class="nv-btn-content ss-nv-login">
                        <a class="search" href="logout.php">
                            <i class="fa fa-heart"></i>
                            Logout
                        </a>
                    </span>
                </div>
                <span class="nv-border-vertical">
                </span>
            </nav>
        </div>

    </header>
    <!--Main conatiner-->
    <div class="main-container">
        <!--hero image-->
        <div class="hero-filter-panel lazy"
            style="background-image: url(https://images.shaadisaga.com/shaadisaga_production/vendor_listing_2019/my-mua-hero-img.jpg);">
            <div class="hero-filter-overlay">
                <div class="hero-filter-container">
                    <div class="hero-heading">
                        <h1 class="h1-size">Best Makeup Artist</h1>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    <div class="second-panel">
        <div class="container">
            <!--breadcrumb-->
            <nav aria-label="breadcrumb" class="phone-hide">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="makeup.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Makeup Artists
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">

                    </li>
                </ol>
            </nav>
        </div>

        <div class="container">
            <!--second section heading and description-->
            <h2 class="section-title servive-desc">Makeup Artsits</h2>
            <p class="service-description see-more-description">
                You must look your gorgeous-best on the happiest day of your life. The best makeup artists in Mumbai
                turn your dream look into reality. Below is the list of makeup artists in Mumbai, check them out! Both
                luxurious and pocket-ffriendly ones are listed. Book the artists now by login into your account.
            </p>
        </div>
    </div>
    <!--second panel end-->

    <div class="container">
        <?php
                $i = 0;
                while($row=mysqli_fetch_array($res)){
                    if($i % 3 ==0){
                        echo '<div class="row">';
                    }
        ?>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['img_name']; ?></h5>
                        <a href="makeup_booking.php"><button class="button button3">Book Appointment</button></a>
                    </div>
                </div>
            </div>
        <?php
                if($i % 3 == 2) {
                    echo '</div>';
                }
                $i++;
            }
            if($i % 3 != 0) {
                echo '</div>';
            }
        ?>
    </div>
    <?php
            
        include 'footer.php';
    ?>
</body>

</html>