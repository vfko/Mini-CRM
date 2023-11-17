<!-- Main content -->
<section class="content">
               <div class="row">

                  <?php foreach($template_data['tables'] as $table): ?>
                     <!-- Tables -->
                       <div class="col-lg-6 pinpin">
                           <div class="card lobicard"  data-sortable="true">
                               <div class="card-header lobicard-custom-control">
                                   <div class="card-title custom_title">
                                       <h4><?= $table['table_alias'] ?></h4>
                                   </div>
                               </div>
                               <div class="card-body">
                                    <div class="table-responsive">
                                       <table class="table table-bordered table-hover">
                                          <thead class="back_table_color">
                                             <tr class="info">
                                                <th>Název</th>
                                                <th>Akce</th>
                                             </tr>
                                          </thead>

                                          <!-- Table body -->
                                          <?php foreach ($table['data'] as $row): ?>
                                          <tbody>
                                             <tr>
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <td><?= $row['name'] ?></td>
                                                <td>
                                                   <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#update-<?= $row['id'] ?>-<?= $table['table_name'] ?>"><i class="fa fa-pencil"></i></button>
                                                   <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delt-<?= $row['id'] ?>-<?= $table['table_name'] ?>"><i class="fa fa-trash-o"></i> </button>
                                                </td>


                                                <!-- Update modal -->
                                                <div class="modal fade" id="update-<?= $row['id'] ?>-<?= $table['table_name'] ?>"?> tabindex="-1" role="dialog" aria-hidden="true">
                                                   <div class="modal-dialog">
                                                      <div class="modal-content">
                                                         <div class="modal-header modal-header-primary">
                                                            <h3><i class="fa fa-flag m-r-5"></i> Upravit položku <?= (isset($row['name'])) ? $row['name'] : null ?>"</h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                         </div>
                                                         <div class="modal-body">
                                                            <div class="row">
                                                               <div class="col-md-12">

                                                                  <form class="form-horizontal" action="" method="POST">
                                                                     <div class="row">
                                                                        <!-- Text input-->
                                                                           <input type="hidden" name="table_name" value="<?= $table['table_name'] ?>">
                                                                           <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                                           <!-- Text input-->
                                                                           <div class="col-md-8 form-group">
                                                                              <label class="control-label">Název položky</label>
                                                                              <input type="text" placeholder="Název položky" class="form-control" name="name" value="<?= $row['name'] ?>">
                                                                           </div>
                                                                           <div class="col-md-12 form-group user-form-group">
                                                                              <div class="float-right">
                                                                                 <button type="submit" class="btn btn-add btn-sm" name="submit" value="<?= UPDATE ?>">Upravit</button>
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
                                                      <!-- /.modal-content -->
                                                   </div>
                                                   <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.Update modal -->
            
                                                <!-- Delete odal -->
                                                <div class="modal fade" id="delt-<?= $row['id'] ?>-<?= $table['table_name'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                   <div class="modal-dialog">
                                                      <div class="modal-content">
                                                         <div class="modal-header modal-header-primary">
                                                            <h3><i class="fa fa-flag m-r-5"></i> <?= $row['name'] ?></h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                         </div>
                                                         <div class="modal-body">
                                                            <div class="row">
                                                               <div class="col-md-12">

                                                                  <form class="form-horizontal" action="" method="POST">
                                                                     <fieldset>
                                                                        <div class="col-md-12 form-group user-form-group">
                                                                           <input type="hidden" name="table_name" value="<?= $table['table_name'] ?>">
                                                                           <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                                           <label class="control-label">Smazat položku "<?= $row['name'] ?>"?</label>
                                                                           <div class="float-right">
                                                                              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">NE</button>
                                                                              <button type="submit" class="btn btn-add btn-sm" name="submit" value="<?= DELETE ?>">ANO</button>
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
                                                      <!-- /.modal-content -->
                                                   </div>
                                                   <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /. Delete modal -->       
                                       
                                             </tr>
                                          </tbody>
                                          <?php endforeach ?>
                                          <!-- /.Table Body -->

                                       </table>
                                       
                                       <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#add-<?= $table['table_name'] ?>">Přidat položku</button>

                                       <!-- Add modal -->
                                       <div class="modal fade" id="add-<?= $table['table_name'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                          <div class="modal-dialog">
                                             <div class="modal-content">
                                                <div class="modal-header modal-header-primary">
                                                   <h3><i class="fa fa-flag m-r-5"></i> Přidat položku do <?= $table['table_alias'] ?></h3>
                                                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                   <div class="row">
                                                      <div class="col-md-12">

                                                         <form class="form-horizontal" action="" method="POST">
                                                            <div class="row">
                                                                  <input type="hidden" name="table_name" value="<?= $table['table_name'] ?>">
                                                                  <div class="col-md-8 form-group">
                                                                     <label class="control-label">Název položky</label>
                                                                     <input type="text" placeholder="Název položky" class="form-control" name="name" value="">
                                                                  </div>
                                                                  <div class="col-md-12 form-group user-form-group">
                                                                     <div class="float-right">
                                                                        <button type="submit" class="btn btn-add btn-sm" name="submit" value="<?= ADD ?>">Přidat</button>
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
                                             <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                       </div>
                                       <!-- /.Add modal -->

                                    </div>
                                 </div>
                           </div>
                       </div>
                     <!-- Tables -->
                     <?php endforeach ?>


               </div>
            </section>
            <!-- /.content -->