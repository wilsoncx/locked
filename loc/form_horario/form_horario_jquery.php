
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
  $('#id_sc_field_idhorario' + iSeqRow).bind('blur', function() { sc_form_horario_idhorario_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_horario_idhorario_onfocus(this, iSeqRow) });
  $('#id_sc_field_descricao' + iSeqRow).bind('blur', function() { sc_form_horario_descricao_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_horario_descricao_onfocus(this, iSeqRow) });
  $('#id_sc_field_h_entrada' + iSeqRow).bind('blur', function() { sc_form_horario_h_entrada_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_horario_h_entrada_onfocus(this, iSeqRow) });
  $('#id_sc_field_h_saida' + iSeqRow).bind('blur', function() { sc_form_horario_h_saida_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_horario_h_saida_onfocus(this, iSeqRow) });
  $('#id_sc_field_h_tolerancia' + iSeqRow).bind('blur', function() { sc_form_horario_h_tolerancia_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_horario_h_tolerancia_onfocus(this, iSeqRow) });
  $('#id_sc_field_diasemana' + iSeqRow).bind('blur', function() { sc_form_horario_diasemana_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_horario_diasemana_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_horario_idhorario_onblur(oThis, iSeqRow) {
  do_ajax_form_horario_validate_idhorario();
  scCssBlur(oThis);
}

function sc_form_horario_idhorario_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_horario_descricao_onblur(oThis, iSeqRow) {
  do_ajax_form_horario_validate_descricao();
  scCssBlur(oThis);
}

function sc_form_horario_descricao_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_horario_h_entrada_onblur(oThis, iSeqRow) {
  do_ajax_form_horario_validate_h_entrada();
  scCssBlur(oThis);
}

function sc_form_horario_h_entrada_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_horario_h_saida_onblur(oThis, iSeqRow) {
  do_ajax_form_horario_validate_h_saida();
  scCssBlur(oThis);
}

function sc_form_horario_h_saida_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_horario_h_tolerancia_onblur(oThis, iSeqRow) {
  do_ajax_form_horario_validate_h_tolerancia();
  scCssBlur(oThis);
}

function sc_form_horario_h_tolerancia_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_horario_diasemana_onblur(oThis, iSeqRow) {
  do_ajax_form_horario_validate_diasemana();
  scCssBlur(oThis);
}

function sc_form_horario_diasemana_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

var sc_jq_timepicker_value = {};

function scJQTimePickerAdd(iSeqRow) {
  $("#id_sc_field_h_entrada" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_h_entrada" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_h_entrada" + iSeqRow] != dateText) {
        $("#id_sc_field_h_entrada" + iSeqRow).trigger('change');
      }
    },
    timeSeparator: ":",
  });

  $("#id_sc_field_h_tolerancia" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_h_tolerancia" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_h_tolerancia" + iSeqRow] != dateText) {
        $("#id_sc_field_h_tolerancia" + iSeqRow).trigger('change');
      }
    },
    timeSeparator: ":",
  });

  $("#id_sc_field_h_saida" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_h_saida" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_h_saida" + iSeqRow] != dateText) {
        $("#id_sc_field_h_saida" + iSeqRow).trigger('change');
      }
    },
    timeSeparator: ":",
  });

} // scJQTimePickerAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQTimePickerAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

