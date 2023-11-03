<section class="content">
    <div class="row">
            <div class="col-lg-12 pinpin">
                <div class="card lobicard"  data-sortable="true">
                    <div class="card-header">
                        <div class="card-title custom_title">
                            <h4>Kontakty</h4>
                        </div>
                    </div>


                    <div class="card-body">
                            <div class="btn-group">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add-item" style="background: #009688;">Nový kontakt</button>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-item" style="background: #009688;"><i class="fa fa-filter" aria-hidden="true"></i></button>
                            </div>

                            <!-- Table -->
                            <div class="table-responsive">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                    <thead class="back_table_color">
                                    <tr class="info">
                                        <th>ID klienta</th>
                                        <th>Typ vztahu</th>
                                        <th>Jméno</th>
                                        <th>Příjmení</th>
                                        <th>Tel</th>
                                        <th>Email</th>
                                        <th>Doporučitel</th>
                                        <th>GDPR</th>
                                        <th>Akce</th>
                                    </tr>
                                    </thead>

                                    <!-- Table Body -->
                                    <?php //foreach ($template_data['rows'] as $row): ?>
                                    <tbody>
                                    <tr>
                                        <td>RP2385</td>
                                        <td>Klient</td>
                                        <td>Markéta</td>
                                        <td>Rosenbergová</td>
                                        <td>770880990, 720820920</td>
                                        <td>rosenbergová@seznam.cz</td>
                                        <td>Jaroslava Píšová (RP2385)</td>
                                        <td>ANO</td>
                                        <td>
                                            <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#info-<?= $row['id'] ?>">&nbsp<i class="fa fa-info"></i>&nbsp</button>
                                            <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#update-<?= $row['id'] ?>"><i class="fa fa-pencil"></i></button>
                                            <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#gdpr-<?= $row['id'] ?>"><i class="fa fa-check-square" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-<?= $row['id'] ?>"><i class="fa fa-trash-o"></i> </button>
                                        </td>
                                    </tr>

                                    <!-- Info modal -->
                                    <div class="modal fade" id="info-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header modal-header-primary">
                                                <h3><i class="fa fa-user m-r-5"></i> Nadpis</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="" method="POST" class="form-horizontal">
                                                        <div class="row">
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">ID klienta</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Typ vztahu</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Titul</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Jméno</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Příjmení</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Tel</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Email</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Věk</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Domácnost</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Ulice</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Město</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">PSČ</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Okres</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Kraj</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Doporučitel</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Vztah k doporučiteli</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Poznámka</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Operátor</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Spánkový konzultant</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Provizní partner</label>
                                                                    <input type="text" name="title" value="" class="form-control" readonly>
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
                                                                    <label class="control-label">ID klienta</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Typ vztahu</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Titul</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Jméno</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Příjmení</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Tel</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Email</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Věk</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Domácnost</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Ulice</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Město</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">PSČ</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Okres</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Kraj</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Doporučitel</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Vztah k doporučiteli</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-12 form-group">
                                                                    <label class="control-label">Poznámka</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Operátor</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Spánkový konzultant</label>
                                                                    <input type="text" name="title" value="" class="form-control">
                                                                </div>
                                                                <!-- Text input-->
                                                                <div class="col-md-6 form-group">
                                                                    <label class="control-label">Provizní partner</label>
                                                                    <input type="text" name="title" value="" class="form-control">
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
                                                <h3><i class="fa fa-user m-r-5"></i> Nadpis</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="" method="POST" class="form-horizontal">
                                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                        <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                                <label class="control-label">Odstranit?</label>
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
                                    <?php //endforeach ?>
                                </table>

                                <!-- Pagination -->
                                <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#" style="color: #A9A9A9;">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#" style="color: #A9A9A9; background-color: #009688;">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#" style="color: #A9A9A9;">3</a></li>
                                </ul>
                                </nav>
                                <!-- /Pagination -->

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
                <h3><i class="fa fa-user m-r-5"></i> Nový kontakt</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                                                
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST" class="form-horizontal">
                            <div class="row">
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">ID klienta</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Typ vztahu</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Titul</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Jméno</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Příjmení</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Tel</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Email</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Věk</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Domácnost</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Ulice</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Město</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">PSČ</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Okres</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Kraj</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Doporučitel</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Vztah k doporučiteli</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-12 form-group">
                                        <label class="control-label">Poznámka</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Operátor</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Spánkový konzultant</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">Provizní partner</label>
                                        <input type="text" name="title" value="" class="form-control">
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