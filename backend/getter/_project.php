<?php

// collect data
function get_project_by_id(int $id): array {
    $image_id = carbon_get_post_meta($id, 'image');
    $image    = get_media_by_id(id: $image_id, size: 'full');

    $title    = get_the_title($id);
    $subtitle = carbon_get_post_meta($id, 'subtitle');
    $text     = carbon_get_post_meta($id, 'text');
    $details  = carbon_get_post_meta($id, 'details');

    // Galerie: jede Zeile bekommt Spaltenanzahl und aufbereitete Bilder
    $gallery_raw = carbon_get_post_meta($id, 'gallery') ?: [];
    $gallery = [];
    foreach ($gallery_raw as $row) {
        $images = [];
        foreach (($row['images'] ?? []) as $image_id_row) {
            $images[] = get_media_by_id(id: $image_id_row, size: 'full');
        }
        $gallery[] = [
            'columns' => (int) $row['columns'],
            'images'  => $images,
        ];
    }

    //load project_category 
    $project_categories = array_map(callback: function($item){
        return $item->name;
    }, array: get_the_terms($id, 'project_category'));
    


    // return data
    return [
        'image'    => $image,
        'title'    => $title,
        'subtitle' => $subtitle,
        'text'     => $text,
        'details'  => $details,
        'gallery'  => $gallery,
        'project_categories' => $project_categories,
    ];
}