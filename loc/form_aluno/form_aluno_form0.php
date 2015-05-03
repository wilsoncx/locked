<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - aluno"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - aluno"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
 </SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
  #quicksearchph_t {
   position: relative;
  }
  #quicksearchph_t img {
   position: absolute;
   top: 0;
   right: 0;
  }
 </style>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
<?php
include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
?>

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_aluno_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_binicio_off = "<?php echo $this->arr_buttons['binicio_off']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bavanca_off = "<?php echo $this->arr_buttons['bavanca_off']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bretorna_off = "<?php echo $this->arr_buttons['bretorna_off']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_bfinal_off  = "<?php echo $this->arr_buttons['bfinal_off']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
 if ('S' == str_ret)
 {
  if (Nav_binicio == 'image')
  {
      if (document.getElementById("sc_b_ini_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_ini_" + str_pos).src;
        nav_liga_img();
        document.getElementById("id_img_sc_b_ini_" + str_pos).src = sImg;
        document.getElementById("sc_b_ini_" + str_pos).disabled = false;
      }
  }
  else
  {
      if (document.getElementById("sc_b_ini_" + str_pos)){
        document.getElementById("sc_b_ini_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['binicio']['style'] ?>";
        document.getElementById("sc_b_ini_" + str_pos).disabled = false;
        if('only_img' == '<?php echo $this->arr_buttons['binicio']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['binicio']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_ini_" + str_pos).src;
            nav_liga_img();
            document.getElementById("id_img_sc_b_ini_" + str_pos).src = sImg;
        }
      }
  }
  if (Nav_bretorna == 'image')
  {
      if (document.getElementById("sc_b_ret_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_ret_" + str_pos).src;
        nav_liga_img();
        document.getElementById("id_img_sc_b_ret_" + str_pos).src = sImg;
        document.getElementById("sc_b_ret_" + str_pos).disabled = false;
      }
  }
  else
  {
      if (document.getElementById("sc_b_ret_" + str_pos)) {
        document.getElementById("sc_b_ret_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['bretorna']['style'] ?>";
        document.getElementById("sc_b_ret_" + str_pos).disabled = false;
        if('only_img' == '<?php echo $this->arr_buttons['bretorna']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['bretorna']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_ret_" + str_pos).src;
            nav_liga_img();
            document.getElementById("id_img_sc_b_ret_" + str_pos).src = sImg;
        }
      }
  }
 }
 else
 {
  if (Nav_binicio_off == 'image')
  {
      if (document.getElementById("sc_b_ini_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_ini_" + str_pos).src;
        nav_desliga_img();
        document.getElementById("id_img_sc_b_ini_" + str_pos).src = sImg;
        document.getElementById("sc_b_ini_" + str_pos).disabled = true;
      }
  }
  else
  {
      if (document.getElementById("sc_b_ini_" + str_pos)) {
        document.getElementById("sc_b_ini_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['binicio_off']['style'] ?>";
        document.getElementById("sc_b_ini_" + str_pos).disabled = true;
        if('only_img' == '<?php echo $this->arr_buttons['binicio_off']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['binicio_off']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_ini_" + str_pos).src;
            nav_desliga_img();
            document.getElementById("id_img_sc_b_ini_" + str_pos).src = sImg;
        }
      }
  }
  if (Nav_bretorna_off == 'image')
  {
      if (document.getElementById("sc_b_ret_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_ret_" + str_pos).src;
        nav_desliga_img();
        document.getElementById("id_img_sc_b_ret_" + str_pos).src = sImg;
        document.getElementById("sc_b_ret_" + str_pos).disabled = true;
      }
  }
  else
  {
      if (document.getElementById("sc_b_ret_" + str_pos)) {
        document.getElementById("sc_b_ret_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['bretorna_off']['style'] ?>";
        document.getElementById("sc_b_ret_" + str_pos).disabled = true;
        if('only_img' == '<?php echo $this->arr_buttons['bretorna_off']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['bretorna_off']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_ret_" + str_pos).src;
            nav_desliga_img();
            document.getElementById("id_img_sc_b_ret_" + str_pos).src = sImg;
        }
      }
  }
 }
 if ('S' == str_ava)
 {
  if (Nav_bavanca == 'image')
  {
      if (document.getElementById("sc_b_avc_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_avc_" + str_pos).src;
        nav_liga_img();
        document.getElementById("id_img_sc_b_avc_" + str_pos).src = sImg;
        document.getElementById("sc_b_avc_" + str_pos).disabled = false;
      }
  }
  else
  {
      if (document.getElementById("sc_b_avc_" + str_pos)) {
        document.getElementById("sc_b_avc_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['bavanca']['style'] ?>";
        document.getElementById("sc_b_avc_" + str_pos).disabled = false;
        if('only_img' == '<?php echo $this->arr_buttons['bavanca']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['bavanca']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_avc_" + str_pos).src;
            nav_liga_img();
            document.getElementById("id_img_sc_b_avc_" + str_pos).src = sImg;
        }
      }
  }
  if (Nav_bfinal == 'image')
  {
      if (document.getElementById("sc_b_fim_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_fim_" + str_pos).src;
        nav_liga_img();
        document.getElementById("id_img_sc_b_fim_" + str_pos).src = sImg;
        document.getElementById("sc_b_fim_" + str_pos).disabled = false;
      }
  }
  else
  {
      if (document.getElementById("sc_b_fim_" + str_pos)) {
        document.getElementById("sc_b_fim_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['bfinal']['style'] ?>";
        document.getElementById("sc_b_fim_" + str_pos).disabled = false;
        if('only_img' == '<?php echo $this->arr_buttons['bfinal']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['bfinal']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_fim_" + str_pos).src;
            nav_liga_img();
            document.getElementById("id_img_sc_b_fim_" + str_pos).src = sImg;
        }
      }
  }
 }
 else
 {
  if (Nav_bavanca_off == 'image')
  {
      if (document.getElementById("sc_b_avc_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_avc_" + str_pos).src;
        nav_desliga_img();
        document.getElementById("id_img_sc_b_avc_" + str_pos).src = sImg;
        document.getElementById("sc_b_avc_" + str_pos).disabled = true;
      }
  }
  else
  {
      if (document.getElementById("sc_b_avc_" + str_pos)) {
        document.getElementById("sc_b_avc_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['bavanca_off']['style'] ?>";
        document.getElementById("sc_b_avc_" + str_pos).disabled = true;
        if('only_img' == '<?php echo $this->arr_buttons['bavanca_off']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['bavanca_off']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_avc_" + str_pos).src;
            nav_desliga_img();
            document.getElementById("id_img_sc_b_avc_" + str_pos).src = sImg;
        }
      }
  }
  if (Nav_bfinal_off == 'image')
  {
      if (document.getElementById("sc_b_fim_" + str_pos)) {
        sImg = document.getElementById("id_img_sc_b_fim_" + str_pos).src;
        nav_desliga_img();
        document.getElementById("id_img_sc_b_fim_" + str_pos).src = sImg;
        document.getElementById("sc_b_fim_" + str_pos).disabled = true;
      }
  }
  else
  {
      if (document.getElementById("sc_b_fim_" + str_pos)) {
        document.getElementById("sc_b_fim_" + str_pos).className = "scButton_<?php echo $this->arr_buttons['bfinal_off']['style'] ?>";
        document.getElementById("sc_b_fim_" + str_pos).disabled = true;
        if('only_img' == '<?php echo $this->arr_buttons['bfinal_off']['display']; ?>' || 'text_img' == '<?php echo $this->arr_buttons['bfinal_off']['display']; ?>')
        {
            sImg = document.getElementById("id_img_sc_b_fim_" + str_pos).src;
            nav_desliga_img();
            document.getElementById("id_img_sc_b_fim_" + str_pos).src = sImg;
        }
      }
  }
 }
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_aluno_jquery.php');

?>

 var scQSInit = true;
 var scQSPos = {};
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).load(function() {
     scQuickSearchInit(false, '');
     $('#SC_fast_search_t').listen();
     scQuickSearchKeyUp('t', null);
     scQSInit = false;
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchInit(bPosOnly, sPos) {
     if (!bPosOnly) {
       if ('' == sPos || 't' == sPos) scQuickSearchSize('SC_fast_search_t', 'SC_fast_search_close_t', 'SC_fast_search_submit_t', 'quicksearchph_t');
     }
   }
   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {
     var oInput = $('#' + sIdInput),
         oClose = $('#' + sIdClose),
         oSubmit = $('#' + sIdSubmit),
         oPlace = $('#' + sPlaceHolder),
         iInputP = parseInt(oInput.css('padding-right')) || 0,
         iInputB = parseInt(oInput.css('border-right-width')) || 0,
         iInputW = oInput.outerWidth(),
         iPlaceW = oPlace.outerWidth(),
         oInputO = oInput.offset(),
         oPlaceO = oPlace.offset(),
         iNewRight;
     iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;
     oInput.css({
       'height': Math.max(oInput.height(), 16) + 'px',
       'padding-right': iInputP + 16 + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px'
     });
     oClose.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     oSubmit.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
   }
   function scQuickSearchKeyUp(sPos, e) {
     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {
       $('#SC_fast_search_close_' + sPos).show();
       $('#SC_fast_search_submit_' + sPos).hide();
     }
     else {
       $('#SC_fast_search_close_' + sPos).hide();
       $('#SC_fast_search_submit_' + sPos).show();
     }
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
     }
   }
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['recarga'];
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_aluno_js0.php");
?>
<script type="text/javascript" src="<?php echo str_replace("{str_idioma}", $this->Ini->str_lang, "../_lib/js/tab_erro_{str_idioma}.js"); ?>"> 
</script> 
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form name="F1" method=post enctype="multipart/form-data" 
               action="form_aluno.php" 
               target="_self"> 
<input type=hidden name="nm_form_submit" value="1">
<input type=hidden name="nmgp_idioma_novo" value="">
<input type=hidden name="nmgp_schema_f" value="">
<input type=hidden name="nmgp_url_saida" value="">
<input type=hidden name="nmgp_opcao" value="">
<input type=hidden name="nmgp_ancora" value="">
<input type=hidden name="nmgp_num_form" value="<?php  echo NM_encode_input($nmgp_num_form); ?>">
<input type=hidden name="nmgp_parms" value="">
<input type=hidden name="script_case_init" value="<?php  echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type=hidden name="script_case_session" value="<?php  echo NM_encode_input(session_id()); ?>"> 
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<?php
$int_iframe_padding = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe']) ? 0 : "0px";
?>
<?php
$_SESSION['scriptcase']['error_span_title']['form_aluno'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_aluno'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<table id="main_table_form"  align="center" cellpadding="<?php echo $int_iframe_padding; ?>" cellspacing=0 class="scFormBorder" >
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['mostra_cab'] != "N"))
  {
?>
<tr><td>
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFormHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - aluno"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - aluno"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php echo date($this->dateDefaultFormat()); ?></span></td>
        </tr>
    </table>		 
 </div>
</div>
</td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo NM_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{watermark:'<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>', watermarkClass: 'scFormToolbarInputWm', maxLength: 255}">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = ''; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo'); return false;", "nm_move ('novo'); return false;", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir'); return false;", "nm_atualiza ('incluir'); return false;", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "document.F5.submit();return false;", "document.F5.submit();return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar'); return false;", "nm_atualiza ('alterar'); return false;", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_atualiza ('excluir'); return false;", "nm_atualiza ('excluir'); return false;", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();return false;", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();return false;", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
  if ($this->nmgp_form_empty)
  {
       echo "</td></tr><tr><td align=center>";
       echo "<font face=\"" . $this->Ini->pag_fonte_tipo . "\" color=\"" . $this->Ini->cor_txt_grid . "\" size=\"2\"><b>" . $this->Ini->Nm_lang['lang_errm_empt'] . "</b></font>";
       echo "</td></tr>";
  }
  else
  {
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><script type="text/javascript">
function sc_change_tabs(bTabDisp, sTabId, sTabParts)
{
  if (document.getElementById(sTabId)) {
    if (bTabDisp) {
      document.getElementById("div_" + sTabId).style.width = "";
      document.getElementById("div_" + sTabId).style.height = "";
      document.getElementById("div_" + sTabId).style.display = "";
      document.getElementById("div_" + sTabId).style.overflow = "visible";
      document.getElementById(sTabParts + "font").className = "scTabActiveFont";
      document.getElementById(sTabParts + "4").className = "scTabActive";
      document.getElementById(sTabParts + "5").className = "scTabActive scTabActiveBg";
      document.getElementById(sTabParts + "6").className = "scTabActive";
      document.getElementById(sTabParts + "tl").src = "<?php echo $this->Ini->path_img_global . "/" . $str_active_top_esq ?>";
      document.getElementById(sTabParts + "tr").src = "<?php echo $this->Ini->path_img_global . "/" . $str_active_top_dir ?>";
      document.getElementById(sTabParts + "t").style.backgroundImage = "url(<?php echo $this->Ini->path_img_global . "/" . $str_active_lin_top ?>)";
      document.getElementById(sTabParts + "4").style.backgroundImage = "url(<?php echo $this->Ini->path_img_global . "/" . $str_active_col_esq ?>)";
      document.getElementById(sTabParts + "6").style.backgroundImage = "url(<?php echo $this->Ini->path_img_global . "/" . $str_active_col_dir ?>)";
    }
    else {
      document.getElementById("div_" + sTabId).style.width = "1px";
      document.getElementById("div_" + sTabId).style.height = "0px";
      document.getElementById("div_" + sTabId).style.display = "none";
      document.getElementById("div_" + sTabId).style.overflow = "scroll";
      document.getElementById(sTabParts + "font").className = "scTabInactiveFont";
      document.getElementById(sTabParts + "4").className = "scTabInactive";
      document.getElementById(sTabParts + "5").className = "scTabInactive scTabInactiveBg";
      document.getElementById(sTabParts + "6").className = "scTabInactive";
      document.getElementById(sTabParts + "tl").src = "<?php echo $this->Ini->path_img_global . "/" . $str_inactive_top_esq ?>";
      document.getElementById(sTabParts + "tr").src = "<?php echo $this->Ini->path_img_global . "/" . $str_inactive_top_dir ?>";
      document.getElementById(sTabParts + "t").style.backgroundImage = "url(<?php echo $this->Ini->path_img_global . "/" . $str_inactive_lin_top ?>)";
      document.getElementById(sTabParts + "4").style.backgroundImage = "url(<?php echo $this->Ini->path_img_global . "/" . $str_inactive_col_esq ?>)";
      document.getElementById(sTabParts + "6").style.backgroundImage = "url(<?php echo $this->Ini->path_img_global . "/" . $str_inactive_col_dir ?>)";
    }
  }
}
</script>
<input type="hidden" name="foto_ul_name" id="id_sc_field_foto_ul_name" value="<?php echo NM_encode_input($this->foto_ul_name);?>">
<input type="hidden" name="foto_ul_type" id="id_sc_field_foto_ul_type" value="<?php echo NM_encode_input($this->foto_ul_type);?>">
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idaluno']))
           {
               $this->nmgp_cmp_readonly['idaluno'] = 'on';
           }
?>
<script type="text/javascript">
function sc_control_tabs_0(iTabIndex)
{
  sc_change_tabs(iTabIndex == 0, 'hidden_bloco_0', 'id_tabs_0_0_');
  sc_change_tabs(iTabIndex == 1, 'hidden_bloco_1', 'id_tabs_0_1_');
  sc_change_tabs(iTabIndex == 2, 'hidden_bloco_2', 'id_tabs_0_2_');
  scQuickSearchInit(true, '');
}
</script>
<table style="border-collapse: collapse; width: 100%"><tr><td class="scTab_space_he"></td></tr><tr><td style="width: 100%; padding: 0px" class="scTabLine">
<table style="border-collapse: collapse; border-width: 0px"><tr>
<td style="padding: 0px">
 <TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" ID="id_tabs_0_0">
  <TR HEIGHT="1">
   <TD WIDTH="1"><IMG ID="id_tabs_0_0_tl" SRC="<?php echo $this->Ini->path_img_global . "/" . $str_active_top_esq ?>" BORDER="0"></TD>
   <TD ID="id_tabs_0_0_t" BACKGROUND="<?php echo $this->Ini->path_img_global . "/" . $str_active_lin_top ?>"><IMG SRC="<?php echo $this->Ini->path_img_global ?>/scriptcase__NM__nm_transparent.gif" BORDER="0"></TD>
   <TD WIDTH="1"><IMG ID="id_tabs_0_0_tr" SRC="<?php echo $this->Ini->path_img_global . "/" . $str_active_top_dir ?>" BORDER="0"></TD>
  </TR>
  <TR>
   <TD ID="id_tabs_0_0_4" class="scTabActive" BACKGROUND="<?php echo $this->Ini->path_img_global . "/" . $str_active_col_esq ?>"><IMG SRC="<?php echo $this->Ini->path_img_global ?>/scriptcase__NM__nm_transparent.gif" BORDER="0"></TD>
   <TD ID="id_tabs_0_0_5" class="scTabActive scTabActiveBg" nowrap><A HREF="javascript: sc_control_tabs_0(0)" class="scTabActiveFont" ID="id_tabs_0_0_font">form_aluno</A></TD>
   <TD ID="id_tabs_0_0_6" class="scTabActive" BACKGROUND="<?php echo $this->Ini->path_img_global . "/" . $str_active_col_dir ?>"><IMG SRC="<?php echo $this->Ini->path_img_global ?>/scriptcase__NM__nm_transparent.gif" BORDER="0"></TD>
  </TR>
 </TABLE>
</td>
<?php
if ('' != $str_tab_space)
{
?>
<td><img src="<?php echo $this->Ini->path_img_global ?>/scriptcase__NM__nm_transparent.gif" border="0" width="<?php echo $str_tab_space; ?>"/></td>
<?php
}
?>
<td style="padding: 0px">
 <TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" ID="id_tabs_0_1">
  <TR HEIGHT="1">
   <TD WIDTH="1"><IMG ID="id_tabs_0_1_tl" SRC="<?php echo $this->Ini->path_img_global . "/" . $str_inactive_top_esq ?>" BORDER="0"></TD>
   <TD ID="id_tabs_0_1_t" BACKGROUND="<?php echo $this->Ini->path_img_global . "/" . $str_inactive_lin_top ?>"><IMG SRC="<?php echo $this->Ini->path_img_global ?>/scriptcase__NM__nm_transparent.gif" BORDER="0"></TD>
   <TD WIDTH="1"><IMG ID="id_tabs_0_1_tr" SRC="<?php echo $this->Ini->path_img_global . "/" . $str_inactive_top_dir ?>" BORDER="0"></TD>
  </TR>
  <TR>
   <TD ID="id_tabs_0_1_4" class="scTabInactive" BACKGROUND="<?php echo $this->Ini->path_img_global . "/" . $str_inactive_col_esq ?>"><IMG SRC="<?php echo $this->Ini->path_img_global ?>/scriptcase__NM__nm_transparent.gif" BORDER="0"></TD>
   <TD ID="id_tabs_0_1_5" class="scTabInactive scTabInactiveBg" nowrap><A HREF="javascript: sc_control_tabs_0(1)" class="scTabInactiveFont" ID="id_tabs_0_1_font">Endereço</A></TD>
   <TD ID="id_tabs_0_1_6" class="scTabInactive" BACKGROUND="<?php echo $this->Ini->path_img_global . "/" . $str_inactive_col_dir ?>"><IMG SRC="<?php echo $this->Ini->path_img_global ?>/scriptcase__NM__nm_transparent.gif" BORDER="0"></TD>
  </TR>
 </TABLE>
</td>
<?php
if ('' != $str_tab_space)
{
?>
<td><img src="<?php echo $this->Ini->path_img_global ?>/scriptcase__NM__nm_transparent.gif" border="0" width="<?php echo $str_tab_space; ?>"/></td>
<?php
}
?>
<td style="padding: 0px">
 <TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" ID="id_tabs_0_2">
  <TR HEIGHT="1">
   <TD WIDTH="1"><IMG ID="id_tabs_0_2_tl" SRC="<?php echo $this->Ini->path_img_global . "/" . $str_inactive_top_esq ?>" BORDER="0"></TD>
   <TD ID="id_tabs_0_2_t" BACKGROUND="<?php echo $this->Ini->path_img_global . "/" . $str_inactive_lin_top ?>"><IMG SRC="<?php echo $this->Ini->path_img_global ?>/scriptcase__NM__nm_transparent.gif" BORDER="0"></TD>
   <TD WIDTH="1"><IMG ID="id_tabs_0_2_tr" SRC="<?php echo $this->Ini->path_img_global . "/" . $str_inactive_top_dir ?>" BORDER="0"></TD>
  </TR>
  <TR>
   <TD ID="id_tabs_0_2_4" class="scTabInactive" BACKGROUND="<?php echo $this->Ini->path_img_global . "/" . $str_inactive_col_esq ?>"><IMG SRC="<?php echo $this->Ini->path_img_global ?>/scriptcase__NM__nm_transparent.gif" BORDER="0"></TD>
   <TD ID="id_tabs_0_2_5" class="scTabInactive scTabInactiveBg" nowrap><A HREF="javascript: sc_control_tabs_0(2)" class="scTabInactiveFont" ID="id_tabs_0_2_font">Responsável</A></TD>
   <TD ID="id_tabs_0_2_6" class="scTabInactive" BACKGROUND="<?php echo $this->Ini->path_img_global . "/" . $str_inactive_col_dir ?>"><IMG SRC="<?php echo $this->Ini->path_img_global ?>/scriptcase__NM__nm_transparent.gif" BORDER="0"></TD>
  </TR>
 </TABLE>
</td>
<?php
if ('' != $str_tab_space)
{
?>
<td><img src="<?php echo $this->Ini->path_img_global ?>/scriptcase__NM__nm_transparent.gif" border="0" width="<?php echo $str_tab_space; ?>"/></td>
<?php
}
?>
</tr></table>
</td></tr></table>
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" cellpadding="0" cellspacing="0" border="0" width="100%" style="height: 100%">
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idaluno']))
    {
        $this->nm_new_label['idaluno'] = "Codigo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idaluno = $this->idaluno;
   $sStyleHidden_idaluno = '';
   if (isset($this->nmgp_cmp_hidden['idaluno']) && $this->nmgp_cmp_hidden['idaluno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idaluno']);
       $sStyleHidden_idaluno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idaluno = 'display: none;';
   $sStyleReadInp_idaluno = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idaluno"]) &&  $this->nmgp_cmp_readonly["idaluno"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idaluno']);
       $sStyleReadLab_idaluno = '';
       $sStyleReadInp_idaluno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idaluno']) && $this->nmgp_cmp_hidden['idaluno'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="idaluno" value="<?php echo NM_encode_input($idaluno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_idaluno" style="<?php echo $sStyleHidden_idaluno; ?>;"><span id="id_label_idaluno"><?php echo $this->nm_new_label['idaluno']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_idaluno" style="<?php echo $sStyleHidden_idaluno; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px"><span id="id_read_on_idaluno" style=";<?php echo $sStyleReadLab_idaluno; ?>"><?php echo NM_encode_input($this->idaluno); ?></span><span id="id_read_off_idaluno" style="<?php echo $sStyleReadInp_idaluno; ?>"><input type=hidden name="idaluno" value="<?php echo NM_encode_input($idaluno) . "\">"?><span id="id_ajax_label_idaluno"><?php echo nl2br($idaluno); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idaluno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idaluno_text"></span></td></tr></table></td></tr></table></TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['foto']))
    {
        $this->nm_new_label['foto'] = "Foto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $foto = $this->foto;
   $sStyleHidden_foto = '';
   if (isset($this->nmgp_cmp_hidden['foto']) && $this->nmgp_cmp_hidden['foto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['foto']);
       $sStyleHidden_foto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_foto = 'display: none;';
   $sStyleReadInp_foto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['foto']) && $this->nmgp_cmp_readonly['foto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['foto']);
       $sStyleReadLab_foto = '';
       $sStyleReadInp_foto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['foto']) && $this->nmgp_cmp_hidden['foto'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="foto" value="<?php echo NM_encode_input($foto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_foto" style="<?php echo $sStyleHidden_foto; ?>;"><span id="id_label_foto"><?php echo $this->nm_new_label['foto']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_foto" style="<?php echo $sStyleHidden_foto; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
 <script>var var_ajax_img_foto = '<?php echo $out_foto; ?>';</script><input type="hidden" name="temp_out_foto" value="<?php echo NM_encode_input($out_foto); ?>" /><?php if (!empty($out_foto)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_foto, '" . $this->nmgp_return_img['foto'][0] . "', '" . $this->nmgp_return_img['foto'][1] . "')\"><img id=\"id_ajax_img_foto\" border=\"0\" src=\"$out_foto\"></a>"; } else {  echo "<img id=\"id_ajax_img_foto\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foto"]) &&  $this->nmgp_cmp_readonly["foto"] == "on") { 

 ?>
<img id=\"foto_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type=hidden name="foto" value="<?php echo NM_encode_input($foto) . "\">" . $foto . ""; ?>
<?php } else { ?>
<span id="id_read_off_foto" style="white-space: nowrap;<?php echo $sStyleReadInp_foto; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" type="file" name="foto[]" id="id_sc_field_foto" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>" alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><span id="chk_ajax_img_foto"<?php if ($this->nmgp_opcao == "novo" || empty($foto)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="foto_limpa" value="<?php echo $foto_limpa . '" '; if ($foto_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="foto_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_sc_dragdrop_foto" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
<div id="id_img_loader_foto" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_foto" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_foto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_foto_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idcarteira']))
    {
        $this->nm_new_label['idcarteira'] = "Numero da Carteira";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idcarteira = $this->idcarteira;
   $sStyleHidden_idcarteira = '';
   if (isset($this->nmgp_cmp_hidden['idcarteira']) && $this->nmgp_cmp_hidden['idcarteira'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idcarteira']);
       $sStyleHidden_idcarteira = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idcarteira = 'display: none;';
   $sStyleReadInp_idcarteira = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idcarteira']) && $this->nmgp_cmp_readonly['idcarteira'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idcarteira']);
       $sStyleReadLab_idcarteira = '';
       $sStyleReadInp_idcarteira = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idcarteira']) && $this->nmgp_cmp_hidden['idcarteira'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="idcarteira" value="<?php echo NM_encode_input($idcarteira) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_idcarteira" style="<?php echo $sStyleHidden_idcarteira; ?>;"><span id="id_label_idcarteira"><?php echo $this->nm_new_label['idcarteira']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_idcarteira" style="<?php echo $sStyleHidden_idcarteira; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idcarteira"]) &&  $this->nmgp_cmp_readonly["idcarteira"] == "on") { 

 ?>
<input type=hidden name="idcarteira" value="<?php echo NM_encode_input($idcarteira) . "\">" . $idcarteira . ""; ?>
<?php } else { ?>
<span id="id_read_on_idcarteira" class="sc-ui-readonly-idcarteira" style=";<?php echo $sStyleReadLab_idcarteira; ?>"><?php echo NM_encode_input($this->idcarteira); ?></span><span id="id_read_off_idcarteira" style="white-space: nowrap;<?php echo $sStyleReadInp_idcarteira; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_idcarteira" type=text name="idcarteira" value="<?php echo NM_encode_input($idcarteira) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcarteira_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcarteira_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nome']))
    {
        $this->nm_new_label['nome'] = "Nome";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nome = $this->nome;
   $sStyleHidden_nome = '';
   if (isset($this->nmgp_cmp_hidden['nome']) && $this->nmgp_cmp_hidden['nome'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nome']);
       $sStyleHidden_nome = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nome = 'display: none;';
   $sStyleReadInp_nome = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nome']) && $this->nmgp_cmp_readonly['nome'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nome']);
       $sStyleReadLab_nome = '';
       $sStyleReadInp_nome = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nome']) && $this->nmgp_cmp_hidden['nome'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="nome" value="<?php echo NM_encode_input($nome) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_nome" style="<?php echo $sStyleHidden_nome; ?>;"><span id="id_label_nome"><?php echo $this->nm_new_label['nome']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_nome" style="<?php echo $sStyleHidden_nome; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nome"]) &&  $this->nmgp_cmp_readonly["nome"] == "on") { 

 ?>
<input type=hidden name="nome" value="<?php echo NM_encode_input($nome) . "\">" . $nome . ""; ?>
<?php } else { ?>
<span id="id_read_on_nome" class="sc-ui-readonly-nome" style=";<?php echo $sStyleReadLab_nome; ?>"><?php echo NM_encode_input($this->nome); ?></span><span id="id_read_off_nome" style="white-space: nowrap;<?php echo $sStyleReadInp_nome; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_nome" type=text name="nome" value="<?php echo NM_encode_input($nome) ?>"
 size=50 maxlength=80 alt="{datatype: 'text', maxLength: 80, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nome_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nome_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sexo']))
   {
       $this->nm_new_label['sexo'] = "Sexo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sexo = $this->sexo;
   $sStyleHidden_sexo = '';
   if (isset($this->nmgp_cmp_hidden['sexo']) && $this->nmgp_cmp_hidden['sexo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sexo']);
       $sStyleHidden_sexo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sexo = 'display: none;';
   $sStyleReadInp_sexo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sexo']) && $this->nmgp_cmp_readonly['sexo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sexo']);
       $sStyleReadLab_sexo = '';
       $sStyleReadInp_sexo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sexo']) && $this->nmgp_cmp_hidden['sexo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sexo" value="<?php echo NM_encode_input($this->sexo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_sexo" style="<?php echo $sStyleHidden_sexo; ?>;"><span id="id_label_sexo"><?php echo $this->nm_new_label['sexo']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_sexo" style="<?php echo $sStyleHidden_sexo; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sexo"]) &&  $this->nmgp_cmp_readonly["sexo"] == "on") { 

$sexo_look = "";
 if ($this->sexo == "M") { $sexo_look .= "Masculino" ;} 
 if ($this->sexo == "F") { $sexo_look .= "Feminino" ;} 
?>
<input type=hidden name="sexo" value="<?php echo NM_encode_input($sexo) . "\">" . $sexo_look . ""; ?>
<?php } else { ?>
<?php

$sexo_look = "";
 if ($this->sexo == "M") { $sexo_look .= "Masculino" ;} 
 if ($this->sexo == "F") { $sexo_look .= "Feminino" ;} 
?>
<span id="id_read_on_sexo" style=";<?php echo $sStyleReadLab_sexo; ?>"><?php echo NM_encode_input($sexo_look); ?></span><span id="id_read_off_sexo" style="<?php echo $sStyleReadInp_sexo; ?>">
 <span id="idAjaxSelect_sexo"><select class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_sexo" name="sexo" size=1>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_sexo'][] = 'null'; ?>
 <option value="null">SEXO</option>
 <option value="M" <?php  if ($this->sexo == "M") { echo " selected" ;} ?><?php  if (empty($this->sexo)) { echo " selected" ;} ?>>Masculino</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_sexo'][] = 'M'; ?>
 <option value="F" <?php  if ($this->sexo == "F") { echo " selected" ;} ?>>Feminino</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_sexo'][] = 'F'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sexo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sexo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['data_nasc']))
    {
        $this->nm_new_label['data_nasc'] = "Data Nascimento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_data_nasc = $this->data_nasc;
   $this->data_nasc .= ' ' . $this->data_nasc_hora;
   $data_nasc = $this->data_nasc;
   $sStyleHidden_data_nasc = '';
   if (isset($this->nmgp_cmp_hidden['data_nasc']) && $this->nmgp_cmp_hidden['data_nasc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['data_nasc']);
       $sStyleHidden_data_nasc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_data_nasc = 'display: none;';
   $sStyleReadInp_data_nasc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['data_nasc']) && $this->nmgp_cmp_readonly['data_nasc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['data_nasc']);
       $sStyleReadLab_data_nasc = '';
       $sStyleReadInp_data_nasc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['data_nasc']) && $this->nmgp_cmp_hidden['data_nasc'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="data_nasc" value="<?php echo NM_encode_input($data_nasc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_data_nasc" style="<?php echo $sStyleHidden_data_nasc; ?>;"><span id="id_label_data_nasc"><?php echo $this->nm_new_label['data_nasc']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_data_nasc" style="<?php echo $sStyleHidden_data_nasc; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["data_nasc"]) &&  $this->nmgp_cmp_readonly["data_nasc"] == "on") { 

 ?>
<input type=hidden name="data_nasc" value="<?php echo NM_encode_input($data_nasc) . "\">" . $data_nasc . ""; ?>
<?php } else { ?>
<span id="id_read_on_data_nasc" class="sc-ui-readonly-data_nasc" style=";<?php echo $sStyleReadLab_data_nasc; ?>"><?php echo NM_encode_input($this->data_nasc); ?></span><span id="id_read_off_data_nasc" style="white-space: nowrap;<?php echo $sStyleReadInp_data_nasc; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_data_nasc" type=text name="data_nasc" value="<?php echo NM_encode_input($data_nasc) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['data_nasc']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['data_nasc']['date_format']; ?>', timeSep: '<?php echo $this->field_config['data_nasc']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['data_nasc']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_data_nasc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_data_nasc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->data_nasc = $old_dt_data_nasc;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['turma']))
   {
       $this->nm_new_label['turma'] = "Turma";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $turma = $this->turma;
   $sStyleHidden_turma = '';
   if (isset($this->nmgp_cmp_hidden['turma']) && $this->nmgp_cmp_hidden['turma'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['turma']);
       $sStyleHidden_turma = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_turma = 'display: none;';
   $sStyleReadInp_turma = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['turma']) && $this->nmgp_cmp_readonly['turma'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['turma']);
       $sStyleReadLab_turma = '';
       $sStyleReadInp_turma = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['turma']) && $this->nmgp_cmp_hidden['turma'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="turma" value="<?php echo NM_encode_input($this->turma) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_turma" style="<?php echo $sStyleHidden_turma; ?>;"><span id="id_label_turma"><?php echo $this->nm_new_label['turma']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_turma" style="<?php echo $sStyleHidden_turma; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["turma"]) &&  $this->nmgp_cmp_readonly["turma"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma'] = array(); 
    }

   $old_value_idaluno = $this->idaluno;
   $old_value_data_nasc = $this->data_nasc;
   $old_value_data_nasc_hora = $this->data_nasc_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idaluno = $this->idaluno;
   $unformatted_value_data_nasc = $this->data_nasc;
   $unformatted_value_data_nasc_hora = $this->data_nasc_hora;

   $nm_comando = "SELECT idturma, nome 
FROM turma 
ORDER BY nome";

   $this->idaluno = $old_value_idaluno;
   $this->data_nasc = $old_value_data_nasc;
   $this->data_nasc_hora = $old_value_data_nasc_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $turma_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->turma_1))
          {
              foreach ($this->turma_1 as $tmp_turma)
              {
                  if (trim($tmp_turma) === trim($cadaselect[1])) { $turma_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->turma) === trim($cadaselect[1])) { $turma_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="turma" value="<?php echo NM_encode_input($turma) . "\">" . $turma_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma'] = array(); 
    }

   $old_value_idaluno = $this->idaluno;
   $old_value_data_nasc = $this->data_nasc;
   $old_value_data_nasc_hora = $this->data_nasc_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idaluno = $this->idaluno;
   $unformatted_value_data_nasc = $this->data_nasc;
   $unformatted_value_data_nasc_hora = $this->data_nasc_hora;

   $nm_comando = "SELECT idturma, nome 
FROM turma 
ORDER BY nome";

   $this->idaluno = $old_value_idaluno;
   $this->data_nasc = $old_value_data_nasc;
   $this->data_nasc_hora = $old_value_data_nasc_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $turma_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->turma_1))
          {
              foreach ($this->turma_1 as $tmp_turma)
              {
                  if (trim($tmp_turma) === trim($cadaselect[1])) { $turma_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->turma) === trim($cadaselect[1])) { $turma_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_turma\" style=\";" .  $sStyleReadLab_turma . "\">" . NM_encode_input($turma_look) . "</span><span id=\"id_read_off_turma\" style=\"" . $sStyleReadInp_turma . "\">";
   echo " <span id=\"idAjaxSelect_turma\"><select class=\"sc-js-input scFormObjectOdd\" style=\";\" id=\"id_sc_field_turma\" name=\"turma\" size=1>" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['Lookup_turma'][] = 'null'; 
   echo "  <option value=\"null\">Escolha a Turma</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->turma) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->turma)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_turma_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_turma_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['endereco']))
    {
        $this->nm_new_label['endereco'] = "Endereco";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $endereco = $this->endereco;
   $sStyleHidden_endereco = '';
   if (isset($this->nmgp_cmp_hidden['endereco']) && $this->nmgp_cmp_hidden['endereco'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['endereco']);
       $sStyleHidden_endereco = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_endereco = 'display: none;';
   $sStyleReadInp_endereco = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['endereco']) && $this->nmgp_cmp_readonly['endereco'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['endereco']);
       $sStyleReadLab_endereco = '';
       $sStyleReadInp_endereco = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['endereco']) && $this->nmgp_cmp_hidden['endereco'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="endereco" value="<?php echo NM_encode_input($endereco) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_endereco" style="<?php echo $sStyleHidden_endereco; ?>;"><span id="id_label_endereco"><?php echo $this->nm_new_label['endereco']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_endereco" style="<?php echo $sStyleHidden_endereco; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["endereco"]) &&  $this->nmgp_cmp_readonly["endereco"] == "on") { 

 ?>
<input type=hidden name="endereco" value="<?php echo NM_encode_input($endereco) . "\">" . $endereco . ""; ?>
<?php } else { ?>
<span id="id_read_on_endereco" class="sc-ui-readonly-endereco" style=";<?php echo $sStyleReadLab_endereco; ?>"><?php echo NM_encode_input($this->endereco); ?></span><span id="id_read_off_endereco" style="white-space: nowrap;<?php echo $sStyleReadInp_endereco; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_endereco" type=text name="endereco" value="<?php echo NM_encode_input($endereco) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_endereco_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_endereco_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bairro']))
    {
        $this->nm_new_label['bairro'] = "Bairro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bairro = $this->bairro;
   $sStyleHidden_bairro = '';
   if (isset($this->nmgp_cmp_hidden['bairro']) && $this->nmgp_cmp_hidden['bairro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bairro']);
       $sStyleHidden_bairro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bairro = 'display: none;';
   $sStyleReadInp_bairro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bairro']) && $this->nmgp_cmp_readonly['bairro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bairro']);
       $sStyleReadLab_bairro = '';
       $sStyleReadInp_bairro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bairro']) && $this->nmgp_cmp_hidden['bairro'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="bairro" value="<?php echo NM_encode_input($bairro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_bairro" style="<?php echo $sStyleHidden_bairro; ?>;"><span id="id_label_bairro"><?php echo $this->nm_new_label['bairro']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_bairro" style="<?php echo $sStyleHidden_bairro; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bairro"]) &&  $this->nmgp_cmp_readonly["bairro"] == "on") { 

 ?>
<input type=hidden name="bairro" value="<?php echo NM_encode_input($bairro) . "\">" . $bairro . ""; ?>
<?php } else { ?>
<span id="id_read_on_bairro" class="sc-ui-readonly-bairro" style=";<?php echo $sStyleReadLab_bairro; ?>"><?php echo NM_encode_input($this->bairro); ?></span><span id="id_read_off_bairro" style="white-space: nowrap;<?php echo $sStyleReadInp_bairro; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_bairro" type=text name="bairro" value="<?php echo NM_encode_input($bairro) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bairro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bairro_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cidade']))
    {
        $this->nm_new_label['cidade'] = "Cidade";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cidade = $this->cidade;
   $sStyleHidden_cidade = '';
   if (isset($this->nmgp_cmp_hidden['cidade']) && $this->nmgp_cmp_hidden['cidade'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cidade']);
       $sStyleHidden_cidade = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cidade = 'display: none;';
   $sStyleReadInp_cidade = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cidade']) && $this->nmgp_cmp_readonly['cidade'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cidade']);
       $sStyleReadLab_cidade = '';
       $sStyleReadInp_cidade = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cidade']) && $this->nmgp_cmp_hidden['cidade'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="cidade" value="<?php echo NM_encode_input($cidade) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_cidade" style="<?php echo $sStyleHidden_cidade; ?>;"><span id="id_label_cidade"><?php echo $this->nm_new_label['cidade']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_cidade" style="<?php echo $sStyleHidden_cidade; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cidade"]) &&  $this->nmgp_cmp_readonly["cidade"] == "on") { 

 ?>
<input type=hidden name="cidade" value="<?php echo NM_encode_input($cidade) . "\">" . $cidade . ""; ?>
<?php } else { ?>
<span id="id_read_on_cidade" class="sc-ui-readonly-cidade" style=";<?php echo $sStyleReadLab_cidade; ?>"><?php echo NM_encode_input($this->cidade); ?></span><span id="id_read_off_cidade" style="white-space: nowrap;<?php echo $sStyleReadInp_cidade; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_cidade" type=text name="cidade" value="<?php echo NM_encode_input($cidade) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cidade_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cidade_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['uf']))
    {
        $this->nm_new_label['uf'] = "Uf";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $uf = $this->uf;
   $sStyleHidden_uf = '';
   if (isset($this->nmgp_cmp_hidden['uf']) && $this->nmgp_cmp_hidden['uf'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['uf']);
       $sStyleHidden_uf = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_uf = 'display: none;';
   $sStyleReadInp_uf = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['uf']) && $this->nmgp_cmp_readonly['uf'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['uf']);
       $sStyleReadLab_uf = '';
       $sStyleReadInp_uf = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['uf']) && $this->nmgp_cmp_hidden['uf'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="uf" value="<?php echo NM_encode_input($uf) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_uf" style="<?php echo $sStyleHidden_uf; ?>;"><span id="id_label_uf"><?php echo $this->nm_new_label['uf']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_uf" style="<?php echo $sStyleHidden_uf; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["uf"]) &&  $this->nmgp_cmp_readonly["uf"] == "on") { 

 ?>
<input type=hidden name="uf" value="<?php echo NM_encode_input($uf) . "\">" . $uf . ""; ?>
<?php } else { ?>
<span id="id_read_on_uf" class="sc-ui-readonly-uf" style=";<?php echo $sStyleReadLab_uf; ?>"><?php echo NM_encode_input($this->uf); ?></span><span id="id_read_off_uf" style="white-space: nowrap;<?php echo $sStyleReadInp_uf; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_uf" type=text name="uf" value="<?php echo NM_encode_input($uf) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_uf_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_uf_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_2"></a>
<div id="div_hidden_bloco_2" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nome_resp']))
    {
        $this->nm_new_label['nome_resp'] = "Nome Resp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nome_resp = $this->nome_resp;
   $sStyleHidden_nome_resp = '';
   if (isset($this->nmgp_cmp_hidden['nome_resp']) && $this->nmgp_cmp_hidden['nome_resp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nome_resp']);
       $sStyleHidden_nome_resp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nome_resp = 'display: none;';
   $sStyleReadInp_nome_resp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nome_resp']) && $this->nmgp_cmp_readonly['nome_resp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nome_resp']);
       $sStyleReadLab_nome_resp = '';
       $sStyleReadInp_nome_resp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nome_resp']) && $this->nmgp_cmp_hidden['nome_resp'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="nome_resp" value="<?php echo NM_encode_input($nome_resp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_nome_resp" style="<?php echo $sStyleHidden_nome_resp; ?>;"><span id="id_label_nome_resp"><?php echo $this->nm_new_label['nome_resp']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_nome_resp" style="<?php echo $sStyleHidden_nome_resp; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nome_resp"]) &&  $this->nmgp_cmp_readonly["nome_resp"] == "on") { 

 ?>
<input type=hidden name="nome_resp" value="<?php echo NM_encode_input($nome_resp) . "\">" . $nome_resp . ""; ?>
<?php } else { ?>
<span id="id_read_on_nome_resp" class="sc-ui-readonly-nome_resp" style=";<?php echo $sStyleReadLab_nome_resp; ?>"><?php echo NM_encode_input($this->nome_resp); ?></span><span id="id_read_off_nome_resp" style="white-space: nowrap;<?php echo $sStyleReadInp_nome_resp; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_nome_resp" type=text name="nome_resp" value="<?php echo NM_encode_input($nome_resp) ?>"
 size=50 maxlength=70 alt="{datatype: 'text', maxLength: 70, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nome_resp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nome_resp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cel_resp']))
    {
        $this->nm_new_label['cel_resp'] = "Cel Resp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cel_resp = $this->cel_resp;
   $sStyleHidden_cel_resp = '';
   if (isset($this->nmgp_cmp_hidden['cel_resp']) && $this->nmgp_cmp_hidden['cel_resp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cel_resp']);
       $sStyleHidden_cel_resp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cel_resp = 'display: none;';
   $sStyleReadInp_cel_resp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cel_resp']) && $this->nmgp_cmp_readonly['cel_resp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cel_resp']);
       $sStyleReadLab_cel_resp = '';
       $sStyleReadInp_cel_resp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cel_resp']) && $this->nmgp_cmp_hidden['cel_resp'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="cel_resp" value="<?php echo NM_encode_input($cel_resp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_cel_resp" style="<?php echo $sStyleHidden_cel_resp; ?>;"><span id="id_label_cel_resp"><?php echo $this->nm_new_label['cel_resp']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_cel_resp" style="<?php echo $sStyleHidden_cel_resp; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cel_resp"]) &&  $this->nmgp_cmp_readonly["cel_resp"] == "on") { 

 ?>
<input type=hidden name="cel_resp" value="<?php echo NM_encode_input($cel_resp) . "\">" . $cel_resp . ""; ?>
<?php } else { ?>
<span id="id_read_on_cel_resp" class="sc-ui-readonly-cel_resp" style=";<?php echo $sStyleReadLab_cel_resp; ?>"><?php echo NM_encode_input($this->cel_resp); ?></span><span id="id_read_off_cel_resp" style="white-space: nowrap;<?php echo $sStyleReadInp_cel_resp; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_cel_resp" type=text name="cel_resp" value="<?php echo NM_encode_input($cel_resp) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cel_resp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cel_resp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['email_resp']))
    {
        $this->nm_new_label['email_resp'] = "Email Resp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $email_resp = $this->email_resp;
   $sStyleHidden_email_resp = '';
   if (isset($this->nmgp_cmp_hidden['email_resp']) && $this->nmgp_cmp_hidden['email_resp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['email_resp']);
       $sStyleHidden_email_resp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_email_resp = 'display: none;';
   $sStyleReadInp_email_resp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['email_resp']) && $this->nmgp_cmp_readonly['email_resp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['email_resp']);
       $sStyleReadLab_email_resp = '';
       $sStyleReadInp_email_resp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['email_resp']) && $this->nmgp_cmp_hidden['email_resp'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="email_resp" value="<?php echo NM_encode_input($email_resp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_email_resp" style="<?php echo $sStyleHidden_email_resp; ?>;"><span id="id_label_email_resp"><?php echo $this->nm_new_label['email_resp']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_email_resp" style="<?php echo $sStyleHidden_email_resp; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["email_resp"]) &&  $this->nmgp_cmp_readonly["email_resp"] == "on") { 

 ?>
<input type=hidden name="email_resp" value="<?php echo NM_encode_input($email_resp) . "\">" . $email_resp . ""; ?>
<?php } else { ?>
<span id="id_read_on_email_resp" class="sc-ui-readonly-email_resp" style=";<?php echo $sStyleReadLab_email_resp; ?>"><?php echo NM_encode_input($this->email_resp); ?></span><span id="id_read_off_email_resp" style="white-space: nowrap;<?php echo $sStyleReadInp_email_resp; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_email_resp" type=text name="email_resp" value="<?php echo NM_encode_input($email_resp) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email_resp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email_resp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio'); return false;", "nm_move ('inicio'); return false;", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "nm_move ('retorna'); return false;", "nm_move ('retorna'); return false;", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "nm_move ('avanca'); return false;", "nm_move ('avanca'); return false;", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "nm_move ('final'); return false;", "nm_move ('final'); return false;", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "F") { ?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['total'] + 1)?>);</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
<?php
  }
?>
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage('', "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", false, 0, false, "Ok", 0, 0, 0, 0, "", "", "", true, false);
</script> 
<?php
      }
?>
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2);
  $nm_sc_blocos_aba    = array(0 => 0,1 => 0,2 => 0);
  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_aluno");
 parent.scAjaxDetailHeight("form_aluno", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailHeight("form_aluno", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
</body> 
</html> 
