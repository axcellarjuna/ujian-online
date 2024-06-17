<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Daftar Ujian
		<small>Melihat Daftar Ujian, Mengubah dan Menghapus Ujian</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url(); ?>/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Daftar Ujian</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
						<div class="box-title">Daftar Ujian</div>
    					<div class="box-tools pull-right">
							<div class="dropdown pull-right">
								<a href="<?php echo site_url(); ?>/manager/tes_tambah">Tambah Ujian</a>
    						</div>
    					</div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <?php echo form_open($url.'/hapus_daftar_tes','id="form-hapus-pilih"'); ?>
                        <input type="hidden" name="check" id="check" value="0">
                        <input type="hidden" name="centang" id="centang" value="0">
                        <div id="form-pesan"><?php if(!empty($pesan_hapus)){ echo $pesan_hapus; } ?></div>
                        <table id="table-tes" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th class="all">Nama Ujian</th>
                                    <th>Max Score</th>
                                    <th class="all">Waktu Mulai Ujian</th>
                                    <th>Waktu Selesai Ujian</th>
                                    <th class="none">Waktu Ujian</th>
                                    <th class="none">Poin Dasar</th>
                                    <th class="none">Tunjukkan Hasil</th>
                                    <th class="none">Token</th>
									<th class="none">Soal</th>
									<th class="none">Kelas Siswa</th>
                                    <th class="all"></th>
                                    <th class="all"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
									<td> </td>
									<td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
									<td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>   
                        </form>                     
                    </div>
                    <div class="box-footer">
                        <button type="button" id="btn-edit-hapus" class="btn btn-primary" title="Hapus Siswa yang dipilih">Hapus Ujian</button>
                        <button type="button" id="btn-edit-pilih" class="btn btn-default pull-right">Pilih Semua</button>
                    </div>
                </div>
        </div>
    </div>

    <div class="modal" id="modal-hapus" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <?php echo form_open($url.'/hapus_tes','id="form-hapus"'); ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <div id="trx-judul">Hapus Ujian</div>
                </div>
                <div class="modal-body">
                    <div class="row-fluid">
                        <div class="box-body">
                            <div id="form-pesan-hapus"></div>
                            <div class="form-group">
                                <label>Nama Ujian</label>
                                <input type="hidden" name="hapus-id" id="hapus-id">
                                <input type="text" class="form-control" id="hapus-nama" name="hapus-nama" readonly>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control" id="hapus-deskripsi" name="hapus-deskripsi" readonly>
                            </div>
                            <p>Ujian yang dihapus akan membuat data nilai user juga akan ikut terhapus</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-hapus" class="btn btn-default">Hapus</button>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>

    </form>
    </div>

    <div class="modal" id="modal-hapus-pilih" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <div id="trx-judul">Hapus Ujian</div>
                </div>
                <div class="modal-body">
                    <div class="row-fluid">
                        <div class="box-body">
                            <strong>Peringatan</strong>
                            Data Ujian yang sudah dipilih akan dihapus beserta hasil ujian tersebut.
                            <br /><br />
                            Apakah anda yakin untuk menghapus ?
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="edit-hapus-centang" name="edit-hapus-centang" value="1"> Ya, saya yakin Menghapus Ujian yang telah dipilih.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-hapus-pilih" class="btn btn-default pull-left">Hapus</button>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>

</section><!-- /.content -->



<script lang="javascript">
    function refresh_table(){
        $('#table-tes').dataTable().fnReloadAjax();
    }

    function edit(id){
        window.open("<?php echo site_url(); ?>/manager/tes_tambah/index/"+id, "_self");
    }

    function hapus(id){
        $("#modal-proses").modal('show');
        $.getJSON('<?php echo site_url().'/'.$url; ?>/get_by_id/'+id+'', function(data){
            if(data.data==1){
                $('#hapus-id').val(data.id);
                $('#hapus-nama').val(data.nama);
                $('#hapus-deskripsi').val(data.deskripsi);


                $("#modal-hapus").modal('show');
            }
            $("#modal-proses").modal('hide');
        });
    }

    $(function(){
        $('#btn-edit-pilih').click(function(event) {
            if($('#check').val()==0) {
                $(':checkbox').each(function() {
                    this.checked = true;
                });
                $('#check').val('1');
            }else{
                $(':checkbox').each(function() {
                    this.checked = false;
                });
                $('#check').val('0');
            }
        });
        $('#btn-edit-hapus').click(function(){
            $('#centang').val('0');
            $('#edit-hapus-centang').removeAttr("checked");;
            $("#modal-hapus-pilih").modal('show');
        });
        $('#btn-hapus-pilih').click(function(){
            $("#modal-proses").modal('show');
            $("#form-hapus-pilih").submit();
        });
        $("#edit-hapus-centang").change(function() {
            if(this.checked) {
                $('#centang').val('1');
            }else{
                $('#centang').val('0');
            }
        });

        $('#form-hapus').submit(function(){
            $("#modal-proses").modal('show');
            $.ajax({
                    url:"<?php echo site_url().'/'.$url; ?>/hapus_tes",
                    type:"POST",
                    data:$('#form-hapus').serialize(),
                    cache: false,
                    success:function(respon){
                        var obj = $.parseJSON(respon);
                        if(obj.status==1){
                            refresh_table()
                            $("#modal-proses").modal('hide');
                            $("#modal-hapus").modal('hide');
                            notify_success(obj.pesan);
                        }else{
                            $("#modal-proses").modal('hide');
                            $('#form-pesan-hapus').html(pesan_err(obj.pesan));
                        }
                    }
            });
            return false;
        });

        $('#table-tes').DataTable({
                  "paging": true,
                  "iDisplayLength":50,
                  "bProcessing": false,
                  "bServerSide": true, 
                  "searching": true,
                  "aoColumns": [
    					{"bSearchable": false, "bSortable": false, "sWidth":"20px"},
    					{"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false, "sWidth":"150px"},
    					{"bSearchable": false, "bSortable": false, "sWidth":"150px"},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false},
						{"bSearchable": false, "bSortable": false},
						{"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false, "sWidth":"30px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"20px"}],
                  "sAjaxSource": "<?php echo site_url().'/'.$url; ?>/get_datatable/",
                  "autoWidth": false,
                  "responsive": true
         });          
    });
</script>