SELECT 	ts.id_peserta,
	ts.id_soal_peserta_tmp,
	ts.id_soal,
	ts.teks_soal,
	ts.gambar_soal,
	ts.dummy_soal,
	
	tj.id_jawaban_peserta_tmp,
	tj.id_jawaban,
	tj.teks_jawaban,
	tj.gambar_jawaban,
	tj.benar_jawaban,
	tj.jawaban_peserta
	
FROM(
	SELECT * FROM sbc_soal_peserta_tmp AS spt
	LEFT JOIN sbc_soal AS s USING(id_soal)
) AS ts

LEFT JOIN (
	SELECT * FROM sbc_jawaban_peserta_tmp AS jpt
	LEFT JOIN sbc_jawaban AS j USING(id_jawaban)
) AS tj ON ts.id_soal = tj.id_soal_jawaban

WHERE ts.id_peserta = '0101077'

ORDER BY ts.id_soal_peserta_tmp ASC, tj.id_jawaban_peserta_tmp ASC;