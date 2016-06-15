<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Update setting</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-3.3.2/css/bootstrap.min.css">
</head>
<body style="margin : 0 auto !important;">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Data pengaturan</h1><hr/>
      <form method="post" action="update_setting_c/update_data" class="form-horizontal">

        <?php
          $nama = array('0' => "waktu lomba mulai", '1' => "waktu lomba selesai", '2' => "banyak soal SMA", '3' => "banyak soal SMP", '4' => "banyak soal SD", '5' => "waktu lomba", '6' => "header web", '7' => "tema web", '8' => "nilai benar", '9' => "nilai salah", '10' => "nilai tidak jawab");

        $i=-1;
        foreach ($lanjut as $row )
        {
          # code...
          $i=$i+1;
          echo "
          <div class='form-group'>
            <label class='control-label col-md-3' for='email'>".$nama[$i].":</label>
            <div class='col-sm-9'>
              <input type='text' class='form-control' placeholder='Masukkan data' value='".$row['value_setting']."'  name='".$row['attr_setting']."'>
            </div>
          </div>
          ";
        }
        ?>
        <button type="sumbit" class="btn btn-primary pull-right">EDIT</button>
      </form>
    </div>
  </div>

</body>
</html>
