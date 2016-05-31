<?php

/*
  Plugin Name: WPDM - Form Lock
  Plugin URI: http://www.wpdownloadmanager.com/
  Description: Form Lock Add-on for WordPress Download Manager Pro, Supports Live Forms, Gravity Forms, Ninja Forms, Formidable Forms & Contact Form 7.
  Author: Shaon
  Version: 1.3.3
  Author URI: http://www.wpdownloadmanager.com/
 */


class WPDM_FormLock {

    public $package_id = 0;

    function __construct(){
        add_action('wpdm_download_lock_option', array($this,'lock_settings'));
        add_action('wpdm_download_lock', array($this,'download_lock'),10, 2);
        add_action('wpdm_check_lock', array($this,'check_download_lock'),10, 2);

        //Live Forms
        add_filter('liveform_submitform_thankyou_message', array($this,'show_download_button'));
        add_action( 'liveforms_form_settings', array($this, 'package_select'));
        add_filter( 'wpdm_liveforms_html', array($this, 'liveform_html'), 10, 3);

        //Gravity Forms
        add_filter( 'wpdm_gravityforms_html', array($this, 'gravityforms_html'), 10, 3);
        add_filter( 'gform_confirmation', array($this, 'after_submit_gravityform'), 10, 4);
        add_filter( 'gform_pre_render', array($this, 'gform_pre_render'));

        //Contact Form 7
        add_filter( 'wpdm_contactform7_html', array($this, 'contactform7_html'), 10, 3);
        //add_filter( 'wpcf7_display_message', array($this,'show_download_button'));
        add_filter( 'wpcf7_ajax_json_echo', array($this,'show_download_button_cf7'), 10, 2);

        //Ninja Forms
        add_filter( 'wpdm_form_lock_dropdown', array($this, 'ninja_forms_dropdown'));
        add_filter( 'wpdm_ninjaforms_html', array($this, 'ninjaforms_html'), 10, 3);
        add_filter( 'nf_success_msg', array($this, 'show_download_button'), 10, 2 );

        //Formidable Forms
        add_filter( 'wpdm_form_lock_dropdown', array($this, 'formidable_dropdown'));
        add_filter( 'wpdm_formidable_html', array($this, 'formidable_html'), 10, 3);
        add_filter( 'frm_main_feedback', array($this, 'show_download_button'), 10, 3);


    }

    function download_lock($extralocks, $file)
    {


        if (get_post_meta($file['ID'], '__wpdm_form_lock', true) != 1 || get_post_meta($file['ID'], '__wpdm_form_id', true) == '') return $extralocks;
        $form_info = get_post_meta($file['ID'], '__wpdm_form_id', true);
        $form_info = explode("|", $form_info);
        $formplugin = $form_info[0];
        $formid = isset($form_info[1])?$form_info[1]:0;
        $formhtml = apply_filters("wpdm_".$formplugin."_html", "", $formid, $file['ID']);
        if(!isset($extralocks['html'])) $extralocks['html'] = '';
        $extralocks['html'] .= $formhtml;
        $extralocks['lock'] = 'locked';
        $this->package_id = $file['ID'];
        return $extralocks;
    }

    function liveform_html($formhtml, $formid, $pid){
        $liveform = liveforms::getInstance();
        $title = get_the_title($formid);
        $formhtml = "<div class='panel panel-default'><div class='panel-heading'>{$title}</div><div class='panel-body'>".$liveform->view_showform(array('form_id' => $formid))."</div></div>";
        $formhtml = str_replace("</form>", "<input type='hidden' name='after_submit_wpdm' value='{$pid}' /></form>", $formhtml);
        return $formhtml;
    }

    function gravityforms_html($formhtml, $formid, $pid){
        $form = GFAPI::get_form($formid);
        $formhtml = "<div class='panel panel-default'><div class='panel-heading'>{$form['title']}</div><div class='panel-body'>".do_shortcode('[gravityform id="'.$formid.'" title="false" description="true" ajax="true"]')."</div></div>";
        $formhtml = str_replace("[wpdm_package_id]", $pid, $formhtml);
        return $formhtml;
    }

