<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Yuichi
 * Date: 8/2/13
 * Time: 6:42 AM
 * To change this template use File | Settings | File Templates.
 */

class Controller_Main extends Controller
{
    public $header = null;
    public $body_header = null;
    public $footer = null;
    public $auth_status = false;
	public $auth = null;
	public $user_id = null;
	public $name = null;

	public $picture_path = null;

    public function before(){


		$this->picture_path = DOCROOT."assets/img/pictures/";

		$this->auth = Auth::instance();

		// logout
		if((int)Input::get("logout", null) === 1){
			$this->auth->logout();
			Response::redirect(Config::get('language').'/');
		}

		// login
		if(Input::post("signin", null) !== null){
			$email = Input::post('email', null);
			$password = Input::post('password', null);
			if($this->auth->login( $email, $password)){
                $lang = $this->auth->get('language');
				if($lang === 0){
					$lang = "ja";
				}else if($lang == null){
					$languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
					$languages = array_reverse($languages);

					foreach($languages as $language){
						if(preg_match('/^ja/i', $language)){
							$lang = 'ja';
						}else{
							$lang = 'en';
						}
					}
				}else{
					$lang = "en";
				}
				Response::redirect($lang.'/mypage/');
			}else{
				Response::redirect(Config::get('language').'/signin/?error=1');
			}
		}
		// check login
		if(Auth::check()){
			$this->auth_status = true;
			$this->user_id = $this->auth->get_user_id();
			$this->user_id = $this->user_id[1];
			$this->name = $this->auth->get_screen_name();
		}

		$prof = $this->auth->get_profile_fields();

		if($this->auth_status){
			if($prof["img"] === ""){
				$prof["img"] = "no_img.png";
			}
			$prof["name"] = $this->name;
			$class = Model_Class::find($prof["class_id"]);
			$prof["class_img"] = $class->img;
		}
		$this->header = View::forge('header');

		$this->body_header = View::forge('body_header', $prof);
		$this->body_header->set("auth_status", $this->auth_status);

		$this->footer = View::forge('footer');
    }


	public function setHeaderValues($title, $css, $js){
		if($title !== ""){
			$title = $title . " | ";
		}
		$this->header->set("title", $title);
		$this->header->set("css", $css);
		$this->header->set("js", $js);
	}

	public function setBookHeaderValues($title, $css, $js, $id, $body, $img){
		$this->header = View::forge('header_for_book');
		if($title !== ""){
			$title = $title . " | ";
		}
		$this->header->set("title", $title);
		$this->header->set("css", $css);
		$this->header->set("js", $js);
		$this->header->set("id", $id);
		$this->header->set("body", $body);
		$this->header->set("img", $img);
	}


	public function getPastTime($time){
		$gap = time() - $time;

		$text = "";
		if(Config::get('locale') === "ja_JP"){
			switch($gap){
				case $gap <= 60:
					$text = "1分以内";
					break;
				case $gap <= 3600:
					$text = round($gap/60) . "分前";
					break;
				case $gap <= 3600 * 24:
					$text = round($gap/3600) . "時間前";
					break;
				case $gap >= 3600 * 24:
					$text = round($gap/(3600 * 24)) . "日前";
					break;
			}
		}else{
			switch($gap){
				case $gap <= 60:
					$text = "less than 1min";
					break;
				case $gap <= 3600:
					$text = round($gap/60) . "min ago";
					break;
				case $gap <= 3600 * 24:
					$text = round($gap/3600) . " hours ago";
					break;
				case $gap >= 3600 * 24:
					$text = round($gap/(3600 * 24)) . " day ago";
					break;
			}
		}

		return $text;
	}

	public function setActivity($body,$type){
		if(Auth::check()){
			$activity = Model_Activity::forge();
			$activity->user_id = $this->user_id;
			$activity->type = $type;
			$activity->body = $body;
			$activity->save();
		}
	}

	public function createUser($name, $password, $email, $img){
		Auth::create_user($name, $password, $email,1,array("public_rank" => 1, "is_our_mail" => 1, "img" => $img, "point" => 0, "class_id" => 1, "is_available" => 1));
		$this->auth->login( $email, $password);

		// sendmail
		// send email

		$result = preg_match("/@facebook/", $email);
		if((int)$result === 1){
		}else{

			$sendmail = Email::forge("JIS");
			$sendmail->from("info@codeprep.jp","CODEPREP運営事務局");
			$sendmail->to($email);
			$sendmail->subject("ご登録ありがとうございます");

			$email_body = View::forge("mail/signup");
			$email_body->set("name", $name);
			$sendmail->body($email_body);

			$sendmail->send();
		}
		// create first books
		$this->user_id = $this->auth->get_user_id();
		$this->user_id = $this->user_id[1];

		$clear = Model_Clearbook::forge();
		$clear->user_id = $this->user_id;
		$clear->book_id = 1;
		$clear->percent = 0;
		$clear->is_bonus = 0;
		$clear->save();

		$clear = Model_Clearbook::forge();
		$clear->user_id = $this->user_id;
		$clear->book_id = 2;
		$clear->percent = 0;
		$clear->is_bonus = 0;
		$clear->save();

		$clear = Model_Clearbook::forge();
		$clear->user_id = $this->user_id;
		$clear->book_id = 3;
		$clear->percent = 0;
		$clear->is_bonus = 0;
		$clear->save();

		// add friends
		$users = Model_User::find("all",array(
			'where' => array(
				//array('group_id', 100),
				array('id', 42),
			),
			"order by" => array(
			),
		));
		foreach($users as $user){
			$prof = unserialize($user->profile_fields);

			if((int)$prof['is_available'] === 1){
				$req = Model_Friend::forge();
				$req->user_id = $this->user_id;
				$req->friend_id = $user->id;
				$req->is_accept = 1;
				$req->is_available = 1;
				$req->save();

				$req = Model_Friend::forge();
				$req->user_id = $user->id;
				$req->friend_id = $this->user_id;
				$req->is_accept = 1;
				$req->is_available = 1;
				$req->save();
			}
		}
	}
}
