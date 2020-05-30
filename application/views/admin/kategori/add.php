<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                <?php
                        if (validation_errors()) {
                            echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
                        }
                    ?>
                    <form action="" method="post">
                        <div class="card-header">
                            <h3 class="card-title">Add Kategori</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Kategori">Kategori</label>
                                <input type="text" name="kategori" class="form-control" placeholder="Enter Kategori">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>