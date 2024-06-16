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
            <?php if (session()->getFlashdata('pesan')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/postPrediction') ?>" method="post">
                <div class="form-group">
                    <label for="text">Prediction Text</label>
                    <textarea class="form-control" id="text" name="text" rows="4"
                        placeholder="Enter your prediction text here..."></textarea>
                </div>
                <button type="submit" class="btn btn-secondary">Submit Prediction</button>
            </form>

            <br>

            <?php if (isset($response)): ?>
                <div class="alert alert-secondary">
                    <h4>Prediction Result</h4>
                    <p><strong>Prediction:</strong> <?= $response['predict'] ?></p>
                    <p><strong>Emotion:</strong> <?= $response['emotion'] ?></p>
                    <p><strong>DateTime:</strong> <?= $response['datetime'] ?></p>
                </div>
            <?php endif; ?>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>