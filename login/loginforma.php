<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">

<section class="vh-100 d-flex justify-content-center align-items-center">
  <div class="card bg-dark text-white p-5" style="width: 420px; border-radius: 1rem;">

    <!-- LOGIN FORM -->
    <form action="model/login.php" method="post">
      <h2 class="fw-bold text-center mb-4">Login</h2>
      <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
      <input type="password" name="sifra" class="form-control mb-4" placeholder="Password" required>
      <button class="btn btn-outline-light w-100 mb-3" type="submit">Login</button>
    </form>

    <!-- BUTTON ZA REGISTRACIJU -->
    <button type="button" class="btn btn-outline-success w-100" data-bs-toggle="modal" data-bs-target="#registracijaModal">
      ➕ Registracija
    </button>

  </div>
</section>

<!-- REGISTRACIJA MODAL -->
<div class="modal fade" id="registracijaModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white rounded-4">

      <div class="modal-header border-0">
        <h5 class="modal-title">Registracija</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <!-- ALERT ZA PORUKE -->
        <div id="regAlert" class="alert d-none" role="alert"></div>

        <!-- FORM ZA REGISTRACIJU -->
        <form id="regForm">
          <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
          <input type="password" name="sifra" class="form-control mb-3" placeholder="Password" required>
          <button type="submit" class="btn btn-success w-100">Registruj se</button>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- AJAX REGISTRACIJA -->
<script>
document.getElementById("regForm").addEventListener("submit", function(e){
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch("model/registracija.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        const alertBox = document.getElementById("regAlert");
        alertBox.classList.remove("d-none", "alert-success", "alert-danger");

        if(data.status === "success"){
            alertBox.classList.add("alert-success");
            alertBox.textContent = data.message;

            // Zatvori modal posle 1s i redirect
            setTimeout(() => {
                const modalEl = document.getElementById('registracijaModal');
                const modal = bootstrap.Modal.getInstance(modalEl);
                modal.hide();
                window.location.href = "proizvodi.php";
            }, 1000);

        } else {
            alertBox.classList.add("alert-danger");
            alertBox.textContent = data.message;
        }
    })
    .catch(err => {
        const alertBox = document.getElementById("regAlert");
        alertBox.classList.remove("d-none", "alert-success");
        alertBox.classList.add("alert-danger");
        alertBox.textContent = "Greška prilikom registracije!";
    });
});
</script>

</body>
</html>
