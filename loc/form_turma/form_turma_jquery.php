
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
  $('#id_sc_field_idturma' + iSeqRow).bind('blur', function() { sc_form_turma_idturma_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_turma_idturma_onfocus(this, iSeqRow) });
  $('#id_sc_field_nome' + iSeqRow).bind('blur', function() { sc_form_turma_nome_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_turma_nome_onfocus(this, iSeqRow) });
  $('#id_sc_field_turno' + iSeqRow).bind('blur', function() { sc_form_turma_turno_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_turma_turno_onfocus(this, iSeqRow) });
  $('#id_sc_field_alunos' + iSeqRow).bind('blur', function() { sc_form_turma_alunos_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_turma_alunos_onfocus(this, iSeqRow) });
  $('#id_sc_field_horarios' + iSeqRow).bind('blur', function() { sc_form_turma_horarios_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_turma_horarios_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_turma_idturma_onblur(oThis, iSeqRow) {
  do_ajax_form_turma_validate_idturma();
  scCssBlur(oThis);
}

function sc_form_turma_idturma_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_turma_nome_onblur(oThis, iSeqRow) {
  do_ajax_form_turma_validate_nome();
  scCssBlur(oThis);
}

function sc_form_turma_nome_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_turma_turno_onblur(oThis, iSeqRow) {
  do_ajax_form_turma_validate_turno();
  scCssBlur(oThis);
}

function sc_form_turma_turno_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_turma_alunos_onblur(oThis, iSeqRow) {
  do_ajax_form_turma_validate_alunos();
  scCssBlur(oThis);
}

function sc_form_turma_alunos_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_turma_horarios_onblur(oThis, iSeqRow) {
  do_ajax_form_turma_validate_horarios();
  scCssBlur(oThis);
}

function sc_form_turma_horarios_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

