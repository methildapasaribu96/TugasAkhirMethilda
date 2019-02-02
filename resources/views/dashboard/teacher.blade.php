@extends('layouts.dashboard')

@section('breadcrumbs')
<li class="breadcrumb-item">
  Teacher
</li>
@endsection

@section('content')

<script type="text/javascript">
  function isiPangkatGuru(lol){
    if (lol == 1){
      var xyz = document.getElementById("addGolongan").value;
    }
    else if (lol == 2){
      var xyz = document.getElementById("editGolongan").value;
    }
    if (xyz == "honorer"){
      document.getElementById("addPangkat").value = "honorer";
      document.getElementById("editPangkat").value = "honorer";
    }
    if (xyz == "IA"){
      document.getElementById("addPangkat").value = "Juru Muda";
      document.getElementById("editPangkat").value = "Juru Muda";
    }
    else if (xyz == "IB"){
      document.getElementById("addPangkat").value = "Juru Muda Tingkat 1";
      document.getElementById("editPangkat").value = "Juru Muda Tingkat 1";
    }
    else if (xyz == "IC"){
      document.getElementById("addPangkat").value = "Juru";
      document.getElementById("editPangkat").value = "Juru";
    }
    else if (xyz == "ID"){
      document.getElementById("addPangkat").value = "Juru Tingkat 1";
      document.getElementById("editPangkat").value = "Juru Tingkat 1";
    }
    else if (xyz == "IIA"){
      document.getElementById("addPangkat").value = "Pengatur Muda";
      document.getElementById("editPangkat").value = "Pengatur Muda";
    }
    else if (xyz == "IIB"){
      document.getElementById("addPangkat").value = "Pengatur Muda Tingkat 1";
      document.getElementById("editPangkat").value = "Pengatur Muda Tingkat 1";
    }
    else if (xyz == "IIC"){
      document.getElementById("addPangkat").value = "Pengatur";
      document.getElementById("editPangkat").value = "Pengatur";
    }
    else if (xyz == "IID"){
      document.getElementById("addPangkat").value = "Pengatur Tingkat 1";
      document.getElementById("editPangkat").value = "Pengatur Tingkat 1";
    }
    else if (xyz == "IIIA"){
      document.getElementById("addPangkat").value = "Penata Muda";
      document.getElementById("editPangkat").value = "Penata Muda";
    }
    else if (xyz == "IIIB"){
      document.getElementById("addPangkat").value = "Penata Muda Tingkat 1";
      document.getElementById("editPangkat").value = "Penata Muda Tingkat 1";
    }
    else if (xyz == "IIIC"){
      document.getElementById("addPangkat").value = "Penata";
      document.getElementById("editPangkat").value = "Penata";
    }
    else if (xyz == "IIID"){
      document.getElementById("addPangkat").value = "Penata Tingkat 1";
      document.getElementById("editPangkat").value = "Penata Tingkat 1";
    }
    else if (xyz == "IVA"){
      document.getElementById("addPangkat").value = "Pembina";
      document.getElementById("editPangkat").value = "Pembina";
    }
    else if (xyz == "IVB"){
      document.getElementById("addPangkat").value = "Pembina Tingkat 1";
      document.getElementById("editPangkat").value = "Pembina Tingkat 1";
    }
    else if (xyz == "IVC"){
      document.getElementById("addPangkat").value = "Pembina Utama Muda";
      document.getElementById("editPangkat").value = "Pembina Utama Muda";
    }
    else if (xyz == "IVD"){
      document.getElementById("addPangkat").value = "Pembina Utama Madya";
      document.getElementById("editPangkat").value = "Pembina Utama Madya";

    }
    else if (xyz == "IVE"){
      document.getElementById("addPangkat").value = "Pembina Utama";
      document.getElementById("editPangkat").value = "Pembina Utama";
    } 
  }
</script>
<div class="card mb3">

  <div class="card-header">
    Kelola Guru
    @if(auth()->user()->role == 'operator')
    <button id="addButton" style="float: right;" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addModal">
      <i class="fa fa-plus"></i>
    </button>
    @endif 
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table id="table" class="table table-bordered">
        <thead>
          <tr>
             <td style="width: 20%">NIP</td>
             <td style="width: 15%">Nama Guru</td>
             <td style="width: 20%">Pangkat</td>
             <td style="width: 10%">Golongan</td>
            <td style="width: 20%">Alamat Instansi</td>
             <td style="width: 15%">Aksi</td>
          </tr>
        </thead>
      </table>
    </div>
  </div>

