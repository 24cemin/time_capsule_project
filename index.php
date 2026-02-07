<?php

session_start();

require_once 'config/database.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/CapsuleController.php';
require_once 'controllers/SiteCommentController.php';
require_once 'controllers/HomeController.php';

$action = $_GET['page'] ?? 'home';

switch ($action) {
    case 'login':
        (new AuthController())->showLoginForm();
        break;
    case 'login_submit':
        (new AuthController())->login();
        break;
    case 'register':
        (new AuthController())->showRegisterForm();
        break;
    case 'register_submit':
        (new AuthController())->register();
        break;
    case 'logout':
        (new AuthController())->logout();
        break;
    case 'create_capsule':
        (new CapsuleController())->showCreateForm();
        break;
    case 'store_capsule':
        (new CapsuleController())->store();
        break;
    case 'view_capsule':
        (new CapsuleController())->viewCapsule($_GET['id'] ?? null);
        break;
    case 'check_password':
        (new CapsuleController())->checkPassword($_GET['id'] ?? null);
        break;
    case 'future_capsules':
        (new CapsuleController())->listFuture();
        break;
    case 'site_comments':
        (new SiteCommentController())->showComments();
        break;
    case 'submit_comment':
        (new SiteCommentController())->submitComment();
        break;
    case 'home':
        (new HomeController())->showHome();
        break;
    case 'open_capsules':
        (new CapsuleController())->listOpened();
        break;
        
    default:
        (new CapsuleController())->listOpened();
        break;
}
