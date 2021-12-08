
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
  <link rel="icon" type="image/png" href="<?= base_url()?>assets/dist/img/throneLogo.png">
</head>
<body>
<div class="wrapper m-5 border border-white">
  <!-- Main content -->
  <section class="invoice mt-5">
    <!-- title row -->
    <div class="row">
    <div class="col-12">
        <h2 class="page-header">
        <i class="fas fa-globe"></i> The Throne
        <small class="float-right"><?= date('d F Y'); ?></small>
        </h2>
    </div>
    <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info mt-5">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong>The Throne</strong><br>
                telfon: (804) 123-5432<br>
                Email: admin@thethrone.co.id
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        To
            <address>
                <strong><?= strtok($post['email'], '@'); ?></strong><br>
                Email: <?= $post['email']; ?>
            </address>
        </div>
    <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Invoice No</b><br>
            <b>No Pemesanan :</b> <?= $faktur['no_pesanan']; ?><br>
            <b>Tenggat Bayar : </b>  <?= date("d F Y", strtotime("+1 days", $faktur['waktu_order'])); ?><br>
        </div>
    <!-- /.col -->
    </div>
    
    <div class="row">
        <div class="col-12 table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
            <th>Nama Game</th>
            <th>Jumlah bintang</th>
            <th>Harga (satuan)</th>
            <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $post['game']; ?></td>
                    <td><?= $post['bintang']; ?></td>
                    <td>Rp. <?= number_format($select['harga'], 2, ",", ".") ?></td>
                    <td>Rp. <?= number_format($faktur['total'], 2, ",", "."); ?></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-6">
        <p class="lead">Cara Pembayaran:</p>
        <div class="row">
            <div class="col-md-1 col-6 mt-1 mr-2">
            <img src="<?= base_url('assets/')?>dist/img/credit/visa.png" alt="Visa">
            </div>
            <div class="col-md-1 col-6 mt-1 mr-2">
            <img src="<?= base_url('assets/')?>dist/img/credit/mastercard.png" alt="Mastercard">
            </div>
            <div class="col-md-1 col-6 mt-1 mr-2">
            <img src="<?= base_url('assets/')?>dist/img/credit/american-express.png" alt="American Express">
            </div>
            <div class="col-md-1 col-6 mt-1 mr-2">
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
                <td>Rp. <?= number_format($faktur['total']+(10/100*$faktur['total']), 2, ",", "."); ?> </td>
            </tr>
            </table>
        </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<script>
  window.addEventListener("load", window.print());
</script>

</body>
</html>
