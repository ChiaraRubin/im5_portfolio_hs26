<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// -> Konfiguration der verschiedenen Module
Container::make('post_meta', 'Module')
    ->where('post_type', '=', 'page')
    ->add_fields([
        Field::make('complex', 'modules', 'Module')
            // -> example
            ->add_fields('example', 'Beispiel', [
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('image', 'image', 'Bild')->set_required(),
            ])
            // -> hero_front
            ->add_fields('hero_front', 'Hero Startseite', [
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('textarea', 'subline', 'Subline'),
                Field::make('image', 'image', 'Bild')->set_required(),
            ])
            // -> text
            ->add_fields('text', 'Text', [
                Field::make('rich_text', 'text', 'Text')->set_required(),
            ])
            // -> project_category
            ->add_fields('project_category', 'Kategorie-Filter', [
                Field::make('text', 'title', 'Titel'),
            ])
            // -> project_teaser
            ->add_fields('project_teaser', 'Projekt-Teaser-Raster', [
                Field::make('number', 'limit', 'Anzahl Projekte')
                    ->set_help_text('Leer lassen = alle Projekte'),
                Field::make('select', 'category', 'Kategorie')
                    ->set_options(function () {
                        $options = ['' => 'Alle'];
                        $terms = get_terms([
                            'taxonomy'   => 'project_category',
                            'hide_empty' => false,
                        ]);
                        if (!is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                $options[$term->slug] = $term->name;
                            }
                        }
                        return $options;
                    }),
            ])

            // -> about
            ->add_fields('about', 'About', [
                Field::make('image', 'image', 'Bild')->set_required(),
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('rich_text', 'text', 'Text')->set_required(),
            ])

            // -> contact
            ->add_fields('contact', 'Kontakt', [
                Field::make('file', 'video', 'Intro-Video (MP4)')
                    ->set_type(['video'])
                    ->set_required(),
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('rich_text', 'text', 'Text')->set_required(),
                Field::make('image', 'gif', 'Deko-GIF'),
])
            // todo: add new modules here
            // -> SETTINGS
            ->set_layout('tabbed-vertical')
    ]);

// -> Funktion, um die Module und die entsprechenden Templates auf der Seite zu laden
function render_modules (): void {
    $modules = carbon_get_the_post_meta('modules');
    if (empty($modules)) {
        return;
    }
    foreach ($modules as $module) {
        // -> Modifiziere die Daten des Moduls, falls nötig, basierend auf dem Modultyp
        switch ($module['_type']) {
            case 'example':
                $module['image'] = get_media_by_id($module['image'], 'full');
                break;
            case 'hero_front':
                $module['image'] = get_media_by_id(id: $module['image'], size: 'full');
                break;
            case 'project_category':
                $module['categories'] = get_project_categories();
                break;
            case 'project_teaser':
                $module['projects'] = get_projects(
                    limit: $module['limit'] ? (int) $module['limit'] : -1,
                    category: $module['category'] ?? ''
                );
                break;

            case 'about':
                $module['image'] = get_media_by_id(id: $module['image'], size: 'xl');
                break;

            case 'contact':
                $module['video'] = get_media_by_id(id: $module['video'], size: 'full');
                $module['gif']   = $module['gif'] ? get_media_by_id(id: $module['gif'], size: 'full') : null;
                break;
                // todo: add data modifications for modules here as a new case
        }
        // -> Laden des Templates basierend auf dem Modultyp und weitergeben der Daten
        get_template_part(
            'frontend/views/modules/' . $module['_type'],
            null,
            [
                'data' => $module
            ]
        );
    }
}