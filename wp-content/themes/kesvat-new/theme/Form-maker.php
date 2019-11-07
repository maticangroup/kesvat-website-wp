<?php

/**
 * Created by PhpStorm.
 * User: amirhossein
 * Date: 11/10/16
 * Time: 2:39 PM
 */
function CreateForm($postType, $formName)
{
    $formToPrint = "";

    $post_type = theme_field('post_types', 'options');
    foreach ($post_type as $item) {
        if ($item['name'] == $postType) {
            foreach ($item['forms'] as $form) {
                if ($form['form_name'] == $formName) {
                    if ($form['form_has_wrapper'] == true) {
                        $formToPrint .= "<" . $form['form_wrapper_element'] . " class=\"" . $form['form_wrapper_class'] . "\" >";
                    }
                    $formToPrint .= "<form id=\"$formName\" method=\"post\" action=\"#\">";
                    foreach ($form['inputs'] as $input) {

                        if ($input['acf_fc_layout'] == 'text_input') {
                            if ($input['has_wrapper'] == true) {
                                $formToPrint .= "<" . $input['wrapper'] . " class=\"" . $input['wrapper_class'] . "\" >";
                            }
                            $formToPrint .= " <input type = 'text' placeholder = '" . $input['placeholder'] . "' name = '" . $input['name'] . "' > ";
                            if ($input['has_wrapper'] == true) {
                                $formToPrint .= "</" . $input['wrapper'] . ">";
                            }
                        }

                        if ($input['acf_fc_layout'] == 'textarea_input') {
                            $formToPrint .= " <textarea placeholder = '" . $input['placeholder'] . "'  name = '" . $input['name'] . "' ></textarea > ";
                        }
                    }
                    $formToPrint .= "</form > ";
                    if ($form['form_has_wrapper'] == true) {
                        $formToPrint .= "</" . $form['form_wrapper_element'] . ">";
                    }
                }
            }
        }
    }

    return $formToPrint;
}
