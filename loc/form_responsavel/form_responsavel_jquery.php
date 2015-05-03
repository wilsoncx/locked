
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (0 < $oField.length && 0 < $oField[0].offsetHeight && 0 < $oField[0].offsetWidth && !$oField[0].disabled) {
    $oField[0].focus();
  }
} // scFocusField

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_idresponsavel' + iSeqRow).bind('blur', function() { sc_form_responsavel_idresponsavel_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_responsavel_idresponsavel_onfocus(this, iSeqRow) });
  $('#id_sc_field_nome' + iSeqRow).bind('blur', function() { sc_form_responsavel_nome_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_responsavel_nome_onfocus(this, iSeqRow) });
  $('#id_sc_field_celular' + iSeqRow).bind('blur', function() { sc_form_responsavel_celular_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_responsavel_celular_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_responsavel_email_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_responsavel_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_cpf' + iSeqRow).bind('blur', function() { sc_form_responsavel_cpf_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_responsavel_cpf_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_responsavel_idresponsavel_onblur(oThis, iSeqRow) {
  do_ajax_form_responsavel_validate_idresponsavel();
  scCssBlur(oThis);
}

function sc_form_responsavel_idresponsavel_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_responsavel_nome_onblur(oThis, iSeqRow) {
  do_ajax_form_responsavel_validate_nome();
  scCssBlur(oThis);
}

function sc_form_responsavel_nome_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_responsavel_celular_onblur(oThis, iSeqRow) {
  do_ajax_form_responsavel_validate_celular();
  scCssBlur(oThis);
}

function sc_form_responsavel_celular_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_responsavel_email_onblur(oThis, iSeqRow) {
  do_ajax_form_responsavel_validate_email();
  scCssBlur(oThis);
}

function sc_form_responsavel_email_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_responsavel_cpf_onblur(oThis, iSeqRow) {
  do_ajax_form_responsavel_validate_cpf();
  scCssBlur(oThis);
}

function sc_form_responsavel_cpf_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

