<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <form action="mysql.php" method="POST">

      <input type="text" name="ime" required/>
      <input type="number" name="cijena" required/>
      <input type="number" name="kolicina" required/>
      <input type="text" name="opis" required/>
      <input type="date" name="datumNabavke" required/>
      
      <button>Posalji</button>
    </form>
  </body>
</html>