<?php

use App\Controllers\Clientes;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;
use App\Controllers\News;

/**
 * @var RouteCollection $routes
 */


//CREATE
$routes->get('clientes/cadastrar', [Clientes::class, 'novoCliente']);
$routes->post('clientes/cadastrar', [Clientes::class, 'insereCliente']);

//READ ALL
$routes->get('clientes', [Clientes::class, 'listarClientes']);
$routes->get('/', [Clientes::class, 'listarClientes']);

//UPDATE
$routes->post('clientes/atualizar', [Clientes::class, 'atualizaCliente']);
$routes->get('clientes/atualizar', [Clientes::class, 'editarCliente']);

//DELETE
$routes->get('clientes/deletar', [Clientes::class, 'formDeletarCliente']);
$routes->post('clientes/deletar', [Clientes::class, 'deletadoCliente']);

//READ BY CPF
$routes->get('clientes/(:segment)', [Clientes::class, 'listarClientes']);
