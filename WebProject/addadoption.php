<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add adoption</title>
    <link rel="stylesheet" href="styling.css">

</head>

<body>

    <header id="menuContainer">
        <a href="mainpage.php">Home</a>
        <a href="adoptions.php">Up for adoption</a>
        <a class="active" href="addadoption.php">Add animal</a>
        <a href="about.php">About</a>
    </header>
    <div class="content">
        <h1>Add animal</h1>
        <?php
            include "./connection.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
                $name = $_POST["lname"];
                $desc = $_POST["ldescription"];
                $age = $_POST["ageDropDown"] ?? null;
                $county = $_POST["countyDropDown"] ?? null;
                $size = $_POST["sizeDropDown"] ?? null;
                $breed = $_POST["breedDropDown"] ?? null;
                $email = $_POST["lemail"];
                $filename = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];
                $folder = "./image/" . $filename;
                
                if($county != null && $age != null &&  $size != null && $breed != null && move_uploaded_file($tempname, $folder)){
                    $sql = "INSERT INTO `dog` (`name`,`description`,`age`,`county`,`size`,`breed`,`email`,`filename`) VALUES ('$name','$desc','$age','$county','$size','$breed','$email','$filename')";
                    $query = mysqli_query($connection, $sql);
                    if ($query) {
                        echo '<script>alert("Successful!")</script>';
                        echo "<h3>  Image uploaded successfully!</h3>";
                    } else {
                        echo '<script>alert("Unsuccessful :(")</script>';
                    }
                }
                else{
                    echo '<script>alert("Unsuccessful :(")</script>';
                    echo "<h3>  Failed to upload image!</h3>";
                }
            }
            ?>
        <div class="adoptionForm">
            <form method="POST" enctype="multipart/form-data">
            <label for="lname">Name:</label>
            <input type="text" id="lname" name="lname"><br><br>
            <label for="ldescription">Description:</label>
            <textarea id="ldescription" name="ldescription"></textarea><br><br>
            <label for="lname">Email:</label>
            <input type="email" id="lemail" name="lemail"><br><br>
            <label for="lage">Age:</label>
            <select name="ageDropDown" id="ageDropDown">
                <option value="" disabled selected>Select age in years</option>
                <option value="0">younger than 1</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">older than 15</option>


            </select>

            <label for="lsearch">Search by county:</label><input type="text" id="input">
            <label for="lcounty">County:</label>
            <select name="countyDropDown" id="countyDropDown">
                <option value="" disabled selected>Select your option</option>
                <option value="alba">Alba</option>
                <option value="arad">Arad</option>
                <option value="arges">Arges</option>
                <option value="bacau">Bacau</option>
                <option value="bihor">Bihor</option>
                <option value="bistrita-nasaud">Bistrita-Nasaud</option>
                <option value="botosani">Botosani</option>
                <option value="brasov">Brasov</option>
                <option value="braila">Braila</option>
                <option value="bucuresti">Bucuresti</option>
                <option value="buzau">Buzau</option>
                <option value="caras-severin">Caras-Severin</option>
                <option value="calarasi">Calarasi</option>
                <option value="cluj">Cluj</option>

            </select>
            <br><br>
            <label for="lsize">Size:</label>
            <select name="sizeDropDown" id="sizeDropDown" onchange="dynamicDropdown(this,)">
                <option value="" disabled selected>Select your option</option>
                <option value="0">Small</option>
                <option value="1">Medium</option>
                <option value="2">Large</option>
            </select>

            <label for="lbreed">Breed:</label>
            <select name="breedDropDown" id="breedDropDown" disabled>
            </select>

            <label for="lpic">Picture:</label>
            <input type="file" name="uploadfile" />
            <div>
                <input type="submit" value="Add animal" name="submit">
            </div>
            </form>
        </div>
    </div>
    <footer>
        ® all rights reserverd
    </footer>

    <script src="index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function () {
            var opts = $('#countyDropDown option').map(function () {
                return [[this.value, $(this).text()]];
            });

            $('#input').keyup(function () {
                var rxp = new RegExp($('#input').val(), 'i');
                var optlist = $('#countyDropDown').empty();
                opts.each(function () {
                    if (rxp.test(this[1])) {
                        optlist.append($('<option/>').attr('value', this[0]).text(this[1]));
                    }
                });
            });
        });
    </script>
</body>

</html>