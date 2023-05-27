<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="styling.css">
</head>

<body>
    <header id="menuContainer">
        <a href="mainpage.php">Home</a>
        <a href="adoptions.php">Up for adoption</a>
        <a href="addadoption.php">Add animal</a>
        <a class="active" href="about.php">About</a>
    </header>
    <div class="content">
        <h1>About</h1>

        <div>
            We are a non profit animal shelter.
            Our mission is to serve the people and animals by providing safe, temporary shelter and care for abandoned
            or
            otherwise homeless cats and dogs, and to reduce pet overpopulation by means of spay and neuter, education,
            and
            community outreach. We have been fulfilling our mission since 1975.
        </div>
        <div id="pictures">
            <ul id="picsList">

                <div class="picsDiv">
                    <li class="picturePopUp">
                        <a href="https://assets-global.website-files.com/5fce4d055c2d34363bd1d1b4/620196078c189523e74998de_New%20Logo.jpg" class="imgAnchor"><img
                                src="https://assets-global.website-files.com/5fce4d055c2d34363bd1d1b4/620196078c189523e74998de_New%20Logo.jpg"
                                class="picture">
                        </a>
                    </li>
                    <li class="picturePopUp">
                        <a href="https://www.cesarsway.com/wp-content/uploads/2015/11/You-to-the-rescue-Starting-your-own-shelter.jpg" class="imgAnchor"><img
                                src="https://www.cesarsway.com/wp-content/uploads/2015/11/You-to-the-rescue-Starting-your-own-shelter.jpg"
                                class="picture"></a>
                    </li>
                </div>
        </div>


        </ul>
        <div id="viewMoreButton">
            <input type="button" id="viewMore" value="View More" onclick="addPictures()">
        </div>

    </div>
    </div>
    <footer>
        ® all rights reserverd
    </footer>
    <script src="index.js"></script>
    <script src="index.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".picturePopUp a").click(function(event){
            var pop_img = $(this).attr("href");
            $("body").append('<div class="pop_img_wrap"><div class="pop_img"><img src="'+pop_img+'"></div></div>')
            $(".pop_img_wrap").addClass("active")
            $(".pop_img_wrap").click(function(event){
                $(".pop_img_wrap").addClass("deactive");
                $(".pop_img_wrap").remove();
            })
            $(".pop_img").click(function(event){
                return false;
            })
            return false;
        })
    </script>
</body>

</html>