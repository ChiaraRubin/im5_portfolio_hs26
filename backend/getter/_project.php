<?php

//collect data
function get_project_by_id(int $id): array {
    $image_id = carbon_get_post_meta($id, 'image');
    $image    = get_media_by_id(id: $image_id);

    $title    = get_the_title($id);
    $text     = carbon_get_post_meta($id, 'text');
    $details  = carbon_get_post_meta($id, 'details');

    //return data
    return [
        'image'   => $image,
        'title'   => $title,
        'text'    => $text,
        'details' => $details,
    ];
}