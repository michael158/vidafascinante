@include('blog::layouts.head')
@extends('blog::layouts.template', $categories)
@section('content')

    <style>
        @media screen and (max-height: 575px){#rc-imageselect,#recaptcha{transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0}}
    </style>

    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 post-list">
                        <div id="CONTATO">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    @if(session('message'))
                                        <div class="alert alert-{{session('message')['type']}}">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <span> {!! session('message')['content']  !!} </span>
                                        </div>
                                    @endif
                                    <h1>Contato</h1>
                                    Amamos receber críticas, elogios e sugestões de posts. Você só precisa colocar aqui embaixo.
                                    <h4>Parcerias, publicidade e negociações?</h4>
                                    <b> mande um e-mail para:</b><span style="color: #0d9890">contato@vidafascinante.com <br/></span>


                                    Respondemos e guardamos todas as mensagens com todo o carinho do mundo! ❤ <br/>

                                    <h4>Você tambem pode entrar em contato submetendo o formulário abaixo:</h4>
                                    <form id="form-contact" method="POST"
                                          novalidate="novalidate" >
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input type="text" name="data[name]" class="form-control"
                                                   placeholder="Seu Nome" required="required" aria-required="true">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="data[email]" class="form-control"
                                                   placeholder="Seu Email" required="required" aria-required="true">
                                        </div>
                                        <div class="form-group">
                                            <label>Mensagem</label>
                                            <textarea name="data[message]" class="form-control" rows="10"
                                                      required="required" aria-required="true"></textarea>
                                        </div>

                                        <div id="recaptcha" data-size="100%" style="margin-bottom: 10px"></div>

                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
                @if(Agent::isDesktop())
                    <div class="col-lg-4 visible-lg " id="side-right">
                        @include('blog::layouts.user-description', $user)
                        @include('blog::layouts.facebook')
                        @include('blog::layouts.adversiting')
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
@section('javascript')
    @include('blog::layouts.baseScript')
    @include('blog::views.contact.scripts.index')
@endsection