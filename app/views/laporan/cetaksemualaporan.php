<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
        .judul{
            width: 80%;
            margin: 30px 0 0 2%;
        }
        .table{
            border-collapse: collapse;
            vertical-align: top;
        }
        .border{
            border: 1px solid #000000;
        }
        .center{
            text-align: center;
        }
        .middle{
            vertical-align: top;
        }
    </style>
</head>
<body onload="window.print();">

    <h3 class="center">Laporan ISCO GAME XT</h3>
    
    <table width="100%" class="table border">
        <tr>
            <th class="border" rowspan="2">No</th>
            <th class="border" rowspan="2">Tanggal</th>
            
            <th class="border" rowspan="2">TV</th>
            <th class="border" rowspan="2">Paket</th>
            <th class="border" colspan="5">Device</th>
            <th class="border" colspan="3">Minuman</th>
            <th class="border" rowspan="2">Total</th>
            <th class="border" rowspan="2">Bayar</th>
            <th class="border" rowspan="2">Keterangan</th>
            <th rowspan="2" class="border">Operator</th>
            <th rowspan="2" class="border">Sift</th>    
        </tr>
        <tr class="table border">
            <th class="border" >Jenis</th>
            <th class="border" >Mulai</th>
            <th class="border" >Selesai</th>
            <th class="border" >Tambah</th>
            <th class="border" >Harga</th>
            <th class="border" >3K</th>
            <th class="border" >4K</th>
            <th class="border" >Harga</th>
        </tr>
        <?php
        $i=1;
        $minum = 0;
        $device = 0;
        $total=0;
        $minumCash = 0;
        $deviceCash = 0;
        $minumQris = 0;
        $deviceQris = 0;
        foreach($data['transaksi'] as $transaksi):
        ?>
        <tr>
            <td  class="align-middle border center"><?= $i++; ?></td>
            
            <td class="align-middle border center"><?= $transaksi['tanggal']; ?></td>
            <td class="align-middle border center"><?= $transaksi['no_tv']; ?></td>
            <td class="align-middle border center"><?= $transaksi['paket']; ?></td>
            <td class="align-middle border center"><?= $transaksi['name_device']; ?></td>
            <td class="align-middle border center"><?= $transaksi['jam_mulai']; ?></td>
            <td class="align-middle border center"><?= $transaksi['jam_selesai']; ?></td>
            <td class="align-middle border center"><?= $transaksi['tambah_waktu']; ?></td>
            <td class="align-middle border center"><?= $transaksi['harga_device']; ?></td>
            <td class="align-middle border center"><?= $transaksi['minuman_3k']; ?></td>
            <td class="align-middle border center"><?= $transaksi['minuman_4k']; ?></td>
            <td class="align-middle border center"><?= $transaksi['harga_minum']; ?></td>
            <td class="align-middle border center"><?= $transaksi['total']; ?></td>
            <td class="align-middle border center"><?= $transaksi['bayar']; ?></td>
            <td class="align-middle border center"><?= $transaksi['keterangan']; ?></td>

            <td class="align-middle border center"><?=$transaksi['name_operator'];?></td>

            <td class="align-middle border center"><?=$transaksi['name_sift'];?></td>
        </tr>
        <?php
        $device += $transaksi['harga_device'];
        $minum += $transaksi['harga_minum'];
        $total += $transaksi['total'];
        if($transaksi['bayar']=='cash'){
            $minumCash += $transaksi['harga_minum']; 
            $deviceCash += $transaksi['harga_device']; 
        }else{
            $minumQris += $transaksi['harga_minum']; 
            $deviceQris += $transaksi['harga_device']; 
        }
        endforeach;
        ?>
        <tr class="center">
            <td class="border center" colspan="8"><strong>Total</strong></td>
            <td ><strong>Rp. <?=$device;?></strong></td>
            <td class="border" colspan="2"></td>
            <td class="border"> <strong>Rp. <?=$minum;?></strong></td>
            <td class="border"> <strong>Rp. <?=$total;?></strong></td>
            <td class="border" colspan="4"></td>
        </tr>
    </table>
    <br>
    <table width="100%" class="table">
        <tr>
            <td width="25%" class="middle">
                <table class="table border" width="100%">
                    <tr class="table border">
                        <td class="border" width="60%"><strong>Pendapatan Cash</strong></td>
                        <td class="border" width="40%" ><strong>Jumlah</strong></td>
                    </tr>
                    <tr class="table border">
                        <td class="border">PS & PC</td>
                        <td class="border">Rp. <?=$deviceCash;?></td>
                    </tr>
                    <tr class="table border">
                        <td class="border">Minum</td>
                        <td class="border">Rp. <?=$minumCash;?></td>
                    </tr>
                    <tr class="table border">
                        <td class="border"><strong>Total</strong></td>
                        <td class="border"><strong>Rp. <?=$deviceCash+ $minumCash;?></strong></td>
                    </tr>
                </table>
            </td>
            <td width="2%"></td>
            <td width="25%" class="middle">
            <table class="table border" width="100%">
                    <tr class="table border">
                        <td class="border" width="60%"><strong>Pendapatan Qris</strong></td>
                        <td class="border" width="40%" ><strong>Jumlah</strong></td>
                    </tr>
                    <tr class="table border">
                        <td class="border">PS & PC</td>
                        <td class="border">Rp. <?=$deviceQris;?></td>
                    </tr>
                    <tr class="table border">
                        <td class="border">Minum</td>
                        <td class="border">Rp. <?=$minumQris;?></td>
                    </tr>
                    <tr class="table border">
                        <td class="border"><strong>Total</strong></td>
                        <td class="border"><strong>Rp. <?=$deviceQris+ $minumQris;?></strong></td>
                    </tr>
                </table>
            </td>
            <td width="1%"></td>
            <td width="25%" class="middle">
                <table class="table border" width="100%">
                <tr>
                    <td class="border" width="55%"><strong>Pengeluaran</strong></td>
                    <td class="border" width="45%" ><strong>Jumlah</strong></td>
                </tr>
                <?php
                $totalPengeluaran = 0;
                foreach($data['pengeluaran'] as $pengeluaran):
                ?>
                <tr>
                    <td class="border" width="55%"><?=$pengeluaran['nama_pengeluaran'];?></td>
                    <td class="border" width="45%" ><?=$pengeluaran['jumlah_pengeluaran'];?></td>
                </tr>
                <?php 
                $totalPengeluaran += $pengeluaran['jumlah_pengeluaran'];
                endforeach; ?>
                <tr>
                    <td class="border" width="55%"><strong>Total</strong></td>
                    <td class="border" width="45%" ><strong><?=$totalPengeluaran;?></strong></td>
                </tr>
            </table>
            </td>
            <td width="1%"></td>
            <td width="30%" class="middle">
            <table class="table border middle" width="100%">
                    <tr class="table border middle">
                        <td class="border middle" width="60%"><strong>Total Pendapatan</strong></td>
                        <td class="border middle" width="40%"><strong>Rp. <?=$total - $totalPengeluaran;?></strong></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
              
</body>
</html>
