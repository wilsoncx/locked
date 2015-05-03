
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
  $('#id_sc_field_idaluno' + iSeqRow).bind('blur', function() { sc_form_aluno_idaluno_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_aluno_idaluno_onfocus(this, iSeqRow) });
  $('#id_sc_field_foto' + iSeqRow).bind('blur', function() { sc_form_aluno_foto_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_aluno_foto_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcarteira' + iSeqRow).bind('blur', function() { sc_form_aluno_idcarteira_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_aluno_idcarteira_onfocus(this, iSeqRow) });
  $('#id_sc_field_nome' + iSeqRow).bind('blur', function() { sc_form_aluno_nome_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_aluno_nome_onfocus(this, iSeqRow) });
  $('#id_sc_field_sexo' + iSeqRow).bind('blur', function() { sc_form_aluno_sexo_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_aluno_sexo_onfocus(this, iSeqRow) });
  $('#id_sc_field_data_nasc' + iSeqRow).bind('blur', function() { sc_form_aluno_data_nasc_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_aluno_data_nasc_onfocus(this, iSeqRow) });
  $('#id_sc_field_data_nasc_hora' + iSeqRow).bind('blur', function() { sc_form_aluno_data_nasc_hora_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_aluno_data_nasc_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_endereco' + iSeqRow).bind('blur', function() { sc_form_aluno_endereco_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_aluno_endereco_onfocus(this, iSeqRow) });
  $('#id_sc_field_bairro' + iSeqRow).bind('blur', function() { sc_form_aluno_bairro_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_aluno_bairro_onfocus(this, iSeqRow) });
  $('#id_sc_field_cidade' + iSeqRow).bind('blur', function() { sc_form_aluno_cidade_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_aluno_cidade_onfocus(this, iSeqRow) });
  $('#id_sc_field_uf' + iSeqRow).bind('blur', function() { sc_form_aluno_uf_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_aluno_uf_onfocus(this, iSeqRow) });
  $('#id_sc_field_nome_resp' + iSeqRow).bind('blur', function() { sc_form_aluno_nome_resp_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_aluno_nome_resp_onfocus(this, iSeqRow) });
  $('#id_sc_field_cel_resp' + iSeqRow).bind('blur', function() { sc_form_aluno_cel_resp_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_aluno_cel_resp_onfocus(this, iSeqRow) });
  $('#id_sc_field_email_resp' + iSeqRow).bind('blur', function() { sc_form_aluno_email_resp_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_aluno_email_resp_onfocus(this, iSeqRow) });
  $('#id_sc_field_turma' + iSeqRow).bind('blur', function() { sc_form_aluno_turma_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_aluno_turma_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_aluno_idaluno_onblur(oThis, iSeqRow) {
  do_ajax_form_aluno_validate_idaluno();
  scCssBlur(oThis);
}

function sc_form_aluno_idaluno_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_aluno_foto_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_aluno_foto_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_aluno_idcarteira_onblur(oThis, iSeqRow) {
  do_ajax_form_aluno_validate_idcarteira();
  scCssBlur(oThis);
}

function sc_form_aluno_idcarteira_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_aluno_nome_onblur(oThis, iSeqRow) {
  do_ajax_form_aluno_validate_nome();
  scCssBlur(oThis);
}

function sc_form_aluno_nome_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_aluno_sexo_onblur(oThis, iSeqRow) {
  do_ajax_form_aluno_validate_sexo();
  scCssBlur(oThis);
}

function sc_form_aluno_sexo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_aluno_data_nasc_onblur(oThis, iSeqRow) {
  do_ajax_form_aluno_validate_data_nasc();
  scCssBlur(oThis);
}

function sc_form_aluno_data_nasc_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_aluno_validate_data_nasc();
  scCssBlur(oThis);
}

function sc_form_aluno_data_nasc_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_aluno_data_nasc_hora_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_aluno_endereco_onblur(oThis, iSeqRow) {
  do_ajax_form_aluno_validate_endereco();
  scCssBlur(oThis);
}

function sc_form_aluno_endereco_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_aluno_bairro_onblur(oThis, iSeqRow) {
  do_ajax_form_aluno_validate_bairro();
  scCssBlur(oThis);
}

function sc_form_aluno_bairro_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_aluno_cidade_onblur(oThis, iSeqRow) {
  do_ajax_form_aluno_validate_cidade();
  scCssBlur(oThis);
}

function sc_form_aluno_cidade_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_aluno_uf_onblur(oThis, iSeqRow) {
  do_ajax_form_aluno_validate_uf();
  scCssBlur(oThis);
}

function sc_form_aluno_uf_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_aluno_nome_resp_onblur(oThis, iSeqRow) {
  do_ajax_form_aluno_validate_nome_resp();
  scCssBlur(oThis);
}

function sc_form_aluno_nome_resp_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_aluno_cel_resp_onblur(oThis, iSeqRow) {
  do_ajax_form_aluno_validate_cel_resp();
  scCssBlur(oThis);
}

function sc_form_aluno_cel_resp_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_aluno_email_resp_onblur(oThis, iSeqRow) {
  do_ajax_form_aluno_validate_email_resp();
  scCssBlur(oThis);
}

function sc_form_aluno_email_resp_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_aluno_turma_onblur(oThis, iSeqRow) {
  do_ajax_form_aluno_validate_turma();
  scCssBlur(oThis);
}

function sc_form_aluno_turma_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_data_nasc" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_data_nasc" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['data_nasc']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['data_nasc']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['data_nasc']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_foto" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_aluno_ul_save.php",
    dropZone: $("#hidden_field_data_foto" + iSeqRow),
    formData: function() {
      return [
        {name: 'app_dir', value: '<?php echo $this->Ini->path_aplicacao; ?>'},
        {name: 'app_name', value: 'form_aluno'},
        {name: 'upload_dir', value: '<?php echo $this->Ini->root . $this->Ini->path_imag_temp; ?>/'},
        {name: 'upload_url', value: '<?php echo $this->Ini->path_imag_temp; ?>/'},
        {name: 'param_name', value: 'foto' + iSeqRow},
        {name: 'upload_file_height', value: '0'},
        {name: 'upload_file_width', value: '0'},
        {name: 'upload_file_aspect', value: 'S'},
        {name: 'upload_file_type', value: 'I'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_foto" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_foto" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, thumbDisplay, checkDisplay, var_ajax_img_thumb;
      if (data.result[0].body) {
        fileData = $.parseJSON(data.result[0].body.innerText);
      }
      else {
        fileData = eval(data.result);
      }
      $("#id_sc_field_foto" + iSeqRow).val("");
      $("#id_sc_field_foto_ul_name" + iSeqRow).val(fileData[0].sc_random_prot);
      $("#id_sc_field_foto_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_foto = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_random_prot;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_foto) ? "none" : "";
      $("#id_ajax_img_foto" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_foto" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_foto) {
        document.F1.temp_out_foto.value = var_ajax_img_thumb;
        document.F1.temp_out1_foto.value = var_ajax_img_foto;
      }
      else if (document.F1.temp_out_foto) {
        document.F1.temp_out_foto.value = var_ajax_img_foto;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_foto" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_foto" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
      $("#txt_ajax_img_foto" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_foto" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_foto" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_foto" + iSeqRow).hide();
      }
    }
  });

} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

