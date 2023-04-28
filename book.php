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
    <!-- header -->
    <header class="flex header-sm">
        <div class="container">
            <div class="header-title">
                <h1>Book Now</h1>
                <section class="booking">
                    <h1 class="heading-title">book your trip!</h1>
                    <form action="./controller/booking.php" method="post" class="booking-form">
                </section>

                <div class="tourBooking">
                    <div class="bookForm">
                        <div class="book1">
                            <div class="inputBox">
                                <span class="name-input">Name </span>
                                <input type="text" class="form-control name" name="inputName" placeholder="Enter your name">
                            </div>
                            <div class="inputBox">
                                <span class="name-input">Email </span>
                                <input type="email" class="form-control name" name="inputEmail" placeholder="Enter your email">
                            </div>
                            <div class="inputBox">
                                <span class="name-input">Phone </span>
                                <input type="phone" class="form-control name" name="inputPhone" placeholder="Enter your number">
                            </div>
                            <div class="inputBox">
                                <span class="name-input">Address </span>
                                <input type="text" class="form-control name" name="inputAddr" placeholder="Enter your address">
                            </div>
                        </div>
                        <div class="book2">
                            <div class="inputBox">
                                <span class="name-input">Where to </span>
                                <input type="text" class="form-control name" name="inputWhereTo" placeholder="Place you want to visit">
                            </div>
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