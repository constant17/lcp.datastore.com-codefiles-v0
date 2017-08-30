<?php
// Copy this file to the root directory of your drupal site. Note you may have to tweak the options.
//
// Usage: php make_thumbs.php h t t p ://mysite.com/make_thumbs.php
//
// Set these for your site.
// Location where video thumbnail to store
$thumbnail_path = 'files/mp4_videos/tmp/';
$second             = 1;
$thumbSize       = '150x150';
$ffmpeg_installation_path = 'ffmpeg/bin/';
// Video file name without extension(.mp4 etc)
$videoname  = 'yt-LRZ4A2tXyj8';

$video_file_path = 'vid/files/mp4_videos';

$path_to_store_generated_thumbnail = 'files/mp4_videos/tmp';
 
// FFmpeg Command to generate video thumbnail
 
$cmd = "{$ffmpeg_installation_path} -i {$video_file_path} -deinterlace -an -ss {$second} -t 00:00:01  -s {$thumbSize} -r 1 -y -vcodec mjpeg -f mjpeg {$path_to_store_generated_thumbnail} 2>&1";
 
exec($cmd, $output, $retval);
 
if ($retval)
{
    echo 'error in generating video thumbnail';
}
else
{
    echo 'Thumbnail generated successfully';
    echo $thumb_path = $thumbnail_path . $videoname . '.jpg';
}
?>