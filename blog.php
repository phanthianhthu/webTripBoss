<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TripBoss</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- font awesome cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- fonts -->
        <link rel = "stylesheet" href = "font/fonts.css">
        <!-- normalize css -->
        <link rel = "stylesheet" href = "css/normalize.css">
        <!-- custom css -->
        <link rel = "stylesheet" href = "css/utility.css">
        <link rel = "stylesheet" href = "css/style.css">
        <link rel = "stylesheet" href = "css/responsive.css">
    </head>
    <body>
        <!-- header -->
        <header class = "flex header-sm">
            <div class = "container">
                <div class = "header-title">
                    <h1>Blog</h1>
                    <p>Welcome to our blog! Here, we aim to provide you with informative and engaging content on a wide range of topics. Our blog is your go-to resource for inspiration, knowledge, and entertainment.</p>
                </div>
            </div>
        </header>
        <!-- header -->

        <!-- blog section -->
        <section id = "blog" class = "py-4">
            <div class = "container">
                <div class = "title-wrap">
                    <h2 class = "sm-title">read these blog for information</h2>
                    <h3 class = "lg-title">recent blog</h3>
                </div>

                <div class = "blog-row">
                <?php
                    include_once "./config/dbconnect.php";
                    $sql="SELECT * from blogs";
                    $result=$conn-> query($sql);
                    if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class = "blog-item my-2 shadow">
                        <div class = "blog-item-top">
                            <img src = './controller/uploads/<?php echo $row["blogImage"];?>'>
                            <span class = "blog-date"><?php echo $row["pubDate"];?></span>
                        </div>
                        <div class = "blog-item-bottom">
                            <span><?php echo $row["blogName"];?> | <?php echo $row["blogAuthor"];?></span>
                            <a href = "#"><?php echo $row["blogTitle"];?></a>
                            <p class = "text"><?php echo $row["blogsDesc"];?></p>
                        </div>
                    </div>

                    <!-- <div class = "blog-item my-2 shadow">
                        <div class = "blog-item-top">
                            <img src = "images/blog-7.jpg" alt = "blog">
                            <span class = "blog-date">oct 28, 2021</span>
                        </div>
                        <div class = "blog-item-bottom">
                            <span>travel | john doe</span>
                            <a href = "#">Lorem, ipsum dolor sit amet consectetur adipisicing elit?</a>
                            <p class = "text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio voluptatem nulla harum accusantium tempora dicta quas quod id, repellat temporibus illo libero explicabo laboriosam.</p>
                        </div>
                    </div>

                    <div class = "blog-item my-2 shadow">
                        <div class = "blog-item-top">
                            <img src = "images/blog-8.jpg" alt = "blog">
                            <span class = "blog-date">oct 28, 2021</span>
                        </div>
                        <div class = "blog-item-bottom">
                            <span>travel | john doe</span>
                            <a href = "#">Lorem, ipsum dolor sit amet consectetur adipisicing elit?</a>
                            <p class = "text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio voluptatem nulla harum accusantium tempora dicta quas quod id, repellat temporibus illo libero explicabo laboriosam.</p>
                        </div>
                    </div> -->
                <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- end of blog section -->
  

        <!-- js -->
        <script src = "js/script.js"></script>
        <script>
            
        </script>
    </body>
</html>