<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
        <?php
            if($data['pengeluaran']==null){
            ?>
                <h3 class="text-center">Data Pengeluaran Tidak Ada</h3>
                </div>
            <?php
            }else{
        ?>
            <table class="table table-bordered m-0" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                <tr>
                        <th>No</th>
                        <th>Nama Pengeluaran</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center ">
                    <?php $i=1;
                    $total=0;
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
                        <td class="align-middle"><?=$total;?></td>
                        <td  class="align-middle"></td>
                </tr>    
            </table>
        </div>
    </div>
</div>



<!-- Modal -->  

<!-- update -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Data Pengeluaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">x</button>
            </div>
            <div class="modal-body" id="updatepengeluaran">

            </div>
        </div>
    </div>

</div>

<!-- update pengeluaran jquery -->
<script>
    $('.view_data').on('click', function(){
        const id_pengeluaran = $(this).data('id');
        $.ajax({
            url:'<?= BASEURL;?>/allpengeluaran/getpengeluaranupdate',
            method:'post',
            data:{id_pengeluaran:id_pengeluaran},
            success:function(data){
               $('#updatepengeluaran').html(data);
               $('#myModal').modal('show'); 
            }
        })
    })
</script>
<?php
            }
?>
        