<section class="content">
    
        <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
        width="100%">
        <thead>
            <tr>
            <th>ID klienta</th>
            <th>Typ vztahu</th>
            <th>Titul</th>
            <th>Jméno</th>
            <th>Příjení</th>
            <th>Tel</th>
            <th>Email</th>
            <th>Věk</th>
            <th>Domácnost</th>
            <th>Ulice</th>
            <th>Město</th>
            <th>PSČ</th>
            <th>Doporučitel</th>
            <th>Akce</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>Tiger</td>
            <td>Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
            <td>5421</td>
            <td>t.nixon@datatables.net</td>
            <td>t.nixon@datatables.net</td>
            <td>t.nixon@datatables.net</td>
            <td>t.nixon@datatables.net</td>
            <td>t.nixon@datatables.net</td>
            <td>t.nixon@datatables.net</td>
            <td>t.nixon@datatables.net</td>
            <td>t.nixon@datatables.net</td>
            <td>t.nixon@datatables.net</td>
            </tr>
        </tbody>
        </table>


    <!-- Add item modal -->
    <div class="modal fade" id="add-item" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <h3><i class="fa fa-user m-r-5"></i> Přidat ...</h3>
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

<script>
$(document).ready(function () {
  $('#dtHorizontalExample').DataTable({
    "scrollX": true
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>