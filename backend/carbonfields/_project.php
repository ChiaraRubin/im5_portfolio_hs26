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

        // Galerie mit zwei Zeilentypen
        Field::make('complex', 'gallery', 'Galerie')
            ->set_layout('tabbed-vertical')

            // Raster: 1, 2 oder 3 Spalten
            ->add_fields('grid', 'Raster', [
                Field::make('select', 'columns', 'Bilder pro Zeile')
                    ->set_options([
                        '1' => '1 Bild',
                        '2' => '2 Bilder',
                        '3' => '3 Bilder',
                    ])
                    ->set_default_value('2'),
                Field::make('media_gallery', 'images', 'Bilder')
                    ->set_type(['image']),
            ])

            // Links fixiert, rechts scrollend
            ->add_fields('sticky', 'Links fixiert', [
                Field::make('image', 'sticky_image', 'Bild links (fixiert)')->set_required(),
                Field::make('media_gallery', 'scroll_images', 'Bilder rechts (scrollen)')
                    ->set_type(['image']),
            ])

            // Bild links, Bild rechts mit Button
            ->add_fields('website', 'Website mit Button', [
                Field::make('image', 'image_left', 'Bild links')->set_required(),
                Field::make('image', 'image_right', 'Bild rechts')->set_required(),
                Field::make('text', 'button_text', 'Button-Text')
                    ->set_default_value('Besuche hier die Website'),
                Field::make('text', 'button_url', 'Button-Link')
                    ->set_help_text('Vollständige Adresse, z. B. https://meine-website.ch')
                    ->set_required(),
            ]),
    ]);