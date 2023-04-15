<?php
$preloading = '<div id="preloader"><div class="jumper"><div></div><div></div><div></div></div></div>';
function get_menu($menu)
{
  foreach ($menu as $section) {
    echo '<li class="nav-item"><a class="nav-link" href="' . $section["path"] . '">' . $section["name"] . '</a></li>';
  }
}
function get_social_media_link_by_id($id)
{
  $return_links = "";
  $links = get_social_media_link_by_blog_id($id);
  foreach ($links as $link) {
    $return_links = $return_links . '<li><a href="' . $link["link"] . '">' . $link["name"] . '</a></li>' . " , ";
  }
  //delete last ","
  return substr($return_links, 0, -2);
}
function get_Info_Link_by_id($id)
{
  $return_links = "";
  $links = get_info_links_by_blog_id($id);
  foreach ($links as $link) {
    $return_links = $return_links . '<li><a href="' . $link["link"] . '">' . $link["name"] . '</a></li>' . " , ";
  }
  //delete last ","
  return substr($return_links, 0, -2);
}
function get_Banner($blogs)
{
  foreach ($blogs as $blog) {
    echo '
      <div class="item">
        <img src="' . $blog['img1'] . '" alt="">
        <div class="item-content">
          <div class="main-content">
            <div class="meta-category">
              <span>' . $blog['category'] . '</span>
            </div>
            <a href="post-details.php">
              <h4>' . $blog['title'] . '</h4>
            </a>
            <ul class="post-info">
              <li><a href="#">' . get_user_by_id($blog['user']) . '</a></li>
              <li><a href="#">' . date("d.m.Y", strtotime($blog['date'])) . '</a></li>
              <li><a href="#">' . get_number_of_comments($blog['id']) . ' Comments</a></li>
            </ul>
          </div>
        </div>
      </div>';
  }
}
function get_blog_all($blog)
{
  echo '
      <div class="col-lg-12">
      <div class="blog-post">
        <div class="blog-thumb">
          <img src="' . $blog['img2'] . '" alt="">
        </div>
        <div class="down-content">
          <span>Healthy</span>
          <a href="post-details.php">
            <h4>' . $blog['title'] . '</h4>
          </a>
          <ul class="post-info">
            <li><a href="#">' . get_user_by_id($blog['user']) . '</a></li>
            <li><a href="#">' . date("d.m.Y", strtotime($blog['date'])) . '</a></li>
            <li><a href="#">' . get_number_of_comments($blog['id']) . ' Comments</a></li>
            <li><a href="#">' . $blog['views'] . ' Views</a></li>
          </ul>
          <p>' . $blog['text'] . '</p>
          <div class="post-options">
            <div class="row">
              <div class="col-6">
                <ul class="post-tags">
                  <li><i class="fa fa-tags"></i></li>
                  <li>' . get_social_media_link_by_id($blog["id"]) . '</li>
                </ul>
              </div>
              <div class="col-6">
                <ul class="post-share">
                    <li><i class="fa fa-share-alt"></i></li>
                    <li>' . get_Info_Link_by_id($blog["id"]) . '</li>
                </ul>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>';
}

function get_blog_intro($blogs)
{
  foreach ($blogs as $blog) {
    echo '
      <div class="col-lg-12">
      <div class="blog-post">
        <div class="blog-thumb">
          <img src="' . $blog['img2'] . '" alt="">
        </div>
        <div class="down-content">
          <span>Healthy</span>
          <a href="post-details.php">
            <h4>' . $blog['title'] . '</h4>
          </a>
          <ul class="post-info">
            <li><a href="#">' . get_user_by_id($blog['user']) . '</a></li>
            <li><a href="#">' . date("d.m.Y", strtotime($blog['date'])) . '</a></li>
            <li><a href="#">' . get_number_of_comments($blog['id']) . ' Comments</a></li>
            <li><a href="#">' . $blog['views'] . ' Views</a></li>
          </ul>
          <p>' . $blog['intro_text'] . '</p>
          <div class="post-options">
            <div class="row">
              <div class="col-6">
                <ul class="post-tags">
                  <li><i class="fa fa-tags"></i></li>
                  <li>' . get_social_media_link_by_id($blog["id"]) . '</li>
                </ul>
              </div>
              <div class="col-6">
                <ul class="post-share">
                    <li><i class="fa fa-share-alt"></i></li>
                    <li>' . get_Info_Link_by_id($blog["id"]) . '</li>
                </ul>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>';
  }
}

function get_commenst($id)
{
  $return_comments = "";
  $comments = get_comments_by_blog_id($id);
  foreach ($comments as $comment) {
    $return_comments = $return_comments . '
    <li>
    <div class="author-thumb">
      <img src="assets/images/comment-author-01.jpg" alt="">
    </div>
    <div class="right-content">
      <h4>' . $comment["user_id"] . '<span>' . date("d.m.Y", strtotime($comment['date'])) . '</span></h4>
      <p>' . $comment["text"] . '</p>
    </div>
  </li>';
  }
  echo $return_comments;
}
?>