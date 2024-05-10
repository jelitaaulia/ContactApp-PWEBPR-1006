<?php
require_once 'model/contact_model.php';

class ContactController {

    public static function show(){
        return view('contact_page/index');
    }

    public static function add() {
        // session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login?auth=false');
            exit;
        }
        view('contact_page/add'); 
    }

    public static function saveAdd() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login?auth=false');
            exit;
        }

        $post = array_map('htmlspecialchars', $_POST); 
        $phone_number = $post['phone_number'];
        $owner = $post['owner'];

        $inserted = Contact::insert($phone_number, $owner);

        if ($inserted) {
            header('Location: ' . BASEURL . '/dashboard/contacts'); 
        } else {
            header('Location: ' . BASEURL . '/contacts/add?error=addFailed');
        }
    }

    public static function edit($id) {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login?auth=false');
            exit;
        }

        $contact = Contact::select($id); 
        view('contact_page/edit', ['contact' => $contact]); 

    public static function saveEdit($id) {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login?auth=false');
            exit;
        }

        $post = array_map('htmlspecialchars', $_POST);
        $contact = Contact::update([
            'id' => $id,
            'phone_number' => $post['phone_number'],
            'owner' => $post['owner']
        ]);

        if ($contact) {
            header('Location: ' . BASEURL . '/dashboard/contacts'); 
        } else {
            header('Location: ' . BASEURL . '/contacts/edit?id=' . $id . '&editFailed=true');
        }
    }

    public static function delete($id) {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login?auth=false');
            exit;
        }

        $contact = Contact::delete($id); 
        if ($contact) {
            header('Location: ' . BASEURL . '/dashboard/contacts'); 
        } else {
            header('Location: ' . BASEURL . '/dashboard/contacts?removeFailed=true');
            }
        }
    }
}