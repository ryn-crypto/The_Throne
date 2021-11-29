<div class="container-fluid mt-50">
    <div class="container">
        <div class="row">
            <div class="offset-sm-2 col-md-8 text-justify bg-dark pt-5">
                <h4 class="mb-0 mt-5 text-center">Isi Dengan<span class="text-main-1"> Sesuai</span></h4>
                    
                    <form action="<?= base_url('home/form/').$id ?>" method="post" class="nk-form text-white bg-dark">
                        <div class="form-group mt-10 mb-10">
                            <label for="game" class="text-danger">Game Terpilih</label>
                            <input type="text" class="form-control bg-dark rounded" id="game" name="game" value="<?= $dipilih['nama']?>" placeholder="Nama Game" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md form-group mt-10 mb-10">
                                <label for="idgame" class="text-danger">Id game</label>
                                <input type="text" class="form-control bg-secondary rounded" id="idgame" name="idgame" placeholder="Id Game">
                                <?= form_error('idgame', '<small class="text-warning pl-1">', '</small>') ?>
                            </div>
                            <div class="col-md form-group mt-10 mb-10">
                                <label for="idserver" class="text-danger">Id Server</label>
                                <input type="text" class="form-control bg-secondary rounded" id="idserver" name="idserver" placeholder="Id Server">
                                <?= form_error('idserver', '<small class="text-warning pl-1">', '</small>') ?>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-md form-group mt-10 mb-10">
                                <label for="tier" class="text-danger">Pilih tier Kamu</label>
                                <select class="form-control rounded bg-secondary" id="tier" name="tier">
                                    <option class="text-white">warrior1</option>
                                    <option class="text-white">warrior2</option>
                                    <option class="text-white">Warrior3</option>
                                    <option class="text-white">4</option>
                                    <option class="text-white">5</option>
                                </select>
                            </div>
                            <div class="col-md form-group mt-10 mb-10">
                                <label for="bintang" class="text-danger">Jumlah bintang di inginkan</label>
                                <select class="form-control rounded bg-secondary" id="bintang" name="bintang">
                                    <option class="text-white">1</option>
                                    <option class="text-white">2</option>
                                    <option class="text-white">3</option>
                                    <option class="text-white">4</option>
                                    <option class="text-white">5</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group mt-10 mb-10">
                            <label for="email" class="text-danger">Masukan Email</label>
                            <input type="text" class="form-control rounded" id="email" name="email" placeholder="Email">
                            <?= form_error('email', '<small class="text-warning pl-1">', '</small>') ?>
                        </div>

                        <button type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block mb-20">Lanjut memesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>