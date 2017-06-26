<?php

namespace MeuProjeto\Routes;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$rotas = new RouteCollection();
$rotas->add('raiz', new Route('/', array(
    '_controller' => 'MeuProjeto\Controllers\ControleIndex',
    '_method' => 'index')));


$rotas->add('login', new Route('/login', array(
    '_controller' => 'MeuProjeto\Controllers\UserController',
    '_method' => 'login')));
$rotas->add('validalogin', new Route('/validalogin', array(
    '_controller' => 'MeuProjeto\Controllers\UserController',
    '_method' => 'validaLogin')));

$rotas->add('logout', new Route('/logout', array(
    '_controller' => 'MeuProjeto\Controllers\UserController',
    '_method' => 'logout')));

$rotas->add('produto', new Route('/produto/{_param}', array('_controller' => 'MeuProjeto\Controllers\ControleProduto', '_method' => 'show')));

$rotas->add('listagem', new Route('/admin/produtos', array('_controller' =>
    'MeuProjeto\Controllers\ProdutoController',
    '_method' => 'produtos')));
$rotas->add('teste', new Route('/teste', array('_controller' =>
    'MeuProjeto\Controllers\ControleProduto',
    '_method' => 'teste')));

$rotas->add('usuarios', new Route('/usuarios', array(
    '_controller' => 'MeuProjeto\Controllers\ControleLista',
    '_method' => 'usuarios')));

$rotas->add('manageusers', new Route('/manageusers', array(
    '_controller' => 'MeuProjeto\Controllers\UserController',
    '_method' => 'manageUsers')));
$rotas->add('manageprodutos', new Route('/admin/manageProdutos', array(
    '_controller' => 'MeuProjeto\Controllers\ProdutoController',
    '_method' => 'manageProdutos')));
$rotas->add('dashboard', new Route('/dashboard', array(
    '_controller' => 'MeuProjeto\Controllers\AdminController',
    '_method' => 'dashboard')));
$rotas->add('cotacoes', new Route('/cotacoes', array(
    '_controller' => 'MeuProjeto\Controllers\AdminController',
    '_method' => 'cotacoes')));
$rotas->add('managecotacoes', new Route('/cotacoes/managecotacoes', array(
    '_controller' => 'MeuProjeto\Controllers\AdminController',
    '_method' => 'manageCotacoes')));

return $rotas;
