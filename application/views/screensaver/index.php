<div class="container">
    <h2 class="text-left"><?= isset($title) ? $title : ''; ?></h1>
	<div class="row">
		<div class="col-12">
			<button id="btnAdd" class="btn btn-primary position-absolute rounded-pill" style="right: 0;" data-bs-toggle="modal" data-bs-target="#tambahModal">
	            <i class="fa fa-plus mr-2"></i> Tambah
	        </button>
        </div>
	</div>
	<div class="table-responsive">
		<div id="notification" style="max-width: 300px;"></div>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
	</div>
</div>

<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-left">
                <form action="#" class="row">
                	<div id="submit_results"></div>
                    <div class="col">
                    	<input type="hidden" id="id" name="id">
                        <h5>Pilih Jenis File</h5>
                        <div class="checkbox-wrapper d-flex mt-3">
                            <div class="form-check mr-2">
                                <input class="form-check-input" type="radio" name="file_type" id="flexRadioDefault1" value="foto">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Foto
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="file_type" id="flexRadioDefault2" checked value="video">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Video
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h5>Upload File Video</h5>
                        <input class="form-control btn-primary rounded-pill" type="file" id="formFile" name="file_upload"></div>
                    </div>
                    <button class="btn btn-primary rounded-pill" id="btn-save">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Anda yakin ingin menghapus? </h2>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary rounded-pill mt-0 mr-2" id="yes">Ya</button>
                    <button class="btn btn-outline-primary rounded-pill" id="no">Tidak</button>
                </div>
            </div>
        </div>
    </div>
</div>