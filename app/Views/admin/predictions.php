<div class="col-md-12">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <?= $judul ?> All
            </h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">

            <div class="input-group">
                <input type="text" id="myInput" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                    <button class="btn btn-success" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <br>

            <table id="myTable" class="table table-head-fixed text-nowrap">
                <!-- <table class="table" id="example2"> -->
                <tread>
                    <tr>
                        <th class='text-center' width='50px'>No</th>
                        <th>Predictions</th>
                        <th>Emotion</th>
                        <th>Date Time</th>
                    </tr>
                </tread>
                <tbody>
                    <?php $no = 1;
                    foreach ($predictionsData as $prediction) { ?>
                        <tr>
                            <td class='text-center'>
                                <?= $no++ ?>
                            </td>
                            <td><?= $prediction['predictions'] ?></td>
                            <td><?= $prediction['emotion'] ?></td>
                            <td><?= $prediction['datetime'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<script>
    // JavaScript to filter the table based on search input
    document.getElementById('myInput').addEventListener('keyup', function () {
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById('myInput');
        filter = input.value.toUpperCase();
        table = document.getElementById('myTable');
        tr = table.getElementsByTagName('tr');

        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = 'none';
            td = tr[i].getElementsByTagName('td');
            for (j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                        break;
                    }
                }
            }
        }
    });
</script>