    function contactform7_html($formhtml, $formid, $pid){
        $title = get_the_title($formid);
        $formhtml = "<div class='panel panel-default'><div class='panel-heading'>{$title}</div><div class='panel-body'>".do_shortcode('[contact-form-7 id="'.$formid.'"]')."</div></div>";
        $formhtml = str_replace("</form>", "<input type='hidden' name='after_submit_wpdm' value='{$pid}' /></form>", $formhtml);
        return $formhtml;
    }

    function ninjaforms_html($formhtml, $formid, $pid){
        $data = Ninja_Forms()->form( $formid )->get_all_settings();
        $formhtml = "<div class='panel panel-default'><div class='panel-heading'>{$data['form_title']}</div><div class='panel-body'>".do_shortcode('[ninja_forms id="'.$formid.'"]')."</div></div>";
        $formhtml = str_replace("</form>", "<input type='hidden' name='after_submit_wpdm' value='{$pid}' /></form>", $formhtml);
        return $formhtml;
    }

    function formidable_html($formhtml, $formid, $pid){
        global $wpdb;
        $formid = (int)$formid;
        $formname = $wpdb->get_var("select name from {$wpdb->prefix}frm_forms where id='{$formid}'");
        $formhtml = "<div class='panel panel-default'><div class='panel-heading'>{$formname}</div><div class='panel-body'>".do_shortcode('[formidable id="'.$formid.'"]')."</div></div>";
        $formhtml = str_replace("</form>", "<input type='hidden' name='after_submit_wpdm' value='{$pid}' /></form>", $formhtml);
        return $formhtml;
    }


    function check_download_lock($lock, $id)
    {
        if (get_post_meta($id, '__wpdm_form_lock', true) == '1') $lock = 'locked';
        return $lock;
    }

    function add_hidden_field($formid){
        global $post;
        $pid = 0;
        $form_data = get_post_meta($formid, 'form_data', true);
        $form_data = maybe_unserialize($form_data);
        if(isset($form_data['download'])) $this->package_id = $form_data['download'];
        if(is_singular('wpdmpro')) $this->package_id = get_the_ID();
        if($this->package_id > 0)
            echo "<input type='hidden' name='after_submit_wpdm' value='{$this->package_id}' />";
    }

    function email_link($email, $file){
        $eml = get_option('_wpdm_etpl');
        $eml['fromname'] = isset($eml['fromname']) ? $eml['fromname'] : get_bloginfo('name');
        $eml['frommail'] = isset($eml['frommail']) ? $eml['frommail'] : get_bloginfo('admin_email');
        $eml['subject'] = isset($eml['subject']) ? $eml['subject'] : 'Download ' . $file['post_title'];

        $headers = 'From: ' . $eml['fromname'] . ' <' . $eml['frommail'] . '>' . "\r\nContent-type: text/html\r\n";

        $keys = array();
        foreach ($file as $fkey => $value) {
            $_key = "[$fkey]";
            $tdata[$_key] = $value;
        }
        $tdata["[site_url]"] = home_url('/');
        $tdata["[site_name]"] = get_bloginfo('sitename');
        $tdata["[download_url]"] = $file['download_url'];
        $tdata["unsaved:///"] = "";
        $tdata["[date]"] = date(get_option('date_format'), time());

        $message = $eml['body'];

        foreach ($tdata as $skey => $svalue) {
            if(!is_array($svalue)) {
                $message = str_replace(strval($skey), strval($svalue), $message);
                $eml['subject'] = str_replace(strval($skey), strval($svalue), $eml['subject']);
            }
        }

        //do something before sending download link
        do_action("wpdm_before_email_download_link", $_POST, $file);

        $message = str_replace('[#message#]',stripslashes($message), file_get_contents(wpdm_tpl_path('html-frame.html',WPDM_BASE_DIR.'email-templates/')));
        wp_mail($email, stripcslashes($eml['subject']), stripcslashes($message), $headers);
    }

