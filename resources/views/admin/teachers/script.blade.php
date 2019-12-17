<!-- Jasny -->
<script src="{{asset('inspinia/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('inspinia/js/plugins/iCheck/icheck.min.js')}}"></script>
<!-- Data picker -->
<script src="{{asset('inspinia/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            radioClass: 'iradio_square-green',
        });
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
        var mem = $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $("#email").blur(function(){
          var email   = $("#email").val();
          if (email.search('@')>=0) {
            var pesan2   = "Email Terverifikasi";
            $("#labelEmail").remmoveClass('text-danger').text('Email');
            $("#email").remmoveClass('border border-danger');
            $("#textEmail").text(pesan2);
          }else {
            var pesan3   = "Email harus sesuai standar";
            $("#labelEmail").addClass('text-danger').text('Email *');
            $("#email").addClass('border border-danger');
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
              $("#password").removeClass('border border-danger');
              document.getElementById("tombol").disabled = false;
          }else if (passNew.length < 8) {
            $(".text-muted").remove();
            $("#labelPass").addClass('text-danger').text('Password *');
            $("#password").addClass('border border-danger');
            $("#textPassword").addClass('text-danger').text("Masukkan minimal 8 Karakter");
            document.getElementById("tombol").disabled = true;
          }else {
            $(".text-muted").remove();
            $("#labelPass").removeClass('text-danger').text('Password');
            $("#password").removeClass('border border-danger');
            $("#textPassword").removeClass('text-danger').text("");
            document.getElementById("tombol").disabled = true;
          }
        })
        $("#confirmation_password").blur(function(){
          var passNew     = $("#password").val();
          var konfirPass  = $("#confirmation_password").val();
          if (passNew == "" && konfirPass == "") {
              $("#textCPassword").removeClass('text-danger').text("").append("<i>Password minimal 8 karakter</i>");
              $("#konfirPass").removeClass('text-danger').text('Konfirmasi Password');
              $("#confirmation_password").removeClass('border border-danger');
              $(".text-muted").text("Password minimal 8 karakter");
              document.getElementById("tombol").disabled = false;
          }else if (konfirPass !== passNew) {
            $(".text-muted").remove();
            $("#labelPass").addClass('text-danger').text('Password *');
            $("#password").addClass('border border-danger');
            $("#konfirPass").addClass('text-danger').text('Konfirmasi Password *');
            $("#confirmation_password").addClass('border border-danger');
            $("#textCPassword").addClass('text-danger').text("Password tidak sama");
            document.getElementById("tombol").disabled = true;
          }else if (konfirPass.length < 8) {
            $(".text-muted").remove();
            $("#konfirPass").addClass('text-danger').text('Konfirmasi Password *');
            $("#confirmation_password").addClass('border border-danger');
            $("#textCPassword").addClass('text-danger').text("Lengkapi Password anda");
            document.getElementById("tombol").disabled = true;
          }else {
            $(".text-muted").remove();
            $("#konfirPass").removeClass('text-danger').text('Konfirmasi Password');
            $("#confirmation_password").removeClass('border border-danger');
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
                $("#labelNip").addClass('text-danger').text('NIP *');
                $("#nip").addClass('border border-danger');
                $("#noticeNip").addClass('text-danger').text('NIP wajib diisi');
                document.getElementById("tombol1").disabled = true;
            }else {
                $("#labelNip").removeClass('text-danger').text('NIP');
                $("#nip").removeClass('border border-danger');
                $("#noticeNip").removeClass('text-danger').text("");
                document.getElementById("tombol1").disabled = false;
            }
        });
        $("#nik").blur(function(){
            var nik = $("#nik").val();
            if (nik == "") {
                $("#labelNik").addClass('text-danger').text('NIK *');
                $("#nik").addClass('border border-danger');
                $("#noticeNik").addClass('text-danger').text('NIK wajib diisi');
                document.getElementById("tombol1").disabled = true;
            }else if (nik.length < 16) {
                $("#labelNik").addClass('text-danger').text('NIK *');
                $("#nik").addClass('border border-danger');
                $("#noticeNik").addClass('text-danger').text('NIK harus 16 digit');
                document.getElementById("tombol1").disabled = true;
            }else {
                $("#labelNik").removeClass('text-danger').text('NIK');
                $("#nik").removeClass('border border-danger');
                $("#noticeNik").removeClass('text-danger').text("");
                document.getElementById("tombol1").disabled = false;
            }
        })
        $("#name").blur(function(){
            var name = $("#name").val();
            if (name == "") {
                $("#labelName").addClass('text-danger').text('Nama *');
                $("#name").addClass('border border-danger');
                $("#noticeName").addClass('text-danger').text('Nama Wajib diisi');
                document.getElementById("tombol1").disabled = true;
            }else if (name.length < 4 || name.length >= 100) {
                $("#labelName").addClass('text-danger').text('Nama *');
                $("#name").addClass('border border-danger');
                $("#noticeName").addClass('text-danger').text('Nama minimal 4 karakter dan maksimal 100 karakter');
                document.getElementById("tombol1").disabled = true;
            }else {
                $("#labelName").removeClass('text-danger').text('Nama');
                $("#name").removeClass('border border-danger');
                $("#noticeName").removeClass('text-danger').text("");
                document.getElementById("tombol1").disabled = false;
            }
        })
        $("#ttl").blur(function(){
            var ttl = $("#ttl").val();
            if (ttl == "") {
                $("#labelTtl").addClass('text-danger').text('Tempat Lahir *');
                $("#ttl").addClass('border border-danger');
                $("#noticeTtl").addClass('text-danger').text('Tempat Lahir wajib diisi');
                document.getElementById("tombol1").disabled = true;
            }else if (ttl.length < 5) {
                $("#labelTtl").addClass('text-danger').text('Tempat Lahir *');
                $("#ttl").addClass('border border-danger');
                $("#noticeTtl").addClass('text-danger').text('Tempat Lahir minimal 5 karakter');
                document.getElementById("tombol1").disabled = true;
            }else {
                $("#labelTtl").removeClass('text-danger').text('Tempat Lahir');
                $("#ttl").removeClass('border border-danger');
                $("#noticeTtl").removeClass('text-danger').text("");
                document.getElementById("tombol1").disabled = true;
            }
        })
        $("#year").blur(function(){
            var year = $("#year").val();
            if (year == "") {
                $("#labelYear").addClass('text-danger').text('Tahun Masuk *');
                $("#year").addClass('border border-danger');
                $("#noticeYear").addClass('text-danger').text('Tahun Masuk tidak boleh kosong');
                document.getElementById("tombol1").disabled = true;
            }else if(year.length < 4 || year.length > 4) {
                $("#labelYear").addClass('text-danger').text('Tahun Masuk *');
                $("#year").addClass('border border-danger');
                $("#noticeYear").addClass('text-danger').text('Tahun Masuk tidak sesuai standar');
                document.getElementById("tombol1").disabled = true;
            }else {
                $("#labelYear").removeClass('text-danger').text('Tahun Masuk');
                $("#year").removeClass('border border-danger');
                $("#noticeYear").removeClass('text-danger').text("");
                document.getElementById("tombol1").disabled = false;
            }
        })
        $("#religion").blur(function(){
            var selek = $("#religion option:selected").val();
            if (selek == "") {
                $("#labelReligion").addClass('text-danger').text('Agama *');
                $("#religion").addClass('border border-danger');
                document.getElementById("tombol1").disabled = true;
            }else {
                $("#labelReligion").removeClass('text-danger').text('Agama');
                $("#religion").removeClass('border border-danger');
                document.getElementById("tombol1").disabled = false;
            }
        })
        $("#address").blur(function(){
            var address = $("#address").val();
            if (address == "") {
                $("#labelAddress").addClass('text-danger').text('Alamat *');
                $("#address").addClass('border border-danger');
                $("#noticeAddress").addClass('text-danger').text('Alamat tidak boleh Kosong');
                document.getElementById("tombol1").disabled = true;
            }else if (address.length < 5) {
                $("#labelAddress").addClass('text-danger').text('Alamat *');
                $("#address").addClass('border border-danger');
                $("#noticeAddress").addClass('text-danger').text('Alamat terlalu pendek');
                document.getElementById("tombol1").disabled = true;
            }else {
                $("#labelAddress").removeClass('text-danger').text('Alamat');
                $("#address").removeClass('border border-danger');
                $("#noticeAddress").removeClass('text-danger').text("");
                document.getElementById("tombol1").disabled = false;
            }
        })
        $("#phone").blur(function(){
            var phone = $("#phone").val();
            if (phone == "") {
                $("#labelPhone").addClass('text-danger').text('Nomor Hp *');
                $("#phone").addClass('border border-danger');
                $("#noticePhone").addClass('text-danger').text('Nomor Hp tidak boleh kosong');
                document.getElementById("tombol1").disabled = true;
            }else if (phone.length < 11 || phone.length > 15) {
                $("#labelPhone").addClass('text-danger').text('Nomor Hp *');
                $("#phone").addClass('border border-danger');
                $("#noticePhone").addClass('text-danger').text('Nomor Hp minimal 11 dan maksimal 15 karakter');
                document.getElementById("tombol1").disabled = true;
            }else {
                $("#labelPhone").removeClass('text-danger').text('Nomor Hp');
                $("#phone").removeClass('border border-danger');
                $("#noticePhone").removeClass('text-danger').text("");
                document.getElementById("tombol1").disabled = false;
            }
        })
   });
</script>
