<section class="content">
    <div class="row">
            <div class="col-lg-12 pinpin">
                <div class="card lobicard"  data-sortable="true">
                    <div class="card-header">
                        <div class="card-title custom_title">
                            <h4>Seznam uchazečů</h4>
                        </div>
                    </div>


                    <div class="card-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add-item" style="background: #009688;">Přidat pracovní pozici</button>
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
                                        <th>Akce</th>
                                    </tr>
                                    </thead>

                                    <!-- Table Body -->
                                    <?php foreach ($template_data['rows'] as $row): ?>
                                    <tbody>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['title'] ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['surename'] ?></td>
                                        <td><?= $row['tel'] ?></td>
                                        <td><?= $row['email'] ?></td>
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
                                                <h3><i class="fa fa-user m-r-5"></i> <?= $row['name'] ?> <?= $row['surename'] ?></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="" method="POST" class="form-horizontal">
                                                        <div class="row">
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Titul</label>
                                                                    <input type="text" name="title" placeholder="Název" value="<?= $row['title'] ?>" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Jméno</label>
                                                                    <input type="text" name="name" placeholder="Název" value="<?= $row['name'] ?>" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Příjmení</label>
                                                                    <input type="text" name="surename" placeholder="Název" value="<?= $row['surename'] ?>" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Tel</label>
                                                                    <input type="text" name="tel" placeholder="Název" value="<?= $row['tel'] ?>" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Email</label>
                                                                    <input type="text" name="email" placeholder="Název" value="<?= $row['email'] ?>" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Adresa</label>
                                                                    <input type="text" name="address" placeholder="Název" value="<?= $row['address'] ?>" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Datum narození</label>
                                                                    <input type="date" name="birthdate" placeholder="Název" value="<?php date('Y-m-d', strtotime($row['birthdate'])) ?>" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Vzdělání</label>
                                                                    <input type="text" name="education" placeholder="Název" value="<?= $row['education'] ?>" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Jazyk</label>
                                                                    <input type="hidden" name="language_id" value="<?= $row['language_id'] ?>">
                                                                    <input type="text" placeholder="Název" value="<?= $template_data['languages'][$row['language_id']]['name'] ?>" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Pracovní pozice</label>
                                                                    <input type="hidden" name="job_id" value="<?= $row['job_id'] ?>">
                                                                    <input type="text" placeholder="Název" value="<?= $template_data['jobs'][$row['job_id']]['name'] ?>" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Poznámka</label>
                                                                    <input type="text" name="note" placeholder="Název" value="<?= $row['note'] ?>" class="form-control" readonly>
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
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Titul</label>
                                                                    <input type="text" name="title" placeholder="Titul" value="<?= $row['title'] ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Jméno</label>
                                                                    <input type="text" name="name" placeholder="Jméno" value="<?= $row['name'] ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Příjmení</label>
                                                                    <input type="text" name="surename" placeholder="Příjmení" value="<?= $row['surename'] ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Tel</label>
                                                                    <input type="text" name="tel" placeholder="Tel" value="<?= $row['tel'] ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Email</label>
                                                                    <input type="text" name="email" placeholder="Email" value="<?= $row['email'] ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Adresa</label>
                                                                    <input type="text" name="address" placeholder="Adresa" value="<?= $row['address'] ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Datum narození</label>
                                                                    <input type="date" name="birthdate" placeholder="Datum narození" value="<?= date('Y-m-d', strtotime($row['birthdate'])) ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Vzdělání</label>
                                                                    <input type="text" name="education" placeholder="Vzdělání" value="<?= $row['education'] ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Jazyk</label>
                                                                    <select name="language_id" class="form-control">
                                                                        <?php foreach ($template_data['languages'] as $lang): ?>
                                                                        <option value="<?= $lang['id'] ?>"<?= ($lang['id'] == $row['language_id']) ? 'selected' : null ?>><?= $lang['name'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Pracovní pozice</label>
                                                                    <select name="job_id" class="form-control">
                                                                        <?php foreach ($template_data['jobs'] as $job): ?>
                                                                        <option value="<?= $job['id'] ?>" <?= ($job['id'] == $row['job_id']) ? 'selected' : null ?>><?= $job['name'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Poznámka</label>
                                                                    <input type="text" name="note" placeholder="Poznámka" value="<?= $row['note'] ?>" class="form-control">
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
                                                                <label class="control-label">Odstranit uchazeče?</label>
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
                <h3><i class="fa fa-user m-r-5"></i> Přidat pracovní pozici</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                                                
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST" class="form-horizontal">
                            <div class="row">
                                    <!-- Text input-->
                                    <div class="col-md-12 form-group">
                                        <label class="control-label">Titul</label>
                                        <input type="text" name="title" placeholder="Titul" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-12 form-group">
                                        <label class="control-label">Jméno</label>
                                        <input type="text" name="name" placeholder="Jméno" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-12 form-group">
                                        <label class="control-label">Příjmení</label>
                                        <input type="text" name="surename" placeholder="Příjmení" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-12 form-group">
                                        <label class="control-label">Tel</label>
                                        <input type="text" name="tel" placeholder="Tel" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-12 form-group">
                                        <label class="control-label">Email</label>
                                        <input type="text" name="email" placeholder="Email" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-12 form-group">
                                        <label class="control-label">Adresa</label>
                                        <input type="text" name="address" placeholder="Adresa" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-12 form-group">
                                        <label class="control-label">Datum narození</label>
                                        <input type="date" name="birthdate" placeholder="Datum narození" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-12 form-group">
                                        <label class="control-label">Vzdělání</label>
                                        <input type="text" name="education" placeholder="Vzdělání" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-12 form-group">
                                        <label class="control-label">Jazyk</label>
                                        <select name="language_id" class="form-control">
                                            <?php foreach ($template_data['languages'] as $lang): ?>
                                            <option value="<?= $lang['id'] ?>"><?= $lang['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-12 form-group">
                                        <label class="control-label">Pracovní pozice</label>
                                        <select name="job_id" class="form-control">
                                            <?php foreach ($template_data['jobs'] as $job): ?>
                                            <option n:foreach="$jobs as $job" value="<?= $job['id'] ?>"><?= $job['name']?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-12 form-group">
                                        <label class="control-label">Poznámka</label>
                                        <input type="text" name="note" placeholder="Poznámka" value="" class="form-control">
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