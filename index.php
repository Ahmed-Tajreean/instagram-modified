<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <link rel="icon" type="image/x-icon" href="assets/img/Instagram_icon.png.webp">

    <!-- Css Linkup -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Bootstrap LinkUp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/@hiveio/hive-js/dist/hive.min.js"></script>
    <script>
        hive.api.setOptions({ url: 'https://anyx.io' });
        hive.config.set('address_prefix', 'STM');
        hive.config.set('chain_id', 'beeab0de00000000000000000000000000000000000000000000000000000000');
        hive.config.set('alternative_api_endpoints', ['https://api.hive.blog', 'https://anyx.io']);
    </script>

</head>

<body>

    <!-- Navbar Start -->
<!-- Navbar Start -->
<nav class="navbar">
        <div class="nav-wrapper">
            <img src="assets/img/logo.PNG" class="ins-img" alt="">

            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            </form>
            <div class="nav-items">
                <img src="assets/img/home.PNG" class="icon" alt="">
                <!-- <img src="assets/img/messenger.PNG" class="icon" alt=""> -->
                <img data-bs-toggle="modal" data-bs-target="#post-add-modal" src="assets/img/blockchain.png"
                    class="icon" alt="">
                <img data-bs-toggle="modal" data-bs-target="#post-add-modal1" src="assets/img/nadd.PNG" class="icon"
                    alt="">
                <!-- <img src="assets/img/explore.PNG" class="icon" alt=""> -->

                <img src="assets/img/like.png" class="icon" alt="">
                <a class="icon" href="logout.php"> <img src="assets/img/logout1.png" class="icon" alt=""> </a>
                <a class="icon" href="get.php"> <img src="assets/img/save-instagram.png" class="icon" alt=""> </a>
                <div class="dropdown icon user-profile" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Home</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><button class="dropdown-item theme-switcher">Toggle Dark/Light Theme</button></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <!-- Navbar End -->

    <!-- Story Section Start -->
    <section class="main">
        <div class="wrapper">
            <div class="left-col">
                <div class="status-wrapper">
                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/img/Rupam.jpg" alt=""></div>
                        <p class="username">Rupam_Ghosh</p>
                    </div>
                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/img/nafir2.jpg" alt=""></div>
                        <p class="username">naf1r_</p>
                    </div>
                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/img/Neha.jpg" alt=""></div>
                        <p class="username">naharika_anan</p>
                    </div>
                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/img/dristy.jpg" alt=""></div>
                        <p class="username">maybedristy</p>
                    </div>
                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/img/nafi.jpg" alt=""></div>
                        <p class="username">tahmin__rahman</p>
                    </div>
                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/img/Yuki.jpg" alt=""></div>
                        <p class="username">Yukiii</p>
                    </div>
                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/img/nadimvai.jpg" alt=""></div>
                        <p class="username">ismail_hoss...</p>
                    </div>
                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/img/oh achha.jpg" alt=""></div>
                        <p class="username">oh_achah...</p>
                    </div>
                </div>

                <!-- First Post -->
                <div class="all-post">

                </div>
            </div>
            <!-- Story Section End -->

            <!-- Sidebar Section Start -->
            <div class="right-col">
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="assets/img/Tajreean.jpg" alt="">
                    </div>
                    <div>
                        <p class="username">Tajreean_Ahmed</p>
                        <p class="sub-text">Tajreean Ahmed</p>
                    </div>
                    <button class="action-btn">switch</button>
                </div>
                <p class="suggestion-text">Suggestions for you</p>
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="assets/img/habibi.jpg" alt="">
                    </div>
                    <div>
                        <p class="username">Habibi</p>
                        <p class="sub-text">Followed by __hasnat_ali_siddique_</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="assets/img/pulp.jpg" alt="">
                    </div>
                    <div>
                        <p class="username">psychedelic_pulp</p>
                        <p class="sub-text">New to Instagram</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="assets/img/Ismam.jpg" alt="">
                    </div>
                    <div>
                        <p class="username">Nafis_Ismam</p>
                        <p class="sub-text">Followed by g.s.hasan + 2 more</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="assets/img/Rupam1.jpg" alt="">
                    </div>
                    <div>
                        <p class="username">ku_tu_sh</p>
                        <p class="sub-text">Followed by tasir.01 + 1 more</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="assets/img/mr.jpg" alt="">
                    </div>
                    <div>
                        <p class="username">m_r_bhuiyan726</p>
                        <p class="sub-text">Followed by md_alauddin_nepu</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>
            </div>

            <!-- Sidebar Section End -->
    </section>


        <!-- create Post Modal Start -->
        <div class="modal fade" id="post-add-modal" style="color:black;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Create Post</h2>
                    <hr>
                    <div class="msg"></div>
                    <div class="mb-3">
                        <input type="text" class="form-label form-control"  id="author" placeholder="Author" />
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-label form-control"  id="wif" placeholder="Private Posting Key" />
                    </div>
                    <div class="mb-3"> <input type="text" class="form-label form-control"  id="permlink" placeholder="Unique Permlink (e.g. post-title)" /> </div>
                    <div class="mb-3"> <input type="text" class="form-label form-control"  id="title" placeholder="Title" /></div>
                    <div class="mb-3"> <textarea placeholder="Content in Markdown or HTML" class="form-label form-control"  id='content'></textarea></div>
                    <div class="mb-3"> <input type="text" class="form-label form-control"  id="tag1"
                            placeholder="Tag 1 (Must start with a letter and end with letter or number)" /></div>
                    <div class="mb-3"> <input type="text" class="form-label form-control"  id="tag2"
                            placeholder="Tag 2 Must start with a letter and end with letter or number)" /></div>
                    <div class="mb-3"> <input type="text" class="form-label form-control"  id="tag3"
                            placeholder="Tag 3 (Must start with a letter and end with letter or number)" /></div>
                    <div class="mb-3"> <input type="text" class="form-label form-control"  id="tag4"
                            placeholder="Tag 4 (Must start with a letter and end with letter or number)" /></div>
                    <div class="mb-3"> <input type="text" class="form-label form-control"  id="tag5"
                            placeholder="Tag 5 (Must start with a letter and end with letter or number)" /></div>
                    <div>
                        <center><input type="button" value="PUBLISH" onClick='publish()' /></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function publish() {
            var wif = document.getElementById('wif').value;
            var blank = '';
            var firstTag = document.getElementById('tag1').value;
            var secondTag = document.getElementById('tag2').value;
            var thirdTag = document.getElementById('tag3').value;
            var fourthTag = document.getElementById('tag4').value;
            var fifthtag = document.getElementById('tag5').value;
            var author = document.getElementById('author').value;
            var permlink = document.getElementById('permlink').value;
            var title = document.getElementById('title').value;
            var content = document.getElementById('content').value;
            hive.broadcast.comment(
                wif,
                blank,
                firstTag,
                author,
                permlink,
                title,
                content,
                // json metadata (additional tags, app name)
                {
                    tags: [secondTag, thirdTag, fourthTag, fifthtag],
                    app: 'instagram/v1.0'
                },
                function (err, result) {
                    if (err)
                        alert('Error posting ' + err);
                    else
                        alert('Successfully posted');
                }
            );
        }
        const themeSwitcher = document.querySelector('.theme-switcher');

