<?php

class grid_liberacao_pesq
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $cmp_formatado;
   var $nm_data;
   var $Campos_Mens_erro;

   var $comando;
   var $comando_sum;
   var $comando_filtro;
   var $comando_ini;
   var $comando_fim;
   var $NM_operador;
   var $NM_data_qp;
   var $NM_path_filter;
   var $NM_curr_fil;
   var $nm_location;
   var $nmgp_botoes = array();
   var $NM_fil_ant = array();
   var $ajax_return_fields = array();

   /**
    * @access  public
    */
   function grid_liberacao_pesq()
   {
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   function monta_busca()
   {
      global $bprocessa;
      include("../_lib/css/" . $this->Ini->str_schema_filter . "_filter.php");
      $this->Ini->Str_btn_filter = trim($str_button) . "/" . trim($str_button) . ".php";
      $this->Str_btn_filter_css  = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->Ini->path_btn . $this->Ini->Str_btn_filter);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['path_libs_php'] = $this->Ini->path_lib_php;
      $this->Img_sep_filter = "/" . trim($str_toolbar_separator);
      $this->Block_img_col  = trim($str_block_col);
      $this->Block_img_exp  = trim($str_block_exp);
      $this->Bubble_tail    = trim($str_bubble_tail);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput"); 
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['param']['buffer_output'] = true;
          ob_start();
          $this->processa_ajax();
          $this->Db->Close(); 
          exit;
      }
      if (isset($bprocessa) && "pesq" == $bprocessa)
      {
         $this->processa_busca();
      }
      else
      {
         $this->monta_formulario();
      }
   }

   /**
    * @access  public
    */
   function monta_formulario()
   {
      $this->init();
      $this->monta_html_ini();
      $this->monta_cabecalho();
      $this->monta_form();
      $this->monta_html_fim();
   }

   /**
    * @access  public
    */
   function init()
   {
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
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("pt_br");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $this->NM_path_filter = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/filters/";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['opcao'] = "igual";
   }

   function processa_ajax()
   {
      global 
      $motivo_cond, $motivo,
             $idliberacao_cond, $idliberacao,
             $hora_cond, $hora, $hora_hor, $hora_min, $hora_seg,
             $dia_cond, $dia, $dia_dia, $dia_mes, $dia_ano,
      $NM_filters, $NM_filters_del, $nmgp_save_name, $NM_operador, $nmgp_save_option, $bprocessa, $Ajax_label, $Ajax_val, $Campo_bi, $Opc_bi;
      $this->init();
      if (isset($this->NM_ajax_info['param']['motivo_cond']))
      {
          $motivo_cond = $this->NM_ajax_info['param']['motivo_cond'];
      }
      if (isset($this->NM_ajax_info['param']['motivo']))
      {
          $motivo = $this->NM_ajax_info['param']['motivo'];
      }
      if (isset($this->NM_ajax_info['param']['idliberacao_cond']))
      {
          $idliberacao_cond = $this->NM_ajax_info['param']['idliberacao_cond'];
      }
      if (isset($this->NM_ajax_info['param']['idliberacao']))
      {
          $idliberacao = $this->NM_ajax_info['param']['idliberacao'];
      }
      if (isset($this->NM_ajax_info['param']['hora_cond']))
      {
          $hora_cond = $this->NM_ajax_info['param']['hora_cond'];
      }
      if (isset($this->NM_ajax_info['param']['hora']))
      {
          $hora = $this->NM_ajax_info['param']['hora'];
      }
      if (isset($this->NM_ajax_info['param']['hora_hor']))
      {
          $hora_hor = $this->NM_ajax_info['param']['hora_hor'];
      }
      if (isset($this->NM_ajax_info['param']['hora_min']))
      {
          $hora_min = $this->NM_ajax_info['param']['hora_min'];
      }
      if (isset($this->NM_ajax_info['param']['hora_seg']))
      {
          $hora_seg = $this->NM_ajax_info['param']['hora_seg'];
      }
      if (isset($this->NM_ajax_info['param']['dia_cond']))
      {
          $dia_cond = $this->NM_ajax_info['param']['dia_cond'];
      }
      if (isset($this->NM_ajax_info['param']['dia']))
      {
          $dia = $this->NM_ajax_info['param']['dia'];
      }
      if (isset($this->NM_ajax_info['param']['dia_dia']))
      {
          $dia_dia = $this->NM_ajax_info['param']['dia_dia'];
      }
      if (isset($this->NM_ajax_info['param']['dia_mes']))
      {
          $dia_mes = $this->NM_ajax_info['param']['dia_mes'];
      }
      if (isset($this->NM_ajax_info['param']['dia_ano']))
      {
          $dia_ano = $this->NM_ajax_info['param']['dia_ano'];
      }
      if (isset($this->NM_ajax_info['param']['NM_filters']))
      {
          $NM_filters = $this->NM_ajax_info['param']['NM_filters'];
      }
      if (isset($this->NM_ajax_info['param']['NM_filters_del']))
      {
          $NM_filters_del = $this->NM_ajax_info['param']['NM_filters_del'];
      }
      if (isset($this->NM_ajax_info['param']['nmgp_save_name']))
      {
          $nmgp_save_name = $this->NM_ajax_info['param']['nmgp_save_name'];
      }
      if (isset($this->NM_ajax_info['param']['NM_operador']))
      {
          $NM_operador = $this->NM_ajax_info['param']['NM_operador'];
      }
      if (isset($this->NM_ajax_info['param']['nmgp_save_option']))
      {
          $nmgp_save_option = $this->NM_ajax_info['param']['nmgp_save_option'];
      }
      if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
      {
          $nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
      }
      if (isset($this->NM_ajax_info['param']['bprocessa']))
      {
          $bprocessa = $this->NM_ajax_info['param']['bprocessa'];
      }
      if (isset($nmgp_refresh_fields))
      {
          $nmgp_refresh_fields = explode('_#fld#_', $nmgp_refresh_fields);
      }
      else
      {
          $nmgp_refresh_fields = array();
      }
//-- ajax metodos ---
      if (isset($bprocessa) && $bprocessa == "save_form")
      {
          $this->salva_filtro();
          $this->NM_fil_ant = $this->gera_array_filtros();
          $Nome_filter = "";
          $Opt_filter  = "<option value=\"\"></option>\r\n";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              if ($_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Tipo_filter[1] = mb_convert_encoding($Tipo_filter[1], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" . grid_liberacao_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_liberacao_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_liberacao_pack_protect_string($Cada_filter) .  "</option>\r\n";
          }
          $Ajax_select = "<SELECT id=\"sel_recup_filters_bot\" name=\"NM_filters_bot\" onChange=\"nm_submit_filter(this, 'bot')\" size=\"1\">\r\n";
          $this->NM_ajax_info['fldList']['NM_filters_bot'] = array(
                     'type'    => "select",
                     'optList' => $Ajax_select . $Opt_filter . "</SELECT>\r\n",
                     );
          $Ajax_select = "<SELECT id=\"sel_filters_del_bot\" name=\"NM_filters_del_bot\" size=\"1\">\r\n";
          $this->NM_ajax_info['fldList']['NM_filters_del_bot'] = array(
                     'type'    => "select",
                     'optList' => $Ajax_select . $Opt_filter . "</SELECT>\r\n",
                     );
      }

      if (isset($bprocessa) && $bprocessa == "filter_delete")
      {
          $this->apaga_filtro();
          $this->NM_fil_ant = $this->gera_array_filtros();
          $Nome_filter = "";
          $Opt_filter  = "<option value=\"\"></option>\r\n";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              if ($_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Tipo_filter[1] = mb_convert_encoding($Tipo_filter[1], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter  = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" .  grid_liberacao_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_liberacao_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_liberacao_pack_protect_string($Cada_filter) .  "</option>\r\n";
          }
          $Ajax_select = "<SELECT id=\"sel_recup_filters_bot\" name=\"NM_filters_bot\" onChange=\"nm_submit_filter(this, 'bot')\" size=\"1\">\r\n";
          $this->NM_ajax_info['fldList']['NM_filters_bot'] = array(
                     'type'    => "select",
                     'optList' => $Ajax_select . $Opt_filter . "</SELECT>\r\n",
                     );
          $Ajax_select = "<SELECT id=\"sel_filters_del_bot\" name=\"NM_filters_del_bot\" size=\"1\">\r\n";
          $this->NM_ajax_info['fldList']['NM_filters_del_bot'] = array(
                     'type'    => "select",
                     'optList' => $Ajax_select . $Opt_filter . "</SELECT>\r\n",
                     );
      }

      if (isset($bprocessa) && $bprocessa == "filter_save")
      {
          $this->recupera_filtro();
          foreach ($this->ajax_return_fields as $cada_cmp => $cada_opt)
          {
              $this->NM_ajax_info['fldList'][$cada_cmp] = array(
                         'type'    => $cada_opt['obj'],
                         'valList' => $cada_opt['vallist'],
                         );
          }
      }

      if (isset($bprocessa) && $bprocessa == "proc_bi")
      {
          $this->process_cond_bi($Opc_bi, $BI_data1, $BI_data2);
          $this->NM_ajax_info['fldList'][$Campo_bi . "_dia"] = array('type' => 'text', 'valList' => array(substr($BI_data1, 0, 2)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_mes"] = array('type' => 'text', 'valList' => array(substr($BI_data1, 2, 2)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_ano"] = array('type' => 'text', 'valList' => array(substr($BI_data1, 4)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_input_2_dia"] = array('type' => 'text', 'valList' => array(substr($BI_data2, 0, 2)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_input_2_mes"] = array('type' => 'text', 'valList' => array(substr($BI_data2, 2, 2)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_input_2_ano"] = array('type' => 'text', 'valList' => array(substr($BI_data2, 4)));
      }
   }

   /**
    * @access  public
    */
   function processa_busca()
   {
      $this->inicializa_vars();
      $this->trata_campos();
      if (!empty($this->Campos_Mens_erro)) 
      {
          scriptcase_error_display($this->Campos_Mens_erro, ""); 
          $this->monta_formulario();
      }
      else
      {
          $this->finaliza_resultado();
      }
   }

   /**
    * @access  public
    */
   function and_or()
   {
      $posWhere = strpos(strtolower($this->comando), "where");
      if (FALSE === $posWhere)
      {
         $this->comando     .= " where ";
         $this->comando_sum .= " and ";
      }
      if ($this->comando_ini == "ini")
      {
          if (FALSE !== $posWhere)
          {
              $this->comando     .= " and ( ";
              $this->comando_sum .= " and ( ";
              $this->comando_fim  = " ) ";
          }
         $this->comando_ini  = "";
      }
      elseif ("or" == $this->NM_operador)
      {
         $this->comando        .= " or ";
         $this->comando_sum    .= " or ";
         $this->comando_filtro .= " or ";
      }
      else
      {
         $this->comando        .= " and ";
         $this->comando_sum    .= " and ";
         $this->comando_filtro .= " and ";
      }
   }

   /**
    * @access  public
    * @param  string  $nome  
    * @param  string  $condicao  
    * @param  mixed  $campo  
    * @param  mixed  $campo2  
    * @param  string  $nome_campo  
    * @param  string  $tp_campo  
    * @global  array  $nmgp_tab_label  
    */
   function monta_condicao($nome, $condicao, $campo, $campo2 = "", $nome_campo="", $tp_campo="")
   {
      global $nmgp_tab_label;
      $nm_aspas   = "'";
      $Nm_numeric = array();
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $Nm_numeric[] = "idliberacao";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['decimal_db'] == ".")
         {
            $nm_aspas = "";
         }
         if ($condicao != "in")
         {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['decimal_db'] == ".")
            {
               $campo  = str_replace(",", ".", $campo);
               $campo2 = str_replace(",", ".", $campo2);
            }
            if ($campo == "")
            {
               $campo = 0;
            }
            if ($campo2 == "")
            {
               $campo2 = 0;
            }
         }
      }
      $Nm_datas[] = "hora";$Nm_datas[] = "dia";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if ($campo == "" && $condicao != "nu" && $condicao != "nn")
      {
         return;
      }
      else
      {
         $tmp_pos = strpos($campo, "##@@");
         if ($tmp_pos === false)
         {
             $res_lookup = $campo;
         }
         else
         {
             $res_lookup = substr($campo, $tmp_pos + 4);
             $campo = substr($campo, 0, $tmp_pos);
             if ($campo === "" && $condicao != "nu" && $condicao != "nn")
             {
                 return;
             }
         }
         $tmp_pos = strpos($this->cmp_formatado[$nome_campo], "##@@");
         if ($tmp_pos !== false)
         {
             $this->cmp_formatado[$nome_campo] = substr($this->cmp_formatado[$nome_campo], $tmp_pos + 4);
         }
         $this->and_or();
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $campo2 = substr($this->Db->qstr($campo2), 1, -1);
         $nome_sum = "liberacao.$nome";
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower. " = " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "II":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " like '" . $campo . "%'";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "QP":     // 
               if (substr($tp_campo, 0, 4) == "DATE")
               {
                   $NM_cond    = "";
                   $NM_cmd     = "";
                   $NM_cmd_sum = "";
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_andd'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_year'] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->NM_data_qp['ano'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " and ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%Y', $nome) = '" . $this->NM_data_qp['ano'] . "'";
                           $NM_cmd_sum .= "strftime('%Y', $nome_sum) = '" . $this->NM_data_qp['ano'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(year from $nome) = " . $this->NM_data_qp['ano'];
                           $NM_cmd_sum .= "extract(year from $nome_sum) = " . $this->NM_data_qp['ano'];
                       }
                       else
                       {
                           $NM_cmd     .= "year($nome) = " . $this->NM_data_qp['ano'];
                           $NM_cmd_sum .= "year($nome_sum) = " . $this->NM_data_qp['ano'];
                       }
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_andd'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mnth'] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->NM_data_qp['mes'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " and ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%m', $nome) = '" . $this->NM_data_qp['mes'] . "'";
                           $NM_cmd_sum .= "strftime('%m', $nome_sum) = '" . $this->NM_data_qp['mes'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(month from $nome) = " . $this->NM_data_qp['mes'];
                           $NM_cmd_sum .= "extract(month from $nome_sum) = " . $this->NM_data_qp['mes'];
                       }
                       else
                       {
                           $NM_cmd     .= "month($nome) = " . $this->NM_data_qp['mes'];
                           $NM_cmd_sum .= "month($nome_sum) = " . $this->NM_data_qp['mes'];
                       }
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_andd'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_days'] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->NM_data_qp['dia'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " and ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%d', $nome) = '" . $this->NM_data_qp['dia'] . "'";
                           $NM_cmd_sum .= "strftime('%d', $nome_sum) = '" . $this->NM_data_qp['dia'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(day from $nome) = " . $this->NM_data_qp['dia'];
                           $NM_cmd_sum .= "extract(day from $nome_sum) = " . $this->NM_data_qp['dia'];
                       }
                       else
                       {
                           $NM_cmd     .= "day($nome) = " . $this->NM_data_qp['dia'];
                           $NM_cmd_sum .= "day($nome_sum) = " . $this->NM_data_qp['dia'];
                       }
                   }
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $NM_cmd_sum = " (" . $NM_cmd_sum . ")";
                       $this->comando        .= $NM_cmd;
                       $this->comando_sum    .= $NM_cmd_sum;
                       $this->comando_filtro .= $NM_cmd;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $NM_cond . "##*@@";
                   }
               }
               else
               {
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " like '%" . $campo . "%'";
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " like '%" . $campo . "%'";
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
            break;
            case "NP":     // 
               if (substr($tp_campo, 0, 4) == "DATE")
               {
                   $NM_cond    = "";
                   $NM_cmd     = "";
                   $NM_cmd_sum = "";
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_andd'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_year'] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->NM_data_qp['ano'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " or ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " or ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%Y', $nome) <> '" . $this->NM_data_qp['ano'] . "'";
                           $NM_cmd_sum .= "strftime('%Y', $nome_sum) <> '" . $this->NM_data_qp['ano'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(year from $nome) <> " . $this->NM_data_qp['ano'];
                           $NM_cmd_sum .= "extract(year from $nome_sum) <> " . $this->NM_data_qp['ano'];
                       }
                       else
                       {
                           $NM_cmd     .= "year($nome) <> " . $this->NM_data_qp['ano'];
                           $NM_cmd_sum .= "year($nome_sum) <> " . $this->NM_data_qp['ano'];
                       }
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_andd'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mnth'] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->NM_data_qp['mes'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " or ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " or ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%m', $nome) <> '" . $this->NM_data_qp['mes'] . "'";
                           $NM_cmd_sum .= "strftime('%m', $nome_sum) <> '" . $this->NM_data_qp['mes'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(month from $nome) <> " . $this->NM_data_qp['mes'];
                           $NM_cmd_sum .= "extract(month from $nome_sum) <> " . $this->NM_data_qp['mes'];
                       }
                       else
                       {
                           $NM_cmd     .= "month($nome) <> " . $this->NM_data_qp['mes'];
                           $NM_cmd_sum .= "month($nome_sum) <> " . $this->NM_data_qp['mes'];
                       }
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_andd'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_days'] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->NM_data_qp['dia'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " or ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " or ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%d', $nome) <> '" . $this->NM_data_qp['dia'] . "'";
                           $NM_cmd_sum .= "strftime('%d', $nome_sum) <> '" . $this->NM_data_qp['dia'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(day from $nome) <> " . $this->NM_data_qp['dia'];
                           $NM_cmd_sum .= "extract(day from $nome_sum) <> " . $this->NM_data_qp['dia'];
                       }
                       else
                       {
                           $NM_cmd     .= "day($nome) <> " . $this->NM_data_qp['dia'];
                           $NM_cmd_sum .= "day($nome_sum) <> " . $this->NM_data_qp['dia'];
                       }
                   }
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $NM_cmd_sum = " (" . $NM_cmd_sum . ")";
                       $this->comando        .= $NM_cmd;
                       $this->comando_sum    .= $NM_cmd_sum;
                       $this->comando_filtro .= $NM_cmd;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_not_like'] . " " . $NM_cond . "##*@@";
                   }
               }
               else
               {
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " not like '%" . $campo . "%'";
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " not like '%" . $campo . "%'";
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_not_like'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
            break;
            case "DF":     // 
               if ($tp_campo == "DTDF" || $tp_campo == "DATEDF" || $tp_campo == "DATETIMEDF")
               {
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " not like '%" . $campo . "%'";
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " not like '%" . $campo . "%'";
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " not like '%" . $campo . "%'";
               }
               else
               {
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas;
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas;
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas;
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GT":     // 
               $this->comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum > " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $nmgp_lang['pesq_cond_maior'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GE":     // 
               $this->comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum >= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LT":     // 
               $this->comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum < " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LE":     // 
               $this->comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum <= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "BW":     // 
               if ($tp_campo == "DTDF" || $tp_campo == "DATEDF" || $tp_campo == "DATETIMEDF")
               {
                   $this->comando        .= " $nome not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_sum    .= " $nome_sum not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_filtro .= " $nome not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
               else
               {
                   $this->comando        .= " $nome between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_sum    .= " $nome_sum between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_filtro .= " $nome between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   if ($tp_campo == "DTEQ" || $tp_campo == "DATEEQ" || $tp_campo == "DATETIMEEQ")
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
                   }
                   else
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_andd'] . " " . $this->cmp_formatado[$nome_campo . "_Input_2"] . "##*@@";
                   }
               }
            break;
            case "IN":     // 
               $nm_sc_valores = explode(",", $campo);
               $cond_str = "";
               $nm_cond  = "";
               if (!empty($nm_sc_valores))
               {
                   foreach ($nm_sc_valores as $nm_sc_valor)
                   {
                      if (in_array($campo_join, $Nm_numeric) && substr_count($nm_sc_valor, ".") > 1)
                      {
                         $nm_sc_valor = str_replace(".", "", $nm_sc_valor);
                      }
                      if ("" != $cond_str)
                      {
                         $cond_str .= ",";
                         $nm_cond  .= " " . $this->Ini->Nm_lang['lang_srch_orrr'] . " ";
                      }
                      $cond_str .= $nm_aspas . $nm_sc_valor . $nm_aspas;
                      $nm_cond  .= $nm_aspas . $nm_sc_valor . $nm_aspas;
                   }
               }
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
            break;
            case "NU":     // 
               $this->comando        .= " $nome IS NULL ";
               $this->comando_sum    .= " $nome_sum IS NULL ";
               $this->comando_filtro .= " $nome IS NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_null'] ." " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "NN":     // 
               $this->comando        .= " $nome IS NOT NULL ";
               $this->comando_sum    .= " $nome_sum IS NOT NULL ";
               $this->comando_filtro .= " $nome IS NOT NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
         }
      }
   }

   /**
    * @access  public
    * @param  array  $data_arr  
    */
   function data_menor(&$data_arr)
   {
      $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "0001" : $data_arr["ano"];
      $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "01" : $data_arr["mes"];
      $data_arr["dia"] = ("__" == $data_arr["dia"])   ? "01" : $data_arr["dia"];
      $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "00" : $data_arr["hor"];
      $data_arr["min"] = ("__" == $data_arr["min"])   ? "00" : $data_arr["min"];
      $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "00" : $data_arr["seg"];
   }

   /**
    * @access  public
    * @param  array  $data_arr  
    */
   function data_maior(&$data_arr)
   {
      $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "9999" : $data_arr["ano"];
      $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "12" : $data_arr["mes"];
      $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "23" : $data_arr["hor"];
      $data_arr["min"] = ("__" == $data_arr["min"])   ? "59" : $data_arr["min"];
      $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "59" : $data_arr["seg"];
      if ("__" == $data_arr["dia"])
      {
          $data_arr["dia"] = "31";
          if ($data_arr["mes"] == "04" || $data_arr["mes"] == "06" || $data_arr["mes"] == "09" || $data_arr["mes"] == "11")
          {
              $data_arr["dia"] = 30;
          }
          elseif ($data_arr["mes"] == "02")
          { 
                  if  ($data_arr["ano"] % 4 == 0)
                  {
                       $data_arr["dia"] = 29;
                  }
                  else 
                  {
                       $data_arr["dia"] = 28;
                  }
          }
      }
   }

   /**
    * @access  public
    * @param  string  $nm_data_hora  
    */
   function limpa_dt_hor_pesq(&$nm_data_hora)
   {
      $nm_data_hora = str_replace("Y", "", $nm_data_hora); 
      $nm_data_hora = str_replace("M", "", $nm_data_hora); 
      $nm_data_hora = str_replace("D", "", $nm_data_hora); 
      $nm_data_hora = str_replace("H", "", $nm_data_hora); 
      $nm_data_hora = str_replace("I", "", $nm_data_hora); 
      $nm_data_hora = str_replace("S", "", $nm_data_hora); 
      $tmp_pos = strpos($nm_data_hora, "--");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("--", "-", $nm_data_hora); 
      }
      $tmp_pos = strpos($nm_data_hora, "::");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("::", ":", $nm_data_hora); 
      }
   }

   /**
    * @access  public
    */
   function retorna_pesq()
   {
      global $nm_apl_dependente;
   $NM_retorno = "grid_liberacao.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_srch_titl'] ?> - liberacao</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
</HEAD>
<BODY class="scGridPage">
<FORM style="display:none;" name="form_ok" method="POST" action="<?php echo $NM_retorno; ?>" target="_self">
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="pesq"> 
</FORM>
<SCRIPT type="text/javascript">
 document.form_ok.submit();
</SCRIPT>
</BODY>
</HTML>
<?php
}

   /**
    * @access  public
    */
   function monta_html_ini()
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_srch_titl'] ?> - liberacao</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_filter.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_error.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Str_btn_filter_css ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_form.css" /> 
</HEAD>
<BODY class="scFilterPage">
<?php echo $this->Ini->Ajax_result_set ?>
<SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_js . "/browserSniffer.js" ?>"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/jquery.scInput.js"></script>
 <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
 <script type="text/javascript">
   var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax ?>';
   var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax ?>';
   var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax ?>';
   var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax ?>';
 </script>