</div>

@if(auth()->user()->role == 'operator')
<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        Tambah Guru
        <button class="close" role="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="post" id="addForm">

          <div class="form-group">
            <label>NIP</label>
            <input type="text" class="form-control" id="addNIP" placeholder="Masukan Nip Guru">
            <span class="invalid-feedback add-nip"></span>
          </div>

          <div class="form-group">
            <label>Nama Guru</label>
            <input type="text" class="form-control" id="addNama" placeholder="Masukan Nama Guru">
            <span class="invalid-feedback add-nama"></span>
          </div>

          <div class="form-group">
            <label>Golongan</label>
            <select id="addGolongan" class="form-control" onchange="isiPangkatGuru(1)">
              <option value="">Pilih golongan</option>
              <option value="honorer">Honorer</option>
              <option value="IA">IA</option>
              <option value="IB">IB</option>
              <option value="IC">IC</option>
              <option value="ID">ID</option>
              <option value="IIA">IIA</option>
              <option value="IIB">IIB</option>
              <option value="IIC">IIC</option>
              <option value="IID">IID</option>
              <option value="IIIA">IIIA</option>
              <option value="IIIB">IIIB</option>
              <option value="IIIC">IIIC</option>
              <option value="IIID">IIID</option>
              <option value="IVA">IVA</option>
              <option value="IVB">IVB</option>
              <option value="IVC">IVC</option>
              <option value="IVD">IVD</option>
              <option value="IVE">IVE</option>
            </select>
            <span class="invalid-feedback add-golongan"></span>
          </div>
          <div class="form-group">
            <label>Pangkat</label>
            <input type="text" value="Pangkat" class="form-control" disabled id="addPangkat">
            <span class="invalid-feedback add-pangkat"></span>
          </div>

          <div class="form-group">
            <label>Alamat Instansi</label>
            <textarea id="addAlamat" class="form-control" placeholder="Masukan Alamat Sekolah"></textarea>
            <span class="invalid-feedback add-alamat"></span>
          </div>

          <div class="form-group">
            <label>TMT</label>
            <input type="date" class="form-control" id="addTMT">
            <span class="invlaid-feedback add-tmt"></span>
          </div>

          <div class="form-group">
            <label>Gender</label>
            <select id="addGender" class="form-control">
              <option value="">Pilih gender</option>
              <option value="l">Laki-laki</option>
              <option value="p">Perempuan</option>
            </select>
            <span class="invalid-feedback add-gender"></span>
          </div>

          <div class="form-group">
            <label>Pendidikan</label>   
             <select id="addPendidikan" class="form-control">
              <option value="">Pilih Pendidikan</option>
              <option value="s3">S3</option>
              <option value="s2">S2</option>
              <option value="s1">S1</option>
              <option value="d3">D3</option>
              <option value="sma">SMA</option>
            </select>
             <span class="invalid-feedback add-pendidikan"></span>
          </div>

          <div class="form-group">
            <label>Jam mengajar</label>
            <input type="number" class="form-control" id="addJam" placeholder="Masukan Jam Mengajar Dalam Bentuk Angka">
            <span class="invalid-feedback add-jam"></span>
          </div>

          <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" class="form-control" id="addtempat_lahir" placeholder="Masukan Tempat Lahir">
            <span class="invalid-feedback add-tempat_lahir"></span>
          </div>

          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control" id="addtanggal_lahir">
            <span class="invlaid-feedback add-tanggal_lahir"></span>
          </div>

          <div class="form-group">
            <label>Masa Kerja</label>
            <input type="text" class="form-control" id="addMasaKerja" placeholder="Masukan Masa Kerja Guru">
            <span class="invalid-feedback add-masa-kerja"></span>
          </div>

          <br/>
          <input type="submit" value="Save" class="btn btn-info">

           <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      </div>

        </form>
      </div>
    </div>
  </div>

</div>
@endif

