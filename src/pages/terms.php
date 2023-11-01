<?php

$post = get_post();

?>

<div class="container py-16">
    <h1 class="text-3xl mb-6 font-semibold">
        <?= $post->post_title ?>
    </h1>
    <article>
        <?= $post->post_content ?>
    </article>
</div>