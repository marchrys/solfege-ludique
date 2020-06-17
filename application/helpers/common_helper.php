<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('formattedComments')){
    function formattedComments($comments){
        foreach($comments as $comment){
            $createdAt = new DateTime($comment->created_at);
            $createdAt->add(new DateInterval('PT2H'));

            $comment->created_at = $createdAt->format('d/m/Y à H:i');
        }

        return $comments;
    }
}