<div id="showModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        Lihat Guru
        <button class="close" role="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <table class="table">
          <tr>
            <td>NIP</td>
            <td id="viewNIP"></td>
          </tr>
          <tr>
            <td>Nama Guru</td>
            <td id="viewNama"></td>
          </tr>
          <tr>
            <td>Golongan</td>
            <td id="viewGolongan"></td>
          </tr>
          <tr>
            <td>Pangkat</td>
            <td id="viewPangkat"></td>
          </tr>
          <tr>
            <td>Alamat Instansi</td>
            <td id="viewAlamat"></td>
          </tr>
          <tr>
            <td>TMT</td>
            <td id="viewTMT"></td>
          </tr>
          <tr>
            <td>Gender</td>
            <td id="viewGender"></td>
          </tr>
          <tr>
            <td>Pendidikan terakhir</td>
            <td id="viewPendidikan"></td>
          </tr>
          <tr>
            <td>Jumlah jam mengajar</td>
            <td id="viewJam"></td>
          </tr>
          <tr>
            <td>Tempat lahir</td>
            <td id="viewtempat_lahir"></td>
          </tr>
          <tr>
            <td>Tanggal lahir</td>
            <td id="viewtanggal_lahir"></td>
          </tr>
          <tr>
            <td>Masa kerja</td>
            <td id="viewMasaKerja"></td>
          </tr>
        </table>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>

</div>

@if(auth()->user()->role == 'operator')
<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        Edit Data Guru
        <button class="close" role="button" data-dismiss="modal" aria-label="Cancel">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="post" id="editForm">

          <input type="hidden" value="" id="editID">

          <div class="form-group">
            <label>NIP</label>
            <input type="text" class="form-control" id="editNIP">
            <span class="invalid-feedback edit-nip"></span>
          </div>

          <div class="form-group">
            <label>Nama Guru</label>
            <input type="text" class="form-control" id="editNama">
            <span class="invalid-feedback edit-nama"></span>
          </div>

          <div class="form-group">
            <label>Golongan</label>
            <select id="editGolongan" class="form-control" onchange="isiPangkatGuru(2)">
              <option value="">Pilih golongan</option>
              <option value="honorer">Honorer</option>
              <option value="IA">IA</option>
              <option value="IB">IB</option>
              <option value="IC">IC</option>
              <option value="ID">ID</option>
              <option value="IIA">IIA</option>
              <option value="IIB">IIB</option>
              <option value="IIC">IIC</option>
              <option value="IID">IID</option>
              <option value="IIIA">IIIA</option>
              <option value="IIIB">IIIB</option>
              <option value="IIIC">IIIC</option>
              <option value="IIID">IIID</option>
              <option value="IVA">IVA</option>
              <option value="IVB">IVB</option>
              <option value="IVC">IVC</option>
              <option value="IVD">IVD</option>
              <option value="IVE">IVE</option>
            </select>
            <span class="invalid-feedback edit-golongan"></span>
          </div>

          <div class="form-group">
            <label>Pangkat</label>
            <input type="text" class="form-control" id="editPangkat" disabled>
            <span class="invalid-feedback edit-pangkat"></span>
          </div>

          <div class="form-group">
            <label>Alamat Instani</label>
            <textarea id="editAlamat" class="form-control"></textarea>
            <span class="invalid-feedback edit-alamat"></span>
          </div>

          <div class="form-group">
            <label>TMT</label>
            <input type="date" class="form-control" id="editTMT">
            <span class="invlaid-feedback edit-tmt"></span>
          </div>

          <div class="form-group">
            <label>Gender</label>
            <select id="editGender" class="form-control">
              <option value="">Pilih gender</option>
              <option value="l">Laki-laki</option>
              <option value="p">Perempuan</option>
            </select>
            <span class="invalid-feedback edit-gender"></span>
          </div>

           <div class="form-group">
            <label>Pendidikan</label>   
             <select id="editPendidikan" class="form-control">
              <option value="">Pilih Pendidikan</option>
              <option value="s3">S3</option>
              <option value="s2">S2</option>
              <option value="s1">S1</option>
              <option value="d3">D3</option>
              <option value="sma">SMA</option>
            </select>
            <span class="invalid-feedback edit-pendidikan"></span>
          </div>

          <div class="form-group">
            <label>Jam mengajar</label>
            <input type="number" class="form-control" id="editJam">
            <span class="invalid-feedback edit-jam"></span>
          </div>

          <div class="form-group">
            <label>Tempat lahir</label>
            <input type="text" class="form-control" id="edittempat_lahir" >
            <span class="invalid-feedback edit-tempat_lahir"></span>
          </div>

           <div class="form-group">
            <label>Tanggal lahir</label>
            <input type="date" class="form-control" id="edittanggal_lahir">
            <span class="invalid-feedback edit-tanggal_lahir"></span>
          </div>

          <div class="form-group">
            <label>Masa Kerja</label>
            <input type="text" class="form-control" id="editMasaKerja">
            <span class="invalid-feedback edit-masa-kerja"></span>
          </div>

          <br/>
          <input type="submit" value="Save" class="btn btn-info">

        </form>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>

