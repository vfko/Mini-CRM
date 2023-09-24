<section class="content">
    <div class="row">
            <div class="col-lg-12 pinpin">
                <div class="card lobicard"  data-sortable="true">
                    <div class="card-header">
                        <div class="card-title custom_title">
                            <h4>Pracovní pozice</h4>
                        </div>
                    </div>


                    <div class="card-body">
                            
                            <!-- Table -->
                            <div class="table-responsive">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                    <thead class="back_table_color">
                                    <tr class="info">
                                        <th>Název pracovní pozice</th>
                                        <th>Pracovní náplň</th>
                                        <th>Oddělení</th>
                                        <th>Akce</th>
                                    </tr>
                                    </thead>

                                    <!-- Table Body -->
                                    <?php foreach ($template_data['rows'] as $row): ?>
                                    <tbody>
                                    <tr>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['workload']  ?></td>
                                        <td><?= $template_data['departments'][$row['department_id']]['name'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#update-<?= $row['id'] ?>"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>

                                    <!-- Update modal -->
                                    <div class="modal fade" id="update-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header modal-header-primary">
                                                <h3><i class="fa fa-user m-r-5"></i> Upravit výběrové řízení</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="" method="POST" class="form-horizontal">
                                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                        <div class="row">
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Oddělení</label>
                                                                    <select name="department_id" class="form-control">
                                                                        <option value="">Nepřiřazeno</option>
                                                                        <?php foreach ($template_data['departments'] as $department): ?>
                                                                            <option value="<?= $department['id'] ?>" <?= ($department['id'] == $row['department_id']) ? 'selected' : null ?>><?= $department['name'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Pracovní náplň</label>
                                                                    <textarea name="workload" rows="5" class="form-control"><?= $row['workload'] ?></textarea>
                                                                </div>

                                                                <div class="col-md-12 form-group user-form-group">
                                                                    <div class="pull-right">
                                                                    <button type="submit" name="submit" value="<?= UPDATE ?>" class="btn btn-add btn-sm">Uložit</button>
                                                                    </div>
                                                                </div>    
                                                        </div>
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
                                    <!-- /Update modal -->


                                    <!-- Delete modal -->
                                    <div class="modal fade" id="delete-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header modal-header-primary">
                                                <h3><i class="fa fa-user m-r-5"></i> <?= $row['name'] ?></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="" method="POST" class="form-horizontal">
                                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                        <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                                <label class="control-label">Odstranit pracovní pozici?</label>
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
                                    <!-- /.Delete modal -->

                                    </tbody>
                                <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
    </div>


    <!-- Add item modal -->
    <div class="modal fade" id="add-item" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <h3><i class="fa fa-user m-r-5"></i> Nové výběrové řízení</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="POST" class="form-horizontal">
                        <div class="row">
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Název pracovní pozice</label>
                                    <input type="text" name="name" placeholder="" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Oddělení</label>
                                    <select name="department_id" class="form-control">
                                        <?php foreach ($template_data['departments'] as $department): ?>
                                            <option value="<?= $department['id'] ?>"><?= $department['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-12 form-group">
                                    <label class="control-label">Pracovní náplň</label>
                                    <textarea name="workload" rows="5" class="form-control"></textarea>
                                </div>

                                <div class="col-md-12 form-group user-form-group">
                                    <div class="pull-right">
                                    <button type="submit" name="submit" value="<?= ADD ?>" class="btn btn-add btn-sm">Uložit</button>
                                    </div>
                                </div>
                        </div>
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
    <!-- /Add item modal -->

</section>