<?php
if ( $instagram_access_token ) :
  // Check if gallery for the received access token is cached on a transient
  if ( false === ( $instagram_data = get_transient( "instagram_data_{$instagram_access_token}" ) ) ) {
    // API parameters
    $access_token = $instagram_access_token;
    $photo_count = 6;

    // API endpoints to be called
    $gallery_API_url = "https://api.instagram.com/v1/users/self/media/recent/?access_token={$access_token}&count={$photo_count}";
    $user_API_url = "https://api.instagram.com/v1/users/self?access_token={$access_token}";

    // Get gallery data
    $json_result = file_get_contents($gallery_API_url);
    $gallery_data = json_decode($json_result, true, 512, JSON_BIGINT_AS_STRING);

    // Get user data
    $user_json_result = file_get_contents($user_API_url);
    $user_data = json_decode($user_json_result, true, 512, JSON_BIGINT_AS_STRING);

    // Set array to save data as a transient
    $instagram_data = array();
    if ($user_data && $gallery_data) {
      $instagram_data = array(
        'username' => $user_data['data']['username'],
        'gallery' => $gallery_data
      );
      // Store data to cache gallery for one week
      set_transient("instagram_data_{$instagram_access_token}", $instagram_data, WEEK_IN_SECONDS);
    }
  }

  if ( !empty( $instagram_data ) ) :
  ?>
    <div class="container">
      <div class="feed-instagram">
        <a href="https://www.instagram.com/<?php echo $instagram_data['username']; ?>" target="_blank">
          <div class="instagram-link mobile">
            <svg viewBox="0 0 486.392 486.392" aria-hidden="true">
              <use xlink:href="#logo-instagram"></use>
            </svg>
            <span>@<?php echo $instagram_data['username']; ?></span>
          </div>
        </a>
        <div class="feed-instagram__wrapper">
          <div class="center feed-instagram__indicators">
            <div class="left">
              <a href="javascript:void(0);" class="carousel-prev waves-effect waves-light" style="width: 24px;">
                <i class="left">
                  <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="M20 .755l-14.374 11.245 14.374 11.219-.619.781-15.381-12 15.391-12 .609.755z"/></svg>
                </i>
              </a>
            </div>
            <div class="right">
              <a href="javascript:void(0);" class="carousel-next waves-effect waves-light" style="width: 24px;">
                <i class="right">
                  <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="M4 .755l14.374 11.245-14.374 11.219.619.781 15.381-12-15.391-12-.609.755z"/></svg>
                </i>
              </a>
            </div>
          </div>
          <div class="feed-instagram__list carousel">
          <?php foreach ( $instagram_data['gallery']['data'] as $post ) :
            $image_src = str_replace( 'http://', 'https://', $post['images']['standard_resolution']['url'] ); ?>
            <div class="item carousel-item">
              <a href="<?php echo $post['link']; ?>" target="_blank">
                <picture>
                  <source srcset="<?php echo $image_src; ?>" type="image/jpeg">
                  <img src="<?php echo $image_src; ?>" alt="<?php echo $post['caption']['text']; ?>">
                </picture>
              </a>
            </div>
          <?php endforeach; ?>
          </div>
        </div>
        <a href="https://www.instagram.com/<?php echo $instagram_data['username']; ?>" target="_blank">
          <div class="instagram-link">
            <svg viewBox="0 0 486.392 486.392" aria-hidden="true">
              <use xlink:href="#logo-instagram"></use>
            </svg>
            <span>@<?php echo $instagram_data['username']; ?></span>
          </div>
        </a>
      </div>
    </div>
  <?php endif; ?>
<?php endif; ?>