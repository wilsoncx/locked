<?php
   include_once('grid_responsavel_session.php');
   @session_start() ;
   $_SESSION['scriptcase']['grid_responsavel']['glo_nm_perfil']          = "conn_mysql_1";
   $_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_doc']        = "";
//
class grid_responsavel_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $nm_app_version;
   var $cor_link_dados;
   var $root;
   var $server;
   var $java_protocol;
   var $server_pdf;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_conf_reg;
   var $str_schema_all;
   var $Str_btn_grid;
   var $str_schema_filter;
   var $Str_btn_filter;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_help;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $link_form_responsavel;
   var $nm_cont_lin;
   var $nm_limite_lin;
   var $nm_limite_lin_prt;
   var $nm_limite_lin_res;
   var $nm_limite_lin_res_prt;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_col_dinamica   = array();
   var $nm_order_dinamico = array();
   var $nm_hidden_blocos  = array();
   var $sc_tem_trans_banco;
   var $nm_bases_all;
   var $nm_bases_mysql;
   var $nm_bases_sqlite;
   var $sc_page;
//
   function init($Tp_init = "")
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init, $nmgp_opcao;

      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_cnt_sql']  = 0;
      $this->sc_charset['UTF-8'] = 'utf-8';
      $this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
      $this->sc_charset['SJIS'] = 'shift-jis';
      $this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
      $this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
      $this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
      $this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
      $this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
      $this->sc_charset['WINDOWS-1252'] = 'windows-1252';
      $this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
      $this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
      $this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
      $this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
      $this->sc_charset['KOI8-R'] = 'koi8-r';
      $this->sc_charset['WINDOWS-1251'] = 'windows-1251';
      $this->sc_charset['BIG-5'] = 'big5';
      $this->sc_charset['EUC-CN'] = 'EUC-CN';
      $this->sc_charset['EUC-JP'] = 'euc-jp';
      $this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
      $this->sc_charset['EUC-KR'] = 'euc-kr';
      $this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
      $this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
      $this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
      $this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
      $this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['grid_responsavel']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "grid_responsavel"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "Locked"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_versao_sc    = "v7"; 
      $this->nm_tp_lic_sc    = "pe_mysql_bronze"; 
      $this->nm_dt_criacao   = "20150315"; 
      $this->nm_hr_criacao   = "114618"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20150315"; 
      $this->nm_hr_ult_alt   = "114636"; 
      $temp_bug_list         = explode(" ", microtime()); 
      list($NM_usec, $NM_sec) = $temp_bug_list; 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0";
