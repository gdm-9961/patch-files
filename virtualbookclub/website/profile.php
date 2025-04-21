<?php
    define('IN_PHPBB', true);
    $phpbb_root_path = '../';
    $phpEx = substr(strrchr(__FILE__, '.'), 1);
    include($phpbb_root_path . 'common.' . $phpEx);
    $user->session_begin();
    $auth->acl($user->data);
    $user->setup();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="sidebar">
        <a href="home.html"><i class="fa fa-home"></i><span> Home</span></a>
        <a href="my-clubs.html"><i class="fa fa-book"></i><span> My Book Clubs</span></a>
        <a href="schedule.html"><i class="fa fa-calendar"></i><span> Schedule</span></a>
    </div>

    <div class="main-content">
        <header>
            <div class="header-group">
                <input type="text" placeholder="Search" id="searchBar" class="search-bar" />
                <div class="icons">
                    <a href="notifications.html" class="top-icon"><i class="fa fa-bell icon"></i></a>
                    <a href="profile.html" class="top-icon"><i class="fa fa-user-circle icon"></i></a>
                </div>
            </div>
        </header>

        <div class="profile-container">
            <div class="profile-header">
                <h2 class="page-heading">Profile</h2>

                <?php if ($user->data['is_registered']) { ?>
                    <!-- Redirect to the phpBB profile edit page -->
                    <a href="<?php echo $phpbb_root_path; ?>ucp.php?i=ucp_profile&mode=reg_details" id="editBtn" class="edit-btn">
                        Edit <i class="fa fa-pencil edit-icon" style="color: #444;"></i>
                    </a>
                <?php } else { ?>
                    <!-- If not logged in, show login and register buttons -->
                    <button onclick="location.href='<?php echo $phpbb_root_path; ?>ucp.php?mode=login'" class="button" target="blank" >Login</button>
                    <button onclick="location.href='<?php echo $phpbb_root_path; ?>ucp.php?mode=register'" class="button" target="blank" >Register</button>
                <?php } ?>
            </div>

            <div id="profileDetails" class="profile-details">
                <?php if ($user->data['is_registered']) { ?>
                    <div class="profile-row">
                        <strong>Name</strong>
                        <span id="nameDisplay"><?php echo htmlspecialchars($user->data['username']); ?></span>
                        <input type="text" id="nameInput" value="<?php echo htmlspecialchars($user->data['username']); ?>" class="hidden" />
                    </div>
                    <div class="profile-row">
                        <strong>Email</strong>
                        <span id="emailDisplay"><?php echo htmlspecialchars($user->data['user_email']); ?></span>
                        <input type="email" id="emailInput" value="<?php echo htmlspecialchars($user->data['user_email']); ?>" class="hidden" />
                    </div>
                    <div class="profile-row">
                        <strong>Address</strong>
                        <span id="addressDisplay">
                            <?php echo isset($user->data['user_from']) ? htmlspecialchars($user->data['user_from']) : 'Not provided'; ?>
                        </span>

                        <textarea id="addressInput" class="hidden"><?php echo htmlspecialchars($user->data['user_from']); ?></textarea>
                    </div>
                    <div class="profile-row">
                      <strong>Member since</strong>
                      <span><?php echo date('M. j, Y', $user->data['user_regdate']); ?></span>
                    </div>

                <?php } else { ?>
                    <p>You are not logged in.</p>
                <?php } ?>
            </div>
        </div>

        <script src="script.js"></script>
    </div>

    <footer class="footer">
        <a href="about.html">About</a>
        <a href="faq.html">FAQ</a>
    </footer>
</body>
</html>



