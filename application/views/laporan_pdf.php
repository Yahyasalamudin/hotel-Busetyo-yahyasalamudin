<!DOCTYPE html>
<html lang="en">

<head>
      <title>Document</title>
      <style>
            table {
                  box-shadow: 0px 0px 5px #aaa;
                  width: 100%;
            }

            /*sedikit bayangan yang soft*/
            table th {
                  padding: 8px;
                  font-weight: 400;
                  /* background: #33B4E4; */
                  /* color: #fff; */
                  text-transform: uppercase;
            }

            table td {
                  padding: 10px 5px;
                  text-align: center;
            }
      </style>

      <style type="text/css">
            .left {
                  text-align: left;
            }

            .right {
                  text-align: right;
            }

            .center {
                  text-align: center;
            }

            .justify {
                  text-align: justify;
            }
      </style>
</head>

<body>
      <div class="container">
            <div class="card shadow mb-4">
                  <br>
                  <center>
                        <h2 class="text-center m-0 font-weight-bold ">
                              Laporan Data Pemesanan
                              <br>
                              Hotel Kelompok 2
                        </h2>
                        <h4 class="text-center m-0 font-weight-bold "> jl. Pelita no 27 Sidomekar, Kode Pos 68157</h4>
                  </center>
                  <hr><br>
                  <div class="card-body">
                        <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="2">
                                    <thead>
                                          <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Tgl Pesan</th>
                                                <th scope="col">Pemesan</th>
                                                <th scope="col">Penginapan/No Kamar</th>
                                                <th scope="col">Lama</th>
                                                <th scope="col">Total Bayar</th>
                                          </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody>
                                          <?php $i = 1;
                                          foreach ($list as $l) {
                                                if ($l->paket == 'harian') {
                                                      $paket = 'hari';
                                                } elseif ($l->paket == 'bulanan') {
                                                      $paket = 'bulan';
                                                } else {
                                                      $paket = 'tahun';
                                                }
                                          ?>
                                                <tr>
                                                      <th scope="row"><?= $i ?></th>
                                                      <td><?= tanggal($l->tgl_pesan) ?></td>
                                                      <td><?= $l->nama ?></td>
                                                      <td><?= $l->nama_apartemen ?> (<?= $l->nomor_kamar ?>)</td>
                                                      <td><?= $l->jumlah_paket ?> <?= $paket ?></td>
                                                      <td><?= rupiah($l->total_bayar) ?></td>
                                                </tr>
                                          <?php
                                                $i++;
                                          } ?>
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>

</body>

</html>