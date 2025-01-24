<?php
function getYouTubeEmbedUrl($url)
{
    $parsedUrl = parse_url($url);
    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $queryParams);
        if (isset($queryParams['v'])) {
            return 'https://www.youtube.com/embed/' . $queryParams['v'];
        }
    } elseif (isset($parsedUrl['path'])) {
        $pathSegments = explode('/', trim($parsedUrl['path'], '/'));
        return 'https://www.youtube.com/embed/' . end($pathSegments);
    }
    return $url; // Return the original URL if it cannot be parsed
}