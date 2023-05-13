<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TripBoss</title>
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fonts -->
    <link rel="stylesheet" href="font/fonts.css">
    <!-- normalize css -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/utility.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/book.css">
</head>

<body>
<?php
include_once "./config/dbconnect.php";

if (isset($_POST['bookSubmit'])) {
    $name = $_POST['inputName'];
    // $email = $_POST['inputEmail'];
    $phone = $_POST['inputPhone'];
    $address = $_POST['inputAddr'];
    $whereTo = $_POST['inputWhereTo'];
    $numGuest = $_POST['inputNumGuest'];
    $arrivals = $_POST['inputArivals'];
    $leaving = $_POST['inputLeaving'];

    // Thực hiện câu truy vấn INSERT để thêm thông tin đặt chỗ vào cơ sở dữ liệu
    $insertQuery = "INSERT INTO booking (name, phone, address, whereTo, numberOfGuests, arrivalsDate, leavingDate) 
                    VALUES ('$name', '$phone', '$address', '$whereTo', '$numGuest', '$arrivals', '$leaving')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        echo "<script>alert('Successful booking')</script>";
        // Thực hiện các hành động khác sau khi đặt chỗ thành công
        // Ví dụ: chuyển hướng người dùng đến trang xác nhận đặt chỗ
        echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
    } else {
        echo "<script>alert('Reservation failed. Please try again.')</script>";
    }
}
?>

    <!-- header -->
    <header class="flex header-sm">
        <div class="container">
            <div class="header-title">
                <h1>Book Now</h1>
                <section class="booking">
                    <h1 class="heading-title">book your trip!</h1>
                    <form action="" method="post" class="booking-form">
                </section>

                <div class="tourBooking">
                    <div class="bookForm">
                        <div class="book1">
                            <div class="inputBox">
                                <span class="name-input">Name </span>
                                <input type="text" class="form-control name" name="inputName" placeholder="Enter your name">
                            </div>
                            <!-- <div class="inputBox">
                                <span class="name-input">Email </span>
                                <input type="email" class="form-control name" name="inputEmail" placeholder="Enter your email">
                            </div> -->
                            <div class="inputBox">
                                <span class="name-input">Phone </span>
                                <input type="phone" class="form-control name" name="inputPhone" placeholder="Enter your number">
                            </div>
                            <div class="inputBox">
                                <span class="name-input">Address </span>
                                <input type="text" class="form-control name" name="inputAddr" placeholder="Enter your address">
                            </div>
                            <div class="inputBox">
                                <span class="name-input">Where to </span>
                                <input type="text" class="form-control name" name="inputWhereTo" placeholder="Place you want to visit">
                            </div>
                        </div>
                        <div class="book2">
                            <div class="inputBox">
                                <span class="name-input">How many </span>
                                <input type="number" class="form-control name" name="inputNumGuest" placeholder="Number of guests">
                            </div>
                            <div class="inputBox">
                                <span class="name-input">Arrivals </span>
                                <input type="date" class="form-control name" name="inputArivals">
                            </div>
                            <div class="inputBox">
                                <span class="name-input">Leaving </span>
                                <input type="date" class="form-control name" name="inputLeaving">
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="bookSubmit" value="Submit" class="submitBtn" />
                </div>
            </div>
    </header>
    <!-- header -->

</body>

</html>