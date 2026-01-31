<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<form action="modeli/domaci.php" method="POST">
    <input type="text" name="email" placeholder="email" required>
    <input type="password" id="sifra" name="sifra" required>
    <button type="button" onclick="toggle()">👁️</button>
    <div>
    <button>Registruj me</button>
    </div>
</form>
<script>
function toggle() {
    let input = document.getElementById("sifra");
    input.type = (input.type === "password") ? "text" : "password";
}
</script>
</body>
</html>