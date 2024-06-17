<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Cetak Kartu Ujian Siswa
		<small>Mencetak Kartu Siswa Berdasarkan Data Siswa Yang Telah Di Inputkan.</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url(); ?>/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Kartu Siswa</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-md-12">
            <div class="callout callout-info">
                <h4>Informasi</h4>
                <p>Cetak Kartu Ujian Siswa Berdasarkan Kelas.</p>
                
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-12">
			<?php echo form_open($url.'/kartu','id="form-kartu"'); ?>
                <div class="box">
                    <div class="box-header with-border">
    					<div class="box-title">Cetak Kartu Ujian Siswa</div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-group col-sm-6">
                            <label>Pilih Kelas Siswa</label>
							<div id="data-group">
								<select name="group" id="group" class="form-control input-sm">
									<?php if(!empty($select_group)){ echo $select_group; } ?>
								</select>
							</div>
                            
                        </div>
                        
                        <?php if(!empty($hasil)){ echo $hasil; } ?>
                    </div>
					
					<div class="box-footer">
                        <button type="button" class="btn btn-primary" id="kartu">Cetak Kartu Ujian</button>
                    </div>
                </div>
			<?php echo form_close(); ?> 
        </div>
    </div>
</section><!-- /.content -->



<script lang="javascript">
	$(function(){
        $('#kartu').click(function(){
			var grup_id = $('#group').val();
			window.open("<?php echo site_url().'/'.$url; ?>/cetak_kartu/"+grup_id);
		});
    });
</script>