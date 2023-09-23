<section class="content">
    <div class="row">
            <div class="col-lg-12 pinpin">
                <div class="card lobicard"  data-sortable="true">
                    <div class="card-header">
                        <div class="card-title custom_title">
                            <h4>Pracovní smlouvy</h4>
                        </div>
                    </div>


                    <div class="card-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add-item" style="background: #009688;">Přidat pracovní smlouvu</button>
                            </div>
                            <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->

                            <!-- Table -->
                            <div class="table-responsive">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                    <thead class="back_table_color">
                                    <tr class="info">
                                        <th>Týká se</th>
                                        <th>Zaměstnanec</th>
                                        <th>Číslo smlouvy</th>
                                        <th>Typ smlouvy</th>
                                        <th>Název pracovní smlouvy</th>
                                        <th>Datum počátku</th>
                                        <th>Datum ukončení</th>
                                        <th>Akce</th>
                                    </tr>
                                    </thead>
                                    <?php foreach ($template_data['rows'] as $row): ?>
                                    <tbody>
                                        <tr>
                                            <td><?= (!empty($row['relate_to'])) ? $template_data['relate_to'][$row['relate_to']]['name'] : null ?></td>
                                            <td><?= (!empty($row['employee_id'])) ? $template_data['employees'][$row['employee_id']]['name'].' '.$template_data['employees'][$row['employee_id']]['surename'] : null ?></td>
                                            <td><?= $row['contract_number'] ?></td>
                                            <td><?= (!empty($row['type_of_empl_contract_id'])) ? $template_data['type_of_empl_contract'][$row['type_of_empl_contract_id']]['name'] : null ?></td>
                                            <td><?= $row['contract_name'] ?></td>
                                            <td><?= (!empty($row['start_date'])) ? date('d.m.Y', strtotime($row['start_date'])) : null ?></td>
                                            <td><?= (!empty($row['end_date'])) ? date('d.m.Y', strtotime($row['end_date'])) : null ?></td>
                                            <td>
                                                <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#info-<?= $row['id'] ?>">&nbsp<i class="fa fa-info"></i>&nbsp</button>
                                                <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#update-<?= $row['id'] ?>"><i class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-<?= $row['id'] ?>"><i class="fa fa-trash-o"></i> </button>
                                            </td>
                                        </tr>

                                        <!-- Info modal -->
                                        <div class="modal fade" id="info-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header modal-header-primary">
                                                    <h3><i class="fa fa-user m-r-5"></i> <?= $row['contract_number'] ?></h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><br>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form action="" method="POST" class="form-horizontal">
                                                            <div class="row">
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Týká se</label>
                                                                        <input type="text" name="relate_to" value="<?= (!empty($row['relate_to'])) ? $template_data['relate_to'][$row['relate_to']]['name'] : null ?>" class="form-control" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Zaměstnanec</label>
                                                                        <input type="text" name="relate_to" value="<?= (!empty($row['employee_id'])) ? $template_data['employees'][$row['employee_id']]['name'].' '.$template_data['employees'][$row['employee_id']]['surename'] : null ?>" class="form-control" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Číslo smlouvy</label>
                                                                        <input type="text" name="contract_number" value="<?= (!empty($row['contract_number'])) ? $row['contract_number'] : null ?>" class="form-control" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Typ smlouvy</label>
                                                                        <input type="text" name="type_of_empl_contract_id" value="<?= (!empty($row['type_of_empl_contract_id'])) ? $template_data['type_of_empl_contract'][$row['type_of_empl_contract_id']]['name'] : null ?>" class="form-control" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Název pracovní smlouvy</label>
                                                                        <input type="text" name="contract_name" value="<?= (!empty($row['contract_name'])) ? $row['contract_name'] : null ?>" class="form-control" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Datum počátku</label>
                                                                        <input type="date" name="start_date" value="<?= (!empty($row['start_date'])) ? $row['start_date'] : null ?>" class="form-control" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Datum ukončení</label>
                                                                        <input type="date" name="end_date" value="<?= (!empty($row['end_date'])) ? $row['end_date'] : null ?>" class="form-control" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Výpovědní lhůta</label>
                                                                        <input type="text" name="resignation_period" value="<?= (!empty($row['resignation_period'])) ? $template_data['resignation_period'][$row['resignation_period']]['name'] : null ?>" class="form-control" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Datum podpisu</label>
                                                                        <input type="date" name="date_of_signature" value="<?= (!empty($row['date_of_signature'])) ? $row['date_of_signature'] : null ?>" class="form-control" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-12 form-group mt-3">
                                                                        <label class="control-label">Smlouva uzavřená na dobu <?= ($row['indefinitely'] == 1) ? 'neurčitou' : 'určitou' ?></label>
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
                                        <!-- /info modal -->

                                        <!-- Update modal -->
                                    <div class="modal fade" id="update-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header modal-header-primary">
                                                <h3><i class="fa fa-user m-r-5"></i> Upravit pracovní pozici</h3>
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
                                                                <label class="control-label">Týká se</label>
                                                                <select name="relate_to" class="form-control">
                                                                    <?php foreach ($template_data['relate_to'] as $relate_to): ?>
                                                                        <option value="<?= $relate_to['key'] ?>" <?= ($row['relate_to'] == $relate_to['key']) ? 'selected' : null ?>><?= $relate_to['name'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                                <label class="control-label">Zaměstnanec</label>
                                                                <select name="employee_id" class="form-control">
                                                                    <?php foreach ($template_data['employees'] as $employee): ?>
                                                                        <option value="<?= $employee['id'] ?>" <?= ($row['employee_id'] == $employee['id']) ? 'selected' : null ?>><?= $employee['name'].' '.$employee['surename'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                                <label class="control-label">Číslo smlouvy</label>
                                                                <input type="text" name="contract_number" value="" class="form-control">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                                <label class="control-label">Typ smlouvy</label>
                                                                <select name="type_of_empl_contract_id" class="form-control">
                                                                    <?php foreach ($template_data['type_of_empl_contract'] as $empl_contract): ?>
                                                                        <option value="<?= $empl_contract['id'] ?>" <?= ($row['type_of_empl_contract_id'] == $empl_contract['id']) ? 'selected' : null ?>><?= $empl_contract['name'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                                <label class="control-label">Název pracovní smlouvy</label>
                                                                <input type="text" name="contract_name" value="<?= $row['contract_name'] ?>" class="form-control">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                                <label class="control-label">Datum počátku</label>
                                                                <input type="date" name="start_date" value="<?= $row['start_date'] ?>" class="form-control">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                                <label class="control-label">Datum ukončení</label>
                                                                <input type="date" name="end_date" value="<?= $row['end_date'] ?>" class="form-control">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                                <label class="control-label">Výpovědní lhůta</label>
                                                                <select name="resignation_period" class="form-control">
                                                                    <?php foreach ($template_data['resignation_period'] as $resignation_period): ?>
                                                                        <option value="<?= $resignation_period['days'] ?>" <?= ($row['resignation_period'] == $resignation_period['days']) ? 'selected' : null ?>><?= $resignation_period['name'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                                <label class="control-label">Datum podpisu</label>
                                                                <input type="date" name="date_of_signature" value="<?= $row['date_of_signature'] ?>" class="form-control">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-12 form-group">
                                                                <input type="checkbox" name="indefinitely" value="1" class="" <?= ($row['indefinitely'] == 1) ? 'checked' : null ?>>
                                                                <label class="control-label">Na dobu neurčitou</label>
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
                                                                <label class="control-label">Odstranit pracovní smlouvu?</label>
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
                                    <select name="relate_to" class="form-control">
                                        <?php foreach ($template_data['relate_to'] as $relate_to): ?>
                                            <option value="<?= $relate_to['key'] ?>"><?= $relate_to['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Zaměstnanec</label>
                                    <select name="employee_id" class="form-control">
                                        <?php foreach ($template_data['employees'] as $employee): ?>
                                            <option value="<?= $employee['id'] ?>"><?= $employee['name'].' '.$employee['surename'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Číslo smlouvy</label>
                                    <input type="text" name="contract_number" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Typ smlouvy</label>
                                    <select name="type_of_empl_contract_id" class="form-control">
                                        <?php foreach ($template_data['type_of_empl_contract'] as $empl_contract): ?>
                                            <option value="<?= $empl_contract['id'] ?>"><?= $empl_contract['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Název pracovní smlouvy</label>
                                    <input type="text" name="contract_name" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Datum počátku</label>
                                    <input type="date" name="start_date" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Datum ukončení</label>
                                    <input type="date" name="end_date" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Výpovědní lhůta</label>
                                    <select name="resignation_period" class="form-control">
                                        <?php foreach ($template_data['resignation_period'] as $resignation_period): ?>
                                            <option value="<?= $resignation_period['days'] ?>"><?= $resignation_period['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Datum podpisu</label>
                                    <input type="date" name="date_of_signature" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-12 form-group">
                                    <input type="checkbox" name="indefinitely" value="1" class="">
                                    <label class="control-label">Na dobu neurčitou</label>
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