// 
// 
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
          $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys          = str_replace("\\", '/', $str_path_sys);
          $str_path_sys          = str_replace('//', '/', $str_path_sys);
      }
      else
      {
          $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
          $str_path_sys          = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = str_replace('//', '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      if(empty($_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      //check img
      if(empty($_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_imagens']))
      {
              /*check img*/$_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
      }
      //check tmp
      if(empty($_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_imag_temp']))
      {
              /*check tmp*/$_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
      }
      //check doc
      if(empty($_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_doc']))
      {
              /*check doc*/$_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
      }
      //end check publication with the prod
      $this->sc_site_ssl     = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['grid_responsavel']['glo_nm_path_doc'];
      if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
      {
          $_SESSION['scriptcase']['str_lang'] = "pt_br";
      }
      if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
      {
          $_SESSION['scriptcase']['str_conf_reg'] = "pt_br";
      }
      $this->str_lang        = $_SESSION['scriptcase']['str_lang'];
      $this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "tema_dbv/tema_dbv";
      $this->str_schema_filter = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "tema_dbv/tema_dbv";
      $_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
      $_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
      $this->server          = (!isset($_SERVER['HTTP_HOST'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (!isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->java_protocol   = "http://";
      $this->server_pdf      = $this->server;
      $this->server          = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/grid_responsavel';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_font       = $this->root . $this->path_link . "_lib/font/";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php";
      $this->path_lib_js     = $this->root . $this->path_link . "_lib/lib/js";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      if (!class_exists('Services_JSON'))
      {
          include_once("grid_responsavel_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['grid_responsavel']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['grid_responsavel']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['grid_responsavel']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['grid_responsavel']['SC_Link_View'] = true;
          }
      }
      if (isset($_SESSION['scriptcase']['user_logout']))
      {
          foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
          {
              if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
              {
                  unset($_SESSION['scriptcase']['user_logout'][$ind]);
                  $nm_apl_dest = $parms['R'];
                  $dir = explode("/", $nm_apl_dest);
                  if (count($dir) == 1)
                  {
                      $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
                  }
?>
                  <html>
                  <body>
                  <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
                  </form>
                  <script>
                   document.FRedirect.submit();
                  </script>
                  </body>
                  </html>
<?php
                  exit;
              }
          }
      }
      $this->link_form_responsavel =  $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_responsavel') . "/form_responsavel.php" ; 
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['grid_responsavel']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset']  = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "ISO-8859-1";
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_conf_reg[$this->str_conf_reg][$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_lang as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
         {
             $ind = mb_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
             $this->Nm_lang[$ind] = $dados;
         }
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang[$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      $PHP_ver = str_replace(".", "", phpversion()); 
      if (substr($PHP_ver, 0, 3) < 434)
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
      } 
      if (file_exists($this->path_libs . "/ver.dat"))
      {
          $SC_ver = file($this->path_libs . "/ver.dat"); 
          $SC_ver = str_replace(".", "", $SC_ver[0]); 
          if (substr($SC_ver, 0, 5) < 40015)
          {
              echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
          } 
      } 
      $_SESSION['sc_session'][$this->sc_page]['grid_responsavel']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Verdana, Arial, sans-serif; font-size: 13px; color: #fcfcfc; font-weight: normal; background-color: #4D7AFF; border-style: solid; border-width: 1px; padding: 6px 10px;  }";
          echo ".scButton_onmouseover { font-family: Verdana, Arial, sans-serif; font-size: 13px; color: #fcfcfc; font-weight: normal; background-color: #7396FF; border-style: solid; border-width: 1px; padding: 6px 10px;  }";
          echo ".scButton_onmousedown { font-family: Verdana, Arial, sans-serif; font-size: 13px; color: #fcfcfc; font-weight: normal; background-color: #4D7AFF; border-style: solid; border-width: 1px; padding: 6px 10px;  }";
          echo ".scButton_disabled { font-family: Verdana, Arial, sans-serif; font-size: 13px; color: #6b6a6b; font-weight: normal; background-color: #4D7AFF; border-style: solid; border-width: 1px; padding: 6px 10px;  }";
          echo ".scLink_default { text-decoration: underline; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:active { text-decoration: underline; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:hover { text-decoration: none; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_cmlb_nfnd'] . "</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }

      $this->path_atual  = getcwd();
      $opsys = strtolower(php_uname());

      $this->nm_cont_lin           = 0;
      $this->nm_limite_lin         = 0;
      $this->nm_limite_lin_prt     = 0;
      $this->nm_limite_lin_res     = 0;
      $this->nm_limite_lin_res_prt = 0;
// 
      include_once($this->path_aplicacao . "grid_responsavel_erro.class.php"); 
      $this->Erro = new grid_responsavel_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("pt_br");
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1;
      } 
      $this->regionalDefault();
      $this->sc_tem_trans_banco = false;
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "maxsql", "pdo_mysql");
      $this->nm_bases_sqlite     = array("sqlite", "pdosqlite");
      $this->nm_bases_all        = array_merge($this->nm_bases_mysql, $this->nm_bases_sqlite);
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['grid_responsavel']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['grid_responsavel']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1HQJKDQFUZ1rwHQF7DMvsVcB/H5FqHIFGHQBsZkBiHArYD5BiHgBeZSXeDWr/VoFaHQJKDQJsZ1vCV5FGHuNOV9FeDWB3VoF7HQBiZkBiDSNOHQNUHgNOZSJ3DWX7HIBqHQJKDuBOZ1zGVWJeHgvOV9BUDWJeVoBiHQXOZ1FUZ1rYHQJeHgBeZSJ3DuJeHIJwDcXGDQBOZ1zGVWJsDMBYV9FeHEF/HIJsHQBiZ1FUD1rwV5FGDEBeHEXeH5X/DoF7HQNmDuBqDSN7HQF7DMNOV9FeDWFYHMXGHQXGVIJwZ1rYHQFUHgvsHArCDWXCHIBiHQNmZ9JeZ1BYHQrqDMNOVIB/DWXCHMJsHQBsVIJwZ1vOZMBOHgNOHArsDuJeHIBOHQXOZ9JeD1BeD5rqHuvmVcBOH5B7VoBqHQNGVIraDSvmV5JwDMrYHErCHEFqVoBODcJUDQJsZ1BYVWJwHuNOVcrsH5XCDoFGD9XOZ1F7HIrwV5FaDMrYHErCHEFqHIBiD9NwZ9rqHAveV5FUHuzGVIBOH5XKVoFaD9XOH9B/HIveD5FaDEvsZSXeV5B3VoX7DcJUDQJwDSBYV5JwHuBYV9FiDWXCVoBqDcBqZ1B/Z1vmD5raDEvsHEJGH5FYVoB/DcJUDQJsHABYD5BqHuBYVcFKDur/DoraD9XOVIraHArKD5FaDMzGDkFeDWF/ZuFaD9JKDQJsHABYD5F7HgNKVcFKDWF/VoraD9XOVIraHArKV5FGDEBeHEXeH5FYVoB/D9XsH9FGD1BeD5BqHuNOVIBODuFGDoJsDcBwH9B/HIrwV5JeDMBYDkBsH5FYHIF7HQJeZ9XGD1BeHQF7DMBYV9FeDuFqHIraHQFYZkFGHABYHQJsHgrKDkXKHEFqHIXGHQXGDuFaDSrwV5FaDMBODkBsV5F/HMJsHQFYZ1BOHAN7HuBqHgBOVkJqDWr/HMJwDcJUZSX7HIBeD5BqHgvsZSJ3H5FqVoFGDcBqH9BOZ1BeD5BqDMBYHEJGH5F/VoJeDcXOZ9rqZ1rwHuB/HuzGVcrsDWXCDoJeD9JmZ1B/D1rwD5NUDEvsHEFiHEFqDoB/D9XsH9FGD1BOV5JwDMBYVIBODWFYVENUHQBiZ1B/HABYV5JsDMzGHAFKV5FaZuBOHQXOZ9F7HAvOV5JwHuBYDkFCDuX7VEF7D9XOZSB/Z1BeD5FaDEvsHEFKV5FaDoXGDcJeZSFGHANOD5BqHuzGVcrsH5XCVoBqDcBqZ1FaD1rwV5FaHgvCDkBsH5FYVoX7D9JKDQX7D1BOV5FGHuzGDkBOH5FqVoJwD9JmZ1F7Z1BeD5JeDEvsHENiV5FaDoJeDcBwDQX7D1veD5JwDMrwV9BUDWXKVorqHQFYVINUD1zGZMFaHgvCDkXKDWFGDoBqHQXGDQX7Z1BYV5FUHuzGVcFCDWFYDoFGD9BsZSB/HAzGV5X7HgveDkXKH5X/ZuB/HQJKDQJsZ1vCV5FGHuNOV9FeDWXCHMFaHQNmZSB/HIBeD5XGDMzGHEXeV5B7DoBqHQXGDQFUHAN7HuXGHuzGDkBsHEF/DoF7D9XOZ1X7DSrYHQJwDEBODkFeH5FYVoFGHQJKDQBOZ1rwD5XGHuzGVIBOHEFYDoNUDcNwH9FaHAN7V5FaDErKZSJGDWF/DoB/D9XsH9FGD1BeV5FUHuBYVIBODWFYDoJeHQFYZSFaHArKV5XGDErKHErCDWF/VoBiDcJUZSX7Z1BYHuFaDMvmVcFKV5BmVoBqD9BsZkFGHArKHQBiDEvsVkJ3DuFaVoJsD9NwDuBqHABYD5JsHuNODkBODWFYHIrqDcJUZSB/DSrYHQJwDEBODkFeH5FYVoFGHQJKDQJwHAveD5JwHgrYDkBOV5FYVEFGD9XOH9FaHABYV5FGDMNKZSXeDWr/DoJeD9XsZSX7Z1N7VWFaHgrKV9FeDWXCDoJsDcBwH9B/Z1rYHQJwHgveDkXKDWBmDoBqHQXODuBqHANKVWJsDMvOVcBUDWJeHMBiD9BsVIraD1rwV5X7HgBeHErsDuFaVoBiHQXODQB/Z1rwHuJeHuvmVcFCH5FqHIXGHQJmVINUHANOZMFaHgrKVkXeV5FaHIJsD9XsZ9JeD1BeD5F7DMvmVcXKDWFYHIX7HQXOZkFGHABYHuJeDMrYHErCV5XCHMXGHQFYH9FUD1veHuraHgNKVcFeDWJeHIJeHQJmZ1BOD1rwHQrqHgvsHErCDWFqHIF7HQFYH9BiHAvOV5BiDMrwV9FiDWXCHMFUHQXGH9BOD1rwHuJeHgBeZSJ3HEFqHIJwD9XOZSBOD1BeHQBqHgNKVcFeV5FYHMFUHQXGZSBqHABYHuXGHgrKHErCDWFqHMJeHQFYZSBiHABYHuFaHuNOZSrCH5FqDoXGHQJmZ1BiHIBOV5FUHgveHEBOV5JeZura";
      ob_start();
      $this->prep_conect();
      $this->conectDB();
      if (!in_array(strtolower($this->nm_tpbanco), $this->nm_bases_all))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nspt'] . "</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_Sec_dbv_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_Sec_dbv_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
      $this->Ajax_result_set = ob_get_contents();
      ob_end_clean();
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "responsavel"; 
      }
   }
   function prep_conect()
   {
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['grid_responsavel']['glo_nm_conexao']) && $_SESSION['scriptcase']['grid_responsavel']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['grid_responsavel']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['grid_responsavel']['glo_nm_perfil']) && $_SESSION['scriptcase']['grid_responsavel']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['grid_responsavel']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['grid_responsavel']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['grid_responsavel']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['grid_responsavel']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['grid_responsavel']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['grid_responsavel']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['grid_responsavel']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'Locked', 2); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['grid_responsavel']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['grid_responsavel']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['grid_responsavel']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S", $this->path_conf);
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_responsavel']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['grid_responsavel']['embutida_init']) 
      {
      }
// 
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
         $_SESSION['sc_session'][$this->sc_page]['grid_responsavel']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['scriptcase']['glo_banco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_senha']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Verdana, Arial, sans-serif; font-size: 13px; color: #fcfcfc; font-weight: normal; background-color: #4D7AFF; border-style: solid; border-width: 1px; padding: 6px 10px;  }";
          echo ".scButton_onmouseover { font-family: Verdana, Arial, sans-serif; font-size: 13px; color: #fcfcfc; font-weight: normal; background-color: #7396FF; border-style: solid; border-width: 1px; padding: 6px 10px;  }";
          echo ".scButton_onmousedown { font-family: Verdana, Arial, sans-serif; font-size: 13px; color: #fcfcfc; font-weight: normal; background-color: #4D7AFF; border-style: solid; border-width: 1px; padding: 6px 10px;  }";
          echo ".scButton_disabled { font-family: Verdana, Arial, sans-serif; font-size: 13px; color: #6b6a6b; font-weight: normal; background-color: #4D7AFF; border-style: solid; border-width: 1px; padding: 6px 10px;  }";
          echo ".scLink_default { text-decoration: underline; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:active { text-decoration: underline; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:hover { text-decoration: none; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
                  echo "  " . $this->nm_falta_var;
                  echo "   </b></td>";
                  echo " </tr>";
              }
              if ($nm_crit_perfil)
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nfnd'] . "</font>";
                  echo "  " . $perfil_trab;
                  echo "   </b></td>";
                  echo " </tr>";
              }
          }
          else
          {
              echo "<tr>";
              echo "   <td bgcolor=\"\">";
              echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font></b>";
              echo "   </td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
      }
   }
   function conectDB()
   {
      global $glo_senha_protect;
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['grid_responsavel']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['grid_responsavel']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['grid_responsavel']['glo_nm_conexao'], $this->root . $this->path_prod, 'Locked'); 
      } 
      else 
      { 
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $this->nm_database_encoding); 
      } 
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "R$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
// 
   function sc_Include($path, $tp, $name)
   {
       if (($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "conn_mysql_1")
       {
           $TP_banco = $_SESSION['scriptcase']['glo_tpbanco'];
       }
       else
       {
           eval ("\$TP_banco = \$this->nm_con_" . $conex . "['tpbanco'];");
       }
       if ($tp == "date")
       {
           return "'" . $var . "'";
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
}
//===============================================================================
//
class grid_responsavel_sub_css
{
   function grid_responsavel_sub_css()
   {
      global $script_case_init;
      $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "tema_dbv/tema_dbv";
      if ($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['SC_herda_css'] == "N")
      {
          $_SESSION['sc_session'][$script_case_init]['SC_sub_css']['grid_responsavel']    = $str_schema_all . "_grid.css";
          $_SESSION['sc_session'][$script_case_init]['SC_sub_css_bw']['grid_responsavel'] = $str_schema_all . "_grid_bw.css";
      }
   }
}
//
class grid_responsavel_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'     => '',
                                  'param'      => array(),
                                  'autoComp'   => '',
                                  'rsSize'     => '',
                                  'msgDisplay' => '',
                                  'errList'    => array(),
                                  'fldList'    => array());
   var $grid;
   var $det;
   var $Res;
   var $Graf;
   var $pesq;
   var $pdf;
   var $xls;
   var $xml;
   var $csv;
   var $rtf;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
      $this->$modulo->arr_buttons = $this->arr_buttons;
   }
