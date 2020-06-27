<section id="feature" class="parallax-section col-md-12">
    <div class="col-md-12">
        <div class="row">
            <!-- Bagian Tabel -->
            <div class="scrolltable col-md-12">
                <br>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Nama Bis</th>
                            <th>Berangkat dari</th>
                            <th>Pergi ke</th>
                            <th>Rute</th>
                            <th>Tarif</th>
                            <th>Fasilitas</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $this->load->model('Data');
                    foreach ($rute as $data_rute) {
                        $bis = $this->Data->get_data_by_id('bis', $data_rute->id_bis);
                    ?> <tr>
                            <td><?php echo $bis->nama ?></td>
                            <td><?php echo $data_rute->kota_asal ?></td>
                            <td><?php echo $data_rute->kota_tujuan ?></td>
                            <td><?php echo $bis->via ?></td>
                            <td><?php echo $bis->harga ?></td>
                            <td><?php echo $bis->fasilitas ?></td>
                            <td><img src="data:image/png;base64,<?php echo base64_encode($bis->foto) ?>"></td>
                            <td>
                                <a href="<?php echo base_url('Admin/edit/') . $data_rute->id ?>" role="button" type="button" class="btn btn-primary">Edit</a>
                                <a href="<?php echo base_url('Admin/delete/') . $data_rute->id ?>" role="button" type="button" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </table>
            </div>
        </div>
    </div>
</section>