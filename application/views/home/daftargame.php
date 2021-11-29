<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h4 class="m-0 mt-30 text-center">Silahkan Pilih game</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        </div>
        <div class="card card-solid bg-transparent border-0">
            <div class="card-body mt-3">
                <div class="row">

                    <?php foreach ($daftar_game as $l) : ?>

                    <div class="col-6 col-md-3 d-flex align-items-stretch flex-column">
                        <a href="<?= base_url('home/form/').$l['id'] ?>">
                            <div class="card bg-transparent d-flex flex-fill border-0">
                                <div class="card-body">
                                    <img src="<?= base_url('assets/images/gamelist/') . $l['gambar'] ?>" class="img-fluid img-thumbnail">
                                    <p class="font-weight-bold text-center text-white pt-5"><?= $l['nama']; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <?php endforeach;?>

                </div>
            </div>
        </div>
    </section>
</div>