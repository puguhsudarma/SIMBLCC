<?php
switch($page){
	case 'dibuka' :
		echo '
			<div class="jumbotron">
				<h1>LOMBA TINGKAT PENYISIHAN</h1>
				<br />
				<div class="row">
					<div class="col-xs-3">
						<p><b>Tingkat Sekolah :</b></p>
					</div>
					<div class="col-xs-9 text-left">
						<p>'.$tingkatan.'</p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-3">
						<p><b>Tanggal Lomba :</b></p>
					</div>
					<div class="col-xs-9 text-left">
						<p>'.$tanggal_lomba.'</p>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-3">
						<p><b>Lama Waktu Lomba :</b></p>
					</div>
					<div class="col-xs-9 text-left">
						<p>'.$waktu_lomba.'</p>
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-xs-12">
						<form action="'.$link_mulai_lomba.'" method="POST">
						<input type="submit" class="btn btn-primary btn-lg col-xs-12" value="Mulai Lomba" name="tombol" />
						</form>
					</div>
				</div>
			</div>
		';
	break;

	case 'lomba' :
		$soal_dan_jawaban = '';
		$status_soal = '';
		$nomor_soal = 1;
		foreach($naskah_soal_jawaban as $soal){
			$soal_dan_jawaban .= '<p>'.$nomor_soal.'. '.$soal['teks_soal'].'</p>';
			$soal_dan_jawaban .= '<b>Jawaban : </b>';
			$soal_dan_jawaban .= '<select class="form-control" onChange="changeJawaban(this);" name="jawaban" data-soal="'.$soal['id_soal_peserta_tmp'].'">';
			$count_jawaban = 'A';
			foreach($soal['jawaban'] as $jawaban){
				//untuk jawaban -> tidak menjawab
				if($jawaban['id_jawaban_peserta_tmp'] == 0){
					if($soal['jawaban_peserta'] == 0){
						$soal_dan_jawaban .= '<option value="'.$jawaban['id_jawaban_peserta_tmp'].'" selected="selected">'.$jawaban['teks_jawaban'].'</option>';
					} else {
						$soal_dan_jawaban .= '<option value="'.$jawaban['id_jawaban_peserta_tmp'].'">'.$jawaban['teks_jawaban'].'</option>';
					}
					continue;
				}

				//untuk jawaban -> yang lainnya.
				if($jawaban['id_jawaban_peserta_tmp'] == $soal['jawaban_peserta']){
					$soal_dan_jawaban .= '<option value="'.$jawaban['id_jawaban_peserta_tmp'].'" selected="selected">'.$count_jawaban.'. '.$jawaban['teks_jawaban'].'</option>';
				} else {
					$soal_dan_jawaban .= '<option value="'.$jawaban['id_jawaban_peserta_tmp'].'">'.$count_jawaban.'. '.$jawaban['teks_jawaban'].'</option>';
				}
				$count_jawaban++;
			}
			$soal_dan_jawaban .= '</select>';
			$soal_dan_jawaban .= '<br />';

			if($soal['jawaban_peserta'] == 0){
				$status_soal .= '<div class="col-xs-2 col-xs-offset-1 alert alert-danger text-center status" id="'.$soal['id_soal_peserta_tmp'].'"><b>'.$nomor_soal.'</b></div>';
			} else {
				$status_soal .= '<div class="col-xs-2 col-xs-offset-1 alert alert-success text-center status" id="'.$soal['id_soal_peserta_tmp'].'"><b>'.$nomor_soal.'</b></div>';
			}
			$nomor_soal++;
		}

		echo '
			<div id="seconds_left" style="display:none">'.$seconds_left.'</div>
			<div id="link_submit" style="display:none">'.$link_submit.'</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="panel panel-primary">
						<div class="panel-heading">Naskah Soal</div>
						<div class="panel-body">
							<form class="form-horizontal" name="naskah_soal" action="'.$update_link.'" method="POST">
								'.$soal_dan_jawaban.'
							</form>
						</div>
					</div>

				</div>
				<div class="col-xs-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Status Soal Terjawab</div>
						<div class="panel-body">
							'.$status_soal.'
						</div>
					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">Waktu Countdown</div>
						<div class="panel-body">
							<h2 id="countdown"></h2>
						</div>
					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">Tombol Submit</div>
						<div class="panel-body">
							<button class="btn btn-primary btn-lg col-xs-12" name="submit">Submit Jawaban</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Konfirmasi Submit Jawaban</h4>
						</div>
						
						<div class="modal-body">
						<p>
							Pastikan anda memeriksa kembali jawaban anda, sebelum dilakukan proses submit.<br /><br />
							Setelah tombol submit ditekan, maka anda tidak bisa kembali ke halaman ini untuk mengubah jawaban anda.<br /><br />
							Terima Kasih.
						</p>
						</div>
						
						<div class="modal-footer">
							<form action="'.$link_submit.'" method="POST">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Periksa Kembali Jawaban</button>
								<input type="submit" class="btn btn-success" name="submit" value="Submit Jawaban" />
							</form>
						</div>
					</div>
				</div>
			</div>
		';
	break;
		
	case 'selesai' :
		echo '
			<div class="jumbotron">
			<h1>TERIMA KASIH</h1>
			<p>
				Anda sudah ikut serta dalam perlombaan BLCC tingkat penyisihan.
				Pengumuman pemenang akan dipublikasikan di bagian pengumuman.
				<br />
				Terima Kasih
			</p>
			</div>
		';
	break;

	case 'ditutup' :
		echo '
			<div class="jumbotron">
				<h1>LOMBA DITUTUP</h1>
				<p>
					Lomba berlangsung pada tanggal : <b>'.$mulai_lomba.'</b> s/d <b>'.$selesai_lomba.'</b>.
				</p>
			</div>
		';
	break;
}

