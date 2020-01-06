<form class="mt-5 mb-5 login-input" action="{!! route('login') !!}" method="post">
    @csrf
    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <button class="btn login-form__btn submit w-100" type="submit">Masuk sebagai Pengajar</button>
</form>