//
//----- 
   function controle($linhas = 0)
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $nmgp_parms_pdf, $nmgp_graf_pdf, $nm_apl_dependente, $nmgp_navegator_print, $nmgp_tipo_print, $nmgp_cor_print, $nmgp_cor_word, $NMSC_conf_apl, $NM_contr_var_session, $NM_run_iframe,
             $glo_senha_protect, $nmgp_opcao, $nm_call_php;

      if ($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida'])
      { 
          if (!empty($GLOBALS['nmgp_parms'])) 
          { 
              $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
              $todo = explode("?@?", $GLOBALS["nmgp_parms"]);
              foreach ($todo as $param)
              {
                   $cadapar = explode("?#?", $param);
                   if (1 < sizeof($cadapar))
                   {
                       if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                       {
                           $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                       }
                       elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                       {
                           $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                       }
                       nm_limpa_str_grid_responsavel($cadapar[1]);
                       $$cadapar[0] = $cadapar[1];
                   }
              }
          } 
      } 
      $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      if (!$this->Ini) 
      { 
          $this->Ini = new grid_responsavel_ini(); 
          $this->Ini->init();
      } 
      $this->Db = $this->Ini->Db; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['nm_tpbanco'] = $this->Ini->nm_tpbanco;
      $this->nm_data = new nm_data("pt_br");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida'])
      { 
          include_once($this->Ini->path_embutida . "grid_responsavel/grid_responsavel_erro.class.php"); 
      } 
      else 
      { 
          include_once($this->Ini->path_aplicacao . "grid_responsavel_erro.class.php"); 
      } 
      $this->Erro      = new grid_responsavel_erro();
      $this->Erro->Ini = $this->Ini;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida'])
      { 
          require_once($this->Ini->path_embutida . "grid_responsavel/grid_responsavel_lookup.class.php"); 
      } 
      else 
      { 
          require_once($this->Ini->path_aplicacao . "grid_responsavel_lookup.class.php"); 
      } 
      $this->Lookup       = new grid_responsavel_lookup();
      $this->Lookup->Db   = $this->Db;
      $this->Lookup->Ini  = $this->Ini;
      $this->Lookup->Erro = $this->Erro;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "grid_responsavel.php" ; 
      $_SESSION['sc_session']['path_third'] = $this->Ini->path_prod . "/third";
      $_SESSION['sc_session']['path_img']   = $this->Ini->path_img_global;
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['pdf_det'] = false;
      if ($nmgp_opcao == 'pdf_det')
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['pdf_det'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] = 'pdf';
          $nmgp_opcao = 'pdf';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida']      = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida_grid']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida_grid'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida_init']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida_init'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida_label']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida_label'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['cab_embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['cab_embutida'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida_pdf']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida_pdf'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida_treeview']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida_treeview'] = false;
      } 
      include("../_lib/css/" . $this->Ini->str_schema_all . "_grid.php");
      $this->Ini->Tree_img_col    = trim($str_tree_col);
      $this->Ini->Tree_img_exp    = trim($str_tree_exp);
      $this->Ini->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . ".php";
      $this->Ini->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida'])
      { 
          $this->Ini->Img_sep_grid             = "/" . trim($str_toolbar_separator);
          $this->Ini->Label_sort_pos           = trim($str_label_sort_pos);
          $this->Ini->Label_sort               = trim($str_label_sort);
          $this->Ini->Label_sort_asc           = trim($str_label_sort_asc);
          $this->Ini->Label_sort_desc          = trim($str_label_sort_desc);
          $this->Ini->Sum_ico_line             = trim($sum_ico_line);
          $this->Ini->Sum_ico_column           = trim($sum_ico_column);
          $this->Ini->Str_toolbarnav_separator = '/' . trim($str_toolbarnav_separator);
          $this->Ini->Img_qs_search            = '' != trim($img_qs_search)        ? trim($img_qs_search)        : 'scriptcase__NM__qs_lupa.png';
          $this->Ini->Img_qs_clean             = '' != trim($img_qs_clean)         ? trim($img_qs_clean)         : 'scriptcase__NM__qs_close.png';
          $this->Ini->Str_qs_image_padding     = '' != trim($str_qs_image_padding) ? trim($str_qs_image_padding) : '0';
          $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput") ; 
          $_SESSION['scriptcase']['css_popup']                 = $this->Ini->str_schema_all . "_grid.css";
          $_SESSION['scriptcase']['css_btn_popup']             = $this->Ini->Str_btn_css;
          $_SESSION['scriptcase']['bg_btn_popup']['bok']       = nmButtonOutput($this->arr_buttons, "bok", "processa()", "processa()", "bok", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
          $_SESSION['scriptcase']['bg_btn_popup']['bsair']     = nmButtonOutput($this->arr_buttons, "bsair", "window.close()", "window.close()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
          $_SESSION['scriptcase']['bg_btn_popup']['btbremove'] = nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove()", "self.parent.tb_remove()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['field_order']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['field_order'][] = "idresponsavel";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['field_order'][] = "nome";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['field_order'][] = "celular";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['field_order'][] = "email";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['field_order'][] = "cpf";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['field_order_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['field_order'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_responsavel']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_responsavel']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['grid_responsavel']['exit'];
      }

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      if (!$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_page_process'] = $this->Ini->sc_page;
      } 
      $_SESSION['scriptcase']['sc_idioma_pivot']['pt_br'] = array(
          'smry_ppup_titl'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_titl'],
          'smry_ppup_fild'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_fild'],
          'smry_ppup_posi'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi'],
          'smry_ppup_sort'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort'],
          'smry_ppup_posi_labl' => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi_labl'],
          'smry_ppup_posi_data' => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi_data'],
          'smry_ppup_sort_labl' => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort_labl'],
          'smry_ppup_sort_vlue' => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort_vlue'],
          'smry_ppup_chek_tabu' => $this->Ini->Nm_lang['lang_othr_smry_ppup_chek_tabu'],
      );
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
      if (!$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_tp_pdf'] = "wkhtmltopdf";
          $_SESSION['scriptcase']['sc_idioma_pdf'] = array();
          $_SESSION['scriptcase']['sc_idioma_pdf']['pt_br'] = array('titulo' => $this->Ini->Nm_lang['lang_pdff_titl'], 'tp_imp' => $this->Ini->Nm_lang['lang_pdff_type'], 'color' => $this->Ini->Nm_lang['lang_pdff_colr'], 'econm' => $this->Ini->Nm_lang['lang_pdff_bndw'], 'tp_pap' => $this->Ini->Nm_lang['lang_pdff_pper'], 'carta' => $this->Ini->Nm_lang['lang_pdff_letr'], 'oficio' => $this->Ini->Nm_lang['lang_pdff_legl'], 'customiz' => $this->Ini->Nm_lang['lang_pdff_cstm'], 'alt_papel' => $this->Ini->Nm_lang['lang_pdff_pper_hgth'], 'larg_papel' => $this->Ini->Nm_lang['lang_pdff_pper_wdth'], 'orient' => $this->Ini->Nm_lang['lang_pdff_pper_orie'], 'retrato' => $this->Ini->Nm_lang['lang_pdff_prtr'], 'paisag' => $this->Ini->Nm_lang['lang_pdff_lnds'], 'book' => $this->Ini->Nm_lang['lang_pdff_bkmk'], 'grafico' => $this->Ini->Nm_lang['lang_pdff_chrt'], 'largura' => $this->Ini->Nm_lang['lang_pdff_wdth'], 'fonte' => $this->Ini->Nm_lang['lang_pdff_font'], 'sim' => $this->Ini->Nm_lang['lang_pdff_chrt_yess'], 'nao' => $this->Ini->Nm_lang['lang_pdff_chrt_nooo'], 'cancela' => $this->Ini->Nm_lang['lang_pdff_cncl']);
      } 
      $_SESSION['scriptcase']['sc_idioma_graf_flash'] = array();
      $_SESSION['scriptcase']['sc_idioma_graf_flash']['pt_br'] = array(
          'titulo' => $this->Ini->Nm_lang['lang_chrt_titl'],
          'tipo_g' => $this->Ini->Nm_lang['lang_chrt_type'],
          'tp_barra' => $this->Ini->Nm_lang['lang_flsh_chrt_bars'],
          'tp_pizza' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie'],
          'tp_linha' => $this->Ini->Nm_lang['lang_flsh_chrt_line'],
          'tp_area' => $this->Ini->Nm_lang['lang_flsh_chrt_area'],
          'tp_marcador' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks'],
          'tp_gauge' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug'],
          'tp_radar' => $this->Ini->Nm_lang['lang_flsh_chrt_radr'],
          'tp_polar' => $this->Ini->Nm_lang['lang_flsh_chrt_polr'],
          'tp_funil' => $this->Ini->Nm_lang['lang_flsh_chrt_funl'],
          'tp_pyramid' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm'],
          'largura' => $this->Ini->Nm_lang['lang_chrt_wdth'],
          'altura' => $this->Ini->Nm_lang['lang_chrt_hgth'],
          'modo_gera' => $this->Ini->Nm_lang['lang_chrt_gtmd'],
          'sintetico' => $this->Ini->Nm_lang['lang_chrt_smzd'],
          'analitico' => $this->Ini->Nm_lang['lang_chrt_anlt'],
          'order' => $this->Ini->Nm_lang['lang_chrt_ordr'],
          'order_none' => $this->Ini->Nm_lang['lang_chrt_ordr_none'],
          'order_asc' => $this->Ini->Nm_lang['lang_chrt_ordr_asc'],
          'order_desc' => $this->Ini->Nm_lang['lang_chrt_ordr_desc'],
          'barra_orien' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_layo'],
          'barra_orien_horiz' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_horz'],
          'barra_orien_verti' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_vrtc'],
          'barra_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_shpe'],
          'barra_forma_barra' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_bars'],
          'barra_forma_cilin' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_cyld'],
          'barra_forma_cone' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_cone'],
          'barra_forma_piram' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_pyrm'],
          'barra_dimen' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_dmns'],
          'barra_dimen_2d' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_2ddm'],
          'barra_dimen_3d' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ddm'],
          'barra_sobre' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ovr'],
          'barra_sobre_nao' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ont'],
          'barra_sobre_sim' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3oys'],
          'barra_empil' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stck'],
          'barra_empil_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stan'],
          'barra_empil_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stay'],
          'barra_empil_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stap'],
          'barra_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invr'],
          'barra_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invn'],
          'barra_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invi'],
          'barra_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srgr'],
          'barra_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srst'],
          'barra_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srbs'],
          'barra_funil' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_funl'],
          'barra_funil_nao' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ont'],
          'barra_funil_sim' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3oys'],
          'pizza_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_shpe'],
          'pizza_forma_pizza' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fpie'],
          'pizza_forma_donut' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dnts'],
          'pizza_dimen' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dmns'],
          'pizza_dimen_2d' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_2ddm'],
          'pizza_dimen_3d' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_3ddm'],
          'pizza_orden' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_srtn'],
          'pizza_orden_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_nsrt'],
          'pizza_orden_ascen' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_asrt'],
          'pizza_orden_desce' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dsrt'],
          'pizza_explo' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_expl'],
          'pizza_explo_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dxpl'],
          'pizza_explo_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_axpl'],
          'pizza_explo_click' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_cxpl'],
          'pizza_valor' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fval'],
          'pizza_valor_valor' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fvlv'],
          'pizza_valor_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fvlp'],
          'linha_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_line_shpe'],
          'linha_forma_linha' => $this->Ini->Nm_lang['lang_flsh_chrt_line_line'],
          'linha_forma_splin' => $this->Ini->Nm_lang['lang_flsh_chrt_line_spln'],
          'linha_forma_degra' => $this->Ini->Nm_lang['lang_flsh_chrt_line_step'],
          'linha_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invr'],
          'linha_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invn'],
          'linha_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invi'],
          'linha_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srgr'],
          'linha_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srst'],
          'linha_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srbs'],
          'area_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_area_shpe'],
          'area_forma_area' => $this->Ini->Nm_lang['lang_flsh_chrt_area_area'],
          'area_forma_splin' => $this->Ini->Nm_lang['lang_flsh_chrt_area_spln'],
          'area_empil' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stak'],
          'area_empil_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stan'],
          'area_empil_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stay'],
          'area_empil_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stap'],
          'area_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invr'],
          'area_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invn'],
          'area_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invi'],
          'area_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srgr'],
          'area_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srst'],
          'area_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srbs'],
          'marca_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invr'],
          'marca_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invn'],
          'marca_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invi'],
          'marca_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srgr'],
          'marca_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srst'],
          'marca_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srbs'],
          'gauge_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_shpe'],
          'gauge_forma_circular' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_circ'],
          'gauge_forma_semi' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_semi'],
          'pyram_slice' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_slic'],
          'pyram_slice_s' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_opcs'],
          'pyram_slice_n' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_opcn'],
      );
      if (!$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_prt'] = array();
          $_SESSION['scriptcase']['sc_idioma_prt']['pt_br'] = array('titulo' => $this->Ini->Nm_lang['lang_btns_prtn_titl_hint'], 'modoimp' => $this->Ini->Nm_lang['lang_btns_mode_prnt_hint'], 'curr' => $this->Ini->Nm_lang['lang_othr_curr_page'], 'total' => $this->Ini->Nm_lang['lang_othr_full'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint']);
      } 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_word'] = array();
          $_SESSION['scriptcase']['sc_idioma_word']['pt_br'] = array('titulo' => $this->Ini->Nm_lang['lang_btns_prtn_titl_hint'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint']);
      } 
      $this->Ini->Gd_missing  = true;
      if (function_exists("getProdVersion"))
      {
          $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
      }
      if (function_exists("gd_info"))
      {
          $this->Ini->Gd_missing = false;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_orig']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] = "inicio" ;  
      }   
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_responsavel']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_responsavel']['start'] == 'filter')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "grid")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] = "busca";
          }   
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida_form'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "busca")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] = "inicio";
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"]))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opc_liga'] = array();  
          if (isset($NMSC_conf_apl) && !empty($NMSC_conf_apl))
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opc_liga'] = $NMSC_conf_apl;  
          }   
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opc_liga']['inicial']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opc_liga']['inicial'];
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "busca")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] = "grid" ;  
      }   
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao_print']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao_print']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao_print'] = "inicio" ;  
      }   
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['print_all'] = false;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "res_print")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao']     = "resumo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['print_all'] = true;
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['det_print'] = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "det_print")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao']     = "detalhe";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['det_print'] = "print";
      } 
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'], 0, 7) == "grafico")  
      { 
          $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "pdf")
      { 
          $this->Ini->path_img_modelo = $this->Ini->path_img_modelo;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "fast_search")  
      { 
          $this->SC_fast_search($GLOBALS["nmgp_fast_search"], $GLOBALS["nmgp_cond_fast_search"], $GLOBALS["nmgp_arg_fast_search"]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_pesq_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_pesq'])
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] = 'igual';
          } 
          else 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_pesq'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['contr_array_resumo'] = "NAO";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['contr_total_geral']  = "NAO";
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['tot_geral']);
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] = 'pesq';
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['orig_pesq'] = 'grid';
          } 
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == 'pesq' && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['orig_pesq']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['orig_pesq']))  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['orig_pesq'] == "res")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] = 'resumo';
          } 
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['orig_pesq'] == "grid") 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] = 'inicio';
          } 
      } 
