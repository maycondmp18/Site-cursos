<?php
function youtubePlaylist($quant='20'){
  $maxResults = ($quant<=50) ? $quant : 50; //YouTube API limit of 50 per page
  $playlistID = 'PLN9uRmkZ8waO1_9euQiT_G5_N5G3iarPO'; //Your Youtube Playlist ID
  $tokenKey   = 'AIzaSyB4sua5vmFll3Di5jXVhCVd-02M_sLIACk'; //Your Token Key. Get here: https://console.developers.google.com/apis/credentials
  $videoList  = []; //Var to get video data
  $pagination = ''; //Var for previous and next pagination
	
  //Here check your get, post or ajax variable is empty
  if(isset($_GET['page']))
    $pagination = $_GET['page'];
	
  //Load json from Youtube API
  $playlistVids = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&pageToken='.$pagination.'&maxResults='.$maxResults.'&playlistId='.$playlistID.'&key='.$tokenKey.''));

  //Get var for previous and next pagination
  $videoList['prev'] = (isset($playlistVids->prevPageToken)) ? $playlistVids->prevPageToken : '';
  $videoList['next'] = (isset($playlistVids->nextPageToken)) ? $playlistVids->nextPageToken : '';
		
  foreach($playlistVids->items as $k => $item):
    $vidID = $item->snippet->resourceId->videoId;
    $videoList['videos'][$k] = [
      'title' => $item->snippet->title,
      'img'   => 'https://i.ytimg.com/vi/'.$vidID.'/maxresdefault.jpg',
      'link'  => 'https://www.youtube.com/watch?v='.$vidID,		 
     ];
  endforeach;
  return $videoList;
}
echo '<pre>';
print_r(youtubePlaylist());