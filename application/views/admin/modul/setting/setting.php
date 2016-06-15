<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pengaturan Lomba BLCC
            <small>Setting lomba</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form method="POST" action="Setting/update_data" class="form-horizontal">

<?php
          $nama = array(
            '0' => "waktu lomba mulai",
            '1' => "waktu lomba selesai",
            '2' => "banyak soal SMA",
            '3' => "banyak soal SMP",
            '4' => "banyak soal SD",
            '5' => "waktu lomba",
            '6' => "header web",
            '7' => "tema web",
            '8' => "nilai benar",
            '9' => "nilai salah",
            '10' => "nilai tidak jawab"
          );

        $i=-1;
        foreach ($lanjut as $row )
        {
          # code...
          $i=$i+1;
          echo "
          <div class='form-group'>
            <label class='control-label col-md-3'>".$nama[$i].":</label>
            <div class='col-sm-9'>
              <input type='text' class='form-control' placeholder='Masukkan data' value='".$row['value_setting']."'  name='".$row['attr_setting']."' />
            </div>
          </div>
          ";
        }
        ?>
        <input type="submit" class="btn btn-primary pull-right" value="OK" />
      </form>
    </div>
  </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->  