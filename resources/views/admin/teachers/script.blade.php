<!-- Data picker -->
<script src="{{asset('qlab/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('qlab/js/plugins-init/form-pickers-init.js')}}"></script>
<!-- Jasny -->
<script src="{{asset('jasny/jasny-bootstrap.min.js')}}"></script>
<script>
    $(document).ready(function(){
        console.log('#datepicker-autoclose');
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
        $("#email").blur(function(){
          var email   = $("#email").val();
          if (email.search('@')>=0) {
            var pesan2   = "Email Terverifikasi";
            $("#labelEmail").remmoveClass('text-danger').text('Email');
            $("#textEmail").text(pesan2);
          }else {
            var pesan3   = "Email harus sesuai standar";
            $("#labelEmail").addClass('text-danger').text('Email *');
            $("#textEmail").text(pesan3);
          }
        })
        $("#password").blur(function(){
          var passNew   = $("#password").val();
          var konfirPass  = $("#confirmation_password").val();
          if (passNew == "" && konfirPass == "") {
              $(".text-muted").remove();
              $("#textPassword").removeClass('text-danger').text("").append("<i>Password minimal 8 karakter</i>");
              $("#labelPass").removeClass('text-danger').text('Password');
          }else if (passNew.length < 8) {
            $(".text-muted").remove();
            $("#labelPass").addClass('text-danger').text('Password *');
            $("#textPassword").addClass('text-danger').text("Masukkan minimal 8 Karakter");
          }else {
            $(".text-muted").remove();
            $("#labelPass").removeClass('text-danger').text('Password');
            $("#textPassword").removeClass('text-danger').text("");
          }
        })
        $("#confirmation_password").blur(function(){
          var passNew     = $("#password").val();
          var konfirPass  = $("#confirmation_password").val();
          if (passNew == "" && konfirPass == "") {
              $("#textCPassword").removeClass('text-danger').text("").append("<i>Password minimal 8 karakter</i>");
              $("#konfirPass").removeClass('text-danger').text('Konfirmasi Password');
              $(".text-muted").text("Password minimal 8 karakter");
          }else if (konfirPass !== passNew) {
            $(".text-muted").remove();
            $("#labelPass").addClass('text-danger').text('Password *');
            $("#konfirPass").addClass('text-danger').text('Konfirmasi Password *');
            $("#textCPassword").addClass('text-danger').text("Password tidak sama");
          }else if (konfirPass.length < 8) {
            $(".text-muted").remove();
            $("#konfirPass").addClass('text-danger').text('Konfirmasi Password *');
            $("#textCPassword").addClass('text-danger').text("Lengkapi Password anda");
          }else {
            $(".text-muted").remove();
            $("#konfirPass").removeClass('text-danger').text('Konfirmasi Password');
            $("#textCPassword").removeClass('text-danger').text("");
            document.getElementById("tombol").disabled = false;
          }
        })
        $("#nip").bind("keypress", function(e){
            var keyCode = e.which ? e.which : e.keyCode;
            if (!(keyCode >= 48 && keyCode <=57)) {
                return false;
            }else {
                return true;
            }
        })
        $("#nik").bind("keypress", function(e){
            var keyCode = e.which ? e.which : e.keyCode;
            if (!(keyCode >= 48 && keyCode <= 57)) {
                return false;
            }else {
                return true;
            }
        })
        $("#year").bind("keypress", function(e){
            var keyCode = e.which ? e.which : e.keyCode;
            if (!(keyCode >= 48 && keyCode <= 57)) {
                return false;
            }else {
                return true;
            }
        })
        $("#phone").bind("keypress",function(e){
            var keyCode = e.which ? e.which : e.keyCode;
            if (!(keyCode >= 48 && keyCode <= 57)) {
                return false;
            }else {
                return true;
            }
        })

        $("#nip").blur(function(){
            var nip = $("#nip").val();
            if (nip == "") {
                $("#labelNip").addClass('text-danger').text('Nomor Induk Pegawai (NIP) *');
                $("#noticeNip").addClass('text-danger').text('Nomor Induk Pegawai (NIP) wajib diisi');
            }else {
                $("#labelNip").removeClass('text-danger').text('Nomor Induk Pegawai (NIP)');
                $("#noticeNip").removeClass('text-danger').text("");
            }
        });
        $("#nik").blur(function(){
            var nik = $("#nik").val();
            if (nik == "") {
                $("#labelNik").addClass('text-danger').text('Nomor Induk Kependudukan (NIK) *');
                $("#noticeNik").addClass('text-danger').text('Nomor Induk Kependudukan (NIK) wajib diisi');
            }else if (nik.length < 16) {
                $("#labelNik").addClass('text-danger').text('Nomor Induk Kependudukan (NIK) *');
                $("#noticeNik").addClass('text-danger').text('Nomor Induk Kependudukan (NIK) harus 16 digit');
            }else {
                $("#labelNik").removeClass('text-danger').text('Nomor Induk Kependudukan (NIK)');
                $("#noticeNik").removeClass('text-danger').text("");
            }
        })
        $("#name").blur(function(){
            var name = $("#name").val();
            if (name == "") {
                $("#labelName").addClass('text-danger').text('Nama *');
                $("#noticeName").addClass('text-danger').text('Nama Wajib diisi');
            }else if (name.length < 4 || name.length >= 100) {
                $("#labelName").addClass('text-danger').text('Nama *');
                $("#noticeName").addClass('text-danger').text('Nama minimal 4 karakter dan maksimal 100 karakter');
            }else {
                $("#labelName").removeClass('text-danger').text('Nama');
                $("#noticeName").removeClass('text-danger').text("");
            }
        })
        $("#ttl").blur(function(){
            var ttl = $("#ttl").val();
            if (ttl == "") {
                $("#labelTtl").addClass('text-danger').text('Tempat Lahir *');
                $("#noticeTtl").addClass('text-danger').text('Tempat Lahir wajib diisi');
            }else if (ttl.length < 5) {
                $("#labelTtl").addClass('text-danger').text('Tempat Lahir *');
                $("#noticeTtl").addClass('text-danger').text('Tempat Lahir minimal 5 karakter');
            }else {
                $("#labelTtl").removeClass('text-danger').text('Tempat Lahir');
                $("#noticeTtl").removeClass('text-danger').text("");
            }
        })
        $("#year").blur(function(){
            var year = $("#year").val();
            if (year == "") {
                $("#labelYear").addClass('text-danger').text('Tahun Masuk *');
                $("#noticeYear").addClass('text-danger').text('Tahun Masuk tidak boleh kosong');
            }else if(year.length < 4 || year.length > 4) {
                $("#labelYear").addClass('text-danger').text('Tahun Masuk *');
                $("#noticeYear").addClass('text-danger').text('Tahun Masuk tidak sesuai standar');
            }else {
                $("#labelYear").removeClass('text-danger').text('Tahun Masuk');
                $("#noticeYear").removeClass('text-danger').text("");
            }
        })
        $("#religion").blur(function(){
            var selek = $("#religion option:selected").val();
            if (selek == "") {
                $("#labelReligion").addClass('text-danger').text('Agama *');
            }else {
                $("#labelReligion").removeClass('text-danger').text('Agama');
            }
        })
        $("#address").blur(function(){
            var address = $("#address").val();
            if (address == "") {
                $("#labelAddress").addClass('text-danger').text('Alamat *');
                $("#noticeAddress").addClass('text-danger').text('Alamat tidak boleh Kosong');
            }else if (address.length < 5) {
                $("#labelAddress").addClass('text-danger').text('Alamat *');
                $("#noticeAddress").addClass('text-danger').text('Alamat terlalu pendek');
            }else {
                $("#labelAddress").removeClass('text-danger').text('Alamat');
                $("#noticeAddress").removeClass('text-danger').text("");
            }
        })
        $("#phone").blur(function(){
            var phone = $("#phone").val();
            if (phone == "") {
                $("#labelPhone").addClass('text-danger').text('Nomor Hp *');
                $("#noticePhone").addClass('text-danger').text('Nomor Hp tidak boleh kosong');
            }else if (phone.length < 11 || phone.length > 15) {
                $("#labelPhone").addClass('text-danger').text('Nomor Hp *');
                $("#noticePhone").addClass('text-danger').text('Nomor Hp minimal 11 dan maksimal 15 karakter');
            }else {
                $("#labelPhone").removeClass('text-danger').text('Nomor Hp');
                $("#noticePhone").removeClass('text-danger').text("");
            }
        })
   });
</script>
