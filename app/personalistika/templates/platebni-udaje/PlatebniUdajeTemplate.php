<section class="content">
    <div class="row">
            <div class="col-lg-12 pinpin">
                <div class="card lobicard"  data-sortable="true">
                    <div class="card-header">
                        <div class="card-title custom_title">
                            <h4>Platební údaje</h4>
                        </div>
                    </div>


                    <div class="card-body">

                            <!-- Table -->
                            <div class="table-responsive">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                    <thead class="back_table_color">
                                    <tr class="info">
                                        <th>Zaměstnanec</th>
                                        <th>Číslo účtu</th>
                                        <th>Mzda (DPP)</th>
                                        <th>IČO</th>
                                        <th>DIČ</th>
                                        <th>Další mzdové podmínky</th>
                                        <th>Akce</th>
                                    </tr>
                                    </thead>
                                    <?php foreach ($template_data['rows'] as $row): ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $template_data['employees'][$row['employee_id']]['name'].' '.$template_data['employees'][$row['employee_id']]['surename'] ?></td>
                                            <td><?= $row['bank_account_num'] ?></td>
                                            <td><?= $row['wage'] ?></td>
                                            <td><?= $row['ico'] ?></td>
                                            <td><?= $row['dic'] ?></td>
                                            <td><?= $row['wage_conditions'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#update-<?= $row['id'] ?>"><i class="fa fa-pencil"></i></button>
                                            </td>
                                        </tr>

                                        <!-- Update modal -->
                                    <div class="modal fade" id="update-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header modal-header-primary">
                                                <h3><i class="fa fa-user m-r-5"></i> <?= $template_data['employees'][$row['employee_id']]['name'].' '.$template_data['employees'][$row['employee_id']]['surename'] ?></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form action="" method="POST" class="form-horizontal">
                                            <div class="modal-body">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                        <div class="row">
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                                <label class="control-label">Číslo účtu</label>
                                                                <input type="text" name="bank_account_num" value="" class="form-control">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                                <label class="control-label">Mzda (DPP)</label>
                                                                <input type="text" name="wage" value="" class="form-control">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                                <label class="control-label">IČO</label>
                                                                <input type="text" name="ico" value="" class="form-control">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                                <label class="control-label">DIČ</label>
                                                                <input type="text" name="dic" value="" class="form-control">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                                <label class="control-label">Další mzdové podmínky</label>
                                                                <input type="text" name="wage_conditions" value="" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="submit" value="<?= UPDATE ?>" class="btn btn-add float-left">Uložit</button>
                                                <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Zavřít</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Update modal -->

                                    <!-- Delete modal -->
                                    <div class="modal fade" id="delete-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header modal-header-primary">
                                                <h3><i class="fa fa-user m-r-5"></i> <?= $row['contract_number'] ?>: <?= $row['employee_id'] ?></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="" method="POST" class="form-horizontal">
                                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                        <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                                <label class="control-label">Odstranit Zaměstnance?</label>
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
                <h3><i class="fa fa-user m-r-5"></i> Přidat zaměsnance</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                                                
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST" class="form-horizontal">
                            <div class="row">
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Týká se</label>
                                    <input type="text" name="" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="submit" name="submit" value="<?= ADD ?>" class="btn btn-add float-left">Uložit</button>
                <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Zavřít</button>
            </div>
            </form>
            </div>
        </div>
    </div>
    <!-- /Add item modal -->

</section>