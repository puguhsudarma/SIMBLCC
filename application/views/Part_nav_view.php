<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$logged_in){
	//publik
	echo "
		<nav class='navbar navbar-inverse'>
			<div class='container-fluid'>
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class='navbar-header'>
					<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
						<span class='sr-only'>Toggle navigation</span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
					</button>
					<a class='navbar-brand' href='#'>Publik</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
					<ul class='nav navbar-nav'>
						<li><a href='#'>Home</a></li>
						<li><a href='#'>Pengumuman</a></li>
						<li><a href='#'>Ketentuan Lomba</a></li>
						<li><a href='#'>Pendaftaran</a></li>
						<li><a href='#'>About</a></li>
					</ul>
					
					<ul class='nav navbar-nav navbar-right'>
						<li><a href='".site_url('publik/autentikasi')."'>Login</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	";
} else if($logged_in && $level === 1){
	//peserta
	if($verifikasi){
		//verifikasi
		echo "
			<nav class='navbar navbar-inverse'>
				<div class='container-fluid'>
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
							<span class='sr-only'>Toggle navigation</span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
						</button>
						<a class='navbar-brand' href='#'>Peserta</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
						<ul class='nav navbar-nav'>
							<li><a href='".site_url('peserta')."'>Home</a></li>
							<li><a href='#'>Pengumuman</a></li>
							<li><a href='#'>Ketentuan Lomba</a></li>
							<li><a href='#'>Tata Cara Lomba</a></li>
							<li><a href='#'>Latihan Lomba</a></li>
							<li><a href='".site_url('peserta/lomba')."'>Lomba</a></li>
						</ul>
						
						<ul class='nav navbar-nav navbar-right'>
							<li class='dropdown'>
								<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Hi, ".$nama_user." <span class='caret'></span></a>
								<ul class='dropdown-menu'>
									<li><a href='#'>Update Profil</a></li>
									<li role='separator' class='divider'></li>
									<li><a href='".site_url('publik/autentikasi/logout')."'>Logout</a></li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		";
	} else {
		//belum verifikasi
		echo "
			<nav class='navbar navbar-inverse'>
				<div class='container-fluid'>
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
							<span class='sr-only'>Toggle navigation</span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
						</button>
						<a class='navbar-brand' href='#'>Peserta</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
						<ul class='nav navbar-nav'>
							<li><a href='".site_url('peserta')."'>Home</a></li>
							<li><a href='#'>Verifikasi</a></li>
						</ul>
						
						<ul class='nav navbar-nav navbar-right'>
							<li class='dropdown'>
								<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Hi, ".$nama_user." <span class='caret'></span></a>
								<ul class='dropdown-menu'>
									<li><a href='".site_url('publik/autentikasi/logout')."'>Logout</a></li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		";
	}
}