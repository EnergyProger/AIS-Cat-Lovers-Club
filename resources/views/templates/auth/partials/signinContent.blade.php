<div class="register">
    <h4>Вхід</h4>
<form action="{{route('signin')}}" method="POST" novalidate>
    @csrf
  <div class="form-group">
    <label for="email">Eлектронна почта:</label>
    <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" 
            placeholder="Введіть E-mail" value="{{Request::old('email')?:''}}">

    @if($errors->has('email'))
        <span class="help-block text-danger">{{$errors->first('email')}}<span>
    @endif
  </div>

  <div class="form-group">
    <label for="pwd">Пароль:</label>
    <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="pwd" name="password" placeholder="Мінімум 6 символів">

    @if($errors->has('password'))
        <span class="help-block text-danger">{{$errors->first('password')}}<span>
    @endif
  </div>

 <!-- <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Запам'ятати мене
    </label>
  </div>-->
  <button type="submit" class="btn btn-primary">Увійти</button>
  
</form>
<div class="form-group mt-2">
    Немаєте аккаунта? <a href="{{route('signup')}}">Створити аккаунт</a>
  </div>
</div>

