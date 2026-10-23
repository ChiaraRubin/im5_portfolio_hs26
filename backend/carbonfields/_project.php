<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Projekt')
    ->where('post_type', '=', 'project')
    ->add_fields([
        Field::make('image', 'image', 'Bild')->set_required()->set_help_text('Füge bitte ein Bild ein'),
        Field::make('text', 'subtitle', 'Untertitel'),
        Field::make('rich_text', 'text', 'Text')->set_required(),
        Field::make('rich_text', 'details', 'Details (Was ich gemacht habe, Credits)'),

        // Beliebig viele Bild-Zeilen
        Field::make('complex', 'gallery', 'Galerie')
            ->set_layout('tabbed-vertical')
            ->set_header_template('Zeile: <%- columns %> Spalte(n)')
            ->add_fields([
                Field::make('select', 'columns', 'Bilder pro Zeile')
                    ->set_options([
                        '1' => '1 Bild',
                        '2' => '2 Bilder',
                        '3' => '3 Bilder',
                    ])
                    ->set_default_value('2'),
                Field::make('media_gallery', 'images', 'Bilder')
                    ->set_type(['image']),
            ]),
    ]);