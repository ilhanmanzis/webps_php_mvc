
<!-- button triger -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>

<!-- flash notifikasi -->
<?php
Flasher::flash();
?>
<!-- button triger -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran <strong><?= $data['operatorSession']['name_operator'];?></strong> hari ini</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengeluaran</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $i=1;
                    $total = 0;
                    foreach($data['pengeluaran'] as $data): ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $data['nama_pengeluaran']; ?></td>
                        <td><?= $data['jumlah_pengeluaran']; ?></td>
                        <td>
                        
                        <a href="<?= BASEURL; ?>/pengeluaran/delete/<?= $data['id_pengeluaran']; ?>" class="btn btn-sm btn-danger" onclick='return confirm("Apakah yakin ingin menghapus data?")'>Hapus</a>

                        <a href="#" class="view_data btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#myModal" data-id="<?= $data['id_pengeluaran'];?>">Edit</a>
                        </td>
                    </tr>

                    <?php
                    $total += $data['jumlah_pengeluaran'] ;
                    endforeach; ?>
                    
                </tbody>
                <tr class="text-center">
                        <td colspan="2" class="align-middle">Jumlah</td>
                        <td class="align-middle"><?=$total?></td>
                        <td  class="align-middle"></td>
                </tr>  
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<!-- create -->
<?php include 'create.php'; ?>


<!-- update -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data pengeluaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">x</button>
            </div>
            <div class="modal-body" id="datapengeluaran">

            </div>
        </div>
    </div>

</div>
<!-- update pengeluaran jquery -->
<script>
    $('.view_data').on('click', function(){
        const id_pengeluaran = $(this).data('id');
        $.ajax({
            url:'<?= BASEURL;?>/pengeluaran/getpengeluaran',
            method:'post',
            data:{id_pengeluaran:id_pengeluaran},
            success:function(data){
               $('#datapengeluaran').html(data);
               $('#myModal').modal('show'); 
            }
        })
    })
</script>