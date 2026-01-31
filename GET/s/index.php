<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
</head>
<body>
    <form method="GET" action="kalkulator.php">
        <input type="text" name="broj_1">
        <input type="text" name="broj_2">
       
        <select name="vrstaRacunice">
        <option value="Sabiranje">Sabiranje</option>
        <option value="Oduzimanje">Oduzimanje</option>
       </select>
        
       <button>Izracunaj</button>
    </form>
</body>
</html>