<?php
$Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo $Cod_Btn ?>&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
 <SCRIPT type="text/javascript">

<?php
if (is_file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js"))
{
    $Tb_err_js = file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js");
    foreach ($Tb_err_js as $Lines)
    {
        if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
        {
            $Lines = mb_convert_encoding($Lines, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        echo $Lines;
    }
}
$Msg_Inval = mb_convert_encoding("Inv�lido", $_SESSION['scriptcase']['charset']);
?>
var SC_crit_inv = "<?php echo $Msg_Inval ?>";
var nmdg_Form = "F1";

 $(function() {

   SC_carga_evt_jquery();
   $('input:text.sc-js-input').listen();
 });
var NM_index = 0;
var NM_hidden = new Array();
var NM_IE = (navigator.userAgent.indexOf('MSIE') > -1) ? 1 : 0;
function NM_hitTest(o, l)
{
    function getOffset(o){
        for(var r = {l: o.offsetLeft, t: o.offsetTop, r: o.offsetWidth, b: o.offsetHeight};
            o = o.offsetParent; r.l += o.offsetLeft, r.t += o.offsetTop);
        return r.r += r.l, r.b += r.t, r;
    }
    for(var b, s, r = [], a = getOffset(o), j = isNaN(l.length), i = (j ? l = [l] : l).length; i;
        b = getOffset(l[--i]), (a.l == b.l || (a.l > b.l ? a.l <= b.r : b.l <= a.r))
        && (a.t == b.t || (a.t > b.t ? a.t <= b.b : b.t <= a.b)) && (r[r.length] = l[i]));
    return j ? !!r.length : r;
}
var tem_obj = false;
function NM_show_menu(nn)
{
    if (!NM_IE)
    {
         return;
    }
    x = document.getElementById(nn);
    x.style.display = "block";
    obj_sel = document.body;
    tem_obj = true;
    x.ieFix = NM_hitTest(x, obj_sel.getElementsByTagName("select"));
    for (i = 0; i <  x.ieFix.length; i++)
    {
      if (x.ieFix[i].style.visibility != "hidden")
      {
          x.ieFix[i].style.visibility = "hidden";
          NM_hidden[NM_index] = x.ieFix[i];
          NM_index++;
      }
    }
}
function NM_hide_menu()
{
    if (!NM_IE)
    {
         return;
    }
    obj_del = document.body;
    if (tem_obj && obj_del == obj_sel)
    {
        for(var i = NM_hidden.length; i; NM_hidden[--i].style.visibility = "visible");
    }
    NM_index = 0;
    NM_hidden = new Array();
}
 function nm_save_form(pos)
 {
  if (pos == 'top' && document.F1.nmgp_save_name_top.value == '')
  {
      return;
  }
  if (pos == 'bot' && document.F1.nmgp_save_name_bot.value == '')
  {
      return;
  }
  document.F1.bprocessa.value = "save_form";
  grid_liberacao_do_ajax_save_filter(pos);
 }
 function nm_submit_filter(obj_sel, pos)
 {
  index   = obj_sel.selectedIndex;
  if (obj_sel.options[index].value == "") 
  {
      return false;
  }
  document.F1.bprocessa.value = "filter_save";
  grid_liberacao_do_ajax_change_filter(pos);
 }
 function nm_submit_filter_del(pos)
 {
  if (pos == 'top')
  {
      obj_sel = document.F1.elements['NM_filters_del_top'];
  }
  if (pos == 'bot')
  {
      obj_sel = document.F1.elements['NM_filters_del_bot'];
  }
  index   = obj_sel.selectedIndex;
  if (obj_sel.options[index].value == "") 
  {
      return false;
  }
  document.F1.bprocessa.value = "filter_delete";
  grid_liberacao_do_ajax_delete_filter(pos);
 }
function nm_open_popup(parms)
{
    NovaJanela = window.open (parms, '', 'resizable, scrollbars');
}
 </SCRIPT>
<?php
include_once("grid_liberacao_sajax_js.php");
?>
<script type="text/javascript">
 $(function() {
 });
</script>
 <FORM name="F1" action="grid_liberacao.php" method="post" target="_self"> 
 <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
 <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
 <INPUT type="hidden" name="nmgp_opcao" value="busca"> 
 <div id="idJSSpecChar" style="display:none;"></div>
 <div id="id_div_process" style="display: none; position: absolute"><table class="scFilterTable"><tr><td class="scFilterLabelOdd"><?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</td></tr></table></div>
 <div id="id_fatal_error" class="scFilterFieldOdd" style="display:none; position: absolute"></div>
<TABLE id="main_table" class="scFilterBorder" align="center" valign="top" >
  <div id="id_div_process_block" style="display: none; margin: 10px; whitespace: nowrap"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs'] ?>...</span></div>
<?php
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   /**
    * @access  public
    */
   function monta_cabecalho()
   {
      $Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
      $Lim   = strlen($Str_date);
      $Ult   = "";
      $Arr_D = array();
      for ($I = 0; $I < $Lim; $I++)
      {
          $Char = substr($Str_date, $I, 1);
          if ($Char != $Ult)
          {
              $Arr_D[] = $Char;
          }
          $Ult = $Char;
      }
      $Prim = true;
      $Str  = "";
      foreach ($Arr_D as $Cada_d)
      {
          $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $Str .= $Cada_d;
          $Prim = false;
      }
      $Str = str_replace("a", "Y", $Str);
      $Str = str_replace("y", "Y", $Str);
      $nm_data_fixa = date($Str); 
?>
 <TR align="center">
  <TD class="scFilterTableTd">
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFilterHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFilterHeaderFont"><span><?php echo $this->Ini->Nm_lang['lang_othr_srch_titl'] ?> - liberacao</span></td>
            <td id="lin1_col2" class="scFilterHeaderFont"><span><?php echo $nm_data_fixa; ?></span></td>
        </tr>
    </table>		 
 </div>
</div>
  </TD>
 </TR>
<?php
   }

   /**
    * @access  public
    * @global  string  $nm_url_saida  $this->Ini->Nm_lang['pesq_global_nm_url_saida']
    * @global  integer  $nm_apl_dependente  $this->Ini->Nm_lang['pesq_global_nm_apl_dependente']
    * @global  string  $nmgp_parms  
    * @global  string  $bprocessa  $this->Ini->Nm_lang['pesq_global_bprocessa']
    */
   function monta_form()
   {
      global 
             $motivo_cond, $motivo,
             $idliberacao_cond, $idliberacao,
             $hora_cond, $hora, $hora_hor, $hora_min, $hora_seg,
             $dia_cond, $dia, $dia_dia, $dia_mes, $dia_ano,
             $nm_url_saida, $nm_apl_dependente, $nmgp_parms, $bprocessa, $nmgp_save_name, $NM_operador, $NM_filters, $nmgp_save_option, $NM_filters_del, $Script_BI;
      $Script_BI = "";
      $this->nmgp_botoes['clear'] = "on";
      $this->nmgp_botoes['save'] = "on";
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_liberacao']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_liberacao']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_liberacao']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("grid_liberacao", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $nmgp_tab_label = "";
      $delimitador = "##@@";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      { 
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca'], $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $motivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['motivo']; 
          $motivo_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['motivo_cond']; 
          $idliberacao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['idliberacao']; 
          $idliberacao_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['idliberacao_cond']; 
          $hora_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['hora_hor']; 
          $hora_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['hora_min']; 
          $hora_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['hora_seg']; 
          $hora_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['hora_cond']; 
          $dia_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['dia_dia']; 
          $dia_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['dia_mes']; 
          $dia_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['dia_ano']; 
          $dia_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['dia_cond']; 
          $this->NM_operador = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['NM_operador']; 
          if (strtoupper($idliberacao_cond) != "II" && strtoupper($idliberacao_cond) != "QP" && strtoupper($idliberacao_cond) != "NP" && strtoupper($idliberacao_cond) != "IN") 
          { 
              nmgp_Form_Num_Val($idliberacao, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
      } 
      if (isset($nmgp_save_name) && !empty($nmgp_save_name) && $bprocessa == "save_form")
      { 
          $this->salva_filtro();
      } 
      if (isset($NM_filters) && !empty($NM_filters) && $bprocessa == "filter_save")
      { 
          $this->recupera_filtro();
      } 
      if (isset($NM_filters_del) && !empty($NM_filters_del) && $bprocessa == "filter_delete")
      { 
          $this->apaga_filtro();
      } 
      if (!isset($motivo_cond) || empty($motivo_cond))
      {
         $motivo_cond = "eq";
      }
      if (!isset($idliberacao_cond) || empty($idliberacao_cond))
      {
         $idliberacao_cond = "eq";
      }
      if (!isset($hora_cond) || empty($hora_cond))
      {
         $hora_cond = "eq";
      }
      if (!isset($dia_cond) || empty($dia_cond))
      {
         $dia_cond = "eq";
      }
      if (!isset($motivo) || $motivo == "")
      {
          $motivo = "";
      }
      if (isset($motivo) && !empty($motivo))
      {
         $tmp_pos = strpos($motivo, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $motivo = substr($motivo, 0, $tmp_pos);
         }
      }
      if (!isset($idliberacao) || $idliberacao == "")
      {
          $idliberacao = "";
      }
      if (isset($idliberacao) && !empty($idliberacao))
      {
         $tmp_pos = strpos($idliberacao, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $idliberacao = substr($idliberacao, 0, $tmp_pos);
         }
      }
      if (!isset($hora) || $hora == "")
      {
          $hora = "";
      }
      if (isset($hora) && !empty($hora))
      {
         $tmp_pos = strpos($hora, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $hora = substr($hora, 0, $tmp_pos);
         }
      }
      if (!isset($dia) || $dia == "")
      {
          $dia = "";
      }
      if (isset($dia) && !empty($dia))
      {
         $tmp_pos = strpos($dia, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $dia = substr($dia, 0, $tmp_pos);
         }
      }
?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
<?php
   if (is_file("grid_liberacao_help.txt"))
   {
      $Arq_WebHelp = file("grid_liberacao_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "sc_b_help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
              }
          }
      }
   }
?>
    </td>
   </tr></table>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    </TD></TR><TR><TD>
    <DIV id="Salvar_filters_top" style="display:none">
     <TABLE align="center" class="scFilterTable">
      <TR>
       <TD class="scFilterBlock">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="scFilterBlockFont"><?php echo $this->Ini->Nm_lang['lang_othr_srch_head'] ?></td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "document.getElementById('Salvar_filters_top').style.display = 'none'", "document.getElementById('Salvar_filters_top').style.display = 'none'", "Cancel_frm_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldOdd">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input class="scFilterObjectOdd" type="text" name="nmgp_save_name_top" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bsalvar", "nm_save_form('top')", "nm_save_form('top')", "Save_frm_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldEven">
       <DIV id="Apaga_filters_top" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del_top">
           <SELECT class="scFilterObjectOdd" id="sel_filters_del_top" name="NM_filters_del_top" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], "UTF-8");
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
            <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_submit_filter_del('top')", "nm_submit_filter_del('top')", "Exc_filtro_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
 <TR align="center">
  <TD class="scFilterTableTd">
   <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
   <TR valign="top" >
  <TD width="100%" height="">
   <TABLE class="scFilterTable" id="hidden_bloco_0" valign="top" width="100%" style="height: 100%;">
   <tr>





      <TD class="scFilterLabelOdd"><?php echo (isset($this->New_label['motivo'])) ? $this->New_label['motivo'] : "Motivo"; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" name="motivo_cond">
       <OPTION value="eq" <?php if ("eq" == $motivo_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ii" <?php if ("ii" == $motivo_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_stts_with'] ?></OPTION>
       <OPTION value="qp" <?php if ("qp" == $motivo_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="df" <?php if ("df" == $motivo_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_dife'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['motivo'])) ? $this->New_label['motivo'] : "Motivo";
 $nmgp_tab_label .= "motivo?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<INPUT  type="text" id="SC_motivo" name="motivo" value="<?php echo NM_encode_input($motivo) ?>" size=50 alt="{datatype: 'text', maxLength: 100, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" class="sc-js-input scFilterObjectOdd">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelEven"><?php echo (isset($this->New_label['idliberacao'])) ? $this->New_label['idliberacao'] : "Idliberacao"; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" name="idliberacao_cond">
       <OPTION value="eq" <?php if ("eq" == $idliberacao_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ii" <?php if ("ii" == $idliberacao_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_stts_with'] ?></OPTION>
       <OPTION value="qp" <?php if ("qp" == $idliberacao_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="df" <?php if ("df" == $idliberacao_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_dife'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['idliberacao'])) ? $this->New_label['idliberacao'] : "Idliberacao";
 $nmgp_tab_label .= "idliberacao?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<INPUT  type="text" id="SC_idliberacao" name="idliberacao" value="<?php echo NM_encode_input($idliberacao) ?>" size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" class="sc-js-input scFilterObjectEven">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelOdd"><?php echo (isset($this->New_label['hora'])) ? $this->New_label['hora'] : "Hora"; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" name="hora_cond">
       <OPTION value="eq" <?php if ("eq" == $hora_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ii" <?php if ("ii" == $hora_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_stts_with'] ?></OPTION>
       <OPTION value="qp" <?php if ("qp" == $hora_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="df" <?php if ("df" == $hora_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_dife'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['hora'])) ? $this->New_label['hora'] : "Hora";
 $nmgp_tab_label .= "hora?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>

<?php
  $Form_base = "hhiiss";
  $date_format_show = "";
  $Str_time = strtolower($_SESSION['scriptcase']['reg_conf']['time_format']);
  $Lim   = strlen($Str_time);
  $Str   = "";
  $Ult   = "";
  $Arr_T = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_time, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_T[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_T[] = $Str;
  $Prim = true;
  foreach ($Arr_T as $Cada_t)
  {
      if (strpos($Form_base, $Cada_t) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['time_sep'] : "";
          $date_format_show .= $Cada_t;
          $Prim = false;
      }
  }
  $Arr_format = $Arr_T;
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "(" . $date_format_show .  ")";

?>

         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_hora_hor" name="hora_hor" value="<?php echo NM_encode_input($hora_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.hora_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_hora_min" name="hora_min" value="<?php echo NM_encode_input($hora_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.hora_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_hora_seg" name="hora_seg" value="<?php echo NM_encode_input($hora_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.hora_cond.value)">

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_hora"  class="scFilterFieldFontOdd">
 <?php echo $date_format_show ?>         </SPAN>
         
        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelEven"><?php echo (isset($this->New_label['dia'])) ? $this->New_label['dia'] : "Dia"; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" name="dia_cond">
       <OPTION value="eq" <?php if ("eq" == $dia_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ii" <?php if ("ii" == $dia_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_stts_with'] ?></OPTION>
       <OPTION value="qp" <?php if ("qp" == $dia_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="df" <?php if ("df" == $dia_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_dife'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['dia'])) ? $this->New_label['dia'] : "Dia";
 $nmgp_tab_label .= "dia?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>

<?php
  $Form_base = "ddmmyyyy";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
  $Prim = true;
  foreach ($Arr_D as $Cada_d)
  {
      if (strpos($Form_base, $Cada_d) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $date_format_show .= $Cada_d;
          $Prim = false;
      }
  }
  $Arr_format = $Arr_D;
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "(" . $date_format_show .  ")";

?>

         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dia_dia" name="dia_dia" value="<?php echo NM_encode_input($dia_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.dia_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dia_mes" name="dia_mes" value="<?php echo NM_encode_input($dia_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.dia_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dia_ano" name="dia_ano" value="<?php echo NM_encode_input($dia_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 
<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_dia"  class="scFilterFieldFontEven">
 <?php echo $date_format_show ?>         </SPAN>
         
        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr>
   </TABLE>
  </TD>
 </TR>
 </TABLE>
 </TD>
 </TR>
 <TR align="center">
  <TD class="scFilterTableTd">
<INPUT type="hidden" name="NM_operador" value="and">   <INPUT type="hidden" name="nmgp_tab_label" value="<?php echo NM_encode_input($nmgp_tab_label); ?>"> 
   <INPUT type="hidden" name="bprocessa" value="pesq"> 
  </TD>
 </TR>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
   <?php echo nmButtonOutput($this->arr_buttons, "bpesquisa", "document.F1.bprocessa.value='pesq'; nm_submit_form()", "document.F1.bprocessa.value='pesq'; nm_submit_form()", "sc_b_pesq_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
   if ($this->nmgp_botoes['clear'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "blimpar", "limpa_form()", "limpa_form()", "limpa_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
   }
?>
<?php
   if (!isset($this->nmgp_botoes['save']) || $this->nmgp_botoes['save'] == "on")
   {
       $this->NM_fil_ant = $this->gera_array_filtros();
?>
     <span id="idAjaxSelect_NM_filters_bot">
       <SELECT class="scFilterToolbar_obj" id="sel_recup_filters_bot" name="NM_filters_bot" onChange="nm_submit_filter(this, 'bot')" size="1">
           <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], "UTF-8");
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "           <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
           <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
       </SELECT>
     </span>
<?php
   }
?>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bedit_filter", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus()", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus()", "Ativa_save_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
   }
?>
<?php
   if (is_file("grid_liberacao_help.txt"))
   {
      $Arq_WebHelp = file("grid_liberacao_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "sc_b_help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
              }
          }
      }
   }
?>
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_liberacao']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_liberacao']['start'] == 'filter' && $nm_apl_dependente != 1)
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.form_cancel.submit()", "document.form_cancel.submit()", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
   }
   else
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.form_cancel.submit()", "document.form_cancel.submit()", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
   }
?>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
    </td>
   </tr></table>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    </TD></TR><TR><TD>
    <DIV id="Salvar_filters_bot" style="display:none">
     <TABLE align="center" class="scFilterTable">
      <TR>
       <TD class="scFilterBlock">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="scFilterBlockFont"><?php echo $this->Ini->Nm_lang['lang_othr_srch_head'] ?></td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "document.getElementById('Salvar_filters_bot').style.display = 'none'", "document.getElementById('Salvar_filters_bot').style.display = 'none'", "Cancel_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldOdd">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input class="scFilterObjectOdd" type="text" name="nmgp_save_name_bot" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bsalvar", "nm_save_form('bot')", "nm_save_form('bot')", "Save_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldEven">
       <DIV id="Apaga_filters_bot" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del_bot">
           <SELECT class="scFilterObjectOdd" id="sel_filters_del_bot" name="NM_filters_del_bot" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], "UTF-8");
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
            <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_submit_filter_del('bot')", "nm_submit_filter_del('bot')", "Exc_filtro_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
<?php
   }

   function monta_html_fim()
   {
       global $bprocessa, $nm_url_saida, $Script_BI;
?>

</TABLE>
   <INPUT type="hidden" name="form_condicao" value="3">
</FORM> 
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_liberacao']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_liberacao']['start'] == 'filter')
   {
?>
   <FORM style="display:none;" name="form_cancel"  method="POST" action="<?php echo $nm_url_saida; ?>" target="_self"> 
<?php
   }
   else
   {
?>
   <FORM style="display:none;" name="form_cancel"  method="POST" action="grid_liberacao.php" target="_self"> 
<?php
   }
?>
   <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
   <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<?php
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['orig_pesq'] == "grid")
   {
       $Ret_cancel_pesq = "volta_grid";
   }
   else
   {
       $Ret_cancel_pesq = "resumo";
   }
?>
   <INPUT type="hidden" name="nmgp_opcao" value="<?php echo $Ret_cancel_pesq; ?>"> 
   </FORM> 
<SCRIPT type="text/javascript">
<?php
   if (empty($this->NM_fil_ant))
   {
?>
      document.getElementById('Apaga_filters_bot').style.display = 'none';
      document.getElementById('sel_recup_filters_bot').style.display = 'none';
<?php
   }
?>
 function nm_submit_form()
 {
    document.F1.submit();
 }
 function limpa_form()
 {
   document.F1.reset();
   if (document.F1.NM_filters)
   {
       document.F1.NM_filters.selectedIndex = -1;
   }
   document.getElementById('Salvar_filters_bot').style.display = 'none';
   document.F1.motivo.value = "";
   document.F1.idliberacao.value = "";
   document.F1.hora_hor.value = "";
   document.F1.hora_min.value = "";
   document.F1.hora_seg.value = "";
   document.F1.dia_dia.value = "";
   document.F1.dia_mes.value = "";
   document.F1.dia_ano.value = "";
 }
function nm_tabula(obj, tam, cond)
{
   if (obj.value.length == tam)
   {
       for (i=0; i < document.F1.elements.length;i++)
       {
            if (document.F1.elements[i].name == obj.name)
            {
                i++;
                campo = document.F1.elements[i].name;
                campo2 = campo.lastIndexOf('_input_2');
                if (document.F1.elements[i].type == 'text' && (campo2 == -1 || cond == 'bw'))
                {
                    eval('document.F1.' + campo + '.focus()');
                }
                break;
            }
       }
   }
}
 function SC_carga_evt_jquery()
 {
    $('#SC_dia_dia').bind('change', function() {sc_grid_liberacao_valida_dia(this)});
    $('#SC_dia_mes').bind('change', function() {sc_grid_liberacao_valida_mes(this)});
    $('#SC_hora_hor').bind('change', function() {sc_grid_liberacao_valida_hora(this)});
    $('#SC_hora_min').bind('change', function() {sc_grid_liberacao_valida_min(this)});
    $('#SC_hora_seg').bind('change', function() {sc_grid_liberacao_valida_seg(this)});
 }
 function sc_grid_liberacao_valida_dia(obj)
 {
     if (obj.value < 1 || obj.value > 31)
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_iday'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_liberacao_valida_mes(obj)
 {
     if (obj.value < 1 || obj.value > 12)
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mnth'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_liberacao_valida_hora(obj)
 {
     if (obj.value < 0 || obj.value > 23)
     {
         if (confirm (Nm_erro['lang_jscr_ivtm'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_liberacao_valida_min(obj)
 {
     if (obj.value < 0 || obj.value > 59)
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mint'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_liberacao_valida_seg(obj)
 {
     if (obj.value < 0 || obj.value > 59)
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_secd'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_liberacao_valida_cic(obj)
 {
     var x        = 0;
     var y        = 0;
     var soma     = 0;
     var resto    = 0;
     var CicIn    = obj.value;
     var Cic_calc = 0;
     CicIn = CicIn.replace(/[.]/g, '');
     CicIn = CicIn.replace(/[-]/g, '');
     if (CicIn.length == 0)
     {
         return true;
     }
     Cic_calc = CicIn.substring(0, 9);
     x = CicIn.substring(0, 1);
     for (y = 1; y < 11; y++)
     {
         if (CicIn.substr(y , 1) != x)
         {
             break;
         }
         else
         {
              soma++;
         }
     }
     if (soma == 10) 
     {
         Cic_calc = "1";
     }
     soma = 0;
     y = 10;
     for (x = 0 ; x < 9 ; x++)
     {
         soma = soma + (parseInt(Cic_calc.substr(x , 1)) * y );
         y--;
     }
     soma = soma * 10;
     resto = soma % 11;
     if (resto == 10)
     {
         resto = 0;
     }
     Cic_calc = Cic_calc + resto.toString();
     x = 0;
     y = 11;
     soma = 0;
     for (x = 0 ; x < 10 ; x++)
     {
         soma = soma + (parseInt(Cic_calc.substr(x , 1)) * y );
         y--;
     }
     soma = soma * 10;
     resto = soma % 11;
     if (resto == 10)
     {
          resto = 0;
     }
     Cic_calc = Cic_calc + resto.toString();
     if (Cic_calc != CicIn)
     {
         if (confirm ("CIC " + SC_crit_inv + " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
            return false;
         }
     }
     return true;
 }
 function sc_grid_liberacao_valida_cnpj(obj)
 {
     var x         = 0;
     var y         = 5;
     var soma      = 0;
     var resto     = 0;
     var Cnpj_calc = 0;
     var CnpjIn    = obj.value;
     CnpjIn = CnpjIn.replace(/[.]/g, '');
     CnpjIn = CnpjIn.replace(/[-]/g, '');
     CnpjIn = CnpjIn.replace(/[/]/g, '');
     if (CnpjIn.length == 0)
     {
         return true;
     }
     Cnpj_calc = CnpjIn.substring(0, 12);
     for (x = 0 ; x < 12 ; x++)
     {
         soma = soma + (parseInt(Cnpj_calc.substr(x , 1)) * y );
         y--;
         if (y == 1)
         {
             y = 9;
         }
     }
     soma = soma * 10;
     resto = soma % 11;
     if (resto == 10)
     {
         resto = 0;
     }
     Cnpj_calc = Cnpj_calc + resto.toString();
     x = 0;
     y = 6;
     soma = 0;
     for (x = 0 ; x < 13 ; x++)
     {
         soma = soma + (parseInt(Cnpj_calc.substr(x , 1)) * y );
         y--;
         if (y == 1)
         {
             y = 9;
         }
     }
     soma = soma * 10;
     resto = soma % 11;
     if (resto == 10)
     {
          resto = 0;
     }
     Cnpj_calc = Cnpj_calc + resto.toString();
     if (Cnpj_calc != CnpjIn || CnpjIn == "00000000000000")
     {
         if (confirm ("CNPJ " + SC_crit_inv + " "  +  Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
            return false;
         }
     }
     return true;
 }
 function sc_grid_liberacao_valida_ciccnpj(obj)
 {
     var CnpjIn = obj.value;
     CnpjIn = CnpjIn.replace(/[.]/g, '');
     CnpjIn = CnpjIn.replace(/[-]/g, '');
     CnpjIn = CnpjIn.replace(/[/]/g, '');
     if (CnpjIn.length <= 11)
     {
         return sc_grid_liberacao_valida_cic(obj);
     }
     else
     {
         return sc_grid_liberacao_valida_cnpj(obj);
     }
 }
 function sc_grid_liberacao_valida_cep(obj)
 {
     var CepIn = obj.value;
     CepIn = CepIn.replace(/[-]/g, '');
     if (CepIn.length != 0 && (CepIn.length < 8 || CepIn == '00000000'))
     {
         if (confirm ("CEP " + SC_crit_inv + " "  +  Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
            return false;
         }
     }
     return true;
 }
</SCRIPT>
</BODY>
</HTML>
<?php
   }

   function gera_array_filtros()
   {
       $this->NM_fil_ant = array();
       $NM_patch   = "Locked/grid_liberacao";
       if (is_dir($this->NM_path_filter . $NM_patch))
       {
           $NM_dir = @opendir($this->NM_path_filter . $NM_patch);
           while (FALSE !== ($NM_arq = @readdir($NM_dir)))
           {
             if (@is_file($this->NM_path_filter . $NM_patch . "/" . $NM_arq))
             {
                 $Sc_v6 = false;
                 $NMcmp_filter = file($this->NM_path_filter . $NM_patch . "/" . $NM_arq);
                 $NMcmp_filter = explode("@NMF@", $NMcmp_filter[0]);
                 if (substr($NMcmp_filter[0], 0, 6) == "SC_V6_")
                 {
                     $Name_filter = substr($NMcmp_filter[0], 6);
                     if (!empty($Name_filter))
                     {
                         $nmgp_save_name = str_replace('/', ' ', $Name_filter);
                         $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
                         $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
                         $this->NM_fil_ant[$Name_filter][0] = $NM_patch . "/" . $nmgp_save_name;
                         $this->NM_fil_ant[$Name_filter][1] = "" . $this->Ini->Nm_lang['lang_srch_public'] . "";
                         $Sc_v6 = true;
                     }
                 }
                 if (!$Sc_v6)
                 {
                     $this->NM_fil_ant[$NM_arq][0] = $NM_patch . "/" . $NM_arq;
                     $this->NM_fil_ant[$NM_arq][1] = "" . $this->Ini->Nm_lang['lang_srch_public'] . "";
                 }
             }
           }
       }
       return $this->NM_fil_ant;
   }
   /**
    * @access  public
    * @param  string  $NM_operador  $this->Ini->Nm_lang['pesq_global_NM_operador']
    * @param  array  $nmgp_tab_label  
    */
   function inicializa_vars()
   {
      global $NM_operador, $nmgp_tab_label;

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/");  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1);  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "grid_liberacao.php";
      $this->Campos_Mens_erro = ""; 
      $this->nm_data = new nm_data("pt_br");
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] = "";
      if (!empty($nmgp_tab_label))
      {
         $nm_tab_campos = explode("?@?", $nmgp_tab_label);
         $nmgp_tab_label = array();
         foreach ($nm_tab_campos as $cada_campo)
         {
             $parte_campo = explode("?#?", $cada_campo);
             $nmgp_tab_label[$parte_campo[0]] = $parte_campo[1];
         }
      }
      $this->comando        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['where_orig'];
      $this->comando_sum    = "";
      $this->comando_filtro = "";
      $this->comando_ini    = "ini";
      $this->comando_fim    = "";
      $this->NM_operador    = (isset($NM_operador) && ("and" == strtolower($NM_operador) || "or" == strtolower($NM_operador))) ? $NM_operador : "and";
   }

   function salva_filtro()
   {
      global 
             $motivo_cond, $motivo,
             $idliberacao_cond, $idliberacao,
             $hora_cond, $hora, $hora_hor, $hora_min, $hora_seg,
             $dia_cond, $dia, $dia_dia, $dia_mes, $dia_ano,
             $nmgp_save_name, $NM_operador, $nmgp_save_option, $script_case_init;
      if (!function_exists("nm_limpa_valor"))
      {
          include_once($_SESSION['sc_session'][$script_case_init]['grid_liberacao']['path_libs_php'] . "/nm_gp_limpa.php");
      }
      if (isset($nmgp_save_name) && !empty($nmgp_save_name))
      { 
          if ($idliberacao_cond != "in")
          {
              nm_limpa_numero($idliberacao, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
          }
          else
          {
              $Nm_sc_valores = explode(",", $idliberacao);
              foreach ($Nm_sc_valores as $II => $Nm_sc_valor)
              {
                  $Nm_sc_valor = trim($Nm_sc_valor);
                  nm_limpa_numero($Nm_sc_valor, $_SESSION['scriptcase']['reg_conf']['grup_num']); 
                  $Nm_sc_valores[$II] = $Nm_sc_valor;
              }
              $idliberacao = implode(",", $Nm_sc_valores);
          }
          $NM_str_filter  = "SC_V6_" . $nmgp_save_name . "@NMF@";
          $nmgp_save_name = str_replace('/', ' ', $nmgp_save_name);
          $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
          $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
          if (!NM_is_utf8($nmgp_save_name))
          {
              $nmgp_save_name = mb_convert_encoding($nmgp_save_name, "UTF-8");
          }
          $NM_temp  = (isset($motivo_cond)) ? $motivo_cond : ""; 
          $NM_str_filter .= "motivo_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($motivo)) ? $motivo : ""; 
          $NM_str_filter .= "motivo#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($idliberacao_cond)) ? $idliberacao_cond : ""; 
          $NM_str_filter .= "idliberacao_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($idliberacao)) ? $idliberacao : ""; 
          $NM_str_filter .= "idliberacao#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($hora_cond)) ? $hora_cond : ""; 
          $NM_str_filter .= "hora_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($hora_hor)) ? $hora_hor : ""; 
          $NM_str_filter .= "hora_hor#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($hora_min)) ? $hora_min : ""; 
          $NM_str_filter .= "hora_min#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($hora_seg)) ? $hora_seg : ""; 
          $NM_str_filter .= "hora_seg#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($dia_cond)) ? $dia_cond : ""; 
          $NM_str_filter .= "dia_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($dia_dia)) ? $dia_dia : ""; 
          $NM_str_filter .= "dia_dia#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($dia_mes)) ? $dia_mes : ""; 
          $NM_str_filter .= "dia_mes#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($dia_ano)) ? $dia_ano : ""; 
          $NM_str_filter .= "dia_ano#NMF#" . $NM_temp . "@NMF@"; 
          $NM_str_filter .= "NM_operador#NMF#" . $NM_operador; 
          $NM_patch = $this->NM_path_filter;
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $NM_patch .= "Locked/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $NM_patch .= "grid_liberacao/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $Parms_usr  = "";
          $NM_filter = fopen ($NM_patch . $nmgp_save_name, 'w');
          if (!NM_is_utf8($NM_str_filter))
          {
              $NM_str_filter = mb_convert_encoding($NM_str_filter, "UTF-8");
          }
          fwrite($NM_filter, $NM_str_filter);
          fclose($NM_filter);
      } 
   }
   function recupera_filtro()
   {
      global 
      $motivo_cond, $motivo,
             $idliberacao_cond, $idliberacao,
             $hora_cond, $hora, $hora_hor, $hora_min, $hora_seg,
             $dia_cond, $dia, $dia_dia, $dia_mes, $dia_ano,
      $NM_filters, $NM_operador, $script_case_init;
      if (!function_exists("nmgp_Form_Num_Val"))
      {
          include_once($_SESSION['sc_session'][$script_case_init]['grid_liberacao']['path_libs_php'] . "/nm_edit.php");
      }
      $Look_man = array();
      $tp_html['motivo_cond'] = 'select';
      $tp_html['idliberacao_cond'] = 'select';
      $tp_html['hora_cond'] = 'select';
      $tp_html['dia_cond'] = 'select';
      $tp_html['motivo'] = 'text';
      $tp_html['idliberacao'] = 'text';
      $tp_html['hora_hor'] = 'text';
      $tp_html['hora_min'] = 'text';
      $tp_html['hora_seg'] = 'text';
      $tp_html['dia_dia'] = 'text';
      $tp_html['dia_mes'] = 'text';
      $tp_html['dia_ano'] = 'text';
      $tp_html['NM_operador'] = 'text';
      $NM_patch = $this->NM_path_filter . "/" . $NM_filters;
      if (!is_file($NM_patch))
      {
          $NM_filters = mb_convert_encoding($NM_filters, "UTF-8");
          $NM_patch = $this->NM_path_filter . "/" . $NM_filters;
      }
      if (is_file($NM_patch))
      {
          $this->ajax_return_fields = array();
          $SC_V6    = false;
          $NMfilter = file($NM_patch);
          $NMcmp_filter = explode("@NMF@", $NMfilter[0]);
          if (substr($NMcmp_filter[0], 0, 5) == "SC_V6")
          {
              $SC_V6 = true;
              unset($NMcmp_filter[0]);
          }
          foreach ($NMcmp_filter as $Cada_cmp)
          {
              $Cada_cmp = explode("#NMF#", $Cada_cmp);
              if (isset($tp_html[$Cada_cmp[0]]))
              {
                  if ($SC_V6 && ($Cada_cmp[0] == "idliberacao_cond"))
                  {
                      $$Cada_cmp[0] = trim($Cada_cmp[1]);
                  }
                  if ($SC_V6 && $Cada_cmp[0] == "idliberacao")
                  {
                      if (strtoupper($idliberacao_cond) != "II" && strtoupper($idliberacao_cond) != "QP" && strtoupper($idliberacao_cond) != "NP" && strtoupper($idliberacao_cond) != "IN") 
                      { 
                          nmgp_Form_Num_Val($Cada_cmp[1], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
                      } 
                  }
                  $this->ajax_return_fields[$Cada_cmp[0]]['obj'] = $tp_html[$Cada_cmp[0]];
                  if (substr($Cada_cmp[1], 0, 17) == "_NM_array_#NMARR#")
                  {
                      $Cada_val_sv  = array();
                      $Cada_val_sv1 = array();
                      $Sc_temp = explode("#NMARR#", substr($Cada_cmp[1], 17));
                      foreach ($Sc_temp as $Cada_val)
                      {
                         $v_fim = explode("##@@", $Cada_val);
                         $Cada_val_sv[] = trim($v_fim[0]);
                         if (isset($Look_man[$Cada_cmp[0]][$v_fim[0]]))
                         {
                             $v_fim[0] = $v_fim[0] . "##@@" . $Look_man[$Cada_cmp[0]][$v_fim[0]];
                         }
                         $Cada_val_sv1[] = grid_liberacao_pack_protect_string(trim($v_fim[0]));
                      }
                      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
                      {
                          $Cada_val_sv = NM_conv_charset($Cada_val_sv, $_SESSION['scriptcase']['charset'], "UTF-8");
                      }
                      $$Cada_cmp[0] = $Cada_val_sv;
                      $this->ajax_return_fields[$Cada_cmp[0]]['vallist'] = $Cada_val_sv1;
                  }
                  else
                  {
                      $Cada_val_sv = trim($Cada_cmp[1]);
                      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
                      {
                          $Cada_val_sv = NM_conv_charset($Cada_val_sv, $_SESSION['scriptcase']['charset'], "UTF-8");
                      }
                      $$Cada_cmp[0] = $Cada_val_sv;
                      $this->ajax_return_fields[$Cada_cmp[0]]['vallist'] = array(grid_liberacao_pack_protect_string(trim($Cada_cmp[1])));
                  }
              }
          }
          $this->NM_curr_fil = $NM_filters;
          $this->NM_operador = $NM_operador;
          unset($this->ajax_return_fields['NM_operador']);
      }
   }
   function apaga_filtro()
   {
      global $NM_filters_del;
      if (isset($NM_filters_del) && !empty($NM_filters_del))
      { 
          $NM_patch = $this->NM_path_filter . "/" . $NM_filters_del;
          if (!is_file($NM_patch))
          {
              $NM_filters_del = mb_convert_encoding($NM_filters_del, "UTF-8");
              $NM_patch = $this->NM_path_filter . "/" . $NM_filters_del;
          }
          if (is_file($NM_patch))
          {
              @unlink($NM_patch);
          }
          if ($NM_filters_del == $this->NM_curr_fil)
          {
              $this->NM_curr_fil = "";
          }
      }
   }
   /**
    * @access  public
    */
   function trata_campos()
   {
      global $motivo_cond, $motivo,
             $idliberacao_cond, $idliberacao,
             $hora_cond, $hora, $hora_hor, $hora_min, $hora_seg,
             $dia_cond, $dia, $dia_dia, $dia_mes, $dia_ano, $nmgp_tab_label;

      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $motivo_cond_salva = $motivo_cond; 
      if (!isset($motivo_input_2) || $motivo_input_2 == "")
      {
          $motivo_input_2 = $motivo;
      }
      $idliberacao_cond_salva = $idliberacao_cond; 
      if (!isset($idliberacao_input_2) || $idliberacao_input_2 == "")
      {
          $idliberacao_input_2 = $idliberacao;
      }
      $hora_cond_salva = $hora_cond; 
      $dia_cond_salva = $dia_cond; 
      if (!isset($dia_input_2) || $dia_input_2 == "")
      {
          $dia_input_2 = $dia;
      }
      if ($idliberacao_cond != "in")
      {
          nm_limpa_numero($idliberacao, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      else
      {
          $Nm_sc_valores = explode(",", $idliberacao);
          foreach ($Nm_sc_valores as $II => $Nm_sc_valor)
          {
              $Nm_sc_valor = trim($Nm_sc_valor);
              nm_limpa_numero($Nm_sc_valor, $_SESSION['scriptcase']['reg_conf']['grup_num']); 
              $Nm_sc_valores[$II] = $Nm_sc_valor;
          }
          $idliberacao = implode(",", $Nm_sc_valores);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['motivo'] = $motivo; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['motivo_cond'] = $motivo_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['idliberacao'] = $idliberacao; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['idliberacao_cond'] = $idliberacao_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['hora_hor'] = $hora_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['hora_min'] = $hora_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['hora_seg'] = $hora_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['hora_cond'] = $hora_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['dia_dia'] = $dia_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['dia_mes'] = $dia_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['dia_ano'] = $dia_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['dia_cond'] = $dia_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['NM_operador'] = $this->NM_operador; 
      $Conteudo = $motivo;
      $this->cmp_formatado['motivo'] = $Conteudo;
      $Conteudo = $idliberacao;
      if (strtoupper($idliberacao_cond) != "II" && strtoupper($idliberacao_cond) != "QP" && strtoupper($idliberacao_cond) != "NP" && strtoupper($idliberacao_cond) != "IN") 
      { 
          nmgp_Form_Num_Val($Conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      } 
      $this->cmp_formatado['idliberacao'] = $Conteudo;
      $Conteudo  = "";
      $Formato   = "";
      if (!empty($hora_hor))
      {
          $Conteudo .= (strlen($hora_hor) == 2) ? $hora_hor : "0" . $hora_hor;
          $Formato  .= "HH";
      }
      if (!empty($hora_min))
      {
          $Conteudo .= (strlen($hora_min) == 2) ? $hora_min : "0" . $hora_min;
          $Formato  .= "II";
      }
      if (!empty($hora_seg))
      {
          $Conteudo .= (strlen($hora_seg) == 2) ? $hora_seg : "0" . $hora_seg;
          $Formato  .= "SS";
      }
      if (!empty($Conteudo))
      {
          if (is_numeric($Conteudo) && $Conteudo > 0) 
          { 
              $this->nm_data->SetaData($Conteudo, $Formato);
              $Conteudo = $this->nm_data->FormataSaida($this->Nm_date_format("HH", "hhiiss"));
          } 
      }
      $this->cmp_formatado['hora'] = $Conteudo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['hora'] = $Conteudo; 
      $Conteudo  = "";
      $Formato   = "";
      if (!empty($hora_input_2_hor))
      {
          $Conteudo .= (strlen($hora_input_2_hor) == 2) ? $hora_input_2_hor : "0" . $hora_input_2_hor;
          $Formato  .= "HH";
      }
      if (!empty($hora_input_2_min))
      {
          $Conteudo .= (strlen($hora_input_2_min) == 2) ? $hora_input_2_min : "0" . $hora_input_2_min;
          $Formato  .= "II";
      }
      if (!empty($hora_input_2_seg))
      {
          $Conteudo .= (strlen($hora_input_2_seg) == 2) ? $hora_input_2_seg : "0" . $hora_input_2_seg;
          $Formato  .= "SS";
      }
      if (!empty($Conteudo))
      {
          if (is_numeric($Conteudo) && $Conteudo > 0) 
          { 
              $this->nm_data->SetaData($Conteudo, $Formato);
              $Conteudo = $this->nm_data->FormataSaida($this->Nm_date_format("HH", "hhiiss"));
          } 
      }
      $this->cmp_formatado['hora_Input_2'] = $Conteudo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['hora_input_2'] = $Conteudo; 
      $Conteudo  = "";
      $Formato   = "";
      if (!empty($dia_dia))
      {
          $Conteudo .= (strlen($dia_dia) == 2) ? $dia_dia : "0" . $dia_dia;
          $Formato  .= "DD";
      }
      if (!empty($dia_mes))
      {
          $Conteudo .= (strlen($dia_mes) == 2) ? $dia_mes : "0" . $dia_mes;
          $Formato  .= "MM";
      }
      $Conteudo .= $dia_ano;
      $Formato  .= "YYYY";
      if (!empty($Conteudo))
      {
          if (is_numeric($Conteudo) && $Conteudo > 0) 
          { 
              $this->nm_data->SetaData($Conteudo, $Formato);
              $Conteudo = $this->nm_data->FormataSaida($this->Nm_date_format("DT", "ddmmaaaa"));
          } 
      }
      $this->cmp_formatado['dia'] = $Conteudo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['dia'] = $Conteudo; 
      $Conteudo  = "";
      $Formato   = "";
      if (!empty($dia_input_2_dia))
      {
          $Conteudo .= (strlen($dia_input_2_dia) == 2) ? $dia_input_2_dia : "0" . $dia_input_2_dia;
          $Formato  .= "DD";
      }
      if (!empty($dia_input_2_mes))
      {
          $Conteudo .= (strlen($dia_input_2_mes) == 2) ? $dia_input_2_mes : "0" . $dia_input_2_mes;
          $Formato  .= "MM";
      }
      $Conteudo .= $dia_input_2_ano;
      $Formato  .= "YYYY";
      if (!empty($Conteudo))
      {
          if (is_numeric($Conteudo) && $Conteudo > 0) 
          { 
              $this->nm_data->SetaData($Conteudo, $Formato);
              $Conteudo = $this->nm_data->FormataSaida($this->Nm_date_format("DT", "ddmmaaaa"));
          } 
      }
      $this->cmp_formatado['dia_Input_2'] = $Conteudo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['dia_input_2'] = $Conteudo; 

      //----- $motivo
      if (isset($motivo) || $motivo_cond == "nu" || $motivo_cond == "nn")
      {
         $this->monta_condicao("motivo", $motivo_cond, $motivo, "", "motivo");
      }

      //----- $idliberacao
      if (isset($idliberacao) || $idliberacao_cond == "nu" || $idliberacao_cond == "nn")
      {
         $this->monta_condicao("idliberacao", $idliberacao_cond, $idliberacao, "", "idliberacao");
      }

      //----- $hora
      $nm_tp_dado = "DATE";
      $nm_format_db = "HH:II:SS";
      $condicao = strtoupper($hora_cond);
      $array_hora = array();
      $array_hora2 = array();
      $nm_psq_dt1 = $hora_dia . $hora_mes . $hora_ano . $hora_hor . $hora_min . $hora_seg;
      $nm_psq_dt_inf  = ("" == $hora_ano) ? "YYYY" : "$hora_ano";
      $nm_psq_dt_inf .= "-";
      $nm_psq_dt_inf .= ("" == $hora_mes) ? "MM" : "$hora_mes";
      $nm_psq_dt_inf .= "-";
      $nm_psq_dt_inf .= ("" == $hora_dia) ? "DD"   : "$hora_dia";
      $nm_psq_dt_inf .= " ";
      $nm_psq_dt_inf .= ("" == $hora_hor) ? "HH" : "$hora_hor";
      $nm_psq_dt_inf .= ":";
      $nm_psq_dt_inf .= ("" == $hora_min) ? "II" : "$hora_min";
      $nm_psq_dt_inf .= ":";
      $nm_psq_dt_inf .= ("" == $hora_seg) ? "SS" : "$hora_seg";
      nm_conv_form_data_hora($nm_psq_dt_inf, "AAAA-MM-DD HH:II:SS", $nm_format_db);
      $array_hora["dia"] = ("" == $hora_dia) ? "__"   : "$hora_dia";
      $array_hora["mes"] = ("" == $hora_mes) ? "__"   : "$hora_mes";
      $array_hora["ano"] = ("" == $hora_ano) ? "____" : "$hora_ano";
      $array_hora["hor"] = ("" == $hora_hor) ? "__" : "$hora_hor";
      $array_hora["min"] = ("" == $hora_min) ? "__" : "$hora_min";
      $array_hora["seg"] = ("" == $hora_seg) ? "__" : "$hora_seg";
      $this->NM_data_qp = $array_hora;
      $nm_dt_compl = $array_hora["ano"] . "-" . $array_hora["mes"] . "-" . $array_hora["dia"] . " " . $array_hora["hor"] . ":" . $array_hora["min"] . ":" . $array_hora["seg"];
      nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
//
      if ($condicao == "BW")
      {
          $array_hora2["dia"] = ("" == $hora_input_2_dia) ? "__"   : "$hora_input_2_dia";
          $array_hora2["mes"] = ("" == $hora_input_2_mes) ? "__"   : "$hora_input_2_mes";
          $array_hora2["ano"] = ("" == $hora_input_2_ano) ? "____" : "$hora_input_2_ano";
          $array_hora2["hor"] = ("" == $hora_input_2_hor) ? "__" : "$hora_input_2_hor";
          $array_hora2["min"] = ("" == $hora_input_2_min) ? "__" : "$hora_input_2_min";
          $array_hora2["seg"] = ("" == $hora_input_2_seg) ? "__" : "$hora_input_2_seg";
          $this->data_menor($array_hora);
          $nm_dt_compl = $array_hora["ano"] . "-" . $array_hora["mes"] . "-" . $array_hora["dia"] . " " . $array_hora["hor"] . ":" . $array_hora["min"] . ":" . $array_hora["seg"];
          nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
          $this->data_maior($array_hora2);
          $nm_dt_compl_2 = $array_hora2["ano"] . "-" . $array_hora2["mes"] . "-" . $array_hora2["dia"] . " " . $array_hora2["hor"] . ":" . $array_hora2["min"] . ":" . $array_hora2["seg"];
          nm_conv_form_data_hora($nm_dt_compl_2, "AAAA-MM-DD HH:II:SS", $nm_format_db);
      }
      else
      {
          $array_hora2 = $array_hora;
      }
      if (FALSE !== strpos($nm_dt_compl, "__"))
      {
         if ($condicao == "II")
         {
             $condicao = "QP";
         }
         elseif ($condicao == "DF")
         {
             $this->data_menor($array_hora);
             $this->data_maior($array_hora2);
             $nm_dt_compl = $array_hora["ano"] . "-" . $array_hora["mes"] . "-" . $array_hora["dia"] . " " . $array_hora["hor"] . ":" . $array_hora["min"] . ":" . $array_hora["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $nm_dt_compl_2 = $array_hora2["ano"] . "-" . $array_hora2["mes"] . "-" . $array_hora2["dia"] . " " . $array_hora2["hor"] . ":" . $array_hora2["min"] . ":" . $array_hora2["seg"];
             nm_conv_form_data_hora($nm_dt_compl_2, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $condicao = "BW";
             $nm_tp_dado .= "DF";
         }
         elseif ($condicao == "EQ")
         {
             $this->data_menor($array_hora);
             $this->data_maior($array_hora2);
             $nm_dt_compl = $array_hora["ano"] . "-" . $array_hora["mes"] . "-" . $array_hora["dia"] . " " . $array_hora["hor"] . ":" . $array_hora["min"] . ":" . $array_hora["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $nm_dt_compl_2 = $array_hora2["ano"] . "-" . $array_hora2["mes"] . "-" . $array_hora2["dia"] . " " . $array_hora2["hor"] . ":" . $array_hora2["min"] . ":" . $array_hora2["seg"];
             nm_conv_form_data_hora($nm_dt_compl_2, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $condicao = "BW";
             $nm_tp_dado .= "EQ";
         }
         elseif ($condicao == "GT")
         {
             $this->data_maior($array_hora);
             $nm_dt_compl = $array_hora["ano"] . "-" . $array_hora["mes"] . "-" . $array_hora["dia"] . " " . $array_hora["hor"] . ":" . $array_hora["min"] . ":" . $array_hora["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
         elseif ($condicao == "GE")
         {
             $this->data_menor($array_hora);
             $nm_dt_compl = $array_hora["ano"] . "-" . $array_hora["mes"] . "-" . $array_hora["dia"] . " " . $array_hora["hor"] . ":" . $array_hora["min"] . ":" . $array_hora["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
         elseif ($condicao == "LT")
         {
             $this->data_menor($array_hora);
             $nm_dt_compl = $array_hora["ano"] . "-" . $array_hora["mes"] . "-" . $array_hora["dia"] . " " . $array_hora["hor"] . ":" . $array_hora["min"] . ":" . $array_hora["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
         elseif ($condicao == "LE")
         {
             $this->data_maior($array_hora);
             $nm_dt_compl = $array_hora["ano"] . "-" . $array_hora["mes"] . "-" . $array_hora["dia"] . " " . $array_hora["hor"] . ":" . $array_hora["min"] . ":" . $array_hora["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
      }
      if ($condicao == "QP")
      {
          $nm_dt_compl = $nm_psq_dt_inf;
          $nm_dt_compl_2 = "";
      }
      if (!empty($nm_dt_compl))
      {
          $this->limpa_dt_hor_pesq($nm_dt_compl);
      }
      if (!empty($nm_dt_compl_2))
      {
          $this->limpa_dt_hor_pesq($nm_dt_compl_2);
      }
      if (!empty($nm_psq_dt1) || $condicao == "NU" || $condicao == "NN")
      {
          $this->monta_condicao("hora", $condicao, trim($nm_dt_compl), trim($nm_dt_compl_2), "hora", $nm_tp_dado);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['hora']   = trim($nm_dt_compl); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['hora_input_2'] = trim($nm_dt_compl_2); 
      }
      $nm_tp_dado = "";

      //----- $dia
      $nm_tp_dado = "DATE";
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $nm_format_db = "YYYY-MM-DD HH:II:SS";
      }
      else
      {
          $nm_format_db = "YYYY-MM-DD";
      }
      $condicao = strtoupper($dia_cond);
      $array_dia = array();
      $array_dia2 = array();
      $nm_psq_dt1 = $dia_dia . $dia_mes . $dia_ano . $dia_hor . $dia_min . $dia_seg;
      $nm_psq_dt_inf  = ("" == $dia_ano) ? "YYYY" : "$dia_ano";
      $nm_psq_dt_inf .= "-";
      $nm_psq_dt_inf .= ("" == $dia_mes) ? "MM" : "$dia_mes";
      $nm_psq_dt_inf .= "-";
      $nm_psq_dt_inf .= ("" == $dia_dia) ? "DD"   : "$dia_dia";
      $nm_psq_dt_inf .= " ";
      $nm_psq_dt_inf .= ("" == $dia_hor) ? "HH" : "$dia_hor";
      $nm_psq_dt_inf .= ":";
      $nm_psq_dt_inf .= ("" == $dia_min) ? "II" : "$dia_min";
      $nm_psq_dt_inf .= ":";
      $nm_psq_dt_inf .= ("" == $dia_seg) ? "SS" : "$dia_seg";
      nm_conv_form_data_hora($nm_psq_dt_inf, "AAAA-MM-DD HH:II:SS", $nm_format_db);
      $array_dia["dia"] = ("" == $dia_dia) ? "__"   : "$dia_dia";
      $array_dia["mes"] = ("" == $dia_mes) ? "__"   : "$dia_mes";
      $array_dia["ano"] = ("" == $dia_ano) ? "____" : "$dia_ano";
      $array_dia["hor"] = ("" == $dia_hor) ? "__" : "$dia_hor";
      $array_dia["min"] = ("" == $dia_min) ? "__" : "$dia_min";
      $array_dia["seg"] = ("" == $dia_seg) ? "__" : "$dia_seg";
      $this->NM_data_qp = $array_dia;
      $nm_dt_compl = $array_dia["ano"] . "-" . $array_dia["mes"] . "-" . $array_dia["dia"] . " " . $array_dia["hor"] . ":" . $array_dia["min"] . ":" . $array_dia["seg"];
      nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
//
      if ($condicao == "BW")
      {
          $array_dia2["dia"] = ("" == $dia_input_2_dia) ? "__"   : "$dia_input_2_dia";
          $array_dia2["mes"] = ("" == $dia_input_2_mes) ? "__"   : "$dia_input_2_mes";
          $array_dia2["ano"] = ("" == $dia_input_2_ano) ? "____" : "$dia_input_2_ano";
          $array_dia2["hor"] = ("" == $dia_input_2_hor) ? "__" : "$dia_input_2_hor";
          $array_dia2["min"] = ("" == $dia_input_2_min) ? "__" : "$dia_input_2_min";
          $array_dia2["seg"] = ("" == $dia_input_2_seg) ? "__" : "$dia_input_2_seg";
          $this->data_menor($array_dia);
          $nm_dt_compl = $array_dia["ano"] . "-" . $array_dia["mes"] . "-" . $array_dia["dia"] . " " . $array_dia["hor"] . ":" . $array_dia["min"] . ":" . $array_dia["seg"];
          nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
          $this->data_maior($array_dia2);
          $nm_dt_compl_2 = $array_dia2["ano"] . "-" . $array_dia2["mes"] . "-" . $array_dia2["dia"] . " " . $array_dia2["hor"] . ":" . $array_dia2["min"] . ":" . $array_dia2["seg"];
          nm_conv_form_data_hora($nm_dt_compl_2, "AAAA-MM-DD HH:II:SS", $nm_format_db);
      }
      else
      {
          $array_dia2 = $array_dia;
      }
      if (FALSE !== strpos($nm_dt_compl, "__"))
      {
         if ($condicao == "II")
         {
             $condicao = "QP";
         }
         elseif ($condicao == "DF")
         {
             $this->data_menor($array_dia);
             $this->data_maior($array_dia2);
             $nm_dt_compl = $array_dia["ano"] . "-" . $array_dia["mes"] . "-" . $array_dia["dia"] . " " . $array_dia["hor"] . ":" . $array_dia["min"] . ":" . $array_dia["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $nm_dt_compl_2 = $array_dia2["ano"] . "-" . $array_dia2["mes"] . "-" . $array_dia2["dia"] . " " . $array_dia2["hor"] . ":" . $array_dia2["min"] . ":" . $array_dia2["seg"];
             nm_conv_form_data_hora($nm_dt_compl_2, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $condicao = "BW";
             $nm_tp_dado .= "DF";
         }
         elseif ($condicao == "EQ")
         {
             $this->data_menor($array_dia);
             $this->data_maior($array_dia2);
             $nm_dt_compl = $array_dia["ano"] . "-" . $array_dia["mes"] . "-" . $array_dia["dia"] . " " . $array_dia["hor"] . ":" . $array_dia["min"] . ":" . $array_dia["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $nm_dt_compl_2 = $array_dia2["ano"] . "-" . $array_dia2["mes"] . "-" . $array_dia2["dia"] . " " . $array_dia2["hor"] . ":" . $array_dia2["min"] . ":" . $array_dia2["seg"];
             nm_conv_form_data_hora($nm_dt_compl_2, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $condicao = "BW";
             $nm_tp_dado .= "EQ";
         }
         elseif ($condicao == "GT")
         {
             $this->data_maior($array_dia);
             $nm_dt_compl = $array_dia["ano"] . "-" . $array_dia["mes"] . "-" . $array_dia["dia"] . " " . $array_dia["hor"] . ":" . $array_dia["min"] . ":" . $array_dia["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
         elseif ($condicao == "GE")
         {
             $this->data_menor($array_dia);
             $nm_dt_compl = $array_dia["ano"] . "-" . $array_dia["mes"] . "-" . $array_dia["dia"] . " " . $array_dia["hor"] . ":" . $array_dia["min"] . ":" . $array_dia["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
         elseif ($condicao == "LT")
         {
             $this->data_menor($array_dia);
             $nm_dt_compl = $array_dia["ano"] . "-" . $array_dia["mes"] . "-" . $array_dia["dia"] . " " . $array_dia["hor"] . ":" . $array_dia["min"] . ":" . $array_dia["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
         elseif ($condicao == "LE")
         {
             $this->data_maior($array_dia);
             $nm_dt_compl = $array_dia["ano"] . "-" . $array_dia["mes"] . "-" . $array_dia["dia"] . " " . $array_dia["hor"] . ":" . $array_dia["min"] . ":" . $array_dia["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
      }
      if ($condicao == "QP")
      {
          $nm_dt_compl = $nm_psq_dt_inf;
          $nm_dt_compl_2 = "";
      }
      if (!empty($nm_dt_compl))
      {
          $this->limpa_dt_hor_pesq($nm_dt_compl);
      }
      if (!empty($nm_dt_compl_2))
      {
          $this->limpa_dt_hor_pesq($nm_dt_compl_2);
      }
      if (!empty($nm_psq_dt1) || $condicao == "NU" || $condicao == "NN")
      {
          $this->monta_condicao("dia", $condicao, trim($nm_dt_compl), trim($nm_dt_compl_2), "dia", $nm_tp_dado);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['dia']   = trim($nm_dt_compl); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']['dia_input_2'] = trim($nm_dt_compl_2); 
      }
      $nm_tp_dado = "";
   }

   /**
    * @access  public
    */
   function finaliza_resultado()
   {
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca']) && $_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['campos_busca'], "UTF-8", $_SESSION['scriptcase']['charset']);
      }

      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['where_pesq_lookup']  = $this->comando_sum . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['where_pesq']         = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['opcao']              = "pesq";
      if ("" == $this->comando_filtro)
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['where_pesq_filtro'] = "";
      }
      else
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['where_pesq_filtro'] = " (" . $this->comando_filtro . ")";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['where_pesq_ant'])
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['cond_pesq'] .= $this->NM_operador;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['contr_array_resumo'] = "NAO";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['contr_total_geral']  = "NAO";
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['tot_geral']);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['where_pesq_ant'] = $this->comando . $this->comando_fim;
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_liberacao']['fast_search']);

      $this->retorna_pesq();
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
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
              if ($cont2 >= $tam_campo)
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

 function Nm_date_format($Type, $Format)
 {
     $Form_base = str_replace("/", "", $Format);
     $Form_base = str_replace("-", "", $Form_base);
     $Form_base = str_replace(":", "", $Form_base);
     $Form_base = str_replace(";", "", $Form_base);
     $Form_base = str_replace(" ", "", $Form_base);
     $Form_base = str_replace("a", "Y", $Form_base);
     $Form_base = str_replace("y", "Y", $Form_base);
     $Form_base = str_replace("h", "H", $Form_base);
     $date_format_show = "";
     if ($Type == "DT" || $Type == "DH")
     {
         $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
         $Str_date = str_replace("y", "Y", $Str_date);
         $Str_date = str_replace("h", "H", $Str_date);
         $Lim   = strlen($Str_date);
         $Ult   = "";
         $Arr_D = array();
         for ($I = 0; $I < $Lim; $I++)
         {
              $Char = substr($Str_date, $I, 1);
              if ($Char != $Ult)
              {
                  $Arr_D[] = $Char;
              }
              $Ult = $Char;
         }
         $Prim = true;
         foreach ($Arr_D as $Cada_d)
         {
             if (strpos($Form_base, $Cada_d) !== false)
             {
                 $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
                 $date_format_show .= $Cada_d;
                 $Prim = false;
             }
         }
     }
     if ($Type == "DH" || $Type == "HH")
     {
         if ($Type == "DH")
         {
             $date_format_show .= " ";
         }
         $Str_time = strtolower($_SESSION['scriptcase']['reg_conf']['time_format']);
         $Str_time = str_replace("h", "H", $Str_time);
         $Lim   = strlen($Str_time);
         $Ult   = "";
         $Arr_T = array();
         for ($I = 0; $I < $Lim; $I++)
         {
              $Char = substr($Str_time, $I, 1);
              if ($Char != $Ult)
              {
                  $Arr_T[] = $Char;
              }
              $Ult = $Char;
         }
         $Prim = true;
         foreach ($Arr_T as $Cada_t)
         {
             if (strpos($Form_base, $Cada_t) !== false)
             {
                 $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['time_sep'] : "";
                 $date_format_show .= $Cada_t;
                 $Prim = false;
             }
         }
     }
     return $date_format_show;
 }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
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
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
}

?>