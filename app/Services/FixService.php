<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 23/04/2017
 * Time: 17:40
 */

namespace App\Services;


use App\Config;
use App\My\Resume;
use Modules\Admin\Entities\Post;

class FixService
{
    private $imagesFinder = '../../uploads/posts';
    private $imagesReplace = '/uploads/posts';

    /**
     * Preenche o campo de resumo nos posts que o mesmo está vazio
     * @return array
     */
    public function fixResume()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->resume = Resume::build()->intelligentResume($post->content);
            $post->save();
        }


        return ['message' => 'The posts resumes has success fixed'];
    }


    /**
     * Arruma a url das imagens que estão alocadas dentro do conteudo de um post
     */
    public function fixContentImages($post)
    {
        $host = Config::where('name', 'host')->firstOrFail()->value;

        $content = str_replace($this->imagesFinder, $host . $this->imagesReplace, $post->content);
        $fixContent = str_replace('../' . $host, $host, $content);
        $definityContent = str_replace('httpss' , 'https', $fixContent);
        $post->content = $definityContent;

        $post->save();

        return $post;
    }

    public function fixContentImagesString($string)
    {
        $host = Config::where('name', 'host')->firstOrFail()->value;
        $content = str_replace($this->imagesFinder, $host . $this->imagesReplace, $string);
        return  $fixContent = str_replace('../' . $host, $host, $content);
    }


    public function fixHttps($post)
    {
        $content = str_replace('http', 'https', $post->content);
        $post->content = $content;
        $post->save();

        return $post;
    }


}