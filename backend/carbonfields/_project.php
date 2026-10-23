<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Projekt')
    ->where('post_type', '=', 'project')
    ->add_fields([
        Field::make('image', 'image', 'Bild')->set_required()->set_help_text('Füge bitte ein Bild ein'),
        Field::make('text', 'subtitle', 'Untertitel'),
        Field::make('rich_text', 'text', 'Text')->set_required(),
        Field::make('rich_text', 'details', 'Details (Was ich gemacht habe, Credits)')
    ]);