//
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['prim_cons'] = false;  
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"]))  
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['prim_cons'] = true;  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_orig'] = "";  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_pesq']       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_pesq_ant']   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['cond_pesq'] = ""; 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_pesq_filtro'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['contr_total_geral'] = "NAO";
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['tot_geral']);
      } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_pesq_filtro'];
      $nm_flag_pdf   = true;
      $nm_vendo_pdf  = ("pdf" == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao']);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['graf_pdf'] = "S";
      if (isset($nmgp_graf_pdf) && !empty($nmgp_graf_pdf))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['graf_pdf'] = $nmgp_graf_pdf;
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida'])
      {
         $this->Ini->sc_Include($this->Ini->path_libs . "/nm_trata_saida.php", "C", "nm_trata_saida") ; 
         $nm_saida = new nm_trata_saida();
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            $nm_arquivo_htm_temp = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_grid_responsavel_html_" . session_id() . "_2.html";
            if (isset($_GET['pdf_base']) && isset($_GET['pdf_url']))
            {
                $nm_arquivo_pdf_base = "/" . str_replace("_NMPLUS_", "+", $_GET['pdf_base']);
                $nm_arquivo_pdf_url  = $_GET['pdf_url'] . $nm_arquivo_pdf_base;
            }
            else
            {
                $nm_arquivo_pdf_base = "/sc_pdf_" . date("YmdHis") . "_" . rand(0, 1000) . "_grid_responsavel.pdf";
                $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . $nm_arquivo_pdf_base;
            }
            $nm_arquivo_pdf_serv = $this->Ini->root . $nm_arquivo_pdf_url;
            $nm_arquivo_de_saida = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_grid_responsavel_html_" . session_id() . ".html";
            $nm_url_de_saida = $this->Ini->java_protocol . $this->Ini->server_pdf . $this->Ini->path_imag_temp . "/sc_grid_responsavel_html_" . session_id() . ".html";
            if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
            { 
                $nm_saida->seta_arquivo($nm_arquivo_de_saida, $_SESSION['scriptcase']['charset']);
                $_SESSION['scriptcase']['charset_html'] = "utf-8";
            }
            else
            { 
                $nm_saida->seta_arquivo($nm_arquivo_de_saida);
            }
         }
      }
//----------------------------------->
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "doc_word_res")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['print_navigator'] = "Microsoft Internet Explorer";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['print_all'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['doc_word']  = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao']     = "resumo";
          $_SESSION['scriptcase']['saida_word'] = true;
          $nm_arquivo_doc_word = "/sc_grid_responsavel_res_" . session_id() . ".doc";
          $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word);
          $this->ret_word = "resumo";
          $this->Ini->nm_limite_lin_res_prt = 0;
          $GLOBALS['nmgp_cor_print']        = $nmgp_cor_word;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "xls")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_responsavel/grid_responsavel_xls.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_responsavel_xls.class.php"); 
          } 
          $this->xls  = new grid_responsavel_xls();
          $this->prep_modulos("xls");
          $this->xls->monta_xls();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "xml")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_responsavel/grid_responsavel_xml.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_responsavel_xml.class.php"); 
          } 
          $this->xml  = new grid_responsavel_xml();
          $this->prep_modulos("xml");
          $this->xml->monta_xml();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "csv")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_responsavel/grid_responsavel_csv.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_responsavel_csv.class.php"); 
          } 
          $this->csv  = new grid_responsavel_csv();
          $this->prep_modulos("csv");
          $this->csv->monta_csv();
      }
      else   
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "rtf")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_responsavel/grid_responsavel_rtf.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_responsavel_rtf.class.php"); 
          } 
          $this->rtf  = new grid_responsavel_rtf();
          $this->prep_modulos("rtf");
          $this->rtf->monta_rtf();
      }
      else
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'], 0, 7) == "grafico")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida'])
          { 
              require_once($this->Ini->path_embutida . " . grid_responsavel . /" . $this->Ini->Apl_grafico); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
          } 
          $this->Graf  = new grid_responsavel_grafico();
          $this->prep_modulos("Graf");
          if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'], 7, 1) == "_")  
          { 
              $this->Graf->grafico_col(substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'], 8));
          }
          else
          { 
              $this->Graf->monta_grafico();
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] = "grid";
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "busca")  
      { 
          require_once($this->Ini->path_aplicacao . "grid_responsavel_pesq.class.php"); 
          $this->pesq  = new grid_responsavel_pesq();
          $this->prep_modulos("pesq");
          $this->pesq->NM_ajax_flag    = $this->NM_ajax_flag;
          $this->pesq->NM_ajax_opcao   = $this->NM_ajax_opcao;
          $this->pesq->NM_ajax_retorno = $this->NM_ajax_retorno;
          $this->pesq->NM_ajax_info    = $this->NM_ajax_info;
          $this->pesq->monta_busca();
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "resumo")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_responsavel/" . $this->Ini->Apl_resumo); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          } 
          $this->Res = new grid_responsavel_resumo("out");
          $this->prep_modulos("Res");
          $this->Res->monta_resumo();
      }
      else 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "print" && $nmgp_tipo_print == "RC")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['print_navigator'] = $nmgp_navegator_print;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao']     = "pdf";
              $GLOBALS['nmgp_tipo_pdf'] = strtolower($nmgp_cor_print);
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "doc_word")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['print_navigator'] = "Microsoft Internet Explorer";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['doc_word']  = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao']     = "pdf";
              $_SESSION['scriptcase']['saida_word'] = true;
              $nm_arquivo_doc_word = "/sc_grid_responsavel_" . session_id() . ".doc";
              $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word);
              $this->ret_word = "volta_grid";
              $this->Ini->nm_limite_lin_prt = 0;
              $GLOBALS['nmgp_tipo_pdf'] = $nmgp_cor_word;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['opcao'] == "detalhe" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['pdf_det'])  
          { 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida'])
              { 
                  require_once($this->Ini->path_embutida . "grid_responsavel/grid_responsavel_det.class.php"); 
              } 
              else 
              { 
                  require_once($this->Ini->path_aplicacao . "grid_responsavel_det.class.php"); 
              } 
              $this->det  = new grid_responsavel_det();
              $this->prep_modulos("det");
              $this->det->monta_det();
          } 
          else  
          { 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida'])
              { 
                  require_once($this->Ini->path_embutida . "grid_responsavel/grid_responsavel_grid.class.php"); 
              } 
              else 
              { 
                  require_once($this->Ini->path_aplicacao . "grid_responsavel_grid.class.php"); 
              } 
              $this->grid  = new grid_responsavel_grid();
              $this->prep_modulos("grid");
              $this->grid->monta_grid($linhas);
          } 
      }   
