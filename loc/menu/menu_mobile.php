<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
        <title>menu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet"  href="<?php echo $_SESSION["scriptcase"]["menu"]["glo_nm_path_prod"]; ?>/third/jquery.mobile/jquery.mobile-1.2.0.min.css" />
        <link rel="stylesheet"  href="<?php echo $this->url_css; ?>tema_dbv/tema_dbv_menuMobile.css" />
        <script src="<?php echo $_SESSION["scriptcase"]["menu"]["glo_nm_path_prod"]; ?>/third/jquery/js/jquery.js"></script>
        <script type="text/javascript">
            $(document).bind("mobileinit", function() {
                $.mobile.page.prototype.options.backBtnText = "<?php echo $this->Nm_lang["lang_btns_prev"]; ?>";
                $.mobile.page.prototype.options.addBackBtn = true;
            });
        </script>
        <script src="<?php echo $_SESSION["scriptcase"]["menu"]["glo_nm_path_prod"]; ?>/third/jquery.mobile/jquery.mobile-1.2.0.min.js"></script>
    </head>
    <body>
        <ul data-role='listview' data-theme='a'>
            <li title="<?php echo "" . $nm_var_hint[0] . ""; ?>">
                <a href="<?php echo "menu_form_php.php?sc_item_menu=item_1&sc_apl_menu=grid_aluno&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[0] . ""; ?></a>
            </li>
            <li title="<?php echo "" . $nm_var_hint[1] . ""; ?>">
                <a href="<?php echo "menu_form_php.php?sc_item_menu=item_2&sc_apl_menu=grid_turma&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[1] . ""; ?></a>
            </li>
            <li title="<?php echo "" . $nm_var_hint[2] . ""; ?>">
                <a href="<?php echo "menu_form_php.php?sc_item_menu=item_3&sc_apl_menu=grid_horario&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[2] . ""; ?></a>
            </li>
            <li title="<?php echo "" . $nm_var_hint[3] . ""; ?>">
                <a href="<?php echo "menu_form_php.php?sc_item_menu=item_4&sc_apl_menu=grid_liberacao&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[3] . ""; ?></a>
            </li>
        </ul>

    </body>
</html>
