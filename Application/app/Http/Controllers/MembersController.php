<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Member;

class MembersController extends Controller
{
    public function indexSetup () {
        $members = Member::latest()->get();
        return view('set_up')->with('members', $members);
    }

    /**
     * 会員登録
     * @param Request name
     * @param Request e_mail
     * @param Request student_number
     * @param Request password
     */
    public function setUp (Request $request) {
        if (isset($request)) {
            $instance = array();
            $instance['name'] = $request->input('name');
            $instance['e-mail'] = $request->input('e-mail');
            $instance['studentNumber'] = $request->input('student_number');
            $instance['password'] = $request->input('password');
            $instance['image'] = $request->file('image');

            DB::beginTransaction();
            try {
                if (isset($instance['image'])) {
                    $image = self::createImage($instance['image'], $instance['image']);
                    self::createMember($instance['name'], $instance['e-mail'], $instance['studentNumber'], $instance['password'], $image['name'], $image['path']);
                } else {
                    self::createMember($instance['name'], $instance['e-mail'], $instance['studentNumber'], $instance['password']);
                }
                DB::commit();
                return view('is_set_up')->with('is_done', true);
            } catch (\Exception $e) {
                DB::rollback();
            }
        }
        return view('is_set_up')->with('is_done', null);
    }

    /**
     * ログイン
     * @param Request e-mail
     * @param Request password
     */
    public function logIn (Request $request) {
        $e_mail   = $request->input('e-mail');
        $password = $request->input('password');
        $member   = Member::where('e-mail', $e_mail)->first();

        if (isset($member)) {
            if ($password == $member['password']) {
                return redirect()->route('index_member_id', ['member_id' => $member['id']]);
            } else {
                return view('log_in')->with('not_password', true);
            }
        } else {
            return view('log_in')->with('not_member', true);
        }
    }

    /**
     * 画像ファイル名、パスの生成
     * @param File image
     * @param String name
     * @return Array result
     */
    public function createImage ($image, $name) {
        $result         = array();
        $result['path'] = 'storage/img/members/';
        $result['name'] = $name;

        $image->storeAs('public/img/members', $result['name']);

        return $result;
    }

    /**
     * 会員の生成
     * @param String name
     * @param String e-mail
     * @param Integer studentNumber
     * @param String password
     * @param String imgName
     * @param String imgPath
     */
    public function createMember ($name, $e_mail, $studentNumber, $password, $imgName = NULL, $imgPath = NULL) {
        $rate = (int) $studentNumber;
        $instance = new Member;
        $instance->create([
            'name'           => $name,
            'e-mail'         => $e_mail,
            'studentNumber'  => $studentNumber,
            'password'       => $password,
            'img_name'       => $imgName,
            'img_path'       => $imgPath
        ]);
    }
}
