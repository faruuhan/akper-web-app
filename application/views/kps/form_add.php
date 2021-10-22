<div class="content">
	<!-- Start Content-->
	<div class="container-fluid">
		<div class="row page-title">
			<div class="col-md-12">
				<nav aria-label="breadcrumb" class="float-right mt-1">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">KPS</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $title_tab; ?></li>
					</ol>
				</nav>
				<h4 class="mb-1 mt-0"><?= $title_tab; ?></h4>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="header-title mt-0"><?= $title_form; ?></h4>

						<form class="form-horizontal" method="POST" action="<?php echo site_url('kps/simpan') ?>">
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="nokps">No KPS</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" value="<?= $pembayaran[0]->no_kps ?>" name="no_kps"
												id="nokps" readonly>
                        <input type="hidden" class="form-control" value="<?= $this->uri->segment(2) ?>" name="page"
												id="page">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="nim">NIM</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" value="<?= $this->session->userdata('userAlias') ?>"
												name="nim" id="nim" readonly>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="semester">Semester</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" value="<?= $pembayaran[0]->semester ?>" name="semester" id="semester" readonly>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="tahun">Tahun Akademik</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" value="<?= $pembayaran[0]->tahun_akademik ?>" name="tahun_akademik" id="tahun" readonly>
										</div>
									</div>
                  
									<table class="table mb-0">
										<thead class="thead-light">
											<tr>
												<th scope="col" style="width:50px">#</th>
												<th scope="col" style="width:85%">Matakuliah</th>
												<th scope="col">SKS</th>
											</tr>
										</thead>
										<tbody id="ItemKPS">
										<?php $no=1; foreach($list_jadwal as $row) { ?>
											<tr>
												<th><?= $no; ?></th>
												<td><input type="hidden" class="form-control" value="<?= $row->kd_jadwal; ?>" name="kd_jadwal[]">
												<input type="hidden" class="form-control" value="<?= $row->kd_matkul; ?>" name="kd_matkul[]">
												<?= $row->matakuliah; ?></td>
												<td><?= $row->sks; ?></td>
											</tr>
										<?php $no++; } ?>
										</tbody>
										<tfoot>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Matakuliah</th>
												<th scope="col">SKS</th>
											</tr>
										</tfoot>
									</table>
									<div class="form-group text-right mb-0">
										<button class="btn btn-primary mr-1" type="submit">Submit</button>
										<button type="reset" class="btn btn-secondary">Cancel</button>
									</div>
								</div>
							</div>
						</form>

					</div> <!-- end card-body -->
				</div> <!-- end card-->
			</div><!-- end col -->
		</div>
		<!-- end row -->

	</div> <!-- container-fluid -->

</div> <!-- content -->

<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Modal Heading</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table id="myTable" class="table table-striped dt-responsive nowrap">
          <thead>
            <tr>
              <td>Kode Jadwal</td>
              <td>Matakuliah / Dosen</td>
              <td width="5">Action</td>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($list_jadwal as $row) {?>
            <tr>
              <td><?= $row->kd_jadwal ?></td>
              <td><b><?= $row->matakuliah ?></b>,
              <p><?= $row->nama_dosen ?></p>
              </td>
              <td>
                <button 
                data-kd_jadwal ="<?= $row->kd_jadwal ?>" 
                data-kd_matkul ="<?= $row->kd_matkul ?>" 
                data-matkul ="<?= $row->matakuliah ?>" 
                class="btn btn-primary btnSelect" type="button">Select</button>
              </td>
            </tr>
            <?php $no++; } ?>
          </tbody>
        </table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
var rowItem = [];
var arIndex = 0;

$(document).ready(function(){

	//<!-- Start Udate 30 mar 19 -->
	$('.btnSelect').click(function(){
		var kdjadwal = $(this).data('kd_jadwal');
		var matakuliah = $(this).data('matkul');
		var kdmatkul = $(this).data('kd_matkul');

		rowItem[arIndex]=[kdmatkul,matakuliah,kdjadwal];
		arIndex++;
		
		$(this).appendItem();
		
		$('#myModal').modal('toggle');
	});

	$.fn.appendItem = function(){
		var set_number =  $('#ItemKPS').length+1;
		var item ='';
		for(i=0; i<rowItem.length; i++){
        item += '<tr>';
          item += '<th>'+i+'</th>';
					item += '<td><input type="hidden" name="kd_matkul[]" value="'+rowItem[i][0]+'" readonly>'+rowItem[i][1]+'</td>';
					item += '<td><input type="hidden" name="kd_jadwal[]" id="kdjadwal_'+i+'" value="'+rowItem[i][2]+'">'+rowItem[i][2]+'</td>';
					item += '<td><button type="button" id="'+i+'" onClick="$(this).removeItem();" class="btn btn-danger">Delete</button></td>';		
				item += '</tr>';	
		}
		$('#ItemKPS').html(item);
	}

	$.fn.removeItem = function(){
		var curid= $(this).attr('id');
		arIndexNew = 0;
		rowItemNew=[];

		for(x=0; x < rowItem.length; x++){
			if(x != curid){
				rowItemNew[arIndexNew]=[
						rowItem[x][0],
						rowItem[x][1],
						rowItem[x][2]
					];
					arIndexNew++;
			}
		}
		arIndex = rowItemNew.length;
		rowItem = rowItemNew;

		$(this).appendItem();
	};
	
});

</script>
