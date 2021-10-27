<div class="form-group">
    <label for="name">Nombre en la tarjeta</label>
    <input name="name" id="name" maxlength="20" type="text" class="form-control">
</div>
<div class="form-group position-relative">
    <label for="cardnumber">Nº de tarjeta</label>
    @if(app()->environment('local'))
        <span id="generatecard">generate random</span>
    @endif
    <input name="cardnumber" id="cardnumber" type="text" pattern="[0-9 ]*" inputmode="numeric" class="form-control">
    <svg id="ccicon" class="ccicon" width="750" height="471" viewBox="0 0 750 471" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"></svg>
</div>
<div class="form-group">
    <label for="expirationdate">Vencimiento (mm/yy)</label>
    <input name="expirationdate" id="expirationdate" type="text" pattern="[0-9]*/[0-9]*" inputmode="numeric" class="form-control">
</div>
<div class="form-group">
    <label for="securitycode">Código de seguridad</label>
    <input name="securitycode" id="securitycode" type="text" pattern="[0-9]*" inputmode="numeric" class="form-control">
</div>