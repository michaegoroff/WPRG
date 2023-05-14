<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 1</title>
</head>
<body>
<form action="zadanie1.php" method="post">
    <fieldset>
        <legend>Formularz kontaktowy</legend>
        <p>
        <label>Imię i nazwisko</label>
        <input type="text" name="name">
        </p>
        <p>
        <label>Adres e-mail</label>
        <input type="email" name="mail">
        </p>
        <p>
        <label>Telefon kontaktowy</label>
        <input type="tel" name="phone">
        </p>
        <p>
        <label>Wybierz temat</label>
        <select id="themes" name="themes">
            <option value="1">Temat 1</option>
            <option value="2">Temat 2</option>
            <option value="3">Temat 3</option>
        </select>
        </p>
        <p>
        <label type="text" name="mes">Treść wiadomości</label>
        <textarea name="mes">Wpisz treść wiadomości</textarea>
        </p>
        <p>Preferowana forma kontaktu:</p>
        <ul>
            <li>Telefon: <input type="checkbox" name="tick1" value="Telefon"></li>
            <li>Email: <input type="checkbox" name="tick2" value="Email"></li>
        </ul>
        <p>Posiadasz już stronę www?</p>
        <ul>
            <li>Telefon: <input type="checkbox" name="tick3" value="Tak"></li>
            <li>Email: <input type="checkbox" name="tick4" value="Nie"></li>
        </ul>
        <p>Załączniki</p>
        <p>
        <label>Wybierz plik:</label>
        <input type="file" name="file">
        </p>
        <p>
            <input type="submit" value="Wyślij">
        </p>
    </fieldset>
</form>
</body>
</html>

<?php
    echo "<ul>";
    echo "<li>" . $_POST["name"] . "</li>";
    echo "<li>" . $_POST["mail"] . "</li>";
    echo "<li>" . $_POST["phone"] . "</li>";
    echo "<li>" . $_POST["themes"] . "</li>";
    echo "<li>" . $_POST["mes"] . "</li>";
    echo "<li>" . $_POST["tick1"] . "</li>";;
    echo "<li>" . $_POST["tick2"] . "</li>";
    echo "<li>" . $_POST["tick3"] . "</li>";
    echo "<li>" . $_POST["tick4"] . "</li>";
    echo "<li>" . $_POST["file"] . "</li>";
    echo "</ul>";
    ?>