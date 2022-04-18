<?php

namespace App\Models;


class Post 
{
    private static $blog_posts = [
        [
            "title" => "title posts first",
            "slug" => "title-post-first",
            "author" => "CHRISTOPER",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut architecto, nemo tempore natus repellat aliquam mollitia ipsum perferendis ipsa dolores fugiat ut itaque impedit repudiandae esse id a accusantium ullam explicabo quasi ducimus ad. Ratione aperiam dolorum soluta sint ullam delectus officiis cum quam, asperiores accusamus itaque laboriosam assumenda illo at, vitae iusto dolor? Omnis fugiat vero ipsa ut enim rerum natus dolores dolor, neque maiores quisquam provident nisi dignissimos eius architecto doloribus magnam! Labore quibusdam asperiores error similique nam!"
        ],
        [
            "title" => "title posts second",
            "slug" => "title-post-second",
            "author" => "Mac larren",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet eaque reprehenderit recusandae molestias cum, unde minus laborum? Dolores, a. Repudiandae adipisci consequatur aliquid ipsam vero eaque maiores dolores accusamus, beatae nam earum aperiam? Repellendus fugiat nostrum aut harum doloremque saepe velit ipsam cupiditate. Quisquam perspiciatis impedit facilis repellat reprehenderit eum dolores! Non tenetur voluptatem possimus accusantium atque provident, praesentium similique, facilis minus eius quod! A ducimus ex labore cupiditate pariatur excepturi. Maxime tempore odio est similique quo exercitationem iste qui consequatur corrupti quas quod tenetur veritatis quia, architecto suscipit nostrum, accusamus nesciunt amet sunt consectetur molestiae. Vitae ratione molestiae dolorem."
        ]
    
    ];

    public static function all() {
        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
   
}
