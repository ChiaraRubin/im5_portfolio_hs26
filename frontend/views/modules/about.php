<?php $data = $args['data']; ?>

<section data-module="about">
    <img class="image" src="<?= esc_url($data['image']['src']) ?>" alt="<?= esc_attr($data['image']['alt']) ?>">

    <div class="content">
        <h1 class="title"><?= esc_html($data['title']) ?></h1>
        <div class="text"><?= wpautop($data['text']) ?></div>
    </div>
</section>