    function show_download_button($message, $status = null, $extra = null){
        if(!isset($_POST['after_submit_wpdm'])) return $message;
        $key = uniqid();
        update_post_meta($_POST['after_submit_wpdm'], "__wpdmkey_".$key, 3);
        if(isset($_POST['after_submit_wpdm'])) {
            $file = array('ID' => $_POST['after_submit_wpdm']);
            $_SESSION['_wpdm_unlocked_'.$_POST['after_submit_wpdm']] = 1;
            $download_url = wpdm_download_url($file, "_wpdmkey={$key}");
            $link_label = get_post_meta($_POST['after_submit_wpdm'], '__wpdm_link_label', true);
            $link_label = $link_label ? $link_label : 'Download';
            $email_link = get_post_meta($_POST['after_submit_wpdm'],'__wpdm_form_lock_email_downlad_link', true);
            if(!$email_link)
                $message .= "<hr style='margin: 10px 0'/><a class='btn btn-success' href='{$download_url}'><i class='fa fa-downlaod'></i> " . $link_label . "</a>";
            else {
                $file['download_url'] = $download_url;
                $file['post_title'] = get_the_title($file['ID']);
                $this->findEmail($_POST, $emails);
                $this->email_link($emails, $file);
            }
        }
        return "<div style='padding: 10px;'>".$message."</div>";
    }

    function show_download_button_cf7($items, $result){
        if($items['mailSent']){
            $key = uniqid();
            update_post_meta($_POST['after_submit_wpdm'], "__wpdmkey_".$key, 3);
            if(isset($_POST['after_submit_wpdm'])) {
                $file = array('ID' => $_POST['after_submit_wpdm']);
                $_SESSION['_wpdm_unlocked_'.$_POST['after_submit_wpdm']] = 1;
                $download_url = wpdm_download_url($file, "_wpdmkey={$key}");
                $link_label = get_post_meta($_POST['after_submit_wpdm'], '__wpdm_link_label', true);
                $link_label = $link_label ? $link_label : 'Download';
                $email_link = get_post_meta($_POST['after_submit_wpdm'],'__wpdm_form_lock_email_downlad_link', true);
                if(!$email_link)
                    $items['message'] .= "<hr style='margin: 10px 0'/><a class='btn btn-success' href='{$download_url}'><i class='fa fa-downlaod'></i> " . $link_label . "</a>";
                else {
                    $file['download_url'] = $download_url;
                    $file['post_title'] = get_the_title($file['ID']);
                    $this->findEmail($_POST, $emails);
                    $this->email_link($emails, $file);
                }
            }
        }

        return $items;

    }

    function findEmail($data, &$emails){
        foreach($data as $val) {
            if (is_array($val))
                $this->findEmail($val, $emails);
            else if(is_email($val))
                $emails[] = $val;
        }

    }

    function gform_pre_render($form){
        foreach ( $form['fields'] as &$field ) {
            if ( trim($field->defaultValue) == '[wpdm_package_id]' ) {
                if(get_option('__wpdm_gf_'.$form['id'].'_fieldid', 0) != $field->id)
                update_option('__wpdm_gf_'.$form['id'].'_fieldid', $field->id);
                return $form;
            }
        }

        return $form;
    }

    function after_submit_gravityform($message, $form, $entry, $ajax){
        $key = uniqid();
        $field_id = get_option('__wpdm_gf_'.$form['id'].'_fieldid');
        $field_name = 'input_'.$field_id;
        if(!isset($_POST[$field_name])) return $message;
        $pid = $_POST[$field_name];
        update_post_meta($pid, "__wpdmkey_".$key, 3);
        if(isset($_POST[$field_name])) {
            $file = array('ID' => $pid);
            $_SESSION['_wpdm_unlocked_'.$pid] = 1;
            $download_url = wpdm_download_url($file, "_wpdmkey={$key}");
            $link_label = get_post_meta($pid, '__wpdm_link_label', true);
            $link_label = $link_label ? $link_label : 'Download';

            $email_link = get_post_meta($pid,'__wpdm_form_lock_email_downlad_link', true);
            if(!$email_link)
                $message .= "<hr style='margin: 10px 0'/><a class='btn btn-success' href='{$download_url}'><i class='fa fa-downlaod'></i> " . $link_label . "</a>";
            else {
                $file['download_url'] = $download_url;
                $file['post_title'] = get_the_title($file['ID']);
                $this->findEmail($_POST, $emails);
                $this->email_link($emails, $file);
            }
        }
        return $message;
    }


