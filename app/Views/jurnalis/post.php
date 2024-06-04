<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Post Jurnalis</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 500px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Emotion</th>
                        <th>Date</th>
                        <th class='text-center'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($analysts)): ?>
                        <?php foreach ($analysts as $key => $analyst): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><a
                                        href="<?= base_url('jurnalis/detail/' . $analyst['id_analyst']) ?>"><?= $analyst['emotion_analyst'] ?></a>
                                </td>
                                <td><?= $analyst['date'] ?></td>
                                <td class='text-center'>
                                    <button class="btn btn-flat btn-sm btn-danger" data-toggle="modal"
                                        data-target="#modal-hapus"><i class="fas fa-trash"> Delete</i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
    <!-- /.card-body -->
</div>
</div>