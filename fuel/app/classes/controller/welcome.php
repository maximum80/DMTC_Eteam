<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller
{
   public function action_index()
    {
        $error = null;

        $view = View::forge('welcome/index');
        $form = Fieldset::forge();

        $form->add('email', 'メールアドレス', array('maxlength' => 40))
            ->add_rule('required');

        $form->add('password', 'パスワード', array('type' => 'password'))
            ->add_rule('required')
            ->add_rule('max_length', 16);

        $form->add('submit', '', array('type' => 'submit', 'value' => 'ログイン'));
        $form->repopulate();

        $auth = Auth::instance();

        if (Input::post()) {
            if ($form->validation()->run()) {
                if ($auth->login(Input::post('email'), Input::post('password'))) {
                    // ログイン成功時
                    Response::redirect('mypage/index');
                }
                $error = 'ログイン失敗に失敗しました';
            } else {
                $error = 'ログイン失敗に失敗しました';
            }
        }

        $view->set_safe('form', $form->build(Uri::create('')));
        $view->set('error', $error);

        return $view;
    }


	public function action_404()
	{
		return Response::forge(ViewModel::forge('welcome/404'), 404);
	}
}
