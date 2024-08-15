<div class="col-md-12">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <?= $judul ?>
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

            <form action="<?= base_url('postChatAI') ?>" method="post">
                <div class="form-group">
                    <label for="chat">Chat Text</label>
                    <textarea class="form-control" id="chat" name="chat" rows="4"
                        placeholder="Enter your chat text here..."></textarea>
                </div>
                <button type="submit" class="btn btn-secondary">Submit Chat</button>
            </form>

            <br>

            <?php if (isset($response)): ?>
                <div class="alert alert-secondary">
                    <h4>Chat AI</h4>
                    <p><strong>Result Chat:</strong> <?= $response['result_chat'] ?></p>
                    <p><strong>Date Time:</strong> <?= $response['datetime'] ?></p>
                </div>
            <?php endif; ?>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>