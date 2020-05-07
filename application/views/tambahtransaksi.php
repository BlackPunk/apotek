<div class='container'>
    <?= $this->session->flashdata('pesan');
    ?>
    <div class="row">
        <div class="col-12 py-5">
            <form method="POST" action="<?= base_url('main/tambahtransaksi') ?>">
                <div class="form-group">
                    <label for="nama">Nama Pembeli</label>
                    <input type="nama" class="form-control" name="nama_pembeli">
                </div>

                <div class="form-group">
                    <label for="obat">Obat</label>
                    <div id="format_obat">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <select class="form-control" name="obat[]">
                                        <option value="">Pilih</option>
                                        <?php foreach ($obat as $row) { ?>
                                            <?php if ($row['qty'] > 0) { ?>
                                                <option value="<?= $row['kode_obat'] ?>"><?= $row['nama'] ?> (stok : <?= $row['qty'] ?>)</option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" placeholder="Jumlah Obat" name="jml_obat[]" required="">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-outline btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Remove" onclick="hapus_format(this)"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="lahan_obat_kosong"></div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-success" onclick="tambah_format_kosong()"><i class="fa fa-plus"></i> &nbsp; Tambah obat</button>
                        </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary text-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    var blank_format_medis = '';
    var jumlah_obat = 1;

    $(document).ready(function() {

        blank_format_medis = $('#format_obat').html();
        console.log(jumlah_obat);

    });

    function tambah_format_kosong() {
        jumlah_obat = jumlah_obat + 1;
        $('#lahan_obat_kosong').append(blank_format_medis);
        console.log(jumlah_obat);

    }

    function hapus_format(n) {
        if (jumlah_obat > 1) {
            n.parentNode.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode.parentNode);
        }
        if (jumlah_obat != 1) {
            jumlah_obat = jumlah_obat - 1;
        }
        console.log(jumlah_obat);
    }
</script>