<div class="col-md-12">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <?= $judul ?> by Emotion Prediction
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

            <form action="<?= base_url('postRecommendation') ?>" method="post">
                <div class="form-group">
                    <label for="emotion">Emotion</label>
                    <input type="text" class="form-control" id="emotion" name="emotion" placeholder="Enter the emotion"
                        required>
                </div>
                <button type="submit" class="btn btn-secondary">Submit</button>
            </form>

            <br>

            <?php if (isset($response)): ?>
                <div class="alert alert-secondary">
                    <h4>Recommendation Result</h4>
                    <p><strong>Emotion:</strong> <?= $response['emotion'] ?></p>
                    <p><strong>Recommendation:</strong> <?= $response['recommendation'] ?></p>
                    <p><strong>Date Time:</strong> <?= $response['datetime'] ?></p>
                    <h5>Articles:</h5>
                    <ul>
                        <?php foreach ($response['articles'] as $article): ?>
                            <li><a href="<?= $article['link'] ?>" target="_blank"><?= $article['title'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>