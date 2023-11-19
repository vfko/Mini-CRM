<section class="content">
    <div class="row">
            <div class="col-lg-12 pinpin">
                <div class="card lobicard"  data-sortable="true">
                    <div class="card-header">
                        <div class="card-title custom_title">
                            <h4>Seznam výběrových řízení</h4>
                        </div>
                    </div>


                    <div class="card-body">
                            <div class="btn-group">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add-item" style="background: #009688;">Přidat výběrové řízení</button>
                            </div>

                            <!-- Table -->
                            <div class="table-responsive">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                    <thead class="back_table_color">
                                    <tr class="info">
                                        <th>Název výběrového řízení</th>
                                        <th>Obsazovaná pozice</th>
                                        <th>Uchazeči</th>
                                        <th>Datum zahájení</th>
                                        <th>Akce</th>
                                    </tr>
                                    </thead>

                                    <!-- Table Body -->
                                    <?php foreach ($template_data['rows'] as $row): ?>
                                    <tbody>
                                    <tr>
                                        <td><?= $row['tender_name'] ?></td>
                                        <td><?= $template_data['jobs'][$row['job_id']]['name'] ?></td>
                                        <td><?php foreach ($row['candidate_id'] as $tender_candidate) {echo $row['candidates'][$tender_candidate]['name'].' '.$row['candidates'][$tender_candidate]['surename'].', ';} ?></td>
                                        <td><?= date('d.m.Y', strtotime($row['start_date'])) ?></td>
                                        <td>
                                            <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#update-<?= $row['id'] ?>"><i class="fa fa-pencil"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-<?= $row['id'] ?>"><i class="fa fa-trash-o"></i> </button>
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
                                                                    <label class="control-label">Název výběrového řízení</label>
                                                                    <input type="text" name="tender_name" placeholder="Název výběrového řízení" value="<?= $row['tender_name'] ?>" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Obsazovaná pozice</label>
                                                                    <select name="job_id" class="form-control">
                                                                        <?php foreach ($template_data['jobs'] as $job): ?>
                                                                        <option value="<?= $job['id'] ?>" <?= ($job['id'] == $row['job_id']) ? 'selected' : null ?>><?= $job['name'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Datum zahájení</label>
                                                                    <input type="date" name="start_date" value="<?= $row['start_date'] ?>" placeholder="Datum zahájení" class="form-control">
                                                                </div>

                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Uchazeči</label>
                                                                    <?php foreach ($row['candidates'] as $candidate): ?>
                                                                    <div class="checkbox checkbox-info">
                                                                        <input id="<?= $row['id'] ?><?= $candidate['id'] ?>" type="checkbox" name="candidate_id[]" value="<?= $candidate['id'] ?>" <?php foreach ($row['candidate_id'] as $candidate_id): ?> <?= ($candidate_id == $candidate['id']) ? 'checked' : null ?> <?php endforeach ?>>
                                                                        <label for="<?= $row['id'] ?><?= $candidate['id'] ?>"><?= $candidate['id'] ?>: <?= $candidate['name'].' '.$candidate['surename'] ?></label>
                                                                    </div>
                                                                    <?php endforeach ?>
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
                                                <h3><i class="fa fa-user m-r-5"></i> <?= $row['tender_name'] ?></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="" method="POST" class="form-horizontal">
                                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                        <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                                <label class="control-label">Odstranit výběrové řízení?</label>
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
                                    <label class="control-label">Název výběrového řízení</label>
                                    <input type="text" name="tender_name" placeholder="Název výběrového řízení" value="" class="form-control" required>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6 form-group">
                                    <label class="control-label">Obsazovaná pozice</label>
                                    <select name="job_id" class="form-control">
                                        <?php foreach ($template_data['jobs'] as $job): ?>
                                        <option value="<?= $job['id'] ?>"><?= $job['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-12 form-group">
                                    <label class="control-label">Datum zahájení</label>
                                    <input type="date" name="start_date" value="" class="form-control" required>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label class="control-label">Uchazeči</label>
                                    <?php foreach ($row['candidates'] as $candidate): ?>
                                    <div class="checkbox checkbox-info" n:foreach="$candidates as $candidate">
                                        <input id="add-<?= $candidate['id'] ?>" type="checkbox" name="candidate_id[]" value="<?= $candidate['id'] ?>">
                                        <label for="add-<?= $candidate['id'] ?>"><?= $candidate['id'] ?>: <?= $candidate['name'].' '.$candidate['surename'] ?></label>
                                    </div>
                                    <?php endforeach ?>
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