//--- 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida'])
      {
           $this->Db->Close(); 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['embutida'])
      {
         $nm_saida->finaliza();
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['doc_word'])
         {
             $this->html_doc_word($nm_arquivo_doc_word);
         }
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            if (isset($nmgp_parms_pdf) && !empty($nmgp_parms_pdf))
            {
                $str_pd4ml    = $nmgp_parms_pdf;
            }
            else
            {
                $str_pd4ml    = " --page-size Letter --orientation Portrait --outline-depth 0";
            }
            if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['pdf_det'])
            {
                if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
                {
                    $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
                    if (!NM_is_utf8($lang_protect))
                    {
                        $lang_protect = mb_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
                    }
                    fwrite($this->grid->progress_fp, ($this->grid->progress_tot) . "_#NM#_" . $lang_protect . "...\n");
                    fclose($this->grid->progress_fp);
                }
            }
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['pdf_name']))
            {
                $nm_arquivo_pdf_serv = $this->Ini->root .  $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['pdf_name'];
                $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['pdf_name'];
                $nm_arquivo_pdf_base = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['pdf_name'];
                unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['pdf_name']);
            }
            $arq_pdf_out  = (FALSE !== strpos($nm_arquivo_pdf_serv, ' ')) ? " \"" . $nm_arquivo_pdf_serv . "\"" :  $nm_arquivo_pdf_serv;
            $arq_pdf_in   = (FALSE !== strpos($nm_url_de_saida, ' '))     ? " \"" . $nm_url_de_saida . "\""     :  $nm_url_de_saida;
            if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
            {
                chdir($this->Ini->path_third . "/wkhtmltopdf/win");
                $Win_autentication = "";
                if (isset($_SESSION['sc_pdf_usr']) && !empty($_SESSION['sc_pdf_usr']))
                {
                    $_SESSION['sc_iis_usr'] = $_SESSION['sc_pdf_usr'];
                }
                if (isset($_SESSION['sc_iis_usr']) && !empty($_SESSION['sc_iis_usr']))
                {
                    $Win_autentication .= " --username " . $_SESSION['sc_iis_usr'];
                }
                if (isset($_SESSION['sc_pdf_pw']) && !empty($_SESSION['sc_pdf_pw']))
                {
                    $_SESSION['sc_iis_pw'] = $_SESSION['sc_pdf_pw'];
                }
                if (isset($_SESSION['sc_iis_pw']) && !empty($_SESSION['sc_iis_pw']))
                {
                    $Win_autentication .= " --password " . $_SESSION['sc_iis_pw'];
                }
                $str_execcmd2 = 'wkhtmltopdf ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]" --javascript-delay 2000 ' . $arq_pdf_in . ' ' . $arq_pdf_out;
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
            {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/wkhtmltopdf/linux-i386");
                    $str_execcmd2 = './wkhtmltopdf-i386 ' . $str_pd4ml . ' --header-right "[page]" --javascript-delay 2000 ' . $arq_pdf_in . ' ' . $arq_pdf_out;
                }
                else
                {
                    chdir($this->Ini->path_third . "/wkhtmltopdf/linux-amd64");
                    $str_execcmd2 = './wkhtmltopdf-amd64 ' . $str_pd4ml . ' --header-right "[page]" --javascript-delay 2000 ' . $arq_pdf_in . ' ' . $arq_pdf_out;
                }
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
            {
                chdir($this->Ini->path_third . "/wkhtmltopdf/osx/Contents/MacOS");
                $str_execcmd2 = './wkhtmltopdf ' . $str_pd4ml . ' --header-right "[page]" --javascript-delay 2000 ' . $arq_pdf_in . ' ' . $arq_pdf_out;
            }
            $arr_execcmd = array();
            $str_execcmd = $str_execcmd2;
            exec($str_execcmd2);
            // ----- PDF log
            $fp = @fopen($this->Ini->root . $this->Ini->path_imag_temp . str_replace(".pdf", "", $nm_arquivo_pdf_base) . '.log', 'w');
            if ($fp)
            {
                @fwrite($fp, $str_execcmd . "\r\n\r\n");
                @fwrite($fp, implode("\r\n", $arr_execcmd));
                @fclose($fp);
            }
            if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
            { 
               $_SESSION['scriptcase']['charset_html'] = (isset($this->Ini->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->Ini->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
            }
            if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['pdf_det'])
            {
                if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
                {
                    $this->grid->progress_fp = fopen($_GET['pbfile'], 'a');
                    if ($this->grid->progress_fp)
                    {
                         $lang_protect = $this->Ini->Nm_lang['lang_pdff_fnsh'];
                         if (!NM_is_utf8($lang_protect))
                         {
                             $lang_protect = mb_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
                          }
                        fwrite($this->grid->progress_fp, ($this->grid->progress_now + 1 + $this->grid->progress_pdf) . "_#NM#_" . $lang_protect . "...\n");
                        fwrite($this->grid->progress_fp, "off\n");
                        fclose($this->grid->progress_fp);
                    }
                }
            }
unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['pdf_file']);
if (is_file($nm_arquivo_pdf_serv))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['pdf_file'] = $nm_arquivo_pdf_serv;
}
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['pdf_det'])
{
    $this->html_pdf_detalhe($nm_arquivo_pdf_url);
    return;
}
$NM_volta  = "volta_grid";
$NM_target = "_parent";
if (!is_file($nm_arquivo_pdf_serv))
{
?>
  <br><b><?php echo $this->Ini->Nm_lang['lang_pdff_errg']; ?></b></td></tr></table>
<?php
}
else
{
?>
<?php echo $this->Ini->Nm_lang['lang_pdff_file_loct']; ?>
<BR>
<A href="<?php echo $nm_arquivo_pdf_url; ?>" target="_blank" class="scGridPageLink"><B><?php echo $nm_arquivo_pdf_url; ?></B></A>.
<BR>
<?php echo $this->Ini->Nm_lang['lang_pdff_clck_mesg']; ?>
</td></tr></table>
<?php
}
   echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "sc_b_sai", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<FORM name="F0" method=post action="grid_responsavel.php" target="<?php echo $NM_target; ?>"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($NM_volta); ?>"> 