themeSwitcher.addEventListener('click', function() {
  document.body.classList.toggle('neon-theme');
});

    </script>
    <!-- create Post Modal End  -->
    <!-- create Post Modal Start -->
    <div class="modal fade" id="post-add-modal1" style="color:black;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Create Post</h2>
                    <hr>
                    <div class="msg"></div>
                    <form id="post_add_form">
                        <div class="my-3">
                            <label for="">Author Name</label>
                            <input name="aname" type="text" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="">Author Profile Photo</label>
                            <input name="aphoto" type="text" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="">Post Content</label>
                            <textarea name="pcontent" class="form-control" placeholder="Write a caption..."></textarea>
                        </div>
                        <div class="my-3">
                            <label for="">Post Photo</label>
                            <input name="pphoto" type="text" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="">Please Mention Your Post Date</label>
                            <input name="pdate" type="date" class="form-control">
                        </div>
                        <div class="my-3">
                            <!-- <button type="button" class="btn btn-primary w-100">Create Post</button> -->
                            <input type="submit" class="btn btn-primary w-100" value="Create Post">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- create Post Modal End  -->

    <!-- Edit Modal Start -->
    <!-- Edit Modal -->
    <div class="modal fade" id="edit-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit Your Post</h2>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="msg"></div>
                    <form action="" id="edit_post">

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal End -->


    <!-- JavaScript Linkup -->
    <script src="assets/js/function.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>