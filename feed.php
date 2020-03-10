<?php
    include('db/conn.php');
    include_once("upload-modal.php");
    include_once('db/fetch_all_post.php');
    // session_destroy();
    // var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navigation">
        <div class="navigation__column">
            <a href="feed.php">
                <!-- Master branch comment -->
                <img src="images/logo.png" />
            </a>
        </div>
        <div class="navigation__column">
            <i class="fa fa-search"></i>
            <form action="feed.php" method="post">
                <input type="text" name="search" placeholder="Search" required>
            </form>
        </div>
        <div class="navigation__column">
            <ul class="navigations__links">
                <!-- <img src="https://img.icons8.com/ios/26/000000/upload.png"> -->
                <li class="navigation__list-item" >
                    <button style="border:none; background-color:transparent" type="button" data-toggle="modal" data-target="#upload-modal-1">
                        <i><img src="https://img.icons8.com/ios/26/000000/upload.png"></i>
                    </button>
                </li>
                <li class="navigation__list-item">
                    <a href="explore.php" class="navigation__link">
                        <i class="fa fa-compass fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="#" class="navigation__link">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="profile.php" class="navigation__link">
                        <i class="fa fa-user-o fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main id="feed">
        <?php
            if(!isset($_POST['search'])){
                if($result != null){
                    foreach($result as $val){
                        echo "<div class='photo'>";
                            echo "<header class='photo__header'>";
                                echo "<img src='images/avatar.jpg' class='photo__avatar'/>";
                                echo "<div class='photo__user-info'>";
                                    echo "<span class='photo__author'>$val[1]</span>";
                                    echo "<span class='photo__location'>$val[1]</span>";
                                echo "</div>";
                            echo "</header>";
                            echo "<img src='upload/$val[2]'/>";
                            echo "<div class='photo__info'>";
                                echo "<div class='photo__actions'>";
                                    echo "<span class='photo__action'>";
                                        echo "<i class='fa fa-heart-o fa-lg'></i>";
                                    echo "</span>";
                                    echo "<span class='photo__action'>";
                                        echo "<i class='fa fa-comment-o fa-lg'></i>";
                                    echo "</span>";
                                echo "</div>";
                                echo "<span class='photo__likes'>$val[4] likes</span>";
                                echo "<ul class='photo__comments'>";
                                    echo "<li class='photo__comment'>";
                                        echo "<span class='photo__comment-author'>$val[1]</span> $val[3]";
                                    echo "</li>";
                                    echo "<li class='photo__comment'>";
                                        echo "<span class='photo__comment-author'>$username</span> love this!";
                                    echo "</li>";
                                    echo "<li class='photo__comment'>";
                                        echo "<span class='photo__comment-author'>$username</span> Great!";
                                    echo "</li>";
                                    echo "<li class='photo__comment'>";
                                        echo "<span class='photo__comment-author'>$username</span> Like for like!";
                                    echo "</li>";
                                echo "</ul>";
                                echo "<span class='photo__time-ago'>2 hours ago</span>";
                                echo "<div class='photo__add-comment-container'>";
                                    echo "<textarea name='comment' placeholder='Add a comment...'></textarea>";
                                    echo "<i class='fa fa-ellipsis-h'></i>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    }
                }
            } else {
                $captionSearch = $_POST['search'];
                $querySearch = "SELECT * FROM PHOTO WHERE caption like '%$captionSearch%'";
                $res  = $conn->query($querySearch);
                $filter = mysqli_fetch_all($res);
                $searchValue = $captionSearch;

                if($filter != null){
                    foreach($filter as $val){
                        echo "<div class='photo'>";
                            echo "<header class='photo__header'>";
                                echo "<img src='images/avatar.jpg' class='photo__avatar'/>";
                                echo "<div class='photo__user-info'>";
                                    echo "<span class='photo__author'>$val[1]</span>";
                                    echo "<span class='photo__location'>$val[1]</span>";
                                echo "</div>";
                            echo "</header>";
                            echo "<img src='upload/$val[2]'/>";
                            echo "<div class='photo__info'>";
                                echo "<div class='photo__actions'>";
                                    echo "<span class='photo__action'>";
                                        echo "<i class='fa fa-heart-o fa-lg'></i>";
                                    echo "</span>";
                                    echo "<span class='photo__action'>";
                                        echo "<i class='fa fa-comment-o fa-lg'></i>";
                                    echo "</span>";
                                echo "</div>";
                                echo "<span class='photo__likes'>$val[4] likes</span>";
                                echo "<ul class='photo__comments'>";
                                    echo "<li class='photo__comment'>";
                                        echo "<span class='photo__comment-author'>$val[1]</span> $val[3]";
                                    echo "</li>";
                                    echo "<li class='photo__comment'>";
                                        echo "<span class='photo__comment-author'>$username</span> love this!";
                                    echo "</li>";
                                    echo "<li class='photo__comment'>";
                                        echo "<span class='photo__comment-author'>$username</span> Great!";
                                    echo "</li>";
                                    echo "<li class='photo__comment'>";
                                        echo "<span class='photo__comment-author'>$username</span> Like for like!";
                                    echo "</li>";
                                echo "</ul>";
                                echo "<span class='photo__time-ago'>2 hours ago</span>";
                                echo "<div class='photo__add-comment-container'>";
                                    echo "<textarea name='comment' placeholder='Add a comment...'></textarea>";
                                    echo "<i class='fa fa-ellipsis-h'></i>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    }
                }
            }
            $conn->close();
        ?>
    </main>
    <footer class="footer">
        <div class="footer__column">
            <nav class="footer__nav">
                <ul class="footer__list">
                    <li class="footer__list-item"><a href="#" class="footer__link">About Us</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Support</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Blog</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Press</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Api</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Jobs</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Privacy</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Terms</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Directory</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Language</a></li>
                </ul>
            </nav>
        </div>
        <div class="footer__column">
            <span class="footer__copyright">© 2017 Vietgram</span>
        </div>
    </footer>
</body>

</html>