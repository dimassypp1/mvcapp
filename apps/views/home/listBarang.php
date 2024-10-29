<html>
    <head>  
    </head>
    <body>  
    <a href="<?= BASE_URL ?>index.php?r=home/insertBarang?>"class="btn btn-primary">Tambah Barang</a>
    <br /><br />
    <table class="table">
            <thead class="thead-dark">
            <tr scope="row">
                <th>ID</th>
                <th>Nama Barang</th>
                <th>QTY</th>
            </tr>
            </thead>
            <?php foreach ($data as $item) : ?>
            <tr scope="row">
                <td><?= $item['id']; ?></td>
                <td><?= $item['nama']; ?></td>
                <td><span class="badge badge-<?= $item['qty']>50? 'success' : 'danger' ?>"><?= $item['qty']; ?></span></td>
                <td a href="<?= BASE_URL.'index.php?r=home/updateBarang/'.$item['id']?>" class="badge">Update</a></td>
                <td a href="<?= BASE_URL.'index.php?r=home/deleteBarang/'.$item['id']?>" class="badge" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
