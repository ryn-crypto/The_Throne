<div class="contaier offset-sm-2 col-md-8 bg-white mt-10 mb-50">
<!-- title -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h2 class="text-dark mt-20 ml-20">Invoice</h2>
        </div>
      </div>
    </div>
  </section>

  <!-- content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">
          <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            Halaman ini bisa dicetak untuk pembayaran, dengan menekan tombol cetak yang ada di bawah.
            <p class="bg-danger rounded text-center">selesaikan pembayaran sebelum waktu habis</p>
          </div>

          <div class="invoice p-3 mb-3">
            <div class="row mb-3">
              <div class="col-12">
                <h4 class="text-dark">
                  <i class="fas fa-globe"></i> The Throne
                  <small class="float-right">Waktu Pesan: <?= date('d F Y', $faktur['waktu_order']); ?></small>
                </h4>
              </div>
            </div>
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                From
                <address>
                  <strong>The Throne</strong><br>
                  telfon: (804) 123-5432<br>
                  Email: admin@thethrone.co.id
                </address>
              </div>
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong><?= strtok($post['email'], '@'); ?></strong><br>
                  Email: <?= $post['email']; ?>
                </address>
              </div>
              <div class="col-sm-4 invoice-col">
                <b>Invoice No</b><br>
                <b>No Pemesanan :</b> <?= $faktur['no_pesanan']; ?><br>
                <b>Tenggat Bayar : </b>  <?= date("d F Y", strtotime("+1 days", $faktur['waktu_order'])); ?><br>
              </div>
            </div>
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Nama Game</th>
                    <th>Jumlah bintang</th>
                    <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><?= $post['game']; ?></td>
                    <td><?= $post['bintang']; ?></td>
                    <td>Rp.<?= $faktur['total']; ?>,00</td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          
            <div class="row">
              <div class="col-6">
                <p class="lead">Cara Pembayaran:</p>
                <div class="row">
                  <div class="col-md-3 col-6 mt-1">
                    <img src="<?= base_url('assets/')?>dist/img/credit/visa.png" alt="Visa">
                  </div>
                  <div class="col-md-3 col-6 mt-1">
                    <img src="<?= base_url('assets/')?>dist/img/credit/mastercard.png" alt="Mastercard">
                  </div>
                  <div class="col-md-3 col-6 mt-1">
                    <img src="<?= base_url('assets/')?>dist/img/credit/american-express.png" alt="American Express">
                  </div>
                  <div class="col-md-3 col-6 mt-1">
                    <img src="<?= base_url('assets/')?>dist/img/credit/paypal2.png" alt="Paypal">
                  </div>
                </div>
                

                <p class="text-muted well well-sm shadow-none text-justify mt-2 mr-3">
                  Silahkan melakukan pembayaran sebelum tenggat waktu habis, dengan menggunakan metode pembayaran yang sudah di sediakan.
                </p>
              </div>
              <div class="col-6">

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">PPn:</th>
                      <td>10%</td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td>Rp.<?= $faktur['total']+(10/100*$faktur['total']); ?>,00</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          
            <div class="row no-print">
              <div class="col-12">
                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit Payment
                </button>
                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                  <i class="fas fa-download"></i> Generate PDF
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>