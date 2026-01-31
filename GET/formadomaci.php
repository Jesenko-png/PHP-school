<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kalkulator</title>
</head>
<body>
    <form action="domaci.php" method="GET">
        <div>
        <input type="text" name="cijena">
        </div>
<div>
    <select name="dodatno" id="">
        <option value="hrana">hrana</option>
        <option value="oprema">oprema</option>
    </select>
</div>
<div>
    <input type="checkbox" name="porez" id="porez">
    <label for="porez">Porez</label>
</div>
<button>
    Izracunaj
</button>
    </form>
</body>
</html>