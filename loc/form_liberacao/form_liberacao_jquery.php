
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
  $('#id_sc_field_idliberacao' + iSeqRow).bind('blur', function() { sc_form_liberacao_idliberacao_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_liberacao_idliberacao_onfocus(this, iSeqRow) });
  $('#id_sc_field_hora' + iSeqRow).bind('blur', function() { sc_form_liberacao_hora_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_liberacao_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_dia' + iSeqRow).bind('blur', function() { sc_form_liberacao_dia_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_liberacao_dia_onfocus(this, iSeqRow) });
  $('#id_sc_field_motivo' + iSeqRow).bind('blur', function() { sc_form_liberacao_motivo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_liberacao_motivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo' + iSeqRow).bind('blur', function() { sc_form_liberacao_tipo_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_liberacao_tipo_onfocus(this, iSeqRow) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_liberacao_status_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_liberacao_status_onfocus(this, iSeqRow) });
  $('#id_sc_field_turmas' + iSeqRow).bind('blur', function() { sc_form_liberacao_turmas_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_liberacao_turmas_onfocus(this, iSeqRow) });
  $('#id_sc_field_alunos' + iSeqRow).bind('blur', function() { sc_form_liberacao_alunos_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_liberacao_alunos_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_liberacao_idliberacao_onblur(oThis, iSeqRow) {
  do_ajax_form_liberacao_validate_idliberacao();
  scCssBlur(oThis);
}

function sc_form_liberacao_idliberacao_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_liberacao_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_liberacao_validate_hora();
  scCssBlur(oThis);
}

function sc_form_liberacao_hora_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_liberacao_dia_onblur(oThis, iSeqRow) {
  do_ajax_form_liberacao_validate_dia();
  scCssBlur(oThis);
}

function sc_form_liberacao_dia_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_liberacao_motivo_onblur(oThis, iSeqRow) {
  do_ajax_form_liberacao_validate_motivo();
  scCssBlur(oThis);
}

function sc_form_liberacao_motivo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_liberacao_tipo_onblur(oThis, iSeqRow) {
  do_ajax_form_liberacao_validate_tipo();
  scCssBlur(oThis);
}

function sc_form_liberacao_tipo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_liberacao_status_onblur(oThis, iSeqRow) {
  do_ajax_form_liberacao_validate_status();
  scCssBlur(oThis);
}

function sc_form_liberacao_status_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_liberacao_turmas_onblur(oThis, iSeqRow) {
  do_ajax_form_liberacao_validate_turmas();
  scCssBlur(oThis);
}

function sc_form_liberacao_turmas_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_liberacao_alunos_onblur(oThis, iSeqRow) {
  do_ajax_form_liberacao_validate_alunos();
  scCssBlur(oThis);
}

function sc_form_liberacao_alunos_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_dia" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_dia" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ['<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd']);        ?>'],
    dayNamesMin: ['<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd']); ?>'],
    monthNamesShort: ['<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece']); ?>'],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['dia']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd

var sc_jq_timepicker_value = {};

function scJQTimePickerAdd(iSeqRow) {
  $("#id_sc_field_hora" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_hora" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_hora" + iSeqRow] != dateText) {
        $("#id_sc_field_hora" + iSeqRow).trigger('change');
      }
    },
    timeSeparator: ":",
  });

} // scJQTimePickerAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQCalendarAdd(iLine);
  scJQTimePickerAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

