<?php include_once "header.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Styles/index.css">
</head>
<body style="background-color: rgb(226 232 240);">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="../assets/images/img1.jpeg" style="height: 500px " class="  d-block img-thumbnail img-fluid w-100 " alt="...">
        </div>
        <div class="carousel-item">
        <img src="../assets/images/img2.jpeg" style="height: 500px" class=" img-fluid img-thumbnail d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="../assets/images/img3.jpeg" style="height: 500px" class=" img-fluid img-thumbnail d-block w-100 " alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    <div class="w-100 care-about-you">
        <p class="mx-auto">HealthCare - We care about you</p>
    </div>
    <div class="stats">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h2 class="counter-number" data-number ="1000">0+</h2>
                    <p>Patients Trusted Us</p>
                </div>
            </div>
        </div>
    </div>

    <script src="../scripts/index.js"></script>
</body>
</html>
