<?php
session_start();
include "./connection.php";
if (isset($_GET['id'])) {
    $id = $_GET["id"];
    $delete = mysqli_query($connection, "DELETE FROM `dog` WHERE `id`='$id'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Up for adoption</title>
    <link rel="stylesheet" href="styling.css">
</head>

<body>
    <header id="menuContainer">
        <a href="mainpage.php">Home</a>
        <a class="active" href="adoptions.php">Up for adoption</a>
        <a href="addadoption.php">Add animal</a>
        <a href="about.php">About</a>
    </header>

    <div class="content">

        <h1>Up for adoption</h1>

        <input type="text" placeholder="Live Search by keyword..." id="search">
        <table id="adoptionsTable">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Age</th>
                <th>County</th>
                <th>Size</th>
                <th>Breed</th>
                <th>Contact</th>
                <th>Image</th>
            </tr>
            <?php
            include "./connection.php";

            $sql = "SELECT * from `dog`";

            $query = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td class='tdClass'><div class='tdContent'>" . $row[0] . "</div></td>";
                echo "<td class='tdClass'><div class='tdContent'>" . $row[1] . "</div></td>";

                if ($row[2] == 0)
                    echo "<td class='tdClass'><div class='tdContent'>younger than 1</div></td>";
                else if ($row[2] == 16)
                    echo "<td class='tdClass'><div class='tdContent'>older than 15</div></td>";
                else
                    echo "<td class='tdClass'><div class='tdContent'>" . $row[2] . "</div></td>";

                echo "<td class='tdClass'><div class='tdContent'>" . $row[3] . "</div></td>";

                if ($row[4] == 0)
                    echo "<td class='tdClass'><div class='tdContent'>Small</div></td>";
                else if ($row[4] == 1)
                    echo "<td class='tdClass'><div class='tdContent'>Medium</div></td>";
                else
                    echo "<td class='tdClass'><div class='tdContent'>Large</div></td>";

                echo "<td class='tdClass'><div class='tdContent'>" . $row[5] . "</div></td>";
                echo "<td class='tdClass'><div class='tdContent'>" . $row[7] . "</div></td>";
                echo "<td class='tdClass'><div class='tdContent'><img class='dogPics' src='./image/".$row[8]."'></div></td>";

                if ($_SESSION["isAdmin"] == 1) {
                    echo "<td>
                        <a href='adoptions.php?id=" . $row[6] . "' class='btn'>Delete</a>
                    </td>";
                }
                echo "</tr>";
            }

            ?>

        </table>
    </div>
    <footer>
        ® all rights reserverd
    </footer>

</body>
<script src="index.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $("#search").on("keyup", function() {
            var value = $(this).val();
            $("table tr").each(function(index) {

                if (index != 0) {
                    $row = $(this);

                    var id = $row.find("td:first").text();
                    var age = $row.find("td:nth-child(2)").text();
                    var desc = $row.find("td:nth-child(3)").text();
                    var county = $row.find("td:nth-child(4)").text();
                    var size = $row.find("td:nth-child(5)").text();
                    var breed = $row.find("td:nth-child(6)").text();

                    if (!id.includes(value) && !age.includes(value) && !desc.includes(value) && !county.includes(value) && !size.includes(value) && !breed.includes(value)) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                }
            });
        });
    });
</script>

</html>