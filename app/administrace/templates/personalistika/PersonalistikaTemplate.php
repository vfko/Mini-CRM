<!-- Main content -->
<section class="content">
               <div class="row">

                     <!-- Tables -->
                       <div class="col-lg-6 pinpin" n:foreach="$tables as $table">
                           <div class="card lobicard"  data-sortable="true">
                               <div class="card-header lobicard-custom-control">
                                   <div class="card-title custom_title">
                                       <h4>{$table['table_alias']}</h4>
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

                                       </table>
                                       
                                       <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#add-{$table['table_name']}">Přidat položku</button>

                                       <!-- Add modal -->
                                       <div class="modal fade" id="add-{$table['table_name']}" tabindex="-1" role="dialog" aria-hidden="true">
                                          <div class="modal-dialog">
                                             <div class="modal-content">
                                                <div class="modal-header modal-header-primary">
                                                   <h3><i class="fa fa-flag m-r-5"></i> Přidat položku</h3>
                                                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                   <div class="row">
                                                      <div class="col-md-12">

                                                         <form class="form-horizontal" action="" method="POST">
                                                            <div class="row">
                                                                  <input type="hidden" name="table_name" value="{$table['table_name']}">
                                                                  <div class="col-md-4 form-group">
                                                                     <label class="control-label">Název položky</label>
                                                                     <input type="text" placeholder="Název položky" class="form-control" name="name" value="">
                                                                  </div>
                                                                  <div class="col-md-12 form-group user-form-group">
                                                                     <div class="float-right">
                                                                        <button type="submit" class="btn btn-add btn-sm" name="submit" value="add">Přidat</button>
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


               </div>
            </section>
            <!-- /.content -->