</FORM>
</td></tr></table>
</BODY>
</HTML>
<?php
         }
      }
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
  function close_emb()
  {
      if ($this->Db)
      {
          $this->Db->Close(); 
      }
  }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_pesq_filtro'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_orig'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['fast_search']);
          return;
      }
      $comando = "";
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "idresponsavel", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "nome", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "celular", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "email", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cpf", $arg_search, $data_search);
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_pesq_filtro'] = "( " . $comando . " )";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_orig'])) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_orig'] . " and ( " . $comando . " )"; 
      }
      else
      {
          $comando = " where (" . $comando . ")"; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['where_pesq'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['fast_search'][2] = $sv_data;
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_numeric = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "idresponsavel";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_responsavel']['decimal_db'] == ".")
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
  function html_doc_word($nm_arquivo_doc_word)
  {
      global $nm_url_saida;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - responsavel :: Doc</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">WORD</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . $nm_arquivo_doc_word ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_responsavel_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="nm_tit_doc" value="grid_responsavel.doc"> 
<input type="hidden" name="nm_name_doc" value="<?php echo NM_encode_input($this->Ini->path_imag_temp . $nm_arquivo_doc_word) ?>"> 
</form>
<FORM name="F0" method=post action="grid_responsavel.php"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($this->ret_word) ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
  }
  function html_pdf_detalhe($nm_arquivo_pdf_det)
  {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - responsavel :: Doc</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PDF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  NM_encode_input($nm_arquivo_pdf_det) ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_responsavel_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="nm_tit_doc" value="grid_responsavel.det_pdf"> 
<input type="hidden" name="nm_name_doc" value="<?php echo NM_encode_input($nm_arquivo_pdf_det) ?>"> 
</form>
<FORM name="F0" method=post action="grid_responsavel.php"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="detalhe"> 
</FORM> 
</BODY>
</HTML>
<?php
  }
} 
// 
//======= =========================
   if (!function_exists("NM_is_utf8"))
   {
       include_once("grid_responsavel_nmutf8.php");
   }
   if (!function_exists("SC_dir_app_ini"))
   {
       include_once("../_lib/lib/php/nm_ctrl_app_name.php");
   }
   SC_dir_app_ini('Locked');
   $_SESSION['scriptcase']['grid_responsavel']['contr_erro'] = 'off';
   $sc_conv_var = array();
   if (!empty($_POST))
   {
       foreach ($_POST as $nmgp_var => $nmgp_val)
       {
            if (isset($sc_conv_var[$nmgp_var]))
            {
                $nmgp_var = $sc_conv_var[$nmgp_var];
            }
            elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
            {
                $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
            }
            nm_limpa_str_grid_responsavel($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!empty($_GET))
   {
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            if (isset($sc_conv_var[$nmgp_var]))
            {
                $nmgp_var = $sc_conv_var[$nmgp_var];
            }
            elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
            {
                $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
            }
            nm_limpa_str_grid_responsavel($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }

    if (isset($_POST['rs']) && strpos($_POST['rs'], '_ajax_') !== false && isset($_POST['rsargs']) && !empty($_POST['rsargs']))
    {
        if ('grid_responsavel_ajax_save_filter' == $_POST['rs'])
        {
            $email_cond = NM_utf8_urldecode($_POST['rsargs'][0]);
            $email = NM_utf8_urldecode($_POST['rsargs'][1]);
            $idresponsavel_cond = NM_utf8_urldecode($_POST['rsargs'][2]);
            $idresponsavel = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nome_cond = NM_utf8_urldecode($_POST['rsargs'][4]);
            $nome = NM_utf8_urldecode($_POST['rsargs'][5]);
            $celular_cond = NM_utf8_urldecode($_POST['rsargs'][6]);
            $celular = NM_utf8_urldecode($_POST['rsargs'][7]);
            $nmgp_save_name = NM_utf8_urldecode($_POST['rsargs'][8]);
            $NM_operador = NM_utf8_urldecode($_POST['rsargs'][9]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][10]);
            $bprocessa = NM_utf8_urldecode($_POST['rsargs'][11]);
        }
        if ('grid_responsavel_ajax_change_filter' == $_POST['rs'])
        {
            $NM_filters = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
            $bprocessa = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('grid_responsavel_ajax_delete_filter' == $_POST['rs'])
        {
            $NM_filters_del = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
            $bprocessa = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        $nmgp_opcao = "busca";
    }

   if (!empty($glo_perfil))  
   { 
      $_SESSION['scriptcase']['glo_perfil'] = $glo_perfil;
   }   
   if (isset($glo_servidor)) 
   {
       $_SESSION['scriptcase']['glo_servidor'] = $glo_servidor;
   }
   if (isset($glo_banco)) 
   {
       $_SESSION['scriptcase']['glo_banco'] = $glo_banco;
   }
   if (isset($glo_tpbanco)) 
   {
       $_SESSION['scriptcase']['glo_tpbanco'] = $glo_tpbanco;
   }
   if (isset($glo_usuario)) 
   {
       $_SESSION['scriptcase']['glo_usuario'] = $glo_usuario;
   }
   if (isset($glo_senha)) 
   {
       $_SESSION['scriptcase']['glo_senha'] = $glo_senha;
   }
   if (isset($glo_senha_protect)) 
   {
       $_SESSION['scriptcase']['glo_senha_protect'] = $glo_senha_protect;
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida_form_parms'])) 
   {
       if (!empty($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida_form_parms'])) 
       {
           $nmgp_parms = $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida_form_parms'];
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida_form_parms'] = "";
       }
   }
   elseif (isset($script_case_init))
   {
       unset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida_form']);
       unset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida_form_parms']);
   }
   if (!isset($nmgp_opcao) || !isset($script_case_init) || ((!isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida']) || !$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida']) && $nmgp_opcao != "formphp"))
   { 
       if (!empty($nmgp_parms)) 
       { 
           $nmgp_parms = NM_decode_input($nmgp_parms);
           $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
           $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
           $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
           $todo = explode("?@?", $nmgp_parms);
           foreach ($todo as $param)
           {
                $cadapar = explode("?#?", $param);
                if (1 < sizeof($cadapar))
                {
                    if (isset($sc_conv_var[$cadapar[0]]))
                    {
                        $cadapar[0] = $sc_conv_var[$cadapar[0]];
                    }
                    elseif (isset($sc_conv_var[strtolower($cadapar[0])]))
                    {
                        $cadapar[0] = $sc_conv_var[strtolower($cadapar[0])];
                    }
                    nm_limpa_str_grid_responsavel($cadapar[1]);
                    $$cadapar[0] = $cadapar[1];
                }
           }
           $NMSC_conf_apl = array();
           if (isset($NMSC_inicial))
           {
               $NMSC_conf_apl['inicial'] = $NMSC_inicial;
           }
           if (isset($NMSC_rows))
           {
               $NMSC_conf_apl['rows'] = $NMSC_rows;
           }
           if (isset($NMSC_cols))
           {
               $NMSC_conf_apl['cols'] = $NMSC_cols;
           }
           if (isset($NMSC_paginacao))
           {
               $NMSC_conf_apl['paginacao'] = $NMSC_paginacao;
           }
           if (isset($NMSC_cab))
           {
               $NMSC_conf_apl['cab'] = $NMSC_cab;
           }
           if (isset($NMSC_nav))
           {
               $NMSC_conf_apl['nav'] = $NMSC_nav;
           }
           if (isset($NM_run_iframe) && $NM_run_iframe == 1) 
           { 
               unset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']);
               $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['b_sair'] = false;
           }   
       } 
   } 
   $ini_embutida = "";
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida']) && $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida'])
   {
       $nmgp_outra_jan = "";
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (isset($GLOBALS["script_case_init"]) && !empty($GLOBALS["script_case_init"]))
   {
       $ini_embutida = $GLOBALS["script_case_init"];
        if (!isset($_SESSION['sc_session'][$ini_embutida]['grid_responsavel']['embutida']))
        { 
           $_SESSION['sc_session'][$ini_embutida]['grid_responsavel']['embutida'] = false;
        }
        if (!$_SESSION['sc_session'][$ini_embutida]['grid_responsavel']['embutida'])
        { 
           $script_case_init = $ini_embutida;
        }
   }
   if (isset($_SESSION['scriptcase']['grid_responsavel']['protect_modal']) && !empty($_SESSION['scriptcase']['grid_responsavel']['protect_modal']))
   {
       $script_case_init = $_SESSION['scriptcase']['grid_responsavel']['protect_modal'];
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 1000);
   }
   $salva_emb    = false;
   $salva_iframe = false;
   $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['doc_word'] = false;
   $_SESSION['scriptcase']['saida_word'] = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['iframe_menu']);
   }
   if (isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida']))
   {
       $salva_emb = $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida'];
       unset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1 && !$salva_emb)
   {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']) && $script_case_init == 1)
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        if ($script_case_init == 1)
        {
            $_SESSION['scriptcase']['sc_apl_menu_atual'] = "grid_responsavel";
        }
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'grid_responsavel' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['iframe_menu'] = $salva_iframe;
   }
   $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida'] = $salva_emb;

   if (!isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('grid_responsavel' == $sReferer || 'grid_responsavel_' == substr($sReferer, 0, 17))
       {
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['initialize'] = true;
       }
   }
   if ($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['initialize'])
   {
       unset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['tot_geral']);
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($nmgp_opcao) && $nmgp_opcao == "busca" && isset($nmgp_orig_pesq))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['orig_pesq'] = $nmgp_orig_pesq;
   }
   if (!isset($nmgp_opcao) || empty($nmgp_opcao) || $nmgp_opcao == "grid" && (!isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['b_sair'])))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['b_sair'] = true;
   }
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'grid_responsavel')
   {
       $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/grid_responsavel_erro.php");
   }
   $salva_tp_saida  = (isset($_SESSION['scriptcase']['sc_tp_saida']))  ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
   $salva_url_saida  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
   if (!$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida'] && $nmgp_opcao != "formphp")
   { 
       if ($nmgp_opcao == "change_lang" || $nmgp_opcao == "change_lang_res" || $nmgp_opcao == "change_lang_fil")  
       { 
           if ($nmgp_opcao == "change_lang_fil")  
           { 
               $nmgp_opcao  = "busca";  
           } 
           elseif ($nmgp_opcao == "change_lang_res")  
           { 
               $nmgp_opcao  = "resumo";  
           } 
           else 
           { 
               $nmgp_opcao  = "igual";  
           } 
           unset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['tot_geral']);
           $Temp_lang = explode(";" , $nmgp_idioma);  
           if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
           { 
               $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
           } 
           if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
           { 
               $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
           } 
       } 
       if ($nmgp_opcao == "change_schema" || $nmgp_opcao == "change_schema_fil" || $nmgp_opcao == "change_schema_res")  
       { 
           if ($nmgp_opcao == "change_schema_fil")  
           { 
               $nmgp_opcao  = "busca";  
           } 
           elseif ($nmgp_opcao == "change_schema_res")  
           { 
               $nmgp_opcao  = "resumo";  
           } 
           else 
           { 
               $nmgp_opcao  = "igual";  
           } 
           $nmgp_schema = $nmgp_schema . "/" . $nmgp_schema;  
           $_SESSION['scriptcase']['str_schema_all'] = $nmgp_schema;
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['num_css'] = rand(0, 1000);
       } 
       if ($nmgp_opcao == "volta_grid")  
       { 
           $nmgp_opcao = "igual";  
       }   
       if (!empty($nmgp_opcao))  
       { 
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['opcao'] = $nmgp_opcao ;  
       }   
       if ($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['opcao'] == "detalhe" && isset($nmgp_chave_det))  
       { 
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['chave_det'] = $nmgp_chave_det;  
       }   
       if (!isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['mostra_edit'])) 
       {
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['mostra_edit'] = "S";
       }
       if (isset($nmgp_lig_edit_lapis)) 
       {
          $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['mostra_edit'] = $nmgp_lig_edit_lapis;
           unset($GLOBALS["nmgp_lig_edit_lapis"]) ;  
           if (isset($_SESSION['nmgp_lig_edit_lapis'])) 
           {
               unset($_SESSION['nmgp_lig_edit_lapis']);
           }
       }
       if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
       {
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['sc_outra_jan'] = true;
       }
       if (isset($nmgp_rotaciona) && $nmgp_rotaciona == "S") 
       {
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['res_hrz'] = ($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['res_hrz']) ? false : true;
       }
       $nm_saida = "";
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['volta_redirect_apl']) && !empty($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['volta_redirect_apl']))
       {
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['volta_redirect_apl']; 
           $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['volta_redirect_tp']; 
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['volta_redirect_apl'] = "";
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['volta_redirect_tp'] = "";
           $nm_url_saida = "grid_responsavel_fim.php"; 
       
       }
       elseif (substr($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['opcao'] != "pdf" ) 
       {
           if (isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['sc_outra_jan'])
           {
               if ($nmgp_url_saida == "modal")
               {
                   $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['sc_modal'] = true;
               }
               $nm_url_saida = "grid_responsavel_fim.php"; 
           }
           else
           {
               $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
               $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida);
               if (!empty($nmgp_url_saida)) 
               { 
                   $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['retorno_cons'] = $nmgp_url_saida ; 
               } 
               if (!empty($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['retorno_cons'])) 
               { 
                   $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['retorno_cons']  . "?script_case_init=" . NM_encode_input($script_case_init);  
                   $nm_apl_dependente = 1 ; 
               } 
               if (!empty($nm_url_saida)) 
               { 
                   $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida ; 
               } 
               $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
               $nm_url_saida = "grid_responsavel_fim.php"; 
               $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
               if ($nm_apl_dependente == 1) 
               { 
                   $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
               } 
           } 
       }
// 
       if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && substr($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['opcao'] != "pdf" ) 
       { 
            $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['menu_desenv'] = true;   
       } 
       if (isset($_GET["nmgp_parms_ret"])) 
       {
           $todo = explode(",", $nmgp_parms_ret);
           if (isset($sc_conv_var[$todo[2]]))
           {
               $todo[2] = $sc_conv_var[$todo[2]];
           }
           elseif (isset($sc_conv_var[strtolower($todo[2])]))
           {
               $todo[2] = $sc_conv_var[strtolower($todo[2])];
           }
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['form_psq_ret']  = $todo[0];
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['campo_psq_ret'] = $todo[1];
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['dado_psq_ret']  = $todo[2];
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['js_apos_busca'] = $nm_evt_ret_busca;
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['opc_psq'] = true ;   
       } 
       elseif (!isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['opc_psq']))
       {
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['opc_psq'] = false ;   
       } 
       if ($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida_form'])
       {
           $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['mostra_edit'] = "N";   
           $_SESSION['scriptcase']['sc_tp_saida']  = $salva_tp_saida;
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $salva_url_saida;
       } 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['sc_outra_jan'])
       {
           $nm_apl_dependente = 0;
       }
       $contr_grid_responsavel = new grid_responsavel_apl();

      if (!isset($_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida']) || !$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida'])
      { 
          if (!function_exists("sajax_init")) 
          { 
              include_once(dirname(__FILE__) . '/grid_responsavel_sajax.php');
          }
          $sajax_request_type = "POST";
          sajax_init();
      }
      //$sajax_debug_mode = 1;
      sajax_export("grid_responsavel_ajax_save_filter");
      sajax_export("grid_responsavel_ajax_change_filter");
      sajax_export("grid_responsavel_ajax_delete_filter");
      sajax_handle_client_request();

      if ('ajax_autocomp' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_responsavel']['opcao'] = "busca";
          $contr_grid_responsavel->NM_ajax_flag = true;
          $contr_grid_responsavel->NM_ajax_opcao = $NM_ajax_opcao;
      }

       $contr_grid_responsavel->controle();
   } 
   if (!$_SESSION['sc_session'][$script_case_init]['grid_responsavel']['embutida'] && $nmgp_opcao == "formphp")
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       $contr_grid_responsavel = new grid_responsavel_apl();
       $contr_grid_responsavel->controle();
   } 
