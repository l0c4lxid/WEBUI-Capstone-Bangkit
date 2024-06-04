<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Analis Jurnalis</h3>
            <div class="card-tools"></div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="<?= base_url('jurnalis/generate') ?>" method="post">
                <div class="form-group">
                    <label for="input_text">How your feeling today?</label>
                    <input type="text" name="input_text" class="form-control" id="input_text"
                        placeholder="sad ? happy ? love ?" value="<?= isset($inputText) ? esc($inputText) : '' ?>">
                </div>
                <div class="d-flex justify-content-between">
                    <?php if (!isset($generatedText)): ?>
                        <button type="submit" class="btn btn-primary">Generate</button>
                    <?php endif; ?>
                    <?php if (isset($generatedText)): ?>
                        <form action="<?= base_url('jurnalis/generate') ?>" method="post">
                            <input type="hidden" name="input_text" value="<?= esc($inputText) ?>">
                            <button type="submit" class="btn btn-secondary">Generate Again</button>
                        </form>
                    <?php endif; ?>
                </div>
            </form>
            <br>
            <?php if (isset($generatedText)): ?>
                <h2>Recomendation :</h2>
                <p><?= esc($generatedText) ?></p>
                <form action="<?= base_url('jurnalis/save') ?>" method="post">
                    <input type="hidden" name="input_text" value="<?= esc($inputText) ?>">
                    <input type="hidden" name="generated_text" value="<?= esc($generatedText) ?>">
                    <button type="submit" class="btn btn-success float-right">Save Notes</button>
                </form>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?= esc($error) ?></p>
            <?php endif; ?>
        </div>
        <!-- /.card-body -->
    </div>
</div>