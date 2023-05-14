<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page 1</title>
</head>
<body>
    <form action="zad1page1.php" method="get">
        <label>Imie zamawiajacego</label>
        <input type="text" name="o_name">
        <label>Nazwisko zamawiajacego</label>
        <input type="text" name="o_surname">
        <label>Ilosc osob</label>
        <input type="number" name="num">
        <input type="submit" value="Submit">
        <a href="zad1page2.php">Nastepna strona</a>
    </form>
</body>
</html>

<?php
    session_start();
    $_SESSION["o_name"] = $_GET["o_name"];
    $_SESSION["o_surname"] = $_GET["o_surname"];
    $_SESSION["num"] = $_GET["num"];
?>