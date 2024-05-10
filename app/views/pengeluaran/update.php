<form action="<?= BASEURL;?>/pengeluaran/update" method="post">
    <input type="hidden" name="id_pengeluaran" value="<?= $data['pengeluaran']['id_pengeluaran'];?>">
    <label for="name_device">Nama pengeluaran</label>
    <input type="text" name="name_pengeluaran"  class="form-control mb-2" required value="<?= $data['pengeluaran']['nama_pengeluaran'];?>">
    <label for="name_device">Jumlah</label>
    <input type="text" name="jumlah_pengeluaran"  class="form-control mb-2" required value="<?= $data['pengeluaran']['jumlah_pengeluaran'];?>">
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary">Ubah</button>
    </div>
</form>