    function lock_settings($post = null)
    {
        $id = is_object($post)?$post->ID:null;
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        $formplugin = array();

        ?>
        <div class="panel panel-default">
        <h3 class="panel-heading"><label><input type="checkbox" rel="form_lock" class="wpdmlock" name="file[form_lock]" <?php if (get_post_meta($id, '__wpdm_form_lock', true) == '1') echo "checked=checked"; ?> value="1"><?php echo __('Enable Form Lock', 'wpdmpro'); ?></label></h3>
        <div id="form_lock" class="formlock fwpdmlock panel-body"  <?php if (get_post_meta($id, '__wpdm_form_lock', true) != '1') echo "style='display:none'"; ?> >


            <div class="form-group">
            Select From: <br/>
            <select id="fl" class="chzn-select" name="file[form_id]" style="min-width: 250px;width: 300px;">
                <?php if(is_plugin_active( 'liveforms/liveforms.php' )){ ?>
                <optgroup label="Live Forms">
                <?php
                $forms = get_posts('post_type=form&posts_per_page=1000');

                foreach ($forms as $form) {

                    // foreach($res as $row){
                    ?>

                    <option value="liveforms|<?php echo $form->ID; ?>" <?php if (get_post_meta(get_the_ID(), '__wpdm_form_id', true) == 'liveforms|'.$form->ID) echo "selected=selected"; ?> ><?php echo $form->post_title; ?></option>


                <?php

                }

                ?>
                </optgroup>
                <?php  } ?>
                <?php if(is_plugin_active( 'gravityforms/gravityforms.php' )){ ?>
                    <optgroup label="Gravity Forms">
                        <?php
                        $forms = GFAPI::get_forms();

                        foreach ($forms as $form) {
                            ?>

                            <option value="gravityforms|<?php echo $form['id']; ?>" <?php if (get_post_meta(get_the_ID(), '__wpdm_form_id', true) == 'gravityforms|'.$form['id']) echo "selected=selected"; ?> ><?php echo $form['title']; ?></option>


                            <?php

                        }

                        ?>
                    </optgroup>
                <?php  } ?>
                <?php if(is_plugin_active( 'contact-form-7/wp-contact-form-7.php' )){ ?>
                    <optgroup label="Contact Form 7">
                        <?php
                        $forms = get_posts('post_type=wpcf7_contact_form&posts_per_page=1000');

                        foreach ($forms as $form) {
                            ?>

                            <option value="contactform7|<?php echo $form->ID; ?>" <?php if (get_post_meta(get_the_ID(), '__wpdm_form_id', true) == 'contactform7|'.$form->ID) echo "selected=selected"; ?> ><?php echo $form->post_title; ?></option>


                            <?php

                        }

                        ?>
                    </optgroup>
                <?php  } ?>
                <?php do_action('wpdm_form_lock_dropdown'); ?>
            </select>
            </div>
            <div class="form-group">
            <label><input type="hidden" value="0" name="file[form_lock_email_downlad_link]" /><input type="checkbox" name="file[form_lock_email_downlad_link]" value="1" <?php checked(1, get_post_meta(get_the_ID(),'__wpdm_form_lock_email_downlad_link', true)); ?> /> Email Download Link</label>
            </div>
            <style>#fl_chosen{ width: 300px !important; }</style>


        </div>
        </div>

    <?php
    }

    function ninja_forms_dropdown(){
        if(!is_plugin_active( 'ninja-forms/ninja-forms.php' )) return;
        ?>

        <optgroup label="Ninja Forms">

            <?php
            $forms = Ninja_Forms()->forms()->get_all();

            foreach ($forms as $form_id) {
                $form = Ninja_Forms()->form( $form_id )->get_all_settings();
                ?>

                <option value="ninjaforms|<?php echo $form_id; ?>" <?php if (get_post_meta(get_the_ID(), '__wpdm_form_id', true) == 'ninjaforms|'.$form_id) echo "selected=selected"; ?> ><?php echo $form['form_title']; ?></option>


                <?php

            }

            ?>
        </optgroup>

        <?php
    }

    function formidable_dropdown(){
        global $wpdb;
        if(!is_plugin_active( 'formidable/formidable.php' )) return;
        ?>

        <optgroup label="Formidable Forms">

            <?php
            $forms = $wpdb->get_results("select * from {$wpdb->prefix}frm_forms where is_template=0");
            foreach ($forms as $form) {
                ?>

                <option value="formidable|<?php echo $form->id; ?>" <?php if (get_post_meta(get_the_ID(), '__wpdm_form_id', true) == 'formidable|'.$form->id) echo "selected=selected"; ?> ><?php echo $form->name; ?></option>


                <?php

            }

            ?>
        </optgroup>

        <?php
    }




}

new WPDM_FormLock();