<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kalkulator Sederhana | UKK 2025</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <style type="text/css">
    body {
      background-color: rgba(143, 136, 139, 0.92); 
      background-image: url('logo.jpg'); 
      background-size: cover; 
      background-position: center; 
      background-repeat: no-repeat; 
    }

    .kalkulator {
      background: rgba(193, 218, 218, 0.88); 
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(232, 233, 211, 0.3);
    }

    .btn {
      width: 100%;
    }

    .logo {
      display: block;
      margin: 0 auto;
      width: 150px; 
      height: auto;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="text-center mb-4">
      <img src="images/kalkulator.png" alt="Logo" class="logo"> 
    </div>
    <h2 class="text-center text-white">KALKULATOR SEDERHANA</h2>
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="kalkulator">
          <form method="POST">
            <label class="form-label">Angka Pertama</label>
            <input type="text" name="angka1" class="form-control" autocomplete="off" autofocus required 
                   oninput="this.value = this.value.replace(/[^0-9,\.\-]/g, '').replace(',', '.',)"
                   value ="<?php echo isset($_POST['hasil']) ? $_POST['hasil'] : ''?>">

            <label class="form-label">Angka Kedua</label>
            <input type="text" name="angka2" class="form-control" required 
                   oninput="this.value = this.value.replace(/[^0-9,\.\-]/g, '').replace(',', '.')">

            <div class="d-flex justify-content-center gap-2 mt-2">
              <button type="submit" class="btn btn-primary" name="operator" value="+" title="Tambah"><i class="fas fa-plus"></i></button>
              <button type="submit" class="btn btn-info" name="operator" value="-" title="Kurang"><i class="fas fa-minus"></i></button>
              <button type="submit" class="btn btn-danger" name="operator" value="*" title="Kali"><i class="fas fa-times"></i></button>
              <button type="submit" class="btn btn-secondary" name="operator" value="/" title="Bagi"><i class="fas fa-divide"></i></button>
            </div>

            <div class="d-flex justify-content-center gap-2 mt-2">
              <button type="reset" name="reset" class="btn btn-dark" title="Clear Entry">CE</button>
            </div>
          </form>

          <div class="p-2 border rounded bg-light mt-2">
            <h4 class="text-center">
              <?php
                if (isset($_POST['operator'])) {
                  $angka1 = floatval(str_replace(',', '.', $_POST['angka1']));
                  $angka2 = floatval(str_replace(',', '.', $_POST['angka2']));
                  $operator = $_POST['operator'];

                  if (!is_numeric($angka1) || !is_numeric($angka2)) {
                    echo "<script>alert('Input harus berupa angka')</script>";
                  } elseif ($operator == '/' && $angka2 == 0) {
                    echo "<script>alert('Tidak dapat membagi dengan Nol')</script>";
                  } else {
                    switch ($operator) {
                      case '+': $hasil = $angka1 + $angka2; break;
                      case '-': $hasil = $angka1 - $angka2; break;
                      case '*': $hasil = $angka1 * $angka2; break;
                      case '/': $hasil = $angka1 / $angka2; break;
                      default: echo "Operator tidak valid"; break;
                    }
                    echo "$angka1 $operator $angka2 = $hasil";
                  }   
                } else {
                  echo "Hasil : ";
                }
              ?>
            </h4>

            <div class="row mt-3">
              <div class="col-6">
                <?php if (isset($hasil)) : ?>
                  <form method="POST">
                    <input type="hidden" name="hasil" value="<?php echo $hasil ?>">
                    <button type="submit" class="btn btn-warning" title="Memory Entry">ME</button>
                  </form>
                <?php endif; ?>
              </div>
              <div class="col-6">
                <?php if (isset($hasil)) : ?>
                  <form method="POST">
                    <button type="submit" name="resethasil" class="btn btn-info" title="Memory Clear">DELETE</button>
                  </form>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <p class="text-center text-white">&copy; UKK RPL 2025 | Sella Alovia | XII-PPLG</p>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
  </script>
</body>
</html>
