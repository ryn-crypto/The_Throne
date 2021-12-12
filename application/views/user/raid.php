  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 mt-2"><?= $title ?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    
    <section class="content">
      <div class="card m-3">
        <div class="card-header border-bottom border-info">
          <div class="col-11">
            <?= $this->session->flashdata('message') ?>
          </div>
          <h3 class="card-title">Pesanan dari customer</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered m-0">
              <thead>
                <tr class="text-center">
                  <th scope="col" style="width: 10px">No</th>
                  <th scope="col">No Pesanan</th>
                  <th scope="col">Nama Game</th>
                  <th scope="col">Tier</th>
                  <th scope="col">Level</th>
                  <th scope="col" style="width: 170px">Tindakan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>12345678910</td>
                  <td>Mobile Legend</td>
                  <td>Master</td>
                  <td>*1 s/d *5</td>
                  <td class="text-muted">
                    <a href="" class="btn btn-outline-info" type="button" data-toggle="modal" data-target="#rincian">rincian</a>
                    |
                    <a href="" class="btn btn-outline-warning">Raid</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="rincian" tabindex="-1" aria-labelledby="rincianLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="rincianLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