</div>
@endif
@endsection


@section('script')
<script>
  $(document).ready(function () {

    $('#table').DataTable({
      serverSide: true,
      processing: true,
      ajax: "{{ route('teacher') }}",
      columns: [
        { data: 'nip', name: 'nip', searchable: true },
        { data: 'nama', name: 'nama', searchable: true },
        { data: 'pangkat', name: 'pangkat', searchable: true },
        { data: 'golongan', name: 'golongan', searchable: true },
        { data: 'alamat', name: 'alamat', searchable: true },
        { data: 'action', name: 'action' },

      ]
    });

    $('#table').on('click', '.show[data-id]', function () {
      var id = $(this).data('id');

      $.ajax({
        url: "{{ url('dashboard/teacher/json') }}/" + id,
        type: "GET",
        dataType: "JSON",
        data: {
          method: "_SHOW",
        },
        success: function (data) {
          $('#showModal').modal('toggle');
          $('#viewNIP').text(data.msg.nip);
          $('#viewNama').text(data.msg.nama);
          $('#viewGolongan').text(data.msg.golongan);
          $('#viewPangkat').text(data.msg.pangkat);
          $('#viewAlamat').text(data.msg.alamat);
          $('#viewTMT').text(data.msg.tmt);
          $('#viewGender').text(data.msg.gender);
          $('#viewPendidikan').text(data.msg.pendidikan);
          $('#viewJam').text(data.msg.jam_mengajar);
          $('#viewtempat_lahir').text(data.msg.tempat_lahir);
          $('#viewtanggal_lahir').text(data.msg.tanggal_lahir);
          $('#viewMasaKerja').text(data.msg.masa_kerja);
          console.log(data.msg);
        }
      })
    });

    @if(auth()->user()->role == 'operator')
    $('#addButton').on('click', function () {
      $('#addForm').trigger('reset');

      $('#addNIP').removeClass('is-invalid');
      $('.invalid-feedback.add-nip').empty();

      $('#addNama').removeClass('is-invalid');
      $('.invalid-feedback.add-nama').empty();

      $('#addGolongan').removeClass('is-invalid');
      $('.invalid-feedback.add-golongan').empty();

      $('#addPangkat').removeClass('is-invalid');
      $('.invalid-feedback.add-pangkat').empty();

      $('#addAlamat').removeClass('is-invalid');
      $('.invalid-feedback.add-alamat').empty();

      $('#addTMT').removeClass('is-invalid');
      $('.invalid-feedback.add-tmt').empty();

      $('#addGender').removeClass('is-invalid');
      $('.invalid-feedback.add-gender').empty();

      $('#addPendidikan').removeClass('is-invalid');
      $('.invalid-feedback.add-pendidikan').empty();

      $('#addJam').removeClass('is-invalid');
      $('.invalid-feedback.add-jam').empty();

      $('#addtempat_lahir').removeClass('is-invalid');
      $('.invalid-feedback.add-tempat_lahir').empty();

      $('#addtanggal_lahir').removeClass('is-invalid');
      $('.invalid-feedback.add-tanggal_lahir').empty();

      $('#addMasaKerja').removeClass('is-invalid');
      $('.invalid-feedback.add-masa-kerja').empty();

    });

    $('#addForm').on('submit', function (event) {
      event.preventDefault();
      $.ajax({
        url: "{{ url('dashboard/teacher/json') }}",
        dataType: "JSON",
        type: "POST",
        data: {
          method: '_STORE',
          nip: $('#addNIP').val(),
          nama: $('#addNama').val(),
          golongan: $('#addGolongan').val(),
          pangkat: $('#addPangkat').val(),
          alamat: $('#addAlamat').val(),
          tmt: $('#addTMT').val(),
          gender: $('#addGender').val(),
          pendidikan: $('#addPendidikan').val(),
          jam_mengajar: $('#addJam').val(),
          tempat_lahir: $('#addtempat_lahir').val(),
          tanggal_lahir: $('#addtanggal_lahir').val(),
          masa_kerja: $('#addMasaKerja').val(),
        },
        success: function (data) {
          if (data.errors) {
            if (data.errors.nip) {
              $('#addNIP').addClass('is-invalid');
              $('.invalid-feedback.add-nip').text(data.errors.nip);
            } else {
              $('#addNIP').removeClass('is-invalid');
              $('.invalid-feedback.add-nip').empty();
            }

            if (data.errors.nama) {
              $('#addNama').addClass('is-invalid');
              $('.invalid-feedback.add-nama').text(data.errors.nama);
            } else {
              $('#addNama').removeClass('is-invalid');
              $('.invalid-feedback.add-nama').empty();
            }

            if (data.errors.golongan) {
              $('#addGolongan').addClass('is-invalid');
              $('.invalid-feedback.add-golongan').text(data.errors.nip);
            } else {
              $('#addGolongan').removeClass('is-invalid');
              $('.invalid-feedback.add-golongan').empty();
            }

            if (data.errors.pangkat) {
              $('#addPangkat').addClass('is-invalid');
              $('.invalid-feedback.add-pangkat').text(data.errors.pangkat);
            } else {
              $('#addPangkat').removeClass('is-invalid');
              $('.invalid-feedback.add-pangkat').empty();
            }

            if (data.errors.alamat) {
              $('#addAlamat').addClass('is-invalid');
              $('.invalid-feedback.add-alamat').text(data.errors.alamat);
            } else {
              $('#addAlamat').removeClass('is-invalid');
              $('.invalid-feedback.add-alamat').empty();
            }

            if (data.errors.tmt) {
              $('#addTMT').addClass('is-invalid');
              $('.invalid-feedback.add-tmt').text(data.errors.tmt);
            } else {
              $('#addTMT').removeClass('is-invalid');
              $('.invalid-feedback.add-tmt').empty();
            }

            if (data.errors.gender) {
              $('#addGender').addClass('is-invalid');
              $('.invalid-feedback.add-gender').text(data.errors.gender);
            } else {
              $('#addGender').removeClass('is-invalid');
              $('.invalid-feedback.add-gender').empty();
            }

            if (data.errors.pendidikan) {
              $('#addPendidikan').addClass('is-invalid');
              $('.invalid-feedback.add-pendidikan').text(data.errors.pendidikan);
            } else {
              $('#addPendidikan').removeClass('is-invalid');
              $('.invalid-feedback.add-pendidikan').empty();
            }

            if (data.errors.jam_mengajar) {
              $('#addJam').addClass('is-invalid');
              $('.invalid-feedback.add-jam').text(data.errors.jam_mengajar);
            } else {
              $('#addJam').removeClass('is-invalid');
              $('.invalid-feedback.add-jam').empty();
            }

            if (data.errors.tempat_lahir) {
              $('#addtempat_lahir').addClass('is-invalid');
              $('.invalid-feedback.add-tempat_lahir').text(data.errors.tempat_lahir);
            } else {
              $('#addtempat_lahir').removeClass('is-invalid');
              $('.invalid-feedback.add-tempat_lahir').empty();
            }

             if (data.errors.tanggal_lahir) {
              $('#addtanggal_lahir').addClass('is-invalid');
              $('.invalid-feedback.add-tanggal_lahir').text(data.errors.tanggal_lahir);
            } else {
              $('#addtanggal_lahir').removeClass('is-invalid');
              $('.invalid-feedback.add-tanggal_lahir').empty();
            }

            if (data.errors.masa_kerja) {
              $('#addMasaKerja').addClass('is-invalid');
              $('.invalid-feedback.add-masa-kerja').text(data.errors.masa_kerja);
            } else {
              $('#addMasaKerja').removeClass('is-invalid');
              $('.invalid-feedback.add-masa-kerja').empty();
            }

          } else {
            toastr.success('NIP ' + data.msg.nip + ' ditambahkan');
            $('#addModal').modal('hide');
            $('#table').DataTable().draw(false);
          }
        }
      })
    });

    $('#table').on('click', '.edit[data-id]', function () {
      var id = $(this).data('id');

      $('#editModal').modal('toggle');
      $('#editID').val(id);
      $('#editForm').trigger('reset');

      $('#editNIP').removeClass('is-invalid');
      $('.invalid-feedback.edit-nip').empty();

      $('#editNama').removeClass('is-invalid');
      $('.invalid-feedback.edit-nama').empty();

      $('#editGolongan').removeClass('is-invalid');
      $('.invalid-feedback.edit-golongan').empty();

      $('#editPangkat').removeClass('is-invalid');
      $('.invalid-feedback.edit-pangkat').empty();

      $('#editAlamat').removeClass('is-invalid');
      $('.invalid-feedback.edit-alamat').empty();

      $('#editTMT').removeClass('is-invalid');
      $('.invalid-feedback.edit-tmt').empty();

      $('#editGender').removeClass('is-invalid');
      $('.invalid-feedback.edit-gender').empty();

      $('#editPendidikan').removeClass('is-invalid');
      $('.invalid-feedback.edit-pendidikan').empty();

      $('#editJam').removeClass('is-invalid');
      $('.invalid-feedback.edit-jam').empty();

      $('#edittempat_lahir').removeClass('is-invalid');
      $('.invalid-feedback.edit-tempat_lahir').empty();

      $('#edittanggal_lahir').removeClass('is-invalid');
      $('.invalid-feedback.edit-tanggal_lahir').empty();

      $('#editMasaKerja').removeClass('is-invalid');
      $('.invalid-feedback.edit-masa-kerja').empty();

      $.ajax({
        url: "{{ url('dashboard/teacher/json') }}/" + id + "/edit",
        dataType: "JSON",
        type: "GET",
        data: {
          method: '_EDIT',
        },
        success: function (data) {
          $('#editNIP').val(data.msg.nip);
          $('#editNama').val(data.msg.nama);
          $('#editGolongan').val(data.msg.golongan);
          $('#editPangkat').val(data.msg.pangkat);
          $('#editAlamat').val(data.msg.alamat);
          $('#editTMT').val(data.msg.tmt);
          $('#editGender').val(data.msg.gender);
          $('#editPendidikan').val(data.msg.pendidikan);
          $('#editJam').val(data.msg.jam_mengajar);
          $('#edittempat_lahir').val(data.msg.tempat_lahir);
          $('#edittanggal_lahir').val(data.msg.tanggal_lahir);
          $('#editMasaKerja').val(data.msg.masa_kerja);
        }
      })
    });

    $('#editForm').on('submit', function (event) {
      event.preventDefault();

      var id = $('#editID').val();

      $.ajax({
        url: "{{ url('dashboard/teacher/json') }}/" + id,
        dataType: "JSON",
        type: "PUT",
        data: {
          method: '_UPDATE',
          nip: $('#editNIP').val(),
          nama: $('#editNama').val(),
          golongan: $('#editGolongan').val(),
          pangkat: $('#editPangkat').val(),
          alamat: $('#editAlamat').val(),
          tmt: $('#editTMT').val(),
          gender: $('#editGender').val(),
          pendidikan: $('#editPendidikan').val(),
          jam_mengajar: $('#editJam').val(),
          tempat_lahir: $('#edittempat_lahir').val(),
          tanggal_lahir: $('#edittanggal_lahir').val(),
          masa_kerja: $('#editMasaKerja').val(),
        },
        success: function (data) {
          if (data.errors) {
            if (data.errors.nip) {
              $('#editNIP').addClass('is-invalid');
              $('.invalid-feedback.edit-nip').text(data.errors.nip);
            } else {
              $('#editNIP').removeClass('is-invalid');
              $('.invalid-feedback.edit-nip').empty();
            }

            if (data.errors.nama) {
              $('#editNama').addClass('is-invalid');
              $('.invalid-feedback.edit-nama').text(data.errors.nama);
            } else {
              $('#editNama').removeClass('is-invalid');
              $('.invalid-feedback.edit-nama').empty();
            }

            if (data.errors.golongan) {
              $('#editGolongan').addClass('is-invalid');
              $('.invalid-feedback.edit-golongan').text(data.errors.nip);
            } else {
              $('#editGolongan').removeClass('is-invalid');
              $('.invalid-feedback.edit-golongan').empty();
            }

            if (data.errors.pangkat) {
              $('#editPangkat').addClass('is-invalid');
              $('.invalid-feedback.edit-pangkat').text(data.errors.pangkat);
            } else {
              $('#editPangkat').removeClass('is-invalid');
              $('.invalid-feedback.edit-pangkat').empty();
            }

            if (data.errors.alamat) {
              $('#editAlamat').addClass('is-invalid');
              $('.invalid-feedback.edit-alamat').text(data.errors.alamat);
            } else {
              $('#editAlamat').removeClass('is-invalid');
              $('.invalid-feedback.edit-alamat').empty();
            }

            if (data.errors.tmt) {
              $('#editTMT').addClass('is-invalid');
              $('.invalid-feedback.edit-tmt').text(data.errors.tmt);
            } else {
              $('#editTMT').removeClass('is-invalid');
              $('.invalid-feedback.edit-tmt').empty();
            }

            if (data.errors.gender) {
              $('#editGender').addClass('is-invalid');
              $('.invalid-feedback.edit-gender').text(data.errors.gender);
            } else {
              $('#editGender').removeClass('is-invalid');
              $('.invalid-feedback.edit-gender').empty();
            }

            if (data.errors.pendidikan) {
              $('#editPendidikan').addClass('is-invalid');
              $('.invalid-feedback.edit-pendidikan').text(data.errors.pendidikan);
            } else {
              $('#editPendidikan').removeClass('is-invalid');
              $('.invalid-feedback.edit-pendidikan').empty();
            }

            if (data.errors.jam_mengajar) {
              $('#editJam').addClass('is-invalid');
              $('.invalid-feedback.edit-jam').text(data.errors.jam_mengajar);
            } else {
              $('#editJam').removeClass('is-invalid');
              $('.invalid-feedback.edit-jam').empty();
            }

            if (data.errors.tempat_lahir) {
              $('#edittempat_lahir').addClass('is-invalid');
              $('.invalid-feedback.edit-tempat_lahir').text(data.errors.tempat_lahir);
            } else {
              $('#edittempat_lahir').removeClass('is-invalid');
              $('.invalid-feedback.edit-tempat_lahir').empty();
            }
              if (data.errors.tanggal_lahir) {
              $('#edittanggal_lahir').addClass('is-invalid');
              $('.invalid-feedback.edit-tanggal_lahir').text(data.errors.tanggal_lahir);
            } else {
              $('#edittanggal_lahir').removeClass('is-invalid');
              $('.invalid-feedback.edit-tanggal_lahir').empty();
            }

            if (data.errors.masa_kerja) {
              $('#editMasaKerja').addClass('is-invalid');
              $('.invalid-feedback.edit-masa-kerja').text(data.errors.masa_kerja);
            } else {
              $('#editMasaKerja').removeClass('is-invalid');
              $('.invalid-feedback.edit-masa-kerja').empty();
            }

          } else {
            toastr.success('Data NIP ' + data.msg.nip + ' diperbarui');
            $('#editModal').modal('hide');
            $('#table').DataTable().draw(false);
          }
        }
      })
    });

    $('#table').on('click', '.delete[data-id]', function () {
      var id = $(this).data('id');

      bootbox.dialog({
        message: "Apakah anda yakin ingin menghapus data ini?",
        buttons: {
          no: {
            label: 'No',
            className: 'btn-danger',
            callback: function () {

            }
          },
          yes: {
            label: 'Yes',
            className: 'btn-success',
            callback: function () {
              console.log(id);
              $.ajax({
                url: "{{ url('dashboard/teacher/json') }}/" + id,
                type: 'DELETE',
                dataType: 'JSON',
                data: {
                  method: '_DESTROY',
                },
                success: function (data) {
                  toastr.warning('NIP ' + data.msg.nip + ' dihapus');
                  $('#table').DataTable().draw(false);
                }
              })
            }
          }
        }
      });
    });
    @endif

  });
</script>
@endsection