//
   function nm_limpa_str_grid_responsavel(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               foreach ($str as $x => $cada_str)
               {
                   $str[$x] = str_replace("@aspasd@", '"', $str[$x]);
                   $str[$x] = stripslashes($str[$x]);
               }
           }
           else
           {
               $str = str_replace("@aspasd@", '"', $str);
               $str = stripslashes($str);
           }
       }
   }

    function grid_responsavel_ajax_save_filter($email_cond, $email, $idresponsavel_cond, $idresponsavel, $nome_cond, $nome, $celular_cond, $celular, $nmgp_save_name, $NM_operador, $script_case_init, $bprocessa)
    {
        global $contr_grid_responsavel;
        register_shutdown_function("grid_responsavel_nm_return_ajax");
        $contr_grid_responsavel->NM_ajax_flag          = true;
        $contr_grid_responsavel->NM_ajax_opcao         = 'save_filter';
        $contr_grid_responsavel->NM_ajax_info['param'] = array(
                  'email_cond' => NM_utf8_urldecode($email_cond),
                  'email' => NM_utf8_urldecode($email),
                  'idresponsavel_cond' => NM_utf8_urldecode($idresponsavel_cond),
                  'idresponsavel' => NM_utf8_urldecode($idresponsavel),
                  'nome_cond' => NM_utf8_urldecode($nome_cond),
                  'nome' => NM_utf8_urldecode($nome),
                  'celular_cond' => NM_utf8_urldecode($celular_cond),
                  'celular' => NM_utf8_urldecode($celular),
                  'nmgp_save_name' => NM_utf8_urldecode($nmgp_save_name),
                  'NM_operador' => NM_utf8_urldecode($NM_operador),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'bprocessa' => NM_utf8_urldecode($bprocessa),
                 );
        $contr_grid_responsavel->controle();
        exit;
    } // ajax_save_filter

    function grid_responsavel_ajax_change_filter($NM_filters, $script_case_init, $bprocessa)
    {
        global $contr_grid_responsavel;
        register_shutdown_function("grid_responsavel_nm_return_ajax");
        $contr_grid_responsavel->NM_ajax_flag          = true;
        $contr_grid_responsavel->NM_ajax_opcao         = 'change_filter';
        $contr_grid_responsavel->NM_ajax_info['param'] = array(
                  'NM_filters' => NM_utf8_urldecode($NM_filters),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'bprocessa' => NM_utf8_urldecode($bprocessa),
                 );
        $contr_grid_responsavel->controle();
        exit;
    } // ajax_change_filter

    function grid_responsavel_ajax_delete_filter($NM_filters_del, $script_case_init, $bprocessa)
    {
        global $contr_grid_responsavel;
        register_shutdown_function("grid_responsavel_nm_return_ajax");
        $contr_grid_responsavel->NM_ajax_flag          = true;
        $contr_grid_responsavel->NM_ajax_opcao         = 'delete_filter';
        $contr_grid_responsavel->NM_ajax_info['param'] = array(
                  'NM_filters_del' => NM_utf8_urldecode($NM_filters_del),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'bprocessa' => NM_utf8_urldecode($bprocessa),
                 );
        $contr_grid_responsavel->controle();
        exit;
    } // ajax_delete_filter

    function grid_responsavel_nm_return_ajax()
    {
        global $contr_grid_responsavel;
        $contr_grid_responsavel->NM_ajax_flag    = $contr_grid_responsavel->pesq->NM_ajax_flag;
        $contr_grid_responsavel->NM_ajax_opcao   = $contr_grid_responsavel->pesq->NM_ajax_opcao;
        $contr_grid_responsavel->NM_ajax_retorno = $contr_grid_responsavel->pesq->NM_ajax_retorno;
        $contr_grid_responsavel->NM_ajax_info    = $contr_grid_responsavel->pesq->NM_ajax_info;
        grid_responsavel_pack_ajax_response();
    }

   function grid_responsavel_pack_ajax_response()
   {
      global $contr_grid_responsavel;
      $aResp = array();
      if ($contr_grid_responsavel->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $contr_grid_responsavel->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($contr_grid_responsavel->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($contr_grid_responsavel->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($contr_grid_responsavel->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($contr_grid_responsavel->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $contr_grid_responsavel->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $contr_grid_responsavel->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $contr_grid_responsavel->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            grid_responsavel_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            grid_responsavel_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            grid_responsavel_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            grid_responsavel_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = grid_responsavel_pack_protect_string($contr_grid_responsavel->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            grid_responsavel_pack_ajax_ok($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['focus']) && '' != $contr_grid_responsavel->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $contr_grid_responsavel->NM_ajax_info['focus'];
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['closeLine']) && '' != $contr_grid_responsavel->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $contr_grid_responsavel->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['clearUpload']) && '' != $contr_grid_responsavel->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $contr_grid_responsavel->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['masterValue']) && '' != $contr_grid_responsavel->NM_ajax_info['masterValue'])
         {
            grid_responsavel_pack_master_value($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['ajaxAlert']) && '' != $contr_grid_responsavel->NM_ajax_info['ajaxAlert'])
         {
            grid_responsavel_pack_ajax_alert($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['ajaxMessage']) && '' != $contr_grid_responsavel->NM_ajax_info['ajaxMessage'])
         {
            grid_responsavel_pack_ajax_message($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['ajaxJavascript']) && '' != $contr_grid_responsavel->NM_ajax_info['ajaxJavascript'])
         {
            grid_responsavel_pack_ajax_javascript($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['redir']) && !empty($contr_grid_responsavel->NM_ajax_info['redir']))
         {
            grid_responsavel_pack_ajax_redir($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['redirExit']) && !empty($contr_grid_responsavel->NM_ajax_info['redirExit']))
         {
            grid_responsavel_pack_ajax_redir_exit($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['blockDisplay']) && !empty($contr_grid_responsavel->NM_ajax_info['blockDisplay']))
         {
            grid_responsavel_pack_ajax_block_display($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['fieldDisplay']) && !empty($contr_grid_responsavel->NM_ajax_info['fieldDisplay']))
         {
            grid_responsavel_pack_ajax_field_display($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['buttonDisplay']) && !empty($contr_grid_responsavel->NM_ajax_info['buttonDisplay']))
         {
            $contr_grid_responsavel->NM_ajax_info['buttonDisplay'] = $contr_grid_responsavel->nmgp_botoes;
            grid_responsavel_pack_ajax_button_display($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['fieldLabel']) && !empty($contr_grid_responsavel->NM_ajax_info['fieldLabel']))
         {
            grid_responsavel_pack_ajax_field_label($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['readOnly']) && !empty($contr_grid_responsavel->NM_ajax_info['readOnly']))
         {
            grid_responsavel_pack_ajax_readonly($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['navStatus']) && !empty($contr_grid_responsavel->NM_ajax_info['navStatus']))
         {
            grid_responsavel_pack_ajax_nav_status($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['navSummary']) && !empty($contr_grid_responsavel->NM_ajax_info['navSummary']))
         {
            grid_responsavel_pack_ajax_nav_Summary($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['navPage']))
         {
            grid_responsavel_pack_ajax_navPage($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['btnVars']) && !empty($contr_grid_responsavel->NM_ajax_info['btnVars']))
         {
            grid_responsavel_pack_ajax_btn_vars($aResp);
         }
         if (isset($contr_grid_responsavel->NM_ajax_info['quickSearchRes']) && $contr_grid_responsavel->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($contr_grid_responsavel->NM_ajax_info['param']['buffer_output']) && $contr_grid_responsavel->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = grid_responsavel_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
               ob_end_clean();
            }
         }
      }
      if (is_array($aResp))
      {
          $oJson = new Services_JSON();
          echo "var res = " . trim(sajax_get_js_repr($oJson->encode($aResp))) . "; res;";
      }
      else
      {
          echo "var res = " . trim(sajax_get_js_repr($aResp)) . "; res;";
      }
      exit;
   } // grid_responsavel_pack_ajax_response

   function grid_responsavel_pack_calendar_reload(&$aResp)
   {
      global $contr_grid_responsavel;
      $aResp['calendarReload'] = 'OK';
   } // grid_responsavel_pack_calendar_reload

   function grid_responsavel_pack_ajax_errors(&$aResp)
   {
      global $contr_grid_responsavel;
      $aResp['errList'] = array();
      foreach ($contr_grid_responsavel->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_grid_responsavel' == $sField)
         {
             $aMsg = grid_responsavel_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($contr_grid_responsavel->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_grid_responsavel' != $sField)
                       ? $contr_grid_responsavel->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => grid_responsavel_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // grid_responsavel_pack_ajax_errors

   function grid_responsavel_pack_ajax_remove_erros($aErrors)
   {
       $aNewErrors = array();
       if (!empty($aErrors))
       {
           $sErrorMsgs = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), implode('<br />', $aErrors));
           $aErrorMsgs = explode('<BR>', $sErrorMsgs);
           foreach ($aErrorMsgs as $sErrorMsg)
           {
               $sErrorMsg = trim($sErrorMsg);
               if ('' != $sErrorMsg && !in_array($sErrorMsg, $aNewErrors))
               {
                   $aNewErrors[] = $sErrorMsg;
               }
           }
       }
       return $aNewErrors;
   } // grid_responsavel_pack_ajax_remove_erros

   function grid_responsavel_pack_ajax_ok(&$aResp)
   {
      global $contr_grid_responsavel;
      $iNumLinha = (isset($contr_grid_responsavel->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $contr_grid_responsavel->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => grid_responsavel_pack_protect_string($contr_grid_responsavel->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // grid_responsavel_pack_ajax_ok

   function grid_responsavel_pack_ajax_set_fields(&$aResp)
   {
      global $contr_grid_responsavel;
      $iNumLinha = (isset($contr_grid_responsavel->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $contr_grid_responsavel->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $contr_grid_responsavel->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $contr_grid_responsavel->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($contr_grid_responsavel->NM_ajax_info['fldList'] as $sField => $aData)
      {
         $aField = array();
         if (isset($aData['colNum']))
         {
            $aField['colNum'] = $aData['colNum'];
         }
         if (isset($aData['row']))
         {
            $aField['row'] = $aData['row'];
         }
         if (isset($aData['imgFile']))
         {
            $aField['imgFile'] = grid_responsavel_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = grid_responsavel_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = grid_responsavel_pack_protect_string($aData['imgLink']);
         }
         if (isset($aData['keepImg']))
         {
            $aField['keepImg'] = $aData['keepImg'];
         }
         if (isset($aData['docLink']))
         {
            $aField['docLink'] = grid_responsavel_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = grid_responsavel_pack_protect_string($aData['docIcon']);
         }
         if (isset($aData['keyVal']))
         {
            $aField['keyVal'] = $aData['keyVal'];
         }
         if (isset($aData['optComp']))
         {
            $aField['optComp'] = $aData['optComp'];
         }
         if (isset($aData['optClass']))
         {
            $aField['optClass'] = $aData['optClass'];
         }
         if (isset($aData['optMulti']))
         {
            $aField['optMulti'] = $aData['optMulti'];
         }
         if (isset($aData['lookupCons']))
         {
            $aField['lookupCons'] = $aData['lookupCons'];
         }
         if (isset($aData['imgHtml']))
         {
            $aField['imgHtml'] = grid_responsavel_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = grid_responsavel_pack_protect_string($aData['mulHtml']);
         }
         if (isset($aData['updInnerHtml']))
         {
            $aField['updInnerHtml'] = $aData['updInnerHtml'];
         }
         if (isset($aData['htmComp']))
         {
            $aField['htmComp'] = str_replace("'", '__AS__', str_replace('"', '__AD__', $aData['htmComp']));
         }
         $aField['fldName']  = $sField;
         $aField['fldType']  = $aData['type'];
         $aField['numLinha'] = $iNumLinha;
         $aField['valList']  = array();
         foreach ($aData['valList'] as $iIndex => $sValue)
         {
            $aValue = array();
            if (isset($aData['labList'][$iIndex]))
            {
               $aValue['label'] = grid_responsavel_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? grid_responsavel_pack_protect_string($sValue) : $sValue;
            $aField['valList'][] = $aValue;
         }
         foreach ($aField['valList'] as $iIndex => $aFieldData)
         {
             if ("null" == $aFieldData['value'])
             {
                 $aField['valList'][$iIndex]['value'] = '';
             }
         }
         if (isset($aData['optList']) && false !== $aData['optList'])
         {
            if (is_array($aData['optList']))
            {
               $aField['optList'] = array();
               foreach ($aData['optList'] as $aOptList)
               {
                  foreach ($aOptList as $sValue => $sLabel)
                  {
                     $sOpt = ($sValue !== $sLabel) ? $sValue : $sLabel;
                     $aField['optList'][] = array('value' => grid_responsavel_pack_protect_string($sOpt),
                                                  'label' => grid_responsavel_pack_protect_string($sLabel));
                  }
               }
            }
            else
            {
               $aField['optList'] = $aData['optList'];
            }
         }
         $aResp['fldList'][] = $aField;
      }
   } // grid_responsavel_pack_ajax_set_fields

   function grid_responsavel_pack_ajax_redir(&$aResp)
   {
      global $contr_grid_responsavel;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($contr_grid_responsavel->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $contr_grid_responsavel->NM_ajax_info['redir'][$sTag];
         }
      }
   } // grid_responsavel_pack_ajax_redir

   function grid_responsavel_pack_ajax_redir_exit(&$aResp)
   {
      global $contr_grid_responsavel;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($contr_grid_responsavel->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $contr_grid_responsavel->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // grid_responsavel_pack_ajax_redir_exit

   function grid_responsavel_pack_master_value(&$aResp)
   {
      global $contr_grid_responsavel;
      foreach ($contr_grid_responsavel->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // grid_responsavel_pack_master_value

   function grid_responsavel_pack_ajax_alert(&$aResp)
   {
      global $contr_grid_responsavel;
      $aResp['ajaxAlert'] = array('message' => $contr_grid_responsavel->NM_ajax_info['ajaxAlert']['message']);
   } // grid_responsavel_pack_ajax_alert

   function grid_responsavel_pack_ajax_message(&$aResp)
   {
      global $contr_grid_responsavel;
      $aResp['ajaxMessage'] = array('message'      => grid_responsavel_pack_protect_string($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => grid_responsavel_pack_protect_string($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['modal'])        ? $contr_grid_responsavel->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['timeout'])      ? $contr_grid_responsavel->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['button'])       ? $contr_grid_responsavel->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['button_label']) ? $contr_grid_responsavel->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['top'])          ? $contr_grid_responsavel->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['left'])         ? $contr_grid_responsavel->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['width'])        ? $contr_grid_responsavel->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['height'])       ? $contr_grid_responsavel->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['redir'])        ? $contr_grid_responsavel->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['show_close'])   ? $contr_grid_responsavel->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['body_icon'])    ? $contr_grid_responsavel->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'redir_target' => isset($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['redir_target']) ? $contr_grid_responsavel->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($contr_grid_responsavel->NM_ajax_info['ajaxMessage']['redir_par'])    ? $contr_grid_responsavel->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // grid_responsavel_pack_ajax_message

   function grid_responsavel_pack_ajax_javascript(&$aResp)
   {
      global $contr_grid_responsavel;
      foreach ($contr_grid_responsavel->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // grid_responsavel_pack_ajax_javascript

   function grid_responsavel_pack_ajax_block_display(&$aResp)
   {
      global $contr_grid_responsavel;
      $aResp['blockDisplay'] = array();
      foreach ($contr_grid_responsavel->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // grid_responsavel_pack_ajax_block_display

   function grid_responsavel_pack_ajax_field_display(&$aResp)
   {
      global $contr_grid_responsavel;
      $aResp['fieldDisplay'] = array();
      foreach ($contr_grid_responsavel->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // grid_responsavel_pack_ajax_field_display

   function grid_responsavel_pack_ajax_button_display(&$aResp)
   {
      global $contr_grid_responsavel;
      $aResp['buttonDisplay'] = array();
      foreach ($contr_grid_responsavel->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // grid_responsavel_pack_ajax_button_display

   function grid_responsavel_pack_ajax_field_label(&$aResp)
   {
      global $contr_grid_responsavel;
      $aResp['fieldLabel'] = array();
      foreach ($contr_grid_responsavel->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, grid_responsavel_pack_protect_string($sFieldLabel));
      }
   } // grid_responsavel_pack_ajax_field_label

   function grid_responsavel_pack_ajax_readonly(&$aResp)
   {
      global $contr_grid_responsavel;
      $aResp['readOnly'] = array();
      foreach ($contr_grid_responsavel->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // grid_responsavel_pack_ajax_readonly

   function grid_responsavel_pack_ajax_nav_status(&$aResp)
   {
      global $contr_grid_responsavel;
      $aResp['navStatus'] = array();
      if (isset($contr_grid_responsavel->NM_ajax_info['navStatus']['ret']) && '' != $contr_grid_responsavel->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $contr_grid_responsavel->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($contr_grid_responsavel->NM_ajax_info['navStatus']['ava']) && '' != $contr_grid_responsavel->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $contr_grid_responsavel->NM_ajax_info['navStatus']['ava'];
      }
   } // grid_responsavel_pack_ajax_nav_status

   function grid_responsavel_pack_ajax_nav_Summary(&$aResp)
   {
      global $contr_grid_responsavel;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $contr_grid_responsavel->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $contr_grid_responsavel->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $contr_grid_responsavel->NM_ajax_info['navSummary']['reg_tot'];
   } // grid_responsavel_pack_ajax_nav_Summary

   function grid_responsavel_pack_ajax_navPage(&$aResp)
   {
      global $contr_grid_responsavel;
      $aResp['navPage'] = $contr_grid_responsavel->NM_ajax_info['navPage'];
   } // grid_responsavel_pack_ajax_navPage


   function grid_responsavel_pack_ajax_btn_vars(&$aResp)
   {
      global $contr_grid_responsavel;
      $aResp['btnVars'] = array();
      foreach ($contr_grid_responsavel->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, grid_responsavel_pack_protect_string($sBtnValue));
      }
   } // grid_responsavel_pack_ajax_btn_vars

   function grid_responsavel_pack_protect_string($sString)
   {
      $sString = (string) $sString;

      if (!empty($sString))
      {
         if (function_exists('NM_is_utf8') && NM_is_utf8($sString))
         {
             return $sString;
         }
         else
         {
             return htmlentities($sString);
         }
      }
      elseif ('0' === $sString || 0 === $sString)
      {
         return '0';
      }
      else
      {
         return '';
      }
   } // grid_responsavel_pack_protect_string
?>
