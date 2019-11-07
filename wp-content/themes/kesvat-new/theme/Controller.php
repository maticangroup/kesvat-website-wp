<?php

namespace Theme;
require 'lib/vendor/google/recaptcha/src/autoload.php';
require 'lib/RestClient.php';

use ReCaptcha\ReCaptcha;
use ReCaptcha\RequestMethod\Post;
use Theme\Lib\Input;
use Theme\Lib\Validation;

class Controller
{
    protected $messages = array();

    public function __construct()
    {
        $this->messages = array(
            'name' => '{field} ' . pll__('is_require'),
            'email' => '{field} ' . pll__('is_invalid'),
            'phone' => '{field} ' . pll__('is_invalid'),
            'message' => '{field} ' . pll__('is_require'),
            'required' => '{field} ' . pll__('is_require'),
            'maxLength' => '{field} ' . pll__('is_long'),
            'integer' => '{field} ' . pll__('is_int'),
            'in' => '{field} ' . pll__('is_value'),
            'g-recaptcha-response' => __('{field}' . pll__('is_require')),
        );
    }

    public function actionContactForm()
    {
        $in = new Input();
        $v = new Validation();
        $inputs = $in->choose(array('f_name', 'l_name', 'email', 'phone', 'message', 'g-recaptcha-response', '_token'));
        $rules = array(
            'f_name' => array('required', 'maxLength:80'),
            'l_name' => array('required', 'maxLength:80'),
            'email' => array('required', 'maxLength:40', 'email'),
            'phone' => array('required', 'maxLength:20', 'phone'),
            'message' => array('required', 'maxLength:1000'),
            'g-recaptcha-response' => array('required'),
            '_token' => array('required')
        );
        $labels = array(
            'f_name' => pll__('form_first_name'),
            'l_name' => pll__('form_last_name'),
            'email' => pll__('form_email'),
            'phone' => pll__('form_phone'),
            'message' => pll__('form_message'),
            'g-recaptcha-response' => pll__('form_recaptcha'),
        );

        $recaptcha = new ReCaptcha(theme_field('recaptcha_secret_key', 'options'));
        $resp = $recaptcha->verify($inputs['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
        $v->setMessage($this->messages);
        if (empty($inputs['_token']) || !wp_verify_nonce($inputs['_token'], 'contact-form')) {
            wp_send_json(array(
                'success' => false,
                'code' => 2
            ));
        }
        $v->validate($inputs, $rules, $labels);
        if ($v->fails()) {
            $errors = $v->errors();
            if (isset($errors['email'])) {
                if (count($errors['email']) >= 2) {
                    unset($errors['email'][1]);
                }
            }
            wp_send_json(array(
                'success' => false,
                'errors' => $errors,
                'code' => 1
            ));
        }

        if (!$resp->isSuccess()) {
            wp_send_json(array(
                'success' => false,
                'errors' => $v->errors(),
                'code' => 1
            ));
        } else {
            $adminEmail = theme_field("website_email", pll__('contact_page_id'));
            $emailTemplate = theme_field("email_template", pll__('contact_page_id'));
            $emailFrom = theme_field("email_from", pll__('contact_page_id'));
            $placedEmail = $emailTemplate;

            $placedEmail = str_replace("{first_name}", $inputs['f_name'], $placedEmail);
            $placedEmail = str_replace("{last_name}", $inputs['l_name'], $placedEmail);
            $placedEmail = str_replace("{email}", $inputs['email'], $placedEmail);
            $placedEmail = str_replace("{phone}", $inputs['phone'], $placedEmail);
            $placedEmail = str_replace("{message}", $inputs['message'], $placedEmail);
            $placedEmail = str_replace("{website}", get_bloginfo('name'), $placedEmail);
            wp_insert_post(array(
                'post_title' => $inputs['f_name'] . " " .$inputs['l_name'] . " - " . $inputs['email'],
                'post_content' => $placedEmail,
                'post_type' => 'contact-form',
                'post_status' => 'private',
                'post_author' => 1
            ));
            $headers[] = "Content-type: text/html; harset=iso-8859-1" . "\r\n";
            $headers[] = "From: " . $emailFrom . " <no-reply@" . $_SERVER['SERVER_NAME'] . ">";
            $headers[] = "MIME-Version: 1.0" . "\r\n";
            //Admin email
            wp_mail($adminEmail, $inputs['f_name'] . " - " . $inputs['email'], $placedEmail, $headers);

            wp_send_json(array(
                'success' => true,
                'message' => pll__('is_success')
            ));
        }
    }


    public function actionSubscribeForm()
    {
        $in = new Input();
        $v = new Validation();
        $inputs = $in->choose(array('email' , '_token'));
        $rules = array(
            'email' => array('required', 'maxLength:40', 'email'),
//            'g-recaptcha-response' => array('required'),
            '_token' => array('required')
        );
        $labels = array(
            'email' => pll__('form_email'),
//            'g-recaptcha-response' => pll__('form_recaptcha'),
        );

//        $recaptcha = new ReCaptcha(theme_field('recaptcha_secret_key', 'options'));
//        $resp = $recaptcha->verify($inputs['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
        $v->setMessage($this->messages);
        if (empty($inputs['_token']) || !wp_verify_nonce($inputs['_token'], 'subscribe-form')) {
            wp_send_json(array(
                'success' => false,
                'code' => 2
            ));
        }
        $v->validate($inputs, $rules, $labels);
        if ($v->fails()) {
            $errors = $v->errors();
            if (isset($errors['email'])) {
                if (count($errors['email']) >= 2) {
                    unset($errors['email'][1]);
                }
            }
            wp_send_json(array(
                'success' => false,
                'errors' => $errors,
                'code' => 1
            ));
        }

//        if (!$resp->isSuccess()) {
//            wp_send_json(array(
//                'success' => false,
//                'errors' => $v->errors(),
//                'code' => 1
//            ));
//        }
        else {

            $emailTemplate = theme_field("subscribe_template", pll__('contact_page_id'));
            $placedEmail = $emailTemplate;
            $placedEmail = str_replace("{email}", $inputs['email'], $placedEmail);


            $placedEmail = str_replace("{website}", get_bloginfo('name'), $placedEmail);
            wp_insert_post(array(
                'post_title' => $inputs['email'],
                'post_content' => $placedEmail,
                'post_type' => 'subscribe',
                'post_status' => 'private',
                'post_author' => 1
            ));

            wp_send_json(array(
                'success' => true,
                'message' => pll__('is_success')
            ));
        }
    }

}