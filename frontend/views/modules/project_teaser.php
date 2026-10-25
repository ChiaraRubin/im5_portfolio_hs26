<?php $data = $args['data']; ?>

<section data-module="project_teaser">
    <?php foreach ($data['projects'] as $project) : ?>
        <a class="teaser" href="<?= esc_url($project['url']) ?>"
           data-categories="<?= esc_attr(implode(' ', $project['categories'])) ?>">
            <img src="<?= esc_url($project['image']['src']) ?>" alt="<?= esc_attr($project['image']['alt']) ?>">
            <p><?= esc_html($project['title']) ?></p>
        </a>
    <?php endforeach; ?>
</section>