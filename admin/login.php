<?php
include './includes/conn.php';

session_start();

if (isset ($_SESSION['ad_id'])) {
    header('Location:index.php');
    exit(); // Ensure script stops here to prevent further execution
}

$msg = "";

if (isset ($_POST['submit'])) {
    $email = $_POST['ad_email'];
    $pass = $_POST['ad_pass'];
    $data = "SELECT * FROM admin WHERE ad_email= '$email' AND ad_password = '$pass'";
    $sql = mysqli_query($con, $data);
    $row = mysqli_fetch_array($sql);
    if (is_array($row)) {
        $_SESSION['ad_id'] = $row['ad_id'];
        header("Location:index.php");
        exit(); // Ensure script stops here to prevent further execution
    } else {
        $msg = "Invalid Email or Password";
    }
}
date_default_timezone_set('Asia/Kolkata');
$today = date("D d M Y");

$settings = mysqli_query($con, "SELECT * FROM settings where id='1'");
$roww = mysqli_fetch_array($settings);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>MS Glyph - Blueprint Management System</title>
    <meta content="Blueprint Management System | Authorized Access Only" name="description">
    <meta content="MS Glyph" name="author">
    <link rel="shortcut icon" href="<?php echo $domain ?? ''; ?>admin/assets/images/<?php echo htmlspecialchars($roww['favicon_logo'] ?? ''); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --charcoal: #121212;
            --navy: #0a192f;
            --slate: #1e293b;
            --slate-light: #334155;
            --electric-blue: #0ea5e9;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: var(--charcoal);
            background-image: 
                linear-gradient(rgba(10, 25, 47, 0.85), rgba(10, 25, 47, 0.85)),
                linear-gradient(rgba(30, 41, 59, 0.5) 1px, transparent 1px),
                linear-gradient(90deg, rgba(30, 41, 59, 0.5) 1px, transparent 1px);
            background-size: 100% 100%, 40px 40px, 40px 40px;
            background-position: center center;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: var(--text-main);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 20px;
            box-sizing: border-box;
            z-index: 10;
        }

        .login-card {
            background-color: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--slate-light);
            border-radius: 8px;
            padding: 40px 30px;
            box-shadow: 0 0 30px rgba(14, 165, 233, 0.05), 0 10px 30px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--electric-blue), transparent);
        }

        .brand-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .brand-name {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin: 0 0 10px 0;
            color: var(--text-main);
        }

        .brand-tagline {
            font-size: 12px;
            color: var(--text-muted);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin: 0;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            color: var(--text-muted);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            width: 100%;
            background-color: var(--charcoal);
            border: 1px solid var(--slate-light);
            color: var(--text-main);
            padding: 12px 15px;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
            transition: all 0.3s ease;
            outline: none;
            font-family: 'Inter', sans-serif;
        }

        .form-control:focus {
            border-color: var(--electric-blue);
            box-shadow: 0 0 0 1px var(--electric-blue);
        }

        .form-control::placeholder {
            color: #475569;
        }

        .btn-submit {
            width: 100%;
            background-color: var(--navy);
            color: #ffffff;
            border: 1px solid var(--navy);
            padding: 14px;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            font-family: 'Inter', sans-serif;
        }

        .btn-submit:hover {
            border: 1px solid var(--electric-blue);
            box-shadow: 0 0 15px rgba(14, 165, 233, 0.2);
            background-color: var(--navy);
        }

        .error-msg {
            background-color: rgba(220, 38, 38, 0.1);
            border: 1px solid rgba(220, 38, 38, 0.3);
            color: #ef4444;
            padding: 10px;
            border-radius: 4px;
            font-size: 13px;
            text-align: center;
            margin-bottom: 20px;
        }

        .login-footer {
            text-align: center;
            margin-top: 30px;
            font-size: 11px;
            color: var(--text-muted);
            letter-spacing: 0.5px;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="brand-header">
                <h1 class="brand-name">MS Glyph</h1>
                <p class="brand-tagline">Blueprint Management System<br>Authorized Access Only</p>
            </div>

            <?php if (!empty($msg)) { ?>
                <div class="error-msg"><?php echo htmlspecialchars($msg); ?></div>
            <?php } ?>

            <form method="post">
                <div class="form-group">
                    <label class="form-label">Authorized Email</label>
                    <input class="form-control" name="ad_email" type="email" required placeholder="Enter Identity">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Security Key</label>
                    <input class="form-control" name="ad_pass" type="password" required placeholder="Access Credentials">
                </div>
                
                <button class="btn-submit" type="submit" name="submit">Login</button>
            </form>

            <div class="login-footer">
                &copy; 2026 MS Glyph | Secured Execution Arm.
            </div>
        </div>
    </div>
</body>

</html>