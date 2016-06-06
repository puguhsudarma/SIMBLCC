# SIMBLCC
#### DESKRIPSI
SIMBLCC merupakan kepanjangan dari Sistem Informasi Manajemen Bali Logic And Computer Competition. BLCC merupakan lomba / kompetisi yang diadakan oleh jurusan Ilmu Komputer, Fakultas MIPA, Universitas Udayana. SIMBLCC menjadi projek tugas besar untuk matakuliah Pemrograman Berbasis Web (PBW) di jurusan Ilmu Komputer UNUD. Projek ini dikerjakan dalam kelompok dengan anggota 6 orang.

#### FRAMEWORK
Pengembangan sistem digunakan beberapa framework yang bersifat open source, hal ini bertujuan untuk mempercepat proses pengembangan sistem. Berikut adalah daftar framework dan libray yang digunakan, yaitu sebagai berikut :

1. [Codeigniter versi 3.](http://www.codeigniter.com/user_guide/)
2. [Bootstrap versi 3.](http://getbootstrap.com/)
3. [Bootstrap Datepicker](https://bootstrap-datepicker.readthedocs.io/en/latest/)
4. [AdminLTE](https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html)
5. [JQuery](http://api.jquery.com/)
6. html5shiv
7. respond
8. [Tinymce (WYSIWYG)](https://www.tinymce.com/docs/)
9. [HTML2PDF](http://html2pdf.fr/en/default)

#### DIREKTORI
Berikut adalah direktori dari sistem ini adalah sebagai berikut :

<pre>
SIMBLCC
|
|---application (direktori, yang akan dilakukan pengembangan sistem)
|---assets (direktori, yang berisi semua assets libray pendukung)
|---misc (direktori, yang berisi DB, dan file contributor)
    |
    |---CI Contributor
    |---DB (Database)
|---system (direktori, sistem framework CI3)
|---.htaccess (file, untuk htaccess apache php)
|---index.php (file, index dari web sistem)
|---README.md (file, markdown ini)
</pre>

#### FRAMEWORK CODEIGNITER 3
##### KONFIGURASI
Berikut adalah konfigurasi yang dilakukan untuk menyesuaikan komputer lokal, untuk pengembangan sistem, yaitu sebagai berikut :

1. Autoload
.. Autoload untuk mengaktifkan otomatis library, helper, dll dari framework CI3.

2. Config
.. Config untuk mengkonfigurasi framework CI3. Konfigurasi base_url sesuai dengan path server lokal masing - masing.

```php
//Default Configuration
$config['base_url'] = 'http://localhost/SIMBLCC/';
```

3. Database
.. Config untuk mengkonfigurasi koneksi database dengan framework CI3. Sesuaikan dengan settingan database pada masing - masing server, berikut adalah settingan default :

```php
'hostname' => 'localhost'
'username' => 'root'
'password' => ''
'database' => 'sim_blcc_penyisihan'
```

3. form_validation
.. Semua setting validasi form dimasukkan pada file ini. Untuk memanggil settingan validasi, digunakan array dengan penamaan asosiasi sebagai berikut :

```php
$config = array(
    'Class_Name/method_name' => array(
        array(
            'field' => 'nama field',
            'label' => 'nama label untuk error',
            'rules' => 'settingan aturan penulisan yang harus ditulis diform'
        ),
        
        array(
            'field' => 'nama field',
            'label' => 'nama label untuk error',
            'rules' => 'settingan aturan penulisan yang harus ditulis diform'
        ),
    ),
    
    'Class_Name/method_name' => array(
        array(
            'field' => 'nama field',
            'label' => 'nama label untuk error',
            'rules' => 'settingan aturan penulisan yang harus ditulis diform'
        ),
        
        array(
            'field' => 'nama field',
            'label' => 'nama label untuk error',
            'rules' => 'settingan aturan penulisan yang harus ditulis diform'
        )
    )
);
```

4. Route
.. Konfigurasi url untuk memanggil class controller dan method.
.. Autran penulisan sudah ada didalam file routes.php

##### CONTROLLER
Dibagi menjadi 3 use case actor, yaitu publik, peserta, admin. Untuk class publik berada langsung di direktori controller. Untuk peserta dan admin memiliki direktori masing - masing. Untuk pembuatan controller di extend berdasarkan masing - masing use case actor.

```php
//Publik
class Home extends Publik_Controller{
    //attributes and methods
}

//Admin
class Home extends Admin_Controller{
    //attributes and methods
}

//Peserta
class Home extends Peserta_Controller{
    //attributes and methods
}
```

##### MODEL
Untuk pembuatan model, di extends ke MY_Model untuk mendapatkan pewarisan model yang sudah dibuat dalam base class model.

```php
class Data_Rayon_Model extends MY_Model{
    //attributes and methods
}
```

##### VIEW
Untuk view sudah dibuatkan master template. Untuk publik dan peserta master template pada direktori view `Master_layout_view`. Untuk view admin, sudah ada master template admin, menggunakan template adminLTE di direktori `view/admin/Master_layout_view.php`. Untuk pembuatan view permodul, dibuatkan direktori pada masing - masing modul berdasarkan use case actor.

Untuk pembuatan modul `Data Rayon` untuk use case actor `Administrator`, maka dibuatkan direktori `view/admin/data_rayon/`. Didalam direktori tersebut berisi file view.

##### THIRD PARTY LIBRARY
Untuk Third party library dipasang pada direktori `application/third_party/`. Untuk penggunaan masih belum tahu caranya. Nanti kita cari tahu...

### AUTHOR AND CREDITS
*Author :* Reroet

*Credit Kelompok PBW :*

1. Reroet
2. adiprajaputra
3. iimasdiana
4. dindapradnya
5. Echie22
6. segarabayuputra

`End Of File`
