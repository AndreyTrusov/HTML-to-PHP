<?php
include_once('database/connections.php');
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
  $links = sql_get_social_media_link_by_blog_id($id);
  foreach ($links as $link) {
    $return_links = $return_links . '<li><a href="' . $link["link"] . '">' . $link["name"] . '</a></li>' . " , ";
  }
  //delete last ","
  return substr($return_links, 0, -2);
}
function get_Info_Link_by_id($id)
{
  $return_links = "";
  $links = sql_get_info_links_by_blog_id($id);
  foreach ($links as $link) {
    $return_links = $return_links . '<li><a href="' . $link["link"] . '">' . $link["name"] . '</a></li>' . " , ";
  }
  //delete last ","
  return substr($return_links, 0, -2);
}
function get_blog_baner()
{
  $blogs = sql_get_blogs_all("baner");
  foreach ($blogs as $blog) {
    echo '
      <div class="item">
        <a href="post-details.php?blog=' . $blog['id'] . '">
          <img src="' . $blog['img1'] . '" alt="">
        </a>
        <div class="item-content">
          <div class="main-content">
            <div class="meta-category">
              <span>' . $blog['category'] . '</span>
            </div>
            <a href="post-details.php?blog=' . $blog['id'] . '">
              <h4>' . $blog['title'] . '</h4>
            </a>
            <ul class="post-info">
              <li><a>' . sql_get_user_by_id($blog['user']) . '</a></li>
              <li><a>' . date("d.m.Y", strtotime($blog['date'])) . '</a></li>
              <li><a>' . sql_get_number_of_comments($blog['id']) . ' Comments</a></li>
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
          <span>' . $blog['category'] . '</span>
          <h4>' . $blog['title'] . '</h4>
          <ul class="post-info">
            <li><a>' . sql_get_user_by_id($blog['user']) . '</a></li>
            <li><a>' . date("d.m.Y", strtotime($blog['date'])) . '</a></li>
            <li><a>' . sql_get_number_of_comments($blog['id']) . ' Comments</a></li>
            <li><a>' . $blog['views'] . ' Views</a></li>
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

function get_blog_intro()
{
  $blogs = sql_get_blogs_all("intro");
  foreach ($blogs as $blog) {
    echo '
      <div class="col-lg-12">
      <div class="blog-post">
        <div class="blog-thumb">
          <a href="post-details.php?blog=' . $blog['id'] . '">
            <img src="' . $blog['img2'] . '" alt="">
          </a>
        </div>
        <div class="down-content">
          <span>' . $blog['category'] . '</span>
          <a href="post-details.php?blog=' . $blog['id'] . '">
            <h4>' . $blog['title'] . '</h4>
          </a>
          <ul class="post-info">
            <li><a>' . sql_get_user_by_id($blog['user']) . '</a></li>
            <li><a>' . date("d.m.Y", strtotime($blog['date'])) . '</a></li>
            <li><a>' . sql_get_number_of_comments($blog['id']) . ' Comments</a></li>
            <li><a>' . $blog['views'] . ' Views</a></li>
          </ul>
          <p>' . $blog['intro_text'] . '</p>
        </div>
      </div>
    </div>';
  }
}
function get_blogs($id)
{
  $return_blogs = "";
  $blogs = sql_get_blogs_all("diff");
  $iterator = 1;

  foreach ($blogs as $blog) {
    if (isset($_SESSION["user_id"]) && $blog["user"] === $id) {
      $return_blogs = $return_blogs . '
  <tr>
    <th scope="row">' . $iterator++ . '</th>
    <td>' . $blog["title"] . '</td>
    <td><a href="edit_blog.php?blog_id=' . $blog['id'] . '"><button type="button" class="btn btn-outline-info btn-sm">Edit blog</button></a></td>
    <td><a href="database/delete_blog.inc.php?blog_id=' . $blog['id'] . '"><button type="button" class="btn btn btn-outline-danger btn-sm">Delete blog</button></a>
    </td>
  </tr>
  ';
    }
  }
  echo $return_blogs;
}

function get_blog_all_edit($blog_id)
{
  $return_categorys = "";
  $blogs = sql_get_blog_all_by_id($blog_id);
  foreach ($blogs as $blog) {
    if (isset($_SESSION["user_id"])) {
      return '
      <form id="blog" action="database/update_blog.inc.php?blog_id=' . $_GET['blog_id'] . '" method="POST">
  <div style="margin-top: 40px;" class="form-group">
    <label for="exampleFormControlInput1" style="color: #17a2b8;">Tittle</label>
    <input name="update_blog_tittle" value="' . $blog['title'] . '" type="text" class="form-control"
      id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput" style="color: #17a2b8;">Intro text</label>
    <input name="update_blog_intro_text" type="text" class="form-control" id="formGroupExampleInput"
      value="' . $blog['intro_text'] . '">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1" style="color: #17a2b8;">Text</label>
    <textarea name="update_blog_text" class="form-control" id="exampleFormControlTextarea1"
      rows="3">' . $blog['text'] . '</textarea>
  </div>
  <p class="text-left" style="margin-bottom: 10px; color: #17a2b8;">Edit categories:</p>
  <hr>
  <br>
  <button style="background-color: #17a2b8; color: white;" type="submit" class="btn ">
      Update blog</button>
  <br>
</form>
      
  ';
    }
  }
  echo $return_categorys;
}

function get_category()
{
  $return_categorys = "";
  $categoryes = sql_get_category_all();
  foreach ($categoryes as $category) {
    if (isset($_SESSION["user_id"])) {
      // HELP --> type radio 
      $return_categorys = $return_categorys . '
    <div class="form-check">
      <input name="radio_' . $category["name"] . '" class="form-check-input" type="radio" id="defaultCheck1">
      <label class="form-check-label" for="defaultCheck1">
          ' . $category["name"] . '
      </label>
    </div>
  ';
    }
  }
  echo $return_categorys;
}

function get_commenst($id)
{
  $return_comments = "";
  $comments = sql_get_comments_by_blog_id($id);
  foreach ($comments as $comment) {
    $return_comments = $return_comments . '
    <li>
      <div class="author-thumb">
        <img src="assets/images/comment-author-01.jpg" alt="">
      </div>
      <div class="right-content">
        <h4>' . sql_get_user_by_user_id($comment["user_id"]) . '<span>' . date("d.m.Y", strtotime($comment['date'])) . '</span></h4>
        <p>' . $comment["text"] . '</p>
      </div>
    </li>';
  }
  echo $return_comments;
}

function get_create_commenst($blog_id)
{
  if (isset($_SESSION["user_id"])) {

    $_POST["name"] = $_SESSION["user_name"];
    echo '
    <div class="col-lg-12">
              <div style="margin-top: 60px;" class="sidebar-item submit-comment">
                <div class="sidebar-heading">
                  <h2>Your comment</h2>
                </div>
                <div class="content">
                  <!-- Create comment -->
                  <form id="comment" action="database/sendcomment.php" method="POST">
                    <div class="row">
                      <div class="col-lg-12">
                        <fieldset>
                          <textarea name="message" rows="6" id="message" placeholder="Type your comment"
                            required=""></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="form-submit" class="main-button">Submit</button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
    ';
  }
}

function sidebar_get_blogs()
{
  $return_blog = "";
  $blogs = sql_get_blogs_all("");
  foreach ($blogs as $blog) {
    $return_blog = $return_blog . '
    <li><a href="post-details.php?blog=' . $blog['id'] . '">
           <h5>' . $blog['title'] . '</h5>
                <span>' . date("d.m.Y", strtotime($blog['date'])) . '</span>
        </a></li>
   ';
  }
  echo $return_blog;
}

function get_blogs_all_for_blog_page()
{
  $blogs = sql_get_blogs_all("baner");
  foreach ($blogs as $blog) {
    echo '
    <div class="col-lg-6">
              <div class="blog-post">
                <div class="blog-thumb">
                <a href="post-details.php?blog=' . $blog['id'] . '">
                  <img src="' . $blog['img1'] . '" alt="">
                </a>
                </div>
                <div class="down-content">
                  <span>' . $blog['category'] . '</span>
                  <a href="post-details.php?blog=' . $blog['id'] . '">
                    <h4>' . $blog['title'] . '</h4>
                  </a>
                  <ul class="post-info">
                    <li>' . sql_get_user_by_id($blog['user']) . '</li>
                    <li>' . date("d.m.Y", strtotime($blog['date'])) . '</li>
                    <li>' . sql_get_number_of_comments($blog['id']) . ' Comments</li>
                  </ul>
                  <p>' . $blog['intro_text'] . '</p>
                  <div class="post-options">
                    <div class="row">
                      <div class="col-lg-12">
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      ';
  }
}
?>