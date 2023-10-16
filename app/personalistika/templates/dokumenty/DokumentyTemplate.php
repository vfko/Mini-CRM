<section class="content">
    <div class="row">
            <div class="col-lg-12 pinpin">
                <div class="card lobicard"  data-sortable="true">
                    <div class="card-header">
                        <div class="card-title custom_title">
                            <h4>Dokumenty zaměstnance <?= $template_data['employee'][$template_data['id']]['name'].' '.$template_data['employee'][$template_data['id']]['surename'] ?></h4>
                        </div>
                    </div>


                    <div class="card-body">

                            <!-- Upload document button -->
                            <div class="btn-group">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add-item" style="background: #009688;">Nahrát dokument</button>
                            </div>
                            <!-- /Upload document button -->

                            <!-- Table -->
                            <div class="table-responsive">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                    <thead class="back_table_color">
                                    <tr class="info">
                                        <th>Název dokumentu</th>
                                        <th style="width: 25%;">Akce</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($template_data['documents'] as $document): ?>
                                        <?php $file = $file = explode('.', $document)[0]; ?>
                                        <tr>
                                            <td><?= $document ?></td>
                                            <td style="width: 25%;">
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-<?= $file ?>-<?= $template_data['id'] ?>"><i class="fa fa-trash-o"></i> </button>
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#send-<?= $file ?>-<?= $template_data['id'] ?>"><i class="fa fa-share" aria-hidden="true"></i> </button>
                                            </td>
                                        </tr>


                                    <!-- Delete modal -->
                                    <div class="modal fade" id="delete-<?= $file ?>-<?= $template_data['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header modal-header-primary">
                                                <h3><i class="fa fa-user m-r-5"></i> <?= $document ?></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="" method="POST" class="form-horizontal">
                                                        <input type="hidden" name="id" value="<?= $template_data['id'] ?>">
                                                        <input type="hidden" name="file_name" value="<?= $document ?>">
                                                        <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                                <label class="control-label">Smazat dokument?</label>
                                                                <div class="float-right">
                                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">NE</button>
                                                                    <button type="submit" name="submit" value="<?= DELETE ?>" class="btn btn-add btn-sm">ANO</button>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Zavřít</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Delete modal -->

                                    <!-- Send modal -->
                                    <div class="modal fade" id="send-<?= $file ?>-<?= $template_data['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header modal-header-primary">
                                                <h3><i class="fa fa-user m-r-5"></i> <?= $document ?></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="" method="POST" class="form-horizontal">
                                                        <input type="hidden" name="id" value="<?= $template_data['id'] ?>">
                                                        <input type="hidden" name="file_name" value="<?= $document ?>">
                                                        <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                                <label for="email">Odeslat na email:</label>
                                                                <input type="email" name="email" value="<?= $template_data['employee'][$template_data['id']]['work_email'] ?>" class="form-control" required><br>
                                                                <div class="float-right">
                                                                    <button type="submit" name="submit" value="<?= SEND_EMAIL ?>" class="btn btn-add btn-sm">Odeslat</button>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Zavřít</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Send modal -->
                                    
                                    <?php endforeach ?>
                                </tbody>
                                </table>


                                <!-- Upload modal -->
                                <div class="modal fade" id="add-item" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header modal-header-primary">
                                                <h3><i class="fa fa-user m-r-5"></i> Nahrát dokument</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="<?= $template_data['id'] ?>">
                                                        <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                                <input type="file" name="<?= UPLOAD ?>" class="form-control-file">
                                                                <div class="float-right">
                                                                    <button type="submit" name="submit" value="<?= UPLOAD ?>" class="btn btn-add btn-sm">Nahrát</button>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Zavřít</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Upload modal -->

                                    
                            </div>
                        </div>
                </div>
            </div>
    </div>

</section>