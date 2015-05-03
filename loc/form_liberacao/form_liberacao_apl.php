<?php
//
class form_liberacao_apl
{
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'         => '',
                                'param'          => array(),
                                'autoComp'       => '',
                                'rsSize'         => '',
                                'msgDisplay'     => '',
                                'errList'        => array(),
                                'fldList'        => array(),
                                'focus'          => '',
                                'navStatus'      => array(),
                                'navSummary'     => array(),
                                'navPage'        => array(),
                                'redir'          => array(),
                                'blockDisplay'   => array(),
                                'fieldDisplay'   => array(),
                                'fieldLabel'     => array(),
                                'readOnly'       => array(),
                                'btnVars'        => array(),
                                'ajaxAlert'      => '',
                                'ajaxMessage'    => '',
                                'ajaxJavascript' => array(),
                                'buttonDisplay'  => array(),
                                'calendarReload' => false,
                                'quickSearchRes' => false,
                                'displayMsg'     => false,
                                'displayMsgTxt'  => '',
                               );
   var $Nav_permite_ava = true;
   var $Nav_permite_ret = true;
   var $Apl_com_erro    = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $idliberacao;
   var $hora;
   var $dia;
   var $motivo;
   var $tipo;
   var $status;
   var $sc_field_0;
   var $turmas;
   var $turmas_hidden;
   var $alunos;
   var $alunos_hidden;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;

     global $idturma_turmas, $nome_turmas, $turmas_1, $idcarteira_alunos, $nome_alunos, $alunos_1;

      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['alunos']))
          {
              $this->alunos = $this->NM_ajax_info['param']['alunos'];
          }
          if (isset($this->NM_ajax_info['param']['dia']))
          {
              $this->dia = $this->NM_ajax_info['param']['dia'];
          }
          if (isset($this->NM_ajax_info['param']['hora']))
          {
              $this->hora = $this->NM_ajax_info['param']['hora'];
          }
          if (isset($this->NM_ajax_info['param']['idliberacao']))
          {
              $this->idliberacao = $this->NM_ajax_info['param']['idliberacao'];
          }
          if (isset($this->NM_ajax_info['param']['motivo']))
          {
              $this->motivo = $this->NM_ajax_info['param']['motivo'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['status']))
          {
              $this->status = $this->NM_ajax_info['param']['status'];
          }
          if (isset($this->NM_ajax_info['param']['tipo']))
          {
              $this->tipo = $this->NM_ajax_info['param']['tipo'];
          }
          if (isset($this->NM_ajax_info['param']['turmas']))
          {
              $this->turmas = $this->NM_ajax_info['param']['turmas'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      $this->sc_conv_var['op��o'] = "sc_field_0";
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_liberacao']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_liberacao']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_liberacao']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todo = explode("?@?", $nmgp_parms);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_liberacao($cadapar[1]);
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_liberacao']['where_filter_form'] = $this->NM_where_filter_form;
             unset($_SESSION['sc_session'][$script_case_init]['form_liberacao']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_liberacao']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_liberacao']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_liberacao']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todo = explode("?@?", $_SESSION['sc_session'][$script_case_init]['form_liberacao']['parms']);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 $this->$cadapar[0] = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_liberacao']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_liberacao']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_liberacao']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_liberacao']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_liberacao']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_liberacao']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_liberacao']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_liberacao_ini(); 
          $this->Ini->init();
      } 
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . '.php');
      $this->Db = $this->Ini->Db; 
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;



      $_SESSION['scriptcase']['error_icon']['form_liberacao']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_liberacao'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_call'] : $this->Embutida_call;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "form_liberacao.php"; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['goto']);
      }
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['first']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['back']    = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['forward'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['last']    = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['qsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['summary'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['navpage'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['goto']    = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['first']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['back']    = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['forward'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['last']    = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['qsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['summary'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['navpage'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['goto']    = 'on';
          }
      }

      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "off";
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_liberacao']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['dados_form'];
          if (!isset($this->sc_field_0)){$this->sc_field_0 = $this->nmgp_dados_form['sc_field_0'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_liberacao", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      $this->nm_data = new nm_data("pt_br");
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_liberacao/form_liberacao_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_liberacao_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_liberacao_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_liberacao_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_liberacao/form_liberacao_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_liberacao_erro.class.php"); 
      }
      $this->Erro      = new form_liberacao_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['opcao']))
         { 
             if ($this->idliberacao != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_liberacao']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['final'];
      }
      else
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['lookup_filtro']['turmas']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['lookup_filtro']['turmas']);
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['lookup_filtro']['alunos']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['lookup_filtro']['alunos']);
          }
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->idliberacao)) { $this->nm_limpa_alfa($this->idliberacao); }
      if (isset($this->motivo)) { $this->nm_limpa_alfa($this->motivo); }
      if (isset($this->tipo)) { $this->nm_limpa_alfa($this->tipo); }
      if (isset($this->status)) { $this->nm_limpa_alfa($this->status); }
      if ($nm_opc_lookup == "lookup")
      { 
          if ($GLOBALS['F'] == "turmas")
          { 
              $nm_parms   = substr($GLOBALS['P0'], 1, strlen($GLOBALS['P0']) - 2);
              $array_vars = explode(",", $nm_parms);
              $idturma_turmas = isset($array_vars[0]) ? $array_vars[0] : "";
              $nome_turmas = isset($array_vars[1]) ? $array_vars[1] : "";
              $turmas_1 = $array_vars[2];
              $this->lookup_turmas($conteudo);
              echo "<html><head></head>";
              echo " <body onload=\"p=document.layers?parentLayer:window.parent;p.jsrsLoaded('" . $GLOBALS['C'] . "');\">";
              echo "  jsrsPayload:";
              echo "  <br>";
              echo "  <form name=\"jsrs_Form\"><textarea name=\"jsrs_Payload\">";
              echo "$conteudo";
              echo " </textarea></form></body></html>";
          } 
          if ($GLOBALS['F'] == "alunos")
          { 
              $nm_parms   = substr($GLOBALS['P0'], 1, strlen($GLOBALS['P0']) - 2);
              $array_vars = explode(",", $nm_parms);
              $idcarteira_alunos = isset($array_vars[0]) ? $array_vars[0] : "";
              $nome_alunos = isset($array_vars[1]) ? $array_vars[1] : "";
              $alunos_1 = $array_vars[2];
              $this->lookup_alunos($conteudo);
              echo "<html><head></head>";
              echo " <body onload=\"p=document.layers?parentLayer:window.parent;p.jsrsLoaded('" . $GLOBALS['C'] . "');\">";
              echo "  jsrsPayload:";
              echo "  <br>";
              echo "  <form name=\"jsrs_Form\"><textarea name=\"jsrs_Payload\">";
              echo "$conteudo";
              echo " </textarea></form></body></html>";
          } 
          $this->NM_close_db(); 
          exit;
      } 
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "form_liberacao.php"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- idliberacao
      $this->field_config['idliberacao']               = array();
      $this->field_config['idliberacao']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idliberacao']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idliberacao']['symbol_dec'] = '';
      $this->field_config['idliberacao']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idliberacao']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- hora
      $this->field_config['hora']                 = array();
      $this->field_config['hora']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hora']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hora']['date_display'] = "hhii";
      $this->new_date_format('HH', 'hora');
      //-- dia
      $this->field_config['dia']                 = array();
      $this->field_config['dia']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['dia']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['dia']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'dia');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;

     global $idturma_turmas, $nome_turmas, $turmas_1, $idcarteira_alunos, $nome_alunos, $alunos_1;

      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_idliberacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idliberacao');
          }
          if ('validate_tipo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo');
          }
          if ('validate_hora' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora');
          }
          if ('validate_dia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dia');
          }
          if ('validate_motivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'motivo');
          }
          if ('validate_alunos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'alunos');
          }
          if ('validate_turmas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'turmas');
          }
          if ('validate_status' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'status');
          }
          form_liberacao_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_liberacao_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_liberacao']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_liberacao_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && $this->nmgp_opcao != "menu_link")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_liberacao_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_liberacao_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function lookup_turmas(&$conteudo)
   {
      global $idturma_turmas, $nome_turmas;
      $nm_comando = "select idturma, nome from turma "; 
      $where_filtro = "";
      if (!empty($idturma_turmas))
      {
          if (!empty($where_filtro))
          {
              $where_filtro .= " and ";
          }
          $where_filtro .= "idturma like '%" . $idturma_turmas . "%'";
      }
      if (!empty($nome_turmas))
      {
          if (!empty($where_filtro))
          {
              $where_filtro .= " and ";
          }
          $where_filtro .= "nome like '%" . $nome_turmas . "%'";
      }
      $nm_cmd_in  = "";
      $nm_cont_in = 0;
      if (!empty($this->turmas_1))
      {
          $trab_turmas_1 = explode("@?@", $this->turmas_1);
          foreach ($trab_turmas_1 as $nm_cada_opc)
          {
              $nm_cont_in++;
              if (empty($nm_cmd_in) && !empty($nm_cada_opc))
              {
                  $nm_cmd_in  = "idturma in ('" . $nm_cada_opc . "'";
              }
              elseif (!empty($nm_cada_opc))
              {
                  $nm_cmd_in .= ", '" . $nm_cada_opc . "'";
              }
          }
      }
      if (!empty($where_filtro))
      {
          $nm_comando .= "  where " . $where_filtro;
          if (!empty($nm_cmd_in))
          {
              $nm_comando .= " or (" . $nm_cmd_in . "))";
          }
      }
      elseif (!empty($nm_cmd_in))
      {
          $nm_comando .= " where " . $nm_cmd_in. ")";
      }
      $nm_comando .= " order by nome";
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['lookup_filtro']['turmas'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      {
         $conteudo = "";
         $look_cont_reg = 0;
         $nm_cont_in += 101;
          while (!$rs->EOF && $look_cont_reg < $nm_cont_in) 
          { 
                 $look_cont_reg++;
                 $conteudo .= $rs->fields[0];
                 $conteudo .= "#?#" . $rs->fields[1];
                 $conteudo .= "@?@";
                 $rs->MoveNext() ; 
          } 
          $conteudo = substr($conteudo, 0, -3);
          $rs->Close() ; 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      {  
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0; 
   }
//
//--------------------------------------------------------------------------------------
   function lookup_alunos(&$conteudo)
   {
      global $idcarteira_alunos, $nome_alunos;
      $nm_comando = "select idcarteira, nome from aluno where idcarteira IS NOT NULL "; 
      $where_filtro = "";
      if (!empty($idcarteira_alunos))
      {
          $where_filtro .= " and ";
          $where_filtro .= "idcarteira like '%" . $idcarteira_alunos . "%'";
      }
      if (!empty($nome_alunos))
      {
          $where_filtro .= " and ";
          $where_filtro .= "nome like '%" . $nome_alunos . "%'";
      }
      $nm_cmd_in  = "";
      $nm_cont_in = 0;
      if (!empty($this->alunos_1))
      {
          $trab_alunos_1 = explode("@?@", $this->alunos_1);
          foreach ($trab_alunos_1 as $nm_cada_opc)
          {
              $nm_cont_in++;
              if (empty($nm_cmd_in) && !empty($nm_cada_opc))
              {
                  $nm_cmd_in  = "idcarteira in ('" . $nm_cada_opc . "'";
              }
              elseif (!empty($nm_cada_opc))
              {
                  $nm_cmd_in .= ", '" . $nm_cada_opc . "'";
              }
          }
      }
      if (!empty($where_filtro))
      {
          $nm_comando .= " " . $where_filtro;
          if (!empty($nm_cmd_in))
          {
              $nm_comando .= " or (" . $nm_cmd_in . "))";
          }
      }
      elseif (!empty($nm_cmd_in))
      {
          $nm_comando .= " or (" . $nm_cmd_in . "))";
      }
      $nm_comando .= " order by nome";
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['lookup_filtro']['alunos'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      {
         $conteudo = "";
         $look_cont_reg = 0;
         $nm_cont_in += 101;
          while (!$rs->EOF && $look_cont_reg < $nm_cont_in) 
          { 
                 $look_cont_reg++;
                 $conteudo .= $rs->fields[0];
                 $conteudo .= "#?#" . $rs->fields[1];
                 $conteudo .= "@?@";
                 $rs->MoveNext() ; 
          } 
          $conteudo = substr($conteudo, 0, -3);
          $rs->Close() ; 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      {  
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0; 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'idliberacao':
               return "Idliberacao";
               break;
           case 'tipo':
               return "Tipo";
               break;
           case 'hora':
               return "Hora";
               break;
           case 'dia':
               return "Dia";
               break;
           case 'motivo':
               return "Motivo";
               break;
           case 'alunos':
               return "Alunos";
               break;
           case 'turmas':
               return "Turmas";
               break;
           case 'status':
               return "Status";
               break;
           case 'sc_field_0':
               return "Op��o";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();
      if ('' == $filtro || 'idliberacao' == $filtro)
        $this->ValidateField_idliberacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tipo' == $filtro)
        $this->ValidateField_tipo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hora' == $filtro)
        $this->ValidateField_hora($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dia' == $filtro)
        $this->ValidateField_dia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'motivo' == $filtro)
        $this->ValidateField_motivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'alunos' == $filtro)
        $this->ValidateField_alunos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'turmas' == $filtro)
        $this->ValidateField_turmas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'status' == $filtro)
        $this->ValidateField_status($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
      $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_idliberacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->idliberacao == "")  
      { 
          $this->idliberacao = 0;
      } 
      nm_limpa_numero($this->idliberacao, $this->field_config['idliberacao']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->idliberacao != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->idliberacao) > $iTestSize)  
              { 
                  $Campos_Crit .= "Idliberacao: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idliberacao']))
                  {
                      $Campos_Erros['idliberacao'] = array();
                  }
                  $Campos_Erros['idliberacao'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idliberacao']) || !is_array($this->NM_ajax_info['errList']['idliberacao']))
                  {
                      $this->NM_ajax_info['errList']['idliberacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['idliberacao'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idliberacao, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Idliberacao; " ; 
                  if (!isset($Campos_Erros['idliberacao']))
                  {
                      $Campos_Erros['idliberacao'] = array();
                  }
                  $Campos_Erros['idliberacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idliberacao']) || !is_array($this->NM_ajax_info['errList']['idliberacao']))
                  {
                      $this->NM_ajax_info['errList']['idliberacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['idliberacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_idliberacao

    function ValidateField_tipo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->tipo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->tipo != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_tipo']) && !in_array($this->tipo, $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_tipo']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['tipo']))
              {
                  $Campos_Erros['tipo'] = array();
              }
              $Campos_Erros['tipo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['tipo']) || !is_array($this->NM_ajax_info['errList']['tipo']))
              {
                  $this->NM_ajax_info['errList']['tipo'] = array();
              }
              $this->NM_ajax_info['errList']['tipo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
    } // ValidateField_tipo

    function ValidateField_hora(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_hora($this->hora, $this->field_config['hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hora']['time_sep']) ; 
          if (trim($this->hora) != "")  
          { 
              if ($teste_validade->Hora($this->hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Hora; " ; 
                  if (!isset($Campos_Erros['hora']))
                  {
                      $Campos_Erros['hora'] = array();
                  }
                  $Campos_Erros['hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hora']) || !is_array($this->NM_ajax_info['errList']['hora']))
                  {
                      $this->NM_ajax_info['errList']['hora'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['php_cmp_required']['hora']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['php_cmp_required']['hora'] == "on") 
           { 
              $Campos_Falta[] = "Hora" ; 
              if (!isset($Campos_Erros['hora']))
              {
                  $Campos_Erros['hora'] = array();
              }
              $Campos_Erros['hora'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['hora']) || !is_array($this->NM_ajax_info['errList']['hora']))
                  {
                      $this->NM_ajax_info['errList']['hora'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_hora

    function ValidateField_dia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->dia, $this->field_config['dia']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['dia']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['dia']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['dia']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['dia']['date_sep']) ; 
          if (trim($this->dia) != "")  
          { 
              if ($teste_validade->Data($this->dia, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Dia; " ; 
                  if (!isset($Campos_Erros['dia']))
                  {
                      $Campos_Erros['dia'] = array();
                  }
                  $Campos_Erros['dia'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dia']) || !is_array($this->NM_ajax_info['errList']['dia']))
                  {
                      $this->NM_ajax_info['errList']['dia'] = array();
                  }
                  $this->NM_ajax_info['errList']['dia'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif ((!$this->NM_ajax_flag || 'validate_dia' != $this->NM_ajax_opcao) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['php_cmp_required']['dia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['php_cmp_required']['dia'] == "on")) 
           { 
              $Campos_Falta[] = "Dia" ; 
              if (!isset($Campos_Erros['dia']))
              {
                  $Campos_Erros['dia'] = array();
              }
              $Campos_Erros['dia'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['dia']) || !is_array($this->NM_ajax_info['errList']['dia']))
                  {
                      $this->NM_ajax_info['errList']['dia'] = array();
                  }
                  $this->NM_ajax_info['errList']['dia'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['dia']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_dia

    function ValidateField_motivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['php_cmp_required']['motivo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['php_cmp_required']['motivo'] == "on")) 
      { 
          if ($this->motivo == "")  
          { 
              $Campos_Falta[] =  "Motivo" ; 
              if (!isset($Campos_Erros['motivo']))
              {
                  $Campos_Erros['motivo'] = array();
              }
              $Campos_Erros['motivo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['motivo']) || !is_array($this->NM_ajax_info['errList']['motivo']))
                  {
                      $this->NM_ajax_info['errList']['motivo'] = array();
                  }
                  $this->NM_ajax_info['errList']['motivo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->motivo) > 100) 
          { 
              $Campos_Crit .= "Motivo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['motivo']))
              {
                  $Campos_Erros['motivo'] = array();
              }
              $Campos_Erros['motivo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['motivo']) || !is_array($this->NM_ajax_info['errList']['motivo']))
              {
                  $this->NM_ajax_info['errList']['motivo'] = array();
              }
              $this->NM_ajax_info['errList']['motivo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_motivo

    function ValidateField_alunos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->alunos != "")
      {
          $x = 0; 
          $this->alunos_1 = explode("@?@", $this->alunos);
          $this->alunos = ""; 
          if ($this->alunos_1 != "") 
          { 
              foreach ($this->alunos_1 as $dados_alunos_1 ) 
              { 
                       if ($x != 0)
                       { 
                           $this->alunos .= "@?@";
                       } 
                       $this->alunos .= $dados_alunos_1;
                       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_alunos']) && !in_array($dados_alunos_1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_alunos']))
                       {
                           $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           if (!isset($Campos_Erros['alunos']))
                           {
                               $Campos_Erros['alunos'] = array();
                           }
                           $Campos_Erros['alunos'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           if (!isset($this->NM_ajax_info['errList']['alunos']) || !is_array($this->NM_ajax_info['errList']['alunos']))
                           {
                               $this->NM_ajax_info['errList']['alunos'] = array();
                           }
                           $this->NM_ajax_info['errList']['alunos'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           breack;
                       }
                       $x++ ; 
              } 
          } 
      } 
    } // ValidateField_alunos

    function ValidateField_turmas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->turmas != "")
      {
          $x = 0; 
          $this->turmas_1 = explode("@?@", $this->turmas);
          $this->turmas = ""; 
          if ($this->turmas_1 != "") 
          { 
              foreach ($this->turmas_1 as $dados_turmas_1 ) 
              { 
                       if ($x != 0)
                       { 
                           $this->turmas .= "@?@";
                       } 
                       $this->turmas .= $dados_turmas_1;
                       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_turmas']) && !in_array($dados_turmas_1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_turmas']))
                       {
                           $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           if (!isset($Campos_Erros['turmas']))
                           {
                               $Campos_Erros['turmas'] = array();
                           }
                           $Campos_Erros['turmas'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           if (!isset($this->NM_ajax_info['errList']['turmas']) || !is_array($this->NM_ajax_info['errList']['turmas']))
                           {
                               $this->NM_ajax_info['errList']['turmas'] = array();
                           }
                           $this->NM_ajax_info['errList']['turmas'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           breack;
                       }
                       $x++ ; 
              } 
          } 
      } 
    } // ValidateField_turmas

    function ValidateField_status(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->status) > 1) 
          { 
              $Campos_Crit .= "Status " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['status']))
              {
                  $Campos_Erros['status'] = array();
              }
              $Campos_Erros['status'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['status']) || !is_array($this->NM_ajax_info['errList']['status']))
              {
                  $this->NM_ajax_info['errList']['status'] = array();
              }
              $this->NM_ajax_info['errList']['status'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_status

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['idliberacao'] = $this->idliberacao;
    $this->nmgp_dados_form['tipo'] = $this->tipo;
    $this->nmgp_dados_form['hora'] = $this->hora;
    $this->nmgp_dados_form['dia'] = $this->dia;
    $this->nmgp_dados_form['motivo'] = $this->motivo;
    $this->nmgp_dados_form['alunos'] = $this->alunos;
    $this->nmgp_dados_form['turmas'] = $this->turmas;
    $this->nmgp_dados_form['status'] = $this->status;
    $this->nmgp_dados_form['sc_field_0'] = $this->sc_field_0;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->idliberacao, $this->field_config['idliberacao']['symbol_grp']) ; 
      nm_limpa_hora($this->hora, $this->field_config['hora']['time_sep']) ; 
      nm_limpa_data($this->dia, $this->field_config['dia']['date_sep']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~ei', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "idliberacao")
      {
          nm_limpa_numero($this->idliberacao, $this->field_config['idliberacao']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if (!empty($this->idliberacao) || (!empty($format_fields) && isset($format_fields['idliberacao'])))
      {
          nmgp_Form_Num_Val($this->idliberacao, $this->field_config['idliberacao']['symbol_grp'], $this->field_config['idliberacao']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['idliberacao']['symbol_fmt']) ; 
      }
      if ((!empty($this->hora) && 'null' != $this->hora) || (!empty($format_fields) && isset($format_fields['hora'])))
      {
          nm_volta_hora($this->hora, $this->field_config['hora']['date_format']) ; 
          nmgp_Form_Hora($this->hora, $this->field_config['hora']['date_format'], $this->field_config['hora']['time_sep']) ;  
      }
      elseif ('null' == $this->hora || '' == $this->hora)
      {
          $this->hora = '';
      }
      if ((!empty($this->dia) && 'null' != $this->dia) || (!empty($format_fields) && isset($format_fields['dia'])))
      {
          nm_volta_data($this->dia, $this->field_config['dia']['date_format']) ; 
          nmgp_Form_Datas($this->dia, $this->field_config['dia']['date_format'], $this->field_config['dia']['date_sep']) ;  
      }
      elseif ('null' == $this->dia || '' == $this->dia)
      {
          $this->dia = '';
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true)
   {
       $guarda_format_hora = $this->field_config['hora']['date_format'];
      if ($this->hora != "")  
      { 
          $this->hora_hora = $this->hora;
          $this->hora = "1900-01-01";
          nm_conv_hora($this->hora_hora, $this->field_config['hora']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hora_hora = substr($this->hora_hora, 0, -4);
          }
          $this->hora = $this->hora_hora;
      } 
      if ($this->hora == "" && $use_null)  
      { 
          $this->hora = "null" ; 
      } 
       $this->field_config['hora']['date_format'] = $guarda_format_hora;
       $guarda_format_hora = $this->field_config['dia']['date_format'];
      if ($this->dia != "")  
      { 
          nm_conv_data($this->dia, $this->field_config['dia']['date_format']) ; 
          $this->dia_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->dia_hora = substr($this->dia_hora, 0, -4);
          }
      } 
      if ($this->dia == "" && $use_null)  
      { 
          $this->dia = "null" ; 
      } 
       $this->field_config['dia']['date_format'] = $guarda_format_hora;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_idliberacao();
          $this->ajax_return_values_tipo();
          $this->ajax_return_values_hora();
          $this->ajax_return_values_dia();
          $this->ajax_return_values_motivo();
          $this->ajax_return_values_alunos();
          $this->ajax_return_values_turmas();
          $this->ajax_return_values_status();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idliberacao']['keyVal'] = form_liberacao_pack_protect_string($this->nmgp_dados_form['idliberacao']);
          }
   } // ajax_return_values

          //----- idliberacao
   function ajax_return_values_idliberacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idliberacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idliberacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idliberacao'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tipo
   function ajax_return_values_tipo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo);
              $aLookup = array();
              $this->_tmp_lookup_tipo = $this->tipo;

$aLookup[] = array(form_liberacao_pack_protect_string('S') => form_liberacao_pack_protect_string("Saida"));
$aLookup[] = array(form_liberacao_pack_protect_string('E') => form_liberacao_pack_protect_string("Entrada"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_tipo'][] = 'S';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_tipo'][] = 'E';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['tipo']) && !empty($this->NM_ajax_info['select_html']['tipo']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['tipo'];
          }
          $this->NM_ajax_info['fldList']['tipo'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo']['labList'] = $aLabel;
          }
   }

          //----- hora
   function ajax_return_values_hora($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hora);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hora'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- dia
   function ajax_return_values_dia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dia);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dia'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- motivo
   function ajax_return_values_motivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("motivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->motivo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['motivo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- alunos
   function ajax_return_values_alunos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("alunos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->alunos);
              $aLookup = array();
              $this->_tmp_lookup_alunos = $this->alunos;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_alunos']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_alunos'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_alunos']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_alunos'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idliberacao = $this->idliberacao;
   $old_value_hora = $this->hora;
   $old_value_dia = $this->dia;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idliberacao = $this->idliberacao;
   $unformatted_value_hora = $this->hora;
   $unformatted_value_dia = $this->dia;

   $nm_comando = "select idcarteira, nome from aluno where idcarteira IS NOT NULL order by nome";

   $this->idliberacao = $old_value_idliberacao;
   $this->hora = $old_value_hora;
   $this->dia = $old_value_dia;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_liberacao_pack_protect_string($rs->fields[0]) => form_liberacao_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_alunos'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $aTransTbl  = get_html_translation_table(HTML_ENTITIES);
          $aTransTbl  = array_flip($aTransTbl);
          $aNewLookup = array();
          foreach ($aLookup as $aItemData)
          {
              $aNewLookup[] = array(strtr(key($aItemData), $aTransTbl) => strtr(current($aItemData), $aTransTbl));
          }
          $aLookupOrig = $aNewLookup;
          $this->NM_ajax_info['fldList']['alunos'] = array(
                       'row'    => '',
               'type'    => 'duplosel',
               'valList' => explode('@?@', $this->alunos),
               'optList' => $aNewLookup,
               'colNum'  => 7,
              );
              end($this->NM_ajax_info['fldList']['alunos']['valList']);
              if ('' == current($this->NM_ajax_info['fldList']['alunos']['valList']))
              {
                  array_pop($this->NM_ajax_info['fldList']['alunos']['valList']);
              }
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['alunos']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['alunos']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['alunos']['labList'] = $aLabel;
          }
   }

          //----- turmas
   function ajax_return_values_turmas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("turmas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->turmas);
              $aLookup = array();
              $this->_tmp_lookup_turmas = $this->turmas;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_turmas']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_turmas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_turmas']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_turmas'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idliberacao = $this->idliberacao;
   $old_value_hora = $this->hora;
   $old_value_dia = $this->dia;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idliberacao = $this->idliberacao;
   $unformatted_value_hora = $this->hora;
   $unformatted_value_dia = $this->dia;

   $nm_comando = "select idturma, nome from turma order by nome";

   $this->idliberacao = $old_value_idliberacao;
   $this->hora = $old_value_hora;
   $this->dia = $old_value_dia;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_liberacao_pack_protect_string($rs->fields[0]) => form_liberacao_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['Lookup_turmas'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $aTransTbl  = get_html_translation_table(HTML_ENTITIES);
          $aTransTbl  = array_flip($aTransTbl);
          $aNewLookup = array();
          foreach ($aLookup as $aItemData)
          {
              $aNewLookup[] = array(strtr(key($aItemData), $aTransTbl) => strtr(current($aItemData), $aTransTbl));
          }
          $aLookupOrig = $aNewLookup;
          $this->NM_ajax_info['fldList']['turmas'] = array(
                       'row'    => '',
               'type'    => 'duplosel',
               'valList' => explode('@?@', $this->turmas),
               'optList' => $aNewLookup,
               'colNum'  => 7,
              );
              end($this->NM_ajax_info['fldList']['turmas']['valList']);
              if ('' == current($this->NM_ajax_info['fldList']['turmas']['valList']))
              {
                  array_pop($this->NM_ajax_info['fldList']['turmas']['valList']);
              }
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['turmas']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['turmas']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['turmas']['labList'] = $aLabel;
          }
   }

          //----- status
   function ajax_return_values_status($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("status", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->status);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['status'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_liberacao']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_idliberacao = $this->idliberacao;
}
             /* liberacao_X_aluno */
      $sc_cmd_dependency = "SELECT COUNT(*) FROM liberacao_X_aluno WHERE liberacao = " . $this->idliberacao ;
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_liberacao_X_aluno = array();
      $this->dataset_liberacao_x_aluno = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_liberacao_X_aluno[$y] [$x] = $rx->fields[$x];
                      $this->dataset_liberacao_x_aluno[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_liberacao_X_aluno = false;
          $this->dataset_liberacao_X_aluno_erro = $this->Db->ErrorMsg();
          $this->dataset_liberacao_x_aluno = false;
          $this->dataset_liberacao_x_aluno_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_liberacao_X_aluno[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_liberacao' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_idliberacao != $this->idliberacao || (isset($bFlagRead_idliberacao) && $bFlagRead_idliberacao)))
    {
        $this->ajax_return_values_idliberacao(true);
    }
}
$_SESSION['scriptcase']['form_liberacao']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
      $SC_tem_cmp_update = true; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      $NM_val_form['idliberacao'] = $this->idliberacao;
      $NM_val_form['tipo'] = $this->tipo;
      $NM_val_form['hora'] = $this->hora;
      $NM_val_form['dia'] = $this->dia;
      $NM_val_form['motivo'] = $this->motivo;
      $NM_val_form['alunos'] = $this->alunos;
      $NM_val_form['turmas'] = $this->turmas;
      $NM_val_form['status'] = $this->status;
      $NM_val_form['sc_field_0'] = $this->sc_field_0;
      if ($this->idliberacao == "")  
      { 
          $this->idliberacao = 0;
      } 
      $nm_bases_lob_geral = array();
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->hora == "")  
          { 
              $this->hora = "null"; 
              $NM_val_null[] = "hora";
          } 
          if ($this->dia == "")  
          { 
              $this->dia = "null"; 
              $NM_val_null[] = "dia";
          } 
          $this->motivo = substr($this->Db->qstr($this->motivo), 1, -1); 
          $this->tipo = substr($this->Db->qstr($this->tipo), 1, -1); 
          $this->status = substr($this->Db->qstr($this->status), 1, -1); 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where idliberacao = $this->idliberacao ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where idliberacao = $this->idliberacao "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_liberacao_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $comando_oracle = "";  
              $comando = "UPDATE " . $this->Ini->nm_tabela . " SET hora = '$this->hora', dia = '$this->dia', motivo = '$this->motivo', tipo = '$this->tipo', status = '$this->status'";  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              $comando .= " WHERE idliberacao = $this->idliberacao ";  
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              if ($SC_ex_update || $SC_tem_cmp_update)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_liberacao_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['idliberacao'])) { $this->idliberacao = $NM_val_form['idliberacao']; }
              elseif (isset($this->idliberacao)) { $this->nm_limpa_alfa($this->idliberacao); }
              if     (isset($NM_val_form) && isset($NM_val_form['motivo'])) { $this->motivo = $NM_val_form['motivo']; }
              elseif (isset($this->motivo)) { $this->nm_limpa_alfa($this->motivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo'])) { $this->tipo = $NM_val_form['tipo']; }
              elseif (isset($this->tipo)) { $this->nm_limpa_alfa($this->tipo); }
              if     (isset($NM_val_form) && isset($NM_val_form['status'])) { $this->status = $NM_val_form['status']; }
              elseif (isset($this->status)) { $this->nm_limpa_alfa($this->status); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array('idliberacao', 'tipo', 'hora', 'dia', 'motivo', 'alunos', 'turmas', 'status');
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from liberacao_X_aluno where liberacao = $this->idliberacao"; 
          $rsc = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
          if ($rsc === false) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg()); 
              $this->NM_rollback_db(); 
              if ($this->NM_ajax_flag)
              {
                  form_liberacao_pack_ajax_response();
              }
              exit; 
          } 
          if ($rsc->fields[0] > 0)  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "delete from liberacao_X_aluno where liberacao = $this->idliberacao"; 
              $rse = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
              if ($rse === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg()); 
                  $this->NM_rollback_db(); 
                  if ($this->NM_ajax_flag)
                  {
                      form_liberacao_pack_ajax_response();
                  }
                  exit; 
              } 
              $rse->Close(); 
          } 
          $rsc->Close(); 
          $todo_alunos = explode("@?@", $this->alunos); 
          if (!empty($todo_alunos))  
          { 
              $sc_ind = 0; 
              foreach ($todo_alunos as $alunosx) 
              {
                  if (!empty($alunosx))  
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "insert into liberacao_X_aluno (idliberacao_X_aluno, liberacao, aluno) values (null, $this->idliberacao, '$alunosx')"; 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = str_replace("'null'", "null", $_SESSION['scriptcase']['sc_sql_ult_comando']) ; 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = str_replace("#null#", "null", $_SESSION['scriptcase']['sc_sql_ult_comando']) ; 
                      $rs = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                      if ($rs === false && !$rs->EOF)  
                      { 
                          if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_liberacao_pack_ajax_response();
                              }
                              exit; 
                          }
                      } 
                      $rs->Close(); 
                  }
              } 
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from liberacao_x_turma where idliberacao = $this->idliberacao"; 
          $rsc = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
          if ($rsc === false) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg()); 
              $this->NM_rollback_db(); 
              if ($this->NM_ajax_flag)
              {
                  form_liberacao_pack_ajax_response();
              }
              exit; 
          } 
          if ($rsc->fields[0] > 0)  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "delete from liberacao_x_turma where idliberacao = $this->idliberacao"; 
              $rse = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
              if ($rse === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg()); 
                  $this->NM_rollback_db(); 
                  if ($this->NM_ajax_flag)
                  {
                      form_liberacao_pack_ajax_response();
                  }
                  exit; 
              } 
              $rse->Close(); 
          } 
          $rsc->Close(); 
          $todo_turmas = explode("@?@", $this->turmas); 
          if (!empty($todo_turmas))  
          { 
              $sc_ind = 0; 
              foreach ($todo_turmas as $turmasx) 
              {
                  if (!empty($turmasx))  
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "insert into liberacao_x_turma (idliberacao_x_turma, idliberacao, idturma) values (null, $this->idliberacao, '$turmasx')"; 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = str_replace("'null'", "null", $_SESSION['scriptcase']['sc_sql_ult_comando']) ; 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = str_replace("#null#", "null", $_SESSION['scriptcase']['sc_sql_ult_comando']) ; 
                      $rs = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                      if ($rs === false && !$rs->EOF)  
                      { 
                          if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_liberacao_pack_ajax_response();
                              }
                              exit; 
                          }
                      } 
                      $rs->Close(); 
                  }
              } 
          } 
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idliberacao, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "hora, dia, motivo, tipo, status) VALUES (" . $NM_seq_auto . "'$this->hora', '$this->dia', '$this->motivo', '$this->tipo', '$this->status')"; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_liberacao_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idliberacao = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idliberacao = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->sc_insert_on = true; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              }
              $this->nm_flag_iframe = true;
          } 
          $todo_alunos = explode("@?@", $this->alunos); 
          if (!empty($todo_alunos))  
          { 
              foreach ($todo_alunos as $alunosx) 
              {
                  if (!empty($alunosx))  
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "insert into liberacao_X_aluno (idliberacao_X_aluno, liberacao, aluno) values (null, $this->idliberacao, '$alunosx')"; 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = str_replace("'null'", "null", $_SESSION['scriptcase']['sc_sql_ult_comando']) ; 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = str_replace("#null#", "null", $_SESSION['scriptcase']['sc_sql_ult_comando']) ; 
                      $rs = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                      if ($rs === false && !$rs->EOF)  
                      { 
                          if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_liberacao_pack_ajax_response();
                              }
                              exit; 
                          } 
                      } 
                      $rs->Close(); 
                  } 
              } 
          } 
          $todo_turmas = explode("@?@", $this->turmas); 
          if (!empty($todo_turmas))  
          { 
              foreach ($todo_turmas as $turmasx) 
              {
                  if (!empty($turmasx))  
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "insert into liberacao_x_turma (idliberacao_x_turma, idliberacao, idturma) values (null, $this->idliberacao, '$turmasx')"; 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = str_replace("'null'", "null", $_SESSION['scriptcase']['sc_sql_ult_comando']) ; 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = str_replace("#null#", "null", $_SESSION['scriptcase']['sc_sql_ult_comando']) ; 
                      $rs = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                      if ($rs === false && !$rs->EOF)  
                      { 
                          if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_liberacao_pack_ajax_response();
                              }
                              exit; 
                          } 
                      } 
                      $rs->Close(); 
                  } 
              } 
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idliberacao = substr($this->Db->qstr($this->idliberacao), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where idliberacao = $this->idliberacao"; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where idliberacao = $this->idliberacao "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "delete from liberacao_X_aluno where liberacao = $this->idliberacao"; 
              $rse = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
              if ($rse === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg()); 
                  $this->NM_rollback_db(); 
                  if ($this->NM_ajax_flag)
                  {
                      form_liberacao_pack_ajax_response();
                  }
                  exit; 
              } 
              $rse->Close(); 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "delete from liberacao_x_turma where idliberacao = $this->idliberacao"; 
              $rse = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
              if ($rse === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg()); 
                  $this->NM_rollback_db(); 
                  if ($this->NM_ajax_flag)
                  {
                      form_liberacao_pack_ajax_response();
                  }
                  exit; 
              } 
              $rse->Close(); 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idliberacao = $this->idliberacao "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idliberacao = $this->idliberacao "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_liberacao_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['parms'] = "idliberacao?#?$this->idliberacao?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idliberacao = substr($this->Db->qstr($this->idliberacao), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->idliberacao)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->idliberacao) === "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['total']))
      { 
          $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_liberacao = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['total'] = $qt_geral_reg_form_liberacao;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idliberacao))
          {
              $Key_Where = "idliberacao < $this->idliberacao "; 
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_liberacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] > $qt_geral_reg_form_liberacao)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] = $qt_geral_reg_form_liberacao; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] = $qt_geral_reg_form_liberacao; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_liberacao) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['parms'] = ""; 
          $nmgp_select = "SELECT idliberacao, hora, dia, motivo, tipo, status from " . $this->Ini->nm_tabela ; 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              $aWhere[] = "idliberacao = $this->idliberacao"; 
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "idliberacao";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->nmgp_botoes['first']   = "off";
                  $this->nmgp_botoes['back']    = "off";
                  $this->nmgp_botoes['forward'] = "off";
                  $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->idliberacao = $rs->fields[0] ; 
              $this->nmgp_dados_select['idliberacao'] = $this->idliberacao;
              $this->hora = $rs->fields[1] ; 
              $this->nmgp_dados_select['hora'] = $this->hora;
              $this->dia = $rs->fields[2] ; 
              $this->nmgp_dados_select['dia'] = $this->dia;
              $this->motivo = $rs->fields[3] ; 
              $this->nmgp_dados_select['motivo'] = $this->motivo;
              $this->tipo = $rs->fields[4] ; 
              $this->nmgp_dados_select['tipo'] = $this->tipo;
              $this->status = $rs->fields[5] ; 
              $this->nmgp_dados_select['status'] = $this->status;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->idliberacao = (string)$this->idliberacao; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['parms'] = "idliberacao?#?$this->idliberacao?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] < $qt_geral_reg_form_liberacao;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada") 
      { 
          $this->alunos = "";
          $this->alunos_hidden = "";
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select idliberacao_X_aluno, liberacao, aluno from liberacao_X_aluno where liberacao = $this->idliberacao"; 
          $rss = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
          if ($rss === false && !$rss->EOF)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $this->alunos = ""; 
          while (!$rss->EOF) 
          { 
                 $this->alunos .= $rss->fields[2] . "@?@";
                 $this->alunos_hidden .= $rss->fields[2] . "@?@";
                 $rss->MoveNext() ; 
          } 
          $rss->Close(); 
      } 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada") 
      { 
          $this->turmas = "";
          $this->turmas_hidden = "";
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select idliberacao_x_turma, idliberacao, idturma from liberacao_x_turma where idliberacao = $this->idliberacao"; 
          $rss = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
          if ($rss === false && !$rss->EOF)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $this->turmas = ""; 
          while (!$rss->EOF) 
          { 
                 $this->turmas .= $rss->fields[2] . "@?@";
                 $this->turmas_hidden .= $rss->fields[2] . "@?@";
                 $rss->MoveNext() ; 
          } 
          $rss->Close(); 
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->idliberacao = "" ;  
              $this->hora = "" ;  
              $this->hora_hora = "" ;  
              $this->dia = "" ;  
              $this->dia_hora = "" ;  
              $this->motivo = "" ;  
              $this->tipo = "" ;  
              $this->status = "" ;  
              $this->sc_field_0 = "" ;  
              $this->turmas = "" ;  
              $this->alunos = "" ;  
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      $this->nm_proc_onload();
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idliberacao) from " . $this->Ini->nm_tabela . " where idliberacao < $this->idliberacao" . $str_where_filter; 
     $rs = $this->Db->Execute("select max(idliberacao) from " . $this->Ini->nm_tabela . " where idliberacao < $this->idliberacao" . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idliberacao = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idliberacao) from " . $this->Ini->nm_tabela . " where idliberacao > $this->idliberacao" . $str_where_filter; 
     $rs = $this->Db->Execute("select min(idliberacao) from " . $this->Ini->nm_tabela . " where idliberacao > $this->idliberacao" . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idliberacao = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idliberacao) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
     $rs = $this->Db->Execute("select min(idliberacao) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->idliberacao = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idliberacao) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idliberacao) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->idliberacao = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Reg_Page   = 1;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['reg_start'] + 1;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $this->SC_nav_page .= '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $this->SC_nav_page .= '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $this->SC_nav_page .= '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
           }
       }
   }
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_liberacao_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
    include_once("form_liberacao_form0.php");
 }
   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile


 function new_date_format($type, $field)
 {
     $new_date_format = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_detal'];
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "idliberacao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_tipo($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "tipo", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "motivo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "status", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      $sc_where = " where " . $comando;
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
     $qt_geral_reg_form_liberacao = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['total'] = $qt_geral_reg_form_liberacao;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['fast_search'][2] = $sv_data;
      $rt->Close(); 
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_numeric = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "idliberacao";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['decimal_db'] == ".")
         {
             $nm_aspas = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
      $Nm_datas[] = "hora";$Nm_datas[] = "dia";
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               if (substr($tp_campo, 0, 4) == "DATE")
               {
                   $NM_cmd     = "";
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "year($nome) = " . $this->NM_data_qp['ano'];
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "month($nome) = " . $this->NM_data_qp['mes'];
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "day($nome) = " . $this->NM_data_qp['dia'];
                   }
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $comando        .= $NM_cmd;
                   }
               }
               else
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
               }
            break;
            case "NP":     // 
               if (substr($tp_campo, 0, 4) == "DATE")
               {
                   $NM_cmd     = "";
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "year($nome) <> " . $this->NM_data_qp['ano'];
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "month($nome) <> " . $this->NM_data_qp['mes'];
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "day($nome) <> " . $this->NM_data_qp['dia'];
                   }
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $comando        .= $NM_cmd;
                   }
               }
               else
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
               }
            break;
            case "DF":     // 
               if ($tp_campo == "DTDF" || $tp_campo == "DATEDF")
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " not like '%" . $campo . "%'";
               }
               else
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas;
               }
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
            break;
         }
   }
   function SC_lookup_tipo($condicao, $campo)
   {
       $data_look = array();
       $data_look['S'] = "Saida";
       $data_look['E'] = "Entrada";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_sc_field_0($condicao, $campo)
   {
       $data_look = array();
       $data_look['T'] = "Turmas";
       $data_look['A'] = "Alunos";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_liberacao_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['opc_ant']);
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = '_self';
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_liberacao_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo NM_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo NM_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_liberacao']['sc_modal'])
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
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
}
?>
