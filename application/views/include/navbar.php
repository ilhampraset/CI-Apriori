

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="">
				
			</a>
		</div>

		<p class="navbar-text">Anda login sebagai <?= $this->session->userdata('username') ?></p>



		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">

				
				<li class="dropdown ">
					<a href="<?= base_url('dashboar') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-cube fa-fw'></i> Dashboard <span class="caret"></span></a>
					
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-shopping-cart fa-fw'></i> Penjualan <span class="caret"></span></a>
					<ul class="dropdown-menu">
						
						<li><a href="<?= base_url('transaksi') ?>">Transaksi</a></li>
						
						<li><a href="">History Penjualan</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="">Data Pelanggan</a></li>
					</ul>
				</li>
				

				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-cube fa-fw'></i> Barang <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url('barang')?>">Data Barang</a></li>
					</ul>
				</li>

				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-cube fa-fw'></i> Apriori <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url('apriorir/test')?>">Apriori</a></li>
					</ul>
				</li>
								
				
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-user fa-fw'></i> <?= $this->session->userdata('username') ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="" id='GantiPass'>Ubah Password</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo base_url('auth/logout')?>"><i class='fa fa-sign-out fa-fw'></i> Log Out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

