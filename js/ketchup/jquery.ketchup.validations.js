jQuery.ketchup

.validation('required', 'Rellene este campo.', function(form, el, value) {
  var type = el.attr('type').toLowerCase();
  
  if(type == 'checkbox' || type == 'radio') {
    return (el.attr('checked') == true);
  } else {
    return (value.length != 0);
  }
})

.validation('minlength', 'Este campo debe tener un largo mínimo de {arg1} caracteres .', function(form, el, value, min) {
  return (value.length >= +min);
})

.validation('maxlength', 'Este campo debe tener un largo máximo de {arg1} caracteres.', function(form, el, value, max) {
  return (value.length <= +max);
})

.validation('rangelength', 'Este campo debe tener un largo entre {arg1} y {arg2} caracteres.', function(form, el, value, min, max) {
  return (value.length >= min && value.length <= max);
})

.validation('min', 'Debe ser por lo menos {arg1}.', function(form, el, value, min) {
  return (this.isNumber(value) && +value >= +min);
})

.validation('max', 'No puede ser más de {arg1}.', function(form, el, value, max) {
  return (this.isNumber(value) && +value <= +max);
})

.validation('range', 'Debe ser un valor entre {arg1} y {arg2}.', function(form, el, value, min, max) {
  return (this.isNumber(value) && +value >= +min && +value <= +max);
})

.validation('number', 'Deben ser un números.', function(form, el, value) {
  return this.isNumber(value);
})

.validation('digits', 'Deben ser digitos.', function(form, el, value) {
  return /^\d+$/.test(value);
})

.validation('email', 'Debe ser un E-Mail valido.', function(form, el, value) {
  return this.isEmail(value);
})

.validation('url', 'Debe ser una URL valida.', function(form, el, value) {
  return this.isUrl(value);
})

.validation('username', 'Debe ser un Nombre de usuario valido.', function(form, el, value) {
  return this.isUsername(value);
})

.validation('match', 'Debe ser {arg1}.', function(form, el, value, word) {
  return (el.val() == word);
})

.validation('contain', 'Debe contener {arg1}', function(form, el, value, word) {
  return this.contains(value, word);
})

.validation('date', 'Ingrese una fecha valida.', function(form, el, value) {
  return this.isDate(value);
})

.validation('minselect', 'Seleccione por lo menos {arg1} checkbox.', function(form, el, value, min) {
  return (min <= this.inputsWithName(form, el).filter(':checked').length);
}, function(form, el) {
  this.bindBrothers(form, el);
})

.validation('maxselect', 'No seleccione más de {arg1} checkboxes.', function(form, el, value, max) {
  return (max >= this.inputsWithName(form, el).filter(':checked').length);
}, function(form, el) {
  this.bindBrothers(form, el);
})

.validation('rangeselect', 'Seleccione entre {arg1} y {arg2} checkboxes.', function(form, el, value, min, max) {
  var checked = this.inputsWithName(form, el).filter(':checked').length;
  
  return (min <= checked && max >= checked);
}, function(form, el) {
  this.bindBrothers(form, el);
});