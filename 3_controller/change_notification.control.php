<?php

include_once "1_models/users.model.php";
include_once "2_view/change_notification.view.php";


function display_checkbox_status()
{
    $user_id = $_SESSION['id'];
    $notification = get_notifications_status($user_id);
    $status = $notification['notifications'];
    if (intval($status) == 1)
        return 'checked';
    else
        return '';
}

function notify($user_id, $login, $checkbox)
{
    if (empty($login) || empty($checkbox))
    {
        echo 'something went wrong';
        return FALSE;
    }

    $user = get_user_by_login($login);
    if (!($user))
    {
        login_user_not_found();
        return FALSE;
    }

    if ($checkbox == 'notify')
    {
        if (notifications_on($user_id))
        {
            notification_enabled();
            return TRUE;
        }
    }

    if ($checkbox == 'not_notify')
    {
        if (notifications_off($user_id))
        {
            notification_disabled();
            return TRUE;
        }
    }

    return FALSE;
}

//function login($old_login, $new_login, $passwd)
//{
//
//    if (empty($new_login) || empty($passwd))
//    {
//        login_input();
//        return FALSE;
//    }
//
//    $user = get_user_by_login($old_login);
//    if (!($user))
//    {
//        login_user_not_found();
//        return FALSE;
//    }
//
//    if (get_user_by_login($new_login))
//    {
//        login_already_exists();
//        return FALSE;
//    }
//
//    if (!(auth_user($user, $passwd)))
//    {
//        login_wrong_passwd();
//        return FALSE;
//    }
//
//    if ($new_login == $old_login)
//    {
//        same_login();
//        return FALSE;
//    }
//
//    if (!(change_login($old_login, $new_login)))
//    {
//        login_sql_error();
//        return FALSE;
//    }
//
//    change_login_ok();
//    $_SESSION['user'] = $new_login;
//    return TRUE;
//}

if (array_key_exists('notifications_submit', $_POST) && $_POST['notifications_submit'] === "OK")
{
    $login = $_SESSION['user'];
    $user_id = $_SESSION['id'];
    $checkbox = $_POST['notification_check'];
    notify($user_id, $login, $checkbox);
}

if (isset($_SESSION['user']))
{
    $is_checked = display_checkbox_status();
    show_notification($is_checked);
}

else if (empty($_SESSION['user']))
{
    header('Location: index.php');
}

?>
