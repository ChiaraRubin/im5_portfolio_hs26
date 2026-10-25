<?php $data = $args['data']; ?>

<section data-module="project_category">
    <?php foreach ($data['categories'] as $category) : ?>
        <button type="button" class="button" data-filter="<?= esc_attr($category['slug']) ?>">
            <?= esc_html($category['name']) ?>
        </button>
    <?php endforeach; ?>
</section>