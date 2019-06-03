<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Modules\Admin\Entities\Category;
use Modules\Admin\Entities\User;
use Modules\Blog\Entities\Post;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Database\DatabaseManager;


class ContatoController extends Controller
{

    protected $db;
    protected $to;

    public function __construct(Request $request, DatabaseManager $db)
    {
        $this->db = $db;
        $this->to = env('APP_ENV') == 'production' ? env('RECEIVE_EMAIL'): env('RECEIVE_EMAIL_SANDBOX');
    }


    public function index(Request $request)
    {
        set_time_limit(0);
        $user = User::where('owner', 1)->get()[0];
        $categories = Category::orderBy('name')->get();
        $mostRecent = Post::build()->getMostRecent();
        $mostRead = Post::build()->getRanking();

        if ($request->isMethod('post')) {
            try {
                $data = $request->all()['data'];
                $data['mensagem'] = $data['message'];
                unset($data['message']);

                // ENVIA O EMAIL // -----------------------------------------------------------
                Mail::send('email.contato', $data, function ($m) {
                    $m->from(env('MAIL_USERNAME'), 'Vida Fascinante');
                    $m->to($this->to, 'Vida Fascinante')->subject('Novo Contato do Blog');
                });
            } catch (\Exception $e) {
                return redirect('contato/blog')->with('message', ['content' => $e->getMessage(), 'type' => 'danger']);
            }


            return redirect('contato/blog')->with('message', ['content' => '<b>Mensagem</b> enviada com <b>sucesso</b>!Em breve retornaremos seu <b>contato</b>', 'type' => 'success']);
        }


        return view('blog::views.contact.index', compact('categories', 'user', 'mostRead','mostRecent'));
    }
}
