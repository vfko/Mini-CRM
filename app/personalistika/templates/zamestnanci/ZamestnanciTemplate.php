<section class="content">
    <div class="row">
            <div class="col-lg-12 pinpin">
                <div class="card lobicard"  data-sortable="true">
                    <div class="card-header">
                        <div class="card-title custom_title">
                            <h4>Seznam zaměstnanců</h4>
                        </div>
                    </div>


                    <div class="card-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add-item" style="background: #009688;">Přidat zaměstnance</button>
                            </div>
                            <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->

                            <!-- Table -->
                            <div class="table-responsive">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                    <thead class="back_table_color">
                                    <tr class="info">
                                        <th>ID</th>
                                        <th>Titul</th>
                                        <th>Jméno</th>
                                        <th>Příjmení</th>
                                        <th>Tel</th>
                                        <th>email</th>
                                        <th>Pracovní pozice</th>
                                        <th>Druh spolupráce</th>
                                        <th>Akce</th>
                                    </tr>
                                    </thead>
                                    <?php foreach ($template_data['rows'] as $row): ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['surename'] ?></td>
                                            <td><?= $row['tel'] ?></td>
                                            <td><?= $row['work_email'] ?></td>
                                            <td><?= ($row['job_id'] != '') ? $template_data['jobs'][$row['job_id']]['name'] : null ?></td>
                                            <td> <?= ($row['relate_to_id'] != '') ? $template_data['relate_to'][$row['relate_to_id']]['name'] : null ?></td>
                                            <td>
                                                <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#info-<?= $row['id'] ?>">&nbsp<i class="fa fa-info"></i>&nbsp</button>
                                                <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#update-<?= $row['id'] ?>"><i class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-<?= $row['id'] ?>"><i class="fa fa-trash-o"></i> </button>
                                                <a href="/personalistika/dokumenty?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-folder-o" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Info modal -->
                                        <div class="modal fade" id="info-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header modal-header-primary">
                                                    <h3><i class="fa fa-user m-r-5"></i> <?= $row['name'] ?> <?= $row['surename'] ?></h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form action="" method="POST" class="form-horizontal">
                                                            <div class="row">
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Titul</label>
                                                                        <input type="text" name="title" value="<?= ($row['title'] != '') ? $row['title'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Jméno</label>
                                                                        <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Příjmení</label>
                                                                        <input type="text" name="surename" value="<?= $row['surename'] ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Firemní tel.</label>
                                                                        <input type="text" name="work_tel" value="<?= ($row['work_tel'] != '') ? $row['work_tel'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Soukromý tel.</label>
                                                                        <input type="text" name="tel" value="<?= ($row['tel'] != '') ? $row['tel'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Firemní email</label>
                                                                        <input type="text" name="surework_emailname" value="<?= ($row['work_email'] != '') ? $row['work_email'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Soukromý email</label>
                                                                        <input type="text" name="surework_emailname" value="<?= ($row['email'] != '') ? $row['email'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Druh Spolupráce</label>
                                                                        <input type="text" name="kind_of_collab_id" value="<?= ($row['kind_of_collab_id'] != '') ? $template_data['kind_of_collaboration'][$row['kind_of_collab_id']]['name'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Pohlaví</label>
                                                                        <input type="text" name="sex_id" value="<?= ($row['sex_id'] != '') ? $template_data['sex'][$row['sex_id']]['name'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Rodinný stav</label>
                                                                        <input type="text" name="martial_status_id" value="<?= ($row['martial_status_id'] != '') ? $template_data['martial_status'][$row['martial_status_id']]['name'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Datum narození</label>
                                                                        <input type="text" name="birthdate" value="<?= ($row['birthdate'] != '') ? date('d.m.Y', strtotime($row['birthdate'])) : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Rodné číslo</label>
                                                                        <input type="text" name="personal_id_num" value="<?= ($row['personal_id_num'] != '') ? $row['personal_id_num'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Číslo OP</label>
                                                                        <input type="text" name="op_num" value="<?= ($row['op_num'] != '') ? $row['op_num'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Národnost</label>
                                                                        <input type="text" name="nationality_id" value="<?= ($row['nationality_id'] != '') ? $template_data['nationality'][$row['nationality_id']]['name'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-12 form-group">
                                                                        <label class="control-label">Trvalé bydliště</label>
                                                                        <input type="text" name="permanent_residence" value="<?= ($row['permanent_residence'] != '') ? $row['permanent_residence'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-12 form-group">
                                                                        <label class="control-label">Korespondenční adresa</label>
                                                                        <input type="text" name="mailing_address" value="<?= ($row['mailing_address'] != '') ? $row['mailing_address'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Pracovní pozice</label>
                                                                        <input type="text" name="job_id" value="<?= ($row['job_id'] != '') ? $template_data['jobs'][$row['job_id']]['name'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Typ provizního partnera</label>
                                                                        <input type="text" name="type_of_comm_partner_id" value="<?= ($row['type_of_comm_partner_id'] != '') ? $template_data['type_of_comm_partners'][$row['type_of_comm_partner_id']]['name'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Přiřazený operátor</label>
                                                                        <input type="text" name="assigned_operator_id" value="<?= ($row['assigned_operator_id'] != '') ? $template_data['employees'][$row['assigned_operator_id']]['name'].' '.$template_data['employees'][$row['assigned_operator_id']]['surename'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Přiřazený konzultant</label>
                                                                        <input type="text" name="assigned_seller_id" value="<?= ($row['assigned_seller_id'] != '') ? $template_data['employees'][$row['assigned_seller_id']]['name'].' '.$template_data['employees'][$row['assigned_seller_id']]['surename'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Oddělení</label>
                                                                        <input type="text" name="department_id" value="<?= ($row['department_id'] != '') ? $template_data['departments'][$row['department_id']]['name'] : null ?>" class="form-control bg-light" readonly>
                                                                    </div>
                                                                    <!-- Text input-->
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="control-label">Druh spolpráce</label>
                                                                        <input type="text" name="relate_to_id" value="<?= ($row['relate_to_id'] != '') ? $template_data['relate_to'][$row['relate_to_id']]['name'] : null ?>" class="form-control bg-light" readonly>
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
                                                                    <label class="control-label">Titul</label>
                                                                    <input type="text" name="title" value="<?= ($row['title'] != '') ? $row['title'] : null ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Jméno</label>
                                                                    <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Příjmení</label>
                                                                    <input type="text" name="surename" value="<?= $row['surename'] ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Firemní tel.</label>
                                                                    <input type="text" name="work_tel" value="<?= ($row['work_tel'] != '') ? $row['work_tel'] : null ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Soukromý tel.</label>
                                                                    <input type="text" name="tel" value="<?= ($row['tel'] != '') ? $row['tel'] : null ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Firemní email</label>
                                                                    <input type="text" name="work_email" value="<?= ($row['work_email'] != '') ? $row['work_email'] : null ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Soukromý email</label>
                                                                    <input type="text" name="work_email" value="<?= ($row['work_email'] != '') ? $row['work_email'] : null ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Pohlaví</label>
                                                                    <select name="sex_id" class="form-control">
                                                                        <option value="">Nepřiřazen</option>
                                                                        <?php foreach ($template_data['sex'] as $item): ?>
                                                                        <option value="<?= $item['id'] ?>" <?= ($item['id'] == $row['sex_id']) ? 'selected' : null ?>><?= $item['name'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Rodinný stav</label>
                                                                    <select name="martial_status_id" class="form-control">
                                                                        <option value="">Nepřiřazen</option>
                                                                        <?php foreach ($template_data['martial_status'] as $item): ?>
                                                                        <option value="<?= $item['id'] ?>" <?= ($item['id'] == $row['martial_status_id']) ? 'selected' : null ?>><?= $item['name'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Datum narození</label>
                                                                    <input type="date" name="birthdate" value="<?= ($row['birthdate'] != '') ? date('Y-m-d', strtotime($row['birthdate'])) : null ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Rodné číslo</label>
                                                                    <input type="text" name="personal_id_num" value="<?= ($row['personal_id_num'] != '') ? $row['personal_id_num'] : null ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Číslo OP</label>
                                                                    <input type="text" name="op_num" value="<?= ($row['op_num'] != '') ? $row['op_num'] : null ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Národnost</label>
                                                                    <select name="nationality_id" class="form-control">
                                                                        <option value="">Nepřiřazen</option>
                                                                        <?php foreach ($template_data['nationality'] as $item): ?>
                                                                        <option value="<?= $item['id'] ?>" <?= ($item['id'] == $row['nationality_id']) ? 'selected' : null ?>><?= $item['name'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Druh spolupráce</label>
                                                                    <select name="relate_to_id" class="form-control">
                                                                        <option value="">Nepřiřazeno</option>
                                                                        <?php foreach ($template_data['relate_to'] as $item): ?>
                                                                        <option value="<?= $item['id'] ?>" <?= ($item['id'] == $row['relate_to_id']) ? 'selected' : null ?>><?= $item['name'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Trvalé bydliště</label>
                                                                    <input type="text" name="permanent_residence" value="<?= ($row['permanent_residence'] != '') ? $row['permanent_residence'] : null ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Korespondenční adresa</label>
                                                                    <input type="text" name="mailing_address" value="<?= ($row['mailing_address'] != '') ? $row['mailing_address'] : null ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Pracovní pozice</label>
                                                                    <select name="job_id" class="form-control">
                                                                        <option value="">Nepřiřazen</option>
                                                                        <?php foreach ($template_data['jobs'] as $item): ?>
                                                                        <option value="<?= $item['id'] ?>" <?= ($item['id'] == $row['job_id']) ? 'selected' : null ?>><?= $item['name'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Typ provizního partnera</label>
                                                                    <select name="type_of_comm_partner_id" class="form-control">
                                                                        <option value="">Nepřiřazen</option>
                                                                        <?php foreach ($template_data['type_of_comm_partners'] as $item): ?>
                                                                        <option value="<?= $item['id'] ?>" <?= ($item['id'] == $row['type_of_comm_partner_id']) ? 'selected' : null ?>><?= $item['name'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Přiřazený operátor</label>
                                                                    <select name="assigned_operator_id" class="form-control">
                                                                        <option value="">Nepřiřazen</option>
                                                                        <?php foreach ($template_data['operators'] as $item): ?>
                                                                        <option value="<?= $item['id'] ?>" <?= ($item['id'] == $row['assigned_operator_id']) ? 'selected' : null ?>><?= $template_data['employees'][$item['id']]['name'].' '.$template_data['employees'][$item['id']]['surename'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Přiřazený konzultant</label>
                                                                    <select name="assigned_seller_id" class="form-control">
                                                                        <option value="">Nepřiřazen</option>
                                                                        <?php foreach ($template_data['sellers'] as $item): ?>
                                                                        <option value="<?= $item['id'] ?>" <?= ($item['id'] == $row['assigned_seller_id']) ? 'selected' : null ?>><?= $template_data['employees'][$item['id']]['name'].' '.$template_data['employees'][$item['id']]['surename'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Oddělení</label>
                                                                    <select name="department_id" class="form-control">
                                                                        <option value="">Nepřiřazeno</option>
                                                                        <?php foreach ($template_data['departments'] as $item): ?>
                                                                        <option value="<?= $item['id'] ?>" <?= ($item['id'] == $row['department_id']) ? 'selected' : null ?>><?= $item['name'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
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
                                                <h3><i class="fa fa-user m-r-5"></i> <?= $row['name'] ?> <?= $row['surename'] ?></h3>
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
                                    <label class="control-label">Titul</label>
                                    <input type="text" name="title" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Jméno</label>
                                    <input type="text" name="name" value="" class="form-control" required>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Příjmení</label>
                                    <input type="text" name="surename" value="" class="form-control" required>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Firemní tel.</label>
                                    <input type="text" name="work_tel" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Soukromý tel.</label>
                                    <input type="text" name="tel" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Firemní email</label>
                                    <input type="text" name="work_email" value="" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Soukromý email</label>
                                    <input type="text" name="email" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Pohlaví</label>
                                    <select name="sex_id" class="form-control">
                                        <option value="">Nepřiřazeno</option>
                                        <?php foreach ($template_data['sex'] as $item): ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Rodinný stav</label>
                                    <select name="martial_status_id" class="form-control">
                                        <option value="">Nepřiřazen</option>
                                        <?php foreach($template_data['martial_status'] as $item): ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Datum narození</label>
                                    <input type="date" name="birthdate" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Rodné číslo</label>
                                    <input type="text" name="personal_id_num" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Číslo OP</label>
                                    <input type="text" name="op_num" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Národnost</label>
                                    <select name="nationality_id" class="form-control">
                                        <option value="">Nepřiřazena</option>
                                        <?php foreach ($template_data['nationality'] as $item): ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Druh spolupráce</label>
                                    <select name="relate_to_id" class="form-control">
                                        <option value="">Nepřiřazeno</option>
                                        <?php foreach ($template_data['relate_to'] as $item): ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-12 form-group">
                                    <label class="control-label">Trvalé bydliště</label>
                                    <input type="text" name="permanent_residence" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-12 form-group">
                                    <label class="control-label">Korespondenční adresa</label>
                                    <input type="text" name="mailing_address" value="" class="form-control">
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Pracovní pozice</label>
                                    <select name="job_id" class="form-control">
                                        <option value="">Nepřiřazena</option>
                                        <?php foreach ($template_data['jobs'] as $item): ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Typ provizního partnera</label>
                                    <select name="type_of_comm_partner_id" class="form-control">
                                        <option value="">Nepřiřazen</option>
                                        <?php foreach ($template_data['type_of_comm_partners'] as $item): ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Přiřazený operátor</label>
                                    <select name="assigned_operator_id" class="form-control">
                                    <option value="">Nepřiřazen</option>
                                        <?php foreach ($template_data['operators'] as $item): ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Přiřazený konzultant</label>
                                    <select name="assigned_seller_id" class="form-control">
                                        <option value="">Nepřiřazen</option>
                                        <?php foreach ($template_data['sellers'] as $item): ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Oddělení</label>
                                    <select name="department_id" class="form-control">
                                        <option value="">Nepřiřazeno</option>
                                        <?php foreach ($template_data['departments'